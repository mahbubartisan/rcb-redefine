<?php

namespace App\Livewire\Frontend\ScoreBoard;

use App\Livewire\Forms\ScoreboardForm;
use App\Models\MatchModel;
use App\Models\Squad;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ScoreBoard extends Component
{
    public ScoreboardForm $form;
    public $match;
    public $scorecards = [];
    public $battingStats = [];
    public $availableTabs = [];
    public $defaultTab;
    public $team1;
    public $team2;

    public $headToHeadMatches;
    public $headToHeadSummary;

    public function mount($matchId, $team1, $team2, $tab = null)
    {
        // $this->match = MatchModel::with([
        //     'tournament:id,name_en',
        //     'team1:id,name_en,slug,name_bn,photo',
        //     'team2:id,name_en,slug,name_bn,photo',
        //     'team1.media',
        //     'team2.media',
        //     'battings.batter:id,first_name_en,first_name_bn,slug,photo',
        //     'battings.fielder:id,first_name_en,first_name_bn',
        //     'battings.bowler:id,first_name_en,first_name_bn',
        //     'bowlings.bowler:id,first_name_en,first_name_bn,slug,photo',
        //     'fallWickets.batter:id,first_name_en,first_name_bn,slug',
        //     'extras',
        //     'squads.players:id,first_name_en,first_name_bn,slug,photo,playing_role',
        //     'squads.players.battingStats',
        //     'squads.players.bowlingStats',
        //     'commentary',
        // ])
        //     ->where(function ($q) use ($team1, $team2) {
        //         $q->whereHas('team1', fn($t1) => $t1->where('slug', $team1))
        //             ->whereHas('team2', fn($t2) => $t2->where('slug', $team2));
        //     })
        //     ->orWhere(function ($q) use ($team1, $team2) {
        //         $q->whereHas('team1', fn($t1) => $t1->where('slug', $team2))
        //             ->whereHas('team2', fn($t2) => $t2->where('slug', $team1));
        //     })
        //     ->firstOrFail();


        $teamSlugs = [$team1, $team2];

        $this->match = MatchModel::with([
            'tournament:id,name_en',
            'team1:id,name_en,slug,name_bn,photo',
            'team2:id,name_en,slug,name_bn,photo',
            'team1.media',
            'team2.media',
            'battings.batter:id,first_name_en,first_name_bn,slug,photo',
            'battings.fielder:id,first_name_en,first_name_bn',
            'battings.bowler:id,first_name_en,first_name_bn',
            'bowlings.bowler:id,first_name_en,first_name_bn,slug,photo',
            'fallWickets.batter:id,first_name_en,first_name_bn,slug',
            'extras',
            'squads.players:id,first_name_en,first_name_bn,slug,photo,playing_role',
            'squads.players.battingStats',
            'squads.players.bowlingStats',
            'commentary',
        ])
            ->where('id', $matchId)
            ->where(function ($q) use ($teamSlugs) {
                $q->whereHas('team1', fn($q) => $q->whereIn('slug', $teamSlugs))
                    ->whereHas('team2', fn($q) => $q->whereIn('slug', $teamSlugs));
            })
            ->firstOrFail();



        $this->team1 = $this->match->team1?->name_en;
        $this->team2 = $this->match->team2?->name_en;

        $this->scorecards = collect([
            $this->prepareTeamScorecard($this->match->team1, $this->match->team2, $this->match->team1_score),
            $this->prepareTeamScorecard($this->match->team2, $this->match->team1, $this->match->team2_score),
        ]);

        // Sort squads so that team1 is always first (left side)
        $this->match->setRelation(
            'squads',
            $this->match->squads->sortByDesc(fn($squad) => $squad->team_id == $this->match->team1->id)
        );

        foreach ($this->match->squads as $squad) {
            foreach ($squad->players as $player) {
                // Ensure battingStats and bowlingStats are loaded
                $player->loadMissing(['battingStats', 'bowlingStats']);

                // Always calculate batting stats (even if no batting entries)
                $player->summaryBattingStats = $this->calculatePlayerBattingStats($player);

                // Calculate bowling stats (can keep condition if you want)
                if ($player->bowlingStats->isNotEmpty()) {
                    $player->summaryBowlingStats = $this->calculatePlayerBowlingStats($player);
                } else {
                    $player->summaryBowlingStats = [[
                        'matches'  => 0,
                        'overs'    => 0,
                        'runs'     => 0,
                        'wickets'  => 0,
                        'economy'  => 0,
                    ]];
                }
            }
        }


        // Determine which tabs have data
        $this->availableTabs = [];

        // Summary first — so it will be selected if available
        if ($this->match->team1_score || $this->match->team2_score) {
            $this->availableTabs[] = 'summary';
        }

        // Then scorecard
        if ($this->match->battings->isNotEmpty() || $this->match->bowlings->isNotEmpty()) {
            $this->availableTabs[] = 'scorecard';
        }

        // Squad
        if ($this->match->squads->isNotEmpty()) {
            $this->availableTabs[] = 'squad';
        }

        // Match info
        if ($this->match->venue || $this->match->date) {
            $this->availableTabs[] = 'matchinfo';
        }

        // Commentary
        if ($this->match->commentary->isNotEmpty()) {
            $this->availableTabs[] = 'overs';
        }


        // Fetch head-to-head matches
        $this->headToHeadMatches = MatchModel::query()
            ->where(function ($q) {
                $q->where('team1_id', $this->match->team1_id)
                    ->where('team2_id', $this->match->team2_id);
            })
            ->orWhere(function ($q) {
                $q->where('team1_id', $this->match->team2_id)
                    ->where('team2_id', $this->match->team1_id);
            })
            ->where('id', '!=', $this->match->id)
            ->with(['team1.media', 'team2.media', 'battings.player', 'bowlings.player'])
            ->latest()
            ->take(20)
            ->get()
            ->map(function ($match) {
                $match->date = $match->date ? Carbon::parse($match->date) : null;
                return $match;
            });

        // --- Totals ---
        $totalMatches = max($this->headToHeadMatches->count(), 1);
        $noResult  = $this->headToHeadMatches->whereNull('won')->count();
        $totalResultMatches = max($totalMatches - $noResult, 1);
        $team1Wins = $this->headToHeadMatches->where('won', $this->match->team1_id)->count();
        $team2Wins = $this->headToHeadMatches->where('won', $this->match->team2_id)->count();

        // --- Scores ---
        $team1Runs = $this->headToHeadMatches->pluck('team1_score')
            ->filter()
            ->map(fn($s) => (int) str()->before($s, '-'));
        $team2Runs = $this->headToHeadMatches->pluck('team2_score')
            ->filter()
            ->map(fn($s) => (int) str()->before($s, '-'));

        $team1High = $team1Runs->max() ?? 0;
        $team1Low  = $team1Runs->min() ?? 0;
        $team2High = $team2Runs->max() ?? 0;
        $team2Low  = $team2Runs->min() ?? 0;

        // --- Player stats aggregation ---
        $team1Batting = collect();
        $team2Batting = collect();
        $team1Bowling = collect();
        $team2Bowling = collect();

        foreach ($this->headToHeadMatches as $match) {
            foreach ($match->battings as $bat) {
                ($bat->team_id == $this->match->team1_id ? $team1Batting : $team2Batting)->push($bat);
            }
            foreach ($match->bowlings as $bowl) {
                ($bowl->team_id == $this->match->team1_id ? $team1Bowling : $team2Bowling)->push($bowl);
            }
        }

        // --- Top Players ---
        $topBatTeam1 = $team1Batting->groupBy('player_id')
            ->map(fn($g) => [
                'player' => $g->first()->player?->{'first_name_' . app()->getLocale()},
                'slug' => $g->first()->player?->slug,
                'runs' => $g->sum('runs'),
                'matches' => $g->count(),
            ])
            ->sortByDesc('runs')
            ->first();

        $topBatTeam2 = $team2Batting->groupBy('player_id')
            ->map(fn($g) => [
                'player' => $g->first()->player?->{'first_name_' . app()->getLocale()},
                'slug' => $g->first()->player?->slug,
                'runs' => $g->sum('runs'),
                'matches' => $g->count(),
            ])
            ->sortByDesc('runs')
            ->first();

        $topBowlTeam1 = $team1Bowling->groupBy('player_id')
            ->map(fn($g) => [
                'player' => $g->first()->player?->{'first_name_' . app()->getLocale()},
                'slug' => $g->first()->player?->slug,
                'wickets' => $g->sum('wickets'),
                'matches' => $g->count(),
            ])
            ->sortByDesc('wickets')
            ->first();

        $topBowlTeam2 = $team2Bowling->groupBy('player_id')
            ->map(fn($g) => [
                'player' => $g->first()->player?->{'first_name_' . app()->getLocale()},
                'slug' => $g->first()->player?->slug,
                'wickets' => $g->sum('wickets'),
                'matches' => $g->count(),
            ])
            ->sortByDesc('wickets')
            ->first();

        // --- Derived Calculations ---
        $team1WinPercent = round(($team1Wins / $totalResultMatches) * 100);
        $team2WinPercent = round(($team2Wins / $totalResultMatches) * 100);

        $this->headToHeadSummary = [
            'total_matches' => $totalMatches,
            'no_result' => $noResult,
            'team1' => [
                'name' => $this->match->team1->{'name_' . app()->getLocale()},
                'logo' => optional($this->match->team1->media)->path,
                'wins' => $team1Wins,
                'losses' => $team2Wins,
                'win_percent' => $team1WinPercent,
                'win_bar' => ($team1Wins / $totalResultMatches) * 100,
                'loss_bar' => ($team2Wins / $totalResultMatches) * 100,
                'high' => $team1High,
                'low' => $team1Low,
                'top_bat' => $topBatTeam1,
                'top_bowl' => $topBowlTeam1,
            ],
            'team2' => [
                'name' => $this->match->team2->{'name_' . app()->getLocale()},
                'logo' => optional($this->match->team2->media)->path,
                'wins' => $team2Wins,
                'losses' => $team1Wins,
                'win_percent' => $team2WinPercent,
                'win_bar' => ($team2Wins / $totalResultMatches) * 100,
                'loss_bar' => ($team1Wins / $totalResultMatches) * 100,
                'high' => $team2High,
                'low' => $team2Low,
                'top_bat' => $topBatTeam2,
                'top_bowl' => $topBowlTeam2,
            ],
        ];


        if ($this->headToHeadMatches->isNotEmpty()) {
            $this->availableTabs[] = 'headtohead';
            $this->headToHeadMatches = $this->headToHeadMatches; // store for tab view
        }

        // Use URL tab if valid; otherwise use first available
        if ($tab && in_array($tab, $this->availableTabs)) {
            $this->defaultTab = $tab;
        } else {
            $this->defaultTab = $this->availableTabs[0] ?? null;
        }


        // // Use URL tab if valid; otherwise use first available
        // if ($tab && in_array($tab, $this->availableTabs)) {
        //     $this->defaultTab = $tab;
        // } else {
        //     $this->defaultTab = $this->availableTabs[0] ?? null;
        // }
    }

    protected function prepareTeamScorecard($battingTeam, $bowlingTeam, $teamScore)
    {
        $batting = $this->match->battings->where('team_id', $battingTeam->id);
        $bowling = $this->match->bowlings->where('team_id', $bowlingTeam->id);
        $fallWickets = $this->match->fallWickets->where('team_id', $battingTeam->id);
        $teamExtras = $this->match->extras->where('team_id', $bowlingTeam->id);

        $totalExtras = $teamExtras->sum('byes')
            + $teamExtras->sum('leg_byes')
            + $teamExtras->sum('wides')
            + $teamExtras->sum('no_balls');

        $teamScore = $batting->sum('runs') + $totalExtras;
        // Did not bat players
        // $battedPlayerIds = $batting->pluck('player_id')->unique();
        // $didNotBat = $battingTeam->players->whereNotIn('id', $battedPlayerIds);
        // Players who batted
        $battedPlayerIds = $batting->pluck('player_id')->unique();

        // Get players from the squad of this match for this team
        $squad = $this->match->squads->firstWhere('team_id', $battingTeam->id);

        // If squad exists, use its players collection
        $squadPlayers = $squad ? $squad->players : collect();


        // Did not bat players = players in the squad who did not bat
        $didNotBat = $squadPlayers->whereNotIn('id', $battedPlayerIds);

        return [
            'team'       => $battingTeam,
            'batting'    => $batting,
            'bowling'    => $bowling,
            'fallWickets' => $fallWickets,
            'extras'     => $teamExtras,
            'totalExtras' => $totalExtras,
            'didNotBat'  => $didNotBat,
            'score'      => $teamScore,
        ];
    }


    protected function calculatePlayerBattingStats($player)
    {
        $stats = $player->battingStats;

        /**
         * Count matches from squad participation using DB query
         * (This works even if player_squad is just a pivot table.)
         */
        $matchesPlayed = DB::table('player_squad')
            ->join('squads', 'player_squad.squad_id', '=', 'squads.id')
            ->where('player_squad.player_id', $player->id)
            ->distinct('squads.match_id')
            ->count('squads.match_id');

        // Batting innings only where the player actually batted
        $battingInnings = $stats->filter(fn($s) => $s->balls > 0 || $s->runs > 0)->count();
        // $notOuts = $stats->where('dismissal', 'not out')->count();
        // $outs = $battingInnings - $notOuts;

        $runs = $stats->sum('runs');
        $balls = $stats->sum('balls');
        $fours = $stats->sum('fours');
        $sixes = $stats->sum('sixes');

        $average = $battingInnings > 0 ? round($runs / $battingInnings, 2) : $runs;
        $strikeRate = $balls > 0 ? round(($runs / $balls) * 100, 2) : 0;

        return [[
            'matches'  => $matchesPlayed,
            'innings'  => $battingInnings,
            // 'not_outs' => $notOuts,
            'runs'     => $runs,
            'avg'      => $average,
            'hs'       => $stats->max('runs'),
            'sr'       => $strikeRate,
            'fifties'  => $stats->whereBetween('runs', [50, 99])->count(),
            'hundreds' => $stats->where('runs', '>=', 100)->count(),
            'fours'    => $fours,
            'sixes'    => $sixes,
        ]];
    }

    private function calculatePlayerBowlingStats($player)
    {
        $stats = $player->bowlingStats;

        if ($stats->isEmpty()) {
            return [[
                'matches'  => 0,
                'overs'    => 0,
                'runs'     => 0,
                'wickets'  => 0,
                'economy'  => 0,
            ]];
        }

        $matches = $stats->pluck('match_id')->unique()->count();
        $overs   = $stats->sum('overs');
        $runs    = $stats->sum('runs');
        $wickets = $stats->sum('wickets');
        $economy = $overs > 0 ? round($runs / $overs, 2) : 0;

        return [[
            'matches'  => $matches,
            'overs'    => $overs,
            'runs'     => $runs,
            'wickets'  => $wickets,
            'economy'  => $economy,
        ]];
    }

    public function render()
    {
        return view('livewire.frontend.score-board.score-board')->extends('livewire.frontend.layouts.app');
    }
}
