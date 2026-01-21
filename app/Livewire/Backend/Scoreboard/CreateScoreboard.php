<?php

namespace App\Livewire\Backend\Scoreboard;

use App\Models\Team;
use App\Models\Batting;
use App\Models\Bowling;
use Livewire\Component;
use App\Models\MatchModel;
use App\Models\Tournament;
use Livewire\Attributes\Title;
use App\Livewire\Forms\ScoreboardForm;
use App\Models\Extra;
use App\Models\FallWicket;

class CreateScoreboard extends Component
{
    #[Title('Create Scoreboard')]

    public ScoreboardForm $form;

    public function mount()
    {
        $this->form->tournaments = Tournament::select('id', 'name_en')->where('status', 1)->get();

        // initialize with one empty row
        $this->form->batting = [
            ['batterId' => '', 'runs' => 0, 'balls' => 0, 'fours' => 0, 'sixes' => 0, 'dismissal' => '', 'fielderId' => '', 'bowlerId' => '']
        ];

        $this->form->bowling = [
            ['bowlerId' => '', 'overs' => 0, 'maiden' => 0, 'runs' => 0, 'wickets' => 0]
        ];

        $this->form->wickets = [
            ['score' => 0, 'wicket' => 0,  'playerOut' => '', 'over' => 0]
        ];
    }

    // When tournament is selected
    public function updatedFormTournamentId($tournamentId)
    {
        $this->form->matches = MatchModel::select('id', 'name')->where('tournament_id', $tournamentId)->where('status', 1)->get();
        $this->form->matchId = null;
        $this->form->teams = [];
        $this->form->teamId = null;
    }

    // When match is selected

    public function updatedFormMatchId($matchId)
    {
        $match = MatchModel::find($matchId);

        if ($match) {
            $this->form->teams = Team::select('id', 'name_en')
                ->whereIn('id', [$match->team1_id, $match->team2_id])
                ->get();
        } else {
            $this->form->teams = [];
        }

        $this->reset(['form.teamId', 'form.batters', 'form.opponentPlayers']);
    }

    // Batting team selected
    public function updatedFormTeamId($teamId)
    {
        $match = MatchModel::with(['team1.players', 'team2.players'])->find($this->form->matchId);

        if (!$match) {
            $this->form->batters = [];
            $this->form->opponentPlayers = [];
            return;
        }

        if ($teamId == $match->team1_id) {
            $this->form->batters = $match->team1?->players ?? [];
            $this->form->opponentPlayers = $match->team2?->players ?? [];
        } elseif ($teamId == $match->team2_id) {
            $this->form->batters = $match->team2?->players ?? [];
            $this->form->opponentPlayers = $match->team1?->players ?? [];
        } else {
            $this->form->batters = [];
            $this->form->opponentPlayers = [];
        }

        $this->reset(['form.batterId', 'form.fielderId', 'form.bowlerId']);
    }

    // Add new rows
    public function addBatterRow()
    {
        $this->form->batting[] = ['batterId' => '', 'runs' => 0, 'balls' => 0, 'fours' => 0, 'sixes' => 0, 'dismissal' => '', 'fielderId' => '', 'bowlerId' => ''];
    }

    public function removeBatterRow($index)
    {
        unset($this->form->batting[$index]);
        $this->form->batting = array_values($this->form->batting); // reindex
    }

    public function addBowlerRow()
    {
        $this->form->bowling[] = ['bowlerId' => '', 'overs' => 0, 'maiden' => 0, 'runs' => 0, 'wickets' => 0];
    }

    public function removeBowlerRow($index)
    {
        unset($this->form->bowling[$index]);
        $this->form->bowling = array_values($this->form->bowling);
    }

    public function addWicketRow()
    {
        $this->form->wickets[] = ['score' => 0, 'wicket' => 0, 'playerOut' => '', 'over' => 0];
    }

    public function removeWicketRow($index)
    {
        unset($this->form->wickets[$index]);
        $this->form->wickets = array_values($this->form->wickets);
    }

