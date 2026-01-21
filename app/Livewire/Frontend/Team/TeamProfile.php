<?php

namespace App\Livewire\Frontend\Team;

use App\Models\MatchModel;
use App\Models\Player;
use App\Models\Team as ModelTeam;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class TeamProfile extends Component
{
    use WithPagination;

    // #[Title('Team')]

    // public function mount($slug)
    // {
    //     $this->team = ModelTeam::where('slug', $slug)
    //         ->with(['players', 'matches' => function ($q) {
    //             $q->latest()->get();
    //         }])
    //         ->firstOrFail();
    // }

    public $team;
    public $matches;
    // public $players;
    public $stats;

    // public function mount($slug)
    // {
    //     // ✅ Load team with players and their stats
    //     $this->team = ModelTeam::with([
    //         'players.battingStats',
    //         'players.bowlingStats',
    //         'matches'
    //     ])->where('slug', $slug)->firstOrFail();

    //     // ✅ Load last 10 matches (where this team participated)
    //     $this->matches = MatchModel::where('team1_id', $this->team->id)
    //         ->orWhere('team2_id', $this->team->id)
    //         ->latest()
    //         ->take(10)
    //         ->get();

    //     // ✅ Calculate match stats
    //     $totalMatches = $this->matches->count();
    //     $wins = $this->matches->where('won', $this->team->id)->count();
    //     $losses = $totalMatches - $wins;
    //     $winRatio = $totalMatches > 0 ? round(($wins / $totalMatches) * 100, 1) : 0;

    //     // ✅ Calculate player-level totals (runs & wickets)
    //     $this->players = $this->team->players->map(function ($player) {
    //         $player->total_runs = $player->battingStats->sum('runs');
    //         $player->total_wickets = $player->bowlingStats->sum('wickets');
    //         return $player;
    //     });

    //     // ✅ Find top performers
    //     $topScorer = $this->players->sortByDesc('total_runs')->first();
    //     $topWicketTaker = $this->players->sortByDesc('total_wickets')->first();

    //     // ✅ Calculate team-level aggregates
    //     $totalRuns = $this->players->sum('total_runs');
    //     $totalWickets = $this->players->sum('total_wickets');

    //     // ✅ Build final stats array
    //     $this->stats = [
    //         'matches' => $totalMatches,
    //         'wins' => $wins,
    //         'losses' => $losses,
    //         'win_ratio' => $winRatio,
    //         'highest_score' => $this->matches->max('team1_score'),
    //         'lowest_score' => $this->matches->min('team1_score'),
    //         'total_runs' => $totalRuns,
    //         'total_wickets' => $totalWickets,
    //         'top_scorer' => $topScorer?->first_name_en ?? 'N/A',
    //         'top_scorer_runs' => $topScorer?->total_runs ?? 0,
    //         'top_wicket_taker' => $topWicketTaker?->first_name_en ?? 'N/A',
    //         'top_wicket_taker_wickets' => $topWicketTaker?->total_wickets ?? 0,
    //     ];
    // }

    public function mount($slug)
    {
        // Load team with players and their stats
        $this->team = ModelTeam::with([
            'players.battingStats',
            'players.bowlingStats',
            'matches'
        ])->where('slug', $slug)->firstOrFail();

        // Load matches (where this team participated)
        $this->matches = MatchModel::where('team1_id', $this->team->id)
            ->orWhere('team2_id', $this->team->id)
            ->get();

        // Calculate match stats
        $totalMatches = $this->matches->count();
        $totalResultMatches = $this->matches->whereNotNull('won')->count();;
        $noResult = $this->matches->whereNull('won')->count();

        $wins = $this->matches->where('won', $this->team->id)->count();
        $losses = $totalResultMatches - $wins;
        $winRatio = $totalResultMatches > 0 ? round(($wins / $totalResultMatches) * 100, 1) : 0;

        // Get this team's score from each match
        $teamScores = $this->matches->map(function ($match) {
            if ($match->team1_id === $this->team->id) {
                return $match->team1_score;
            } elseif ($match->team2_id === $this->team->id) {
                return $match->team2_score;
            }
            return null;
        })->filter();

        $highestScore = optional(
            $teamScores
                ->filter()
                ->map(fn($s) => ['orig' => $s, 'runs' => (int) str()->before($s, '-')])
                ->sortByDesc('runs')
                ->first()
        )['orig'];

        $lowestScore = optional(
            $teamScores
                ->filter()
                ->map(fn($s) => ['orig' => $s, 'runs' => (int) str()->before($s, '-')])
                ->sortBy('runs')
                ->first()
        )['orig'];

        // Compute recent form (last 5 matches)
        $recentForm = $this->matches
            ->sortByDesc('date') // or 'id' if no date column
            ->take(5)
            ->map(function ($match) {
                if (is_null($match->won)) {
                    return 'N/A';
                }
                return $match->won === $this->team->id ? 'W' : 'L';
            })
            ->implode(' ');

        // Build final stats array
        $this->stats = [
            'matches' => $totalMatches,
            'wins' => $wins,
            'losses' => $losses,
            'noResult' => $noResult,
            'win_ratio' => $winRatio,
            'highest_score' => $highestScore,
            'lowest_score' => $lowestScore,
            'recent_form' => $recentForm,
        ];
    }

    public function render()
    {
        $allMatches = MatchModel::with(['team1', 'team2'])
            ->where(function ($query) {
                $query->where('team1_id', $this->team->id)
                    ->orWhere('team2_id', $this->team->id);
            })
            ->orderByDesc('date_time')
            ->paginate(10);

        // Paginate players with stats
        $players = $this->team->players()
            ->with(['battingStats', 'bowlingStats'])
            ->paginate(12); // Add pagination here

        // Add totals for each player (still works)
        $players->getCollection()->transform(function ($player) {
            $player->total_runs = $player->battingStats->sum('runs');
            $player->total_wickets = $player->bowlingStats->sum('wickets');
            return $player;
        });

        // Find top performers
        $topScorer = $players->sortByDesc('total_runs')->first();
        $topWicketTaker = $players->sortByDesc('total_wickets')->first();

        return view('livewire.frontend.team.team-profile', [
            'team' => $this->team,
            'allMatches' => $allMatches,
            'players' => $players,
            'top_scorer' => app()->getLocale() === 'bn'
                ? ($topScorer?->first_name_bn ?? 'N/A')
                : ($topScorer?->first_name_en ?? 'N/A'),

            "top_scorer_slug"     => $topScorer?->slug,
            'top_scorer_runs' => $topScorer?->total_runs ?? 0,
            'top_wicket_taker' =>  app()->getLocale() === 'bn'
                ? ($topWicketTaker?->first_name_bn ?? 'N/A')
                : ($topWicketTaker?->first_name_en ?? 'N/A'),
            "top_wicket_taker_slug"     => $topWicketTaker?->slug,
            'top_wicket_taker_wickets' => $topWicketTaker?->total_wickets ?? 0,
        ])->extends('livewire.frontend.layouts.app');
    }
}
