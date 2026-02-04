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

    // public function render()
    // {
    //     $allMatches = MatchModel::with(['team1', 'team2'])
    //         ->where(function ($query) {
    //             $query->where('team1_id', $this->team->id)
    //                 ->orWhere('team2_id', $this->team->id);
    //         })
    //         ->orderByDesc('date_time')
    //         ->paginate(10);

    //     // Paginate players with stats
    //     $players = $this->team->players()
    //         ->with(['battingStats', 'bowlingStats'])
    //         ->paginate(12); // Add pagination here

    //     // Add totals for each player (still works)
    //     $players->getCollection()->transform(function ($player) {
    //         $player->total_runs = $player->battingStats->sum('runs');
    //         $player->total_wickets = $player->bowlingStats->sum('wickets');
    //         return $player;
    //     });

    //     // Find top performers
    //     $topScorer = $players->sortByDesc('total_runs')->first();
    //     $topWicketTaker = $players->sortByDesc('total_wickets')->first();

    //     return view('livewire.frontend.team.team-profile', [
    //         'team' => $this->team,
    //         'allMatches' => $allMatches,
    //         'players' => $players,
    //         'top_scorer' => app()->getLocale() === 'bn'
    //             ? ($topScorer?->first_name_bn ?? 'N/A')
    //             : ($topScorer?->first_name_en ?? 'N/A'),

    //         "top_scorer_slug"     => $topScorer?->slug,
    //         'top_scorer_runs' => $topScorer?->total_runs ?? 0,
    //         'top_wicket_taker' =>  app()->getLocale() === 'bn'
    //             ? ($topWicketTaker?->first_name_bn ?? 'N/A')
    //             : ($topWicketTaker?->first_name_en ?? 'N/A'),
    //         "top_wicket_taker_slug"     => $topWicketTaker?->slug,
    //         'top_wicket_taker_wickets' => $topWicketTaker?->total_wickets ?? 0,
    //     ])->extends('livewire.frontend.layouts.app');
    // }

    public function render()
    {
        // =======================
        // Matches (paginated)
        // =======================
        $allMatches = MatchModel::with(['team1', 'team2'])
            ->where(function ($query) {
                $query->where('team1_id', $this->team->id)
                    ->orWhere('team2_id', $this->team->id);
            })
            ->orderByDesc('date_time')
            ->paginate(10);

        // =======================
        // Players (paginated for UI)
        // =======================
        $players = $this->team->players()
            ->with(['battingStats', 'bowlingStats'])
            ->paginate(12);

        // Add totals (ONLY for displayed players)
        $players->getCollection()->transform(function ($player) {
            $player->total_runs = $player->battingStats->sum('runs');
            $player->total_wickets = $player->bowlingStats->sum('wickets');
            return $player;
        });

        // =======================
        // Players (FULL – for stats only)
        // =======================
        $allPlayers = $this->team->players()
            ->with(['battingStats', 'bowlingStats'])
            ->get();

        // Compute totals for all players
        $allPlayers->transform(function ($player) {
            $player->total_runs = $player->battingStats->sum('runs');
            $player->total_wickets = $player->bowlingStats->sum('wickets');
            return $player;
        });

        $getName = fn($player) =>
        app()->getLocale() === 'bn'
            ? ($player?->first_name_bn ?? 'N/A')
            : ($player?->first_name_en ?? 'N/A');


        $teamStats = [

            // 1️⃣ Most Runs
            // 'most_runs' => tap(
            //     $allPlayers->sortByDesc(fn($p) => $p->battingStats->sum('runs'))->first(),
            //     function ($p) use ($getName) {
            //         if ($p) {
            //             $p->player_name = $getName($p);
            //         }
            //     }
            // ),
            'most_runs' => tap(
                $allPlayers
                    ->sortByDesc(fn($p) => $p->battingStats->sum('runs'))
                    ->first(),
                function ($p) use ($getName) {
                    if ($p) {
                        $p->player_name = $getName($p);
                        $p->player_slug = $p->slug; // ✅ clean & fast
                    }
                }
            ),


            // 2️⃣ Highest Individual Score (number only)
            'highest_score' => $allPlayers
                ->flatMap->battingStats
                ->max('runs') ?? 0,

            // 2️⃣ Player with Highest Score
            'highest_score_player' => tap(
                $allPlayers->sortByDesc(
                    fn($p) => $p->battingStats->max('runs')
                )->first(),
                function ($p) use ($getName) {
                    if ($p) {
                        $p->player_name = $getName($p);
                        $p->player_slug = $p->slug; // ✅ clean & fast
                    }
                }
            ),

            // 3️⃣ Best Batting Average
            'best_average' => tap(
                $allPlayers
                    ->filter(fn($p) => $p->battingStats->where('dismissal', true)->count() > 0)
                    ->sortByDesc(function ($p) {
                        $runs = $p->battingStats->sum('runs');
                        $outs = $p->battingStats->where('dismissal', true)->count();

                        return $outs > 0 ? ($runs / $outs) : 0;
                    })
                    ->first(),
                function ($p) use ($getName) {
                    if ($p) {
                        $runs = $p->battingStats->sum('runs');
                        $outs = $p->battingStats->where('dismissal', true)->count();

                        $p->batting_average = $outs > 0
                            ? round($runs / $outs, 2)
                            : 0;

                        $p->player_name = $getName($p);
                        $p->player_slug = $p->slug; // ✅ clean & fast
                    }
                }
            ),


            // 4️⃣ Best Strike Rate
            'best_strike_rate' => tap(
                $allPlayers
                    ->filter(fn($p) => $p->battingStats->sum('balls') > 0)
                    ->sortByDesc(
                        fn($p) => ($p->battingStats->sum('runs') / $p->battingStats->sum('balls')) * 100
                    )
                    ->first(),
                function ($p) use ($getName) {
                    if ($p) {
                        $runs  = $p->battingStats->sum('runs');
                        $balls = $p->battingStats->sum('balls');

                        $p->strike_rate = $balls > 0
                            ? round(($runs / $balls) * 100, 2)
                            : 0;

                        $p->player_name = $getName($p);
                        $p->player_slug = $p->slug; // ✅ clean & fast
                    }
                }
            ),


            // 5️⃣ Most Hundreds
            'most_hundreds' => tap(
                $allPlayers
                    ->filter(
                        fn($p) =>
                        $p->battingStats->where('runs', '>=', 100)->count() > 0
                    )
                    ->sortByDesc(
                        fn($p) =>
                        $p->battingStats->where('runs', '>=', 100)->count()
                    )
                    ->first(),
                function ($p) use ($getName) {
                    if ($p) {
                        $p->player_name = $getName($p);
                        $p->player_slug = $p->slug; // ✅ clean & fast
                    }
                }
            ),

            // 6️⃣ Most Fifties
            'most_fifties' => tap(
                $allPlayers
                    ->sortByDesc(
                        fn($p) =>
                        $p->battingStats->whereBetween('runs', [50, 99])->count()
                    )
                    ->first(),
                function ($p) use ($getName) {
                    if ($p) {
                        $p->player_name = $getName($p);
                        $p->player_slug = $p->slug; // ✅ clean & fast
                    }
                }
            ),

            // 7️⃣ Most Fours
            'most_fours' => tap(
                $allPlayers
                    ->sortByDesc(fn($p) => $p->battingStats->sum('fours'))
                    ->first(),
                function ($p) use ($getName) {
                    if ($p) {
                        $p->player_name = $getName($p);
                        $p->player_slug = $p->slug; // ✅ clean & fast
                    }
                }
            ),

            // 8️⃣ Most Sixes
            'most_sixes' => tap(
                $allPlayers
                    ->sortByDesc(fn($p) => $p->battingStats->sum('sixes'))
                    ->first(),
                function ($p) use ($getName) {
                    if ($p) {
                        $p->player_name = $getName($p);
                        $p->player_slug = $p->slug; // ✅ clean & fast
                    }
                }
            ),

        ];




        // =======================
        // Global Team Stats
        // =======================
        $topScorer = $allPlayers->sortByDesc('total_runs')->first();
        $topWicketTaker = $allPlayers->sortByDesc('total_wickets')->first();

        return view('livewire.frontend.team.team-profile', [
            'team' => $this->team,
            'allMatches' => $allMatches,
            'players' => $players,
            'teamStats' => $teamStats,

            // Stats
            'top_scorer' => app()->getLocale() === 'bn'
                ? ($topScorer?->first_name_bn ?? 'N/A')
                : ($topScorer?->first_name_en ?? 'N/A'),

            'top_scorer_slug' => $topScorer?->slug,
            'top_scorer_runs' => $topScorer?->total_runs ?? 0,

            'top_wicket_taker' => app()->getLocale() === 'bn'
                ? ($topWicketTaker?->first_name_bn ?? 'N/A')
                : ($topWicketTaker?->first_name_en ?? 'N/A'),

            'top_wicket_taker_slug' => $topWicketTaker?->slug,
            'top_wicket_taker_wickets' => $topWicketTaker?->total_wickets ?? 0,
        ])->extends('livewire.frontend.layouts.app');
    }
}