    public function store()
    {
        $matchId      = $this->form->matchId;
        $tournamentId = $this->form->tournamentId;
        $teamId       = $this->form->teamId;

        // Find opponent team
        $match = MatchModel::findOrFail($matchId);
        $opponentTeamId = $teamId == $match->team1_id ? $match->team2_id : $match->team1_id;

        // Batting
        foreach ($this->form->batting as $row) {
            if (!empty($row['batterId'])) {
                Batting::create([
                    'tournament_id' => $tournamentId,
                    'match_id'   => $matchId,
                    'team_id'    => $teamId,
                    'player_id'  => $row['batterId'],
                    'runs'       => $row['runs'] ?? 0,
                    'balls'      => $row['balls'] ?? 0,
                    'fours'      => $row['fours'] ?? 0,
                    'sixes'      => $row['sixes'] ?? 0,
                    'dismissal'  => $row['dismissal'],
                    'fielder_id' => $row['fielderId'] ?: null,
                    'bowler_id'  => $row['bowlerId'] ?: null,
                ]);
            }
        }

        // Bowling
        foreach ($this->form->bowling as $row) {
            if (!empty($row['bowlerId'])) {
                Bowling::create([
                    'tournament_id' => $tournamentId,
                    'match_id' => $matchId,
                    'team_id'   => $opponentTeamId,
                    'player_id'   => $row['bowlerId'],
                    'overs'    => $row['overs'] ?? 0,
                    'maiden'   => $row['maiden'] ?? 0,
                    'runs'     => $row['runs'] ?? 0,
                    'wickets'  => $row['wickets'] ?? 0,
                    'economy'  => ($row['overs'] > 0) ? round($row['runs'] / $row['overs'], 2) : 0,
                ]);
            }
        }

        // Extras
        Extra::create([
            'tournament_id' => $tournamentId,
            'match_id' => $matchId,
            'team_id'   => $opponentTeamId,
            'byes' => $this->form->byes ?? 0,
            'leg_byes' => $this->form->leg_byes ?? 0,
            'wides' => $this->form->wides ?? 0,
            'no_balls' => $this->form->no_balls ?? 0,
        ]);

        // Fall Of Wickets
        foreach ($this->form->wickets as $row) {
            if (!empty($row['wicket'])) {
                FallWicket::create([
                    'tournament_id' => $tournamentId,
                    'match_id'   => $matchId,
                    'team_id'   => $teamId,
                    'score'      => $row['score'] ?? 0,
                    'wicket'      => $row['wicket'] ?? 0,
                    'player_id' => $row['playerOut'],
                    'over'       => $row['over'] ?? 0,
                ]);
            }
        }

        session()->flash('success', 'Scoreboard saved successfully!');
        return redirect()->route('score');
    }

    // public function store()
    // {
    //     $matchId      = $this->form->matchId;
    //     $tournamentId = $this->form->tournamentId;
    //     $teamId       = $this->form->teamId;

    //     // Find opponent team
    //     $match = MatchModel::findOrFail($matchId);
    //     $opponentTeamId = $teamId == $match->team1_id ? $match->team2_id : $match->team1_id;

    //     // --- Helper for safe numeric values ---
    //     $num = fn($val) => is_numeric($val) ? $val : 0;

    //     // --- Batting ---
    //     foreach ($this->form->batting as $row) {
    //         if (!empty($row['batterId'])) {
    //             Batting::create([
    //                 'tournament_id' => $tournamentId,
    //                 'match_id'      => $matchId,
    //                 'team_id'       => $teamId,
    //                 'player_id'     => $row['batterId'],
    //                 'runs'          => $num($row['runs']),
    //                 'balls'         => $num($row['balls']),
    //                 'fours'         => $num($row['fours']),
    //                 'sixes'         => $num($row['sixes']),
    //                 'dismissal'     => $row['dismissal'] ?? null,
    //                 'fielder_id'    => $row['fielderId'] ?: null,
    //                 'bowler_id'     => $row['bowlerId'] ?: null,
    //             ]);
    //         }
    //     }

    //     // --- Bowling (opponent team) ---
    //     foreach ($this->form->bowling as $row) {
    //         if (!empty($row['bowlerId'])) {
    //             $overs = $num($row['overs']);
    //             $runs  = $num($row['runs']);

    //             Bowling::create([
    //                 'tournament_id' => $tournamentId,
    //                 'match_id'      => $matchId,
    //                 'team_id'       => $opponentTeamId,
    //                 'player_id'     => $row['bowlerId'],
    //                 'overs'         => $overs,
    //                 'maiden'        => $num($row['maiden']),
    //                 'runs'          => $runs,
    //                 'wickets'       => $num($row['wickets']),
    //                 'economy'       => $overs > 0 ? round($runs / $overs, 2) : 0,
    //             ]);
    //         }
    //     }

    //     // --- Fall of Wickets ---
    //     foreach ($this->form->wickets as $row) {
    //         if (!empty($row['wicket'])) {
    //             FallWicket::create([
    //                 'tournament_id' => $tournamentId,
    //                 'match_id'      => $matchId,
    //                 'team_id'       => $teamId,
    //                 'score'         => $num($row['score']),
    //                 'wicket'        => $num($row['wicket']),
    //                 'player_id'     => $row['playerOut'] ?: null,
    //                 'over'          => $num($row['over']),
    //             ]);
    //         }
    //     }

    //     session()->flash('success', 'Scorecard saved successfully!');
    //     return redirect()->route('score');
    // }

    public function render()
    {
        return view('livewire.backend.score-board.create-score-board')->extends('livewire.backend.layouts.app');
    }
}
