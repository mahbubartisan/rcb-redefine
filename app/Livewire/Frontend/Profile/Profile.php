<?php

namespace App\Livewire\Frontend\Profile;

use Carbon\Carbon;
use App\Models\Player;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Profile extends Component
{
    public $player;
    public $battingStats = [];
    public $bowlingStats = [];
    public $fieldingStats = [];

    public function mount($slug)
    {
        // Load player with relations

        $this->player = Player::with([
            'battingStats.match.tournament',
            'bowlingStats.match.tournament',
            'fieldingStats.match.tournament',
            'squads',
            'media',
        ])->where('slug', $slug)->firstOrFail();


        // group stats by year
        // $grouped = $this->player->battingStats->groupBy(function ($stat) {
        //     return $stat->created_at->format('Y');
        // });

        // foreach ($grouped as $year => $stats) {
        //     //Matches
        //     $matches = DB::table('player_squad')
        //         ->join('squads', 'player_squad.squad_id', '=', 'squads.id')
        //         ->where('player_squad.player_id', $this->player->id)
        //         ->distinct('squads.match_id')
        //         ->count('squads.match_id');

        //     //Innings — only when player batted
        //     $innings = $stats->filter(fn($s) => $s->balls > 0 || $s->runs > 0)->count();
        //     $notOuts   = $stats->where('dismissal', 'not out')->count(); // adjust if dismissal is stored differently
        //     // $outs      = $innings - $notOuts;

        //     $runs      = $stats->sum('runs');
        //     $balls     = $stats->sum('balls');
        //     $fours     = $stats->sum('fours');
        //     $sixes     = $stats->sum('sixes');

        //     $average   = $innings > 0 ? round($runs / $innings, 2) : $runs;
        //     $strikeRate = $balls > 0 ? round(($runs / $balls) * 100, 2) : 0;

        //     $this->battingStats[] = [
        //         'year'     => $year,
        //         'matches'  => $matches,
        //         'innings'  => $innings,
        //         'not_outs' => $notOuts,
        //         'runs'     => $runs,
        //         'avg'      => $average,
        //         'hs'       => $stats->max('runs'),
        //         'sr'       => $strikeRate,
        //         'fifties'  => $stats->where('runs', '>=', 50)->where('runs', '<', 100)->count(),
        //         'hundreds' => $stats->where('runs', '>=', 100)->count(),
        //         'fours'    => $fours,
        //         'sixes'    => $sixes,
        //     ];
        // }

        // Group batting stats by tournament year
        $grouped = $this->player->battingStats->groupBy(function ($stat) {
            return optional($stat->match->tournament)->date
                ? Carbon::parse($stat->match?->tournament?->date)->format('Y')
                : 'Unknown';
        })->sortKeys();


        foreach ($grouped as $year => $stats) {
            // Get all match IDs in these stats
            $matchIds = $stats->pluck('match_id')->unique();

            // Count distinct matches played in this tournament year
            $matches = DB::table('player_squad')
                ->join('squads', 'player_squad.squad_id', '=', 'squads.id')
                ->where('player_squad.player_id', $this->player->id)
                ->whereIn('squads.match_id', $matchIds)
                ->distinct('squads.match_id')
                ->count('squads.match_id');

            // Inning stats
            $innings   = $stats->filter(fn($s) => $s->balls > 0 || $s->runs > 0)->count();
            $notOuts = $stats->whereIn('dismissal', ['not out', 'retired hurt'])->count();
            $ducks = $stats
                ->filter(
                    fn($s) =>
                    $s->runs == 0
                        && $s->balls > 0
                        && !in_array(strtolower($s->dismissal), ['not out', 'retired hurt'])
                )
                ->count();
            $runs      = $stats->sum('runs');
            $balls     = $stats->sum('balls');
            $fours     = $stats->sum('fours');
            $sixes     = $stats->sum('sixes');
            $average   = $innings > 0 ? round($runs / $innings, 2) : $runs;
            $strikeRate = $balls > 0 ? round(($runs / $balls) * 100, 2) : 0;

            $this->battingStats[] = [
                'year'     => $year,
                'matches'  => $matches,
                'innings'  => $innings,
                'not_outs' => $notOuts,
                'ducks'    => $ducks,
                'runs'     => $runs,
                'balls'    => $balls,
                'avg'      => $average,
                'hs'       => $stats->max('runs'),
                'sr'       => $strikeRate,
                'fifties'  => $stats->where('runs', '>=', 50)->where('runs', '<', 100)->count(),
                'hundreds' => $stats->where('runs', '>=', 100)->count(),
                'fours'    => $fours,
                'sixes'    => $sixes,
            ];
        }

        // Group bowling stats by tournament year
        $grouped = $this->player->bowlingStats->groupBy(function ($stat) {
            return optional($stat->match?->tournament)->date
                ? Carbon::parse($stat->match?->tournament?->date)->format('Y')
                : 'Unknown';
        })->sortKeys();

        $this->bowlingStats = $grouped->map(function ($stats, $year) {
            // Get all match IDs for these stats
            $matchIds = $stats->pluck('match_id')->unique();

            // Count distinct matches in this tournament year
            $matches = DB::table('player_squad')
                ->join('squads', 'player_squad.squad_id', '=', 'squads.id')
                ->where('player_squad.player_id', $this->player->id)
                ->whereIn('squads.match_id', $matchIds)
                ->distinct('squads.match_id')
                ->count('squads.match_id');

            // Innings — where bowler actually bowled
            $innings = $stats->filter(fn($s) => $s->overs > 0 || $s->balls > 0)->count();

            // Calculate total overs and balls bowled
            $overs = $stats->sum('overs');
            $balls = $stats->sum(function ($s) {
                $wholeOvers = floor($s->overs);
                $remainingBalls = ($s->overs - $wholeOvers) * 10;
                return ($wholeOvers * 6) + $remainingBalls;
            });

            $maidens = $stats->sum('maiden');
            $runs    = $stats->sum('runs');
            $wickets = $stats->sum('wickets');

            // Best bowling figures
            $bbi = $stats->map(fn($s) => "{$s->wickets}/{$s->runs}")
                ->sortDesc()
                ->first();

            // Averages and rates
            $average = $wickets > 0 ? round($runs / $wickets, 2) : '-';
            $economy = $overs > 0 ? round($runs / $overs, 2) : '-';
            $threes  = $stats->filter(fn($s) => $s->wickets >= 3)->count();
            $fives   = $stats->filter(fn($s) => $s->wickets >= 5)->count();

            return [
                'year'     => $year,
                'matches'  => $matches,
                'innings'  => $innings,
                'overs'    => $overs,
                'balls'    => $balls,
                'maidens'  => $maidens,
                'runs'     => $runs,
                'wickets'  => $wickets,
                'bbi'      => $bbi,
                'average'  => $average,
                'economy'  => $economy,
                'threes'   => $threes,
                'fives'    => $fives,
            ];
        })->values();


        // Fielding 
        // $this->fieldingStats = $this->player->fieldingStats()
        //     ->get()
        //     ->groupBy(fn($stat) => $stat->created_at->format('Y')) // group by year
        //     ->map(function ($stats, $year) {
        //         $matches = $stats->pluck('match_id')->unique()->count();

        //         // Convert dismissal type to lowercase to avoid case mismatches
        //         $catches = $stats->filter(fn($s) => str_contains(strtolower($s->dismissal), 'caught'))->count();
        //         $stumps  = $stats->filter(fn($s) => str_contains(strtolower($s->dismissal), 'stump'))->count();
        //         $runOuts = $stats->filter(fn($s) => str_contains(strtolower($s->dismissal), 'run out'))->count();

        //         return [
        //             'year'      => $year,
        //             'matches'   => $matches,
        //             'catches'   => $catches,
        //             'stumps'    => $stumps,
        //             'run_outs'  => $runOuts,
        //         ];
        //     })
        //     ->values();
        $this->fieldingStats = $this->player->fieldingStats()
            ->with('match.tournament') // make sure to eager load tournament
            ->get()
            ->groupBy(function ($stat) {
                return optional($stat->match?->tournament)->date
                    ? \Carbon\Carbon::parse($stat->match?->tournament?->date)->format('Y')
                    : 'Unknown';
            })
            ->map(function ($stats, $year) {
                // Get distinct matches in this tournament year
                $matches = $stats->pluck('match_id')->unique()->count();

                // Normalize dismissal type for matching
                $catches = $stats->filter(
                    fn($s) =>
                    str_contains(strtolower($s->dismissal ?? ''), 'caught')
                )->count();

                $stumps = $stats->filter(
                    fn($s) =>
                    str_contains(strtolower($s->dismissal ?? ''), 'stump')
                )->count();

                $runOuts = $stats->filter(
                    fn($s) =>
                    str_contains(strtolower($s->dismissal ?? ''), 'run out')
                )->count();

                return [
                    'year'      => $year,
                    'matches'   => $matches,
                    'catches'   => $catches,
                    'stumps'    => $stumps,
                    'run_outs'  => $runOuts,
                ];
            })
            ->values();
    }

    public function render()
    {
        return view('livewire.frontend.profile.profile')->extends('livewire.frontend.layouts.app');
    }
}
