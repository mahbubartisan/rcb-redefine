<?php

namespace App\Livewire\Backend\Scoreboard;

use App\Models\Team;
use App\Models\Extra;
use App\Models\Player;
use App\Models\Batting;
use App\Models\Bowling;
use Livewire\Component;
use App\Models\Commentary;
use App\Models\FallWicket;
use App\Models\MatchModel;
use App\Models\Tournament;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use App\Livewire\Forms\ScoreboardForm;

class EditScoreboard extends Component
{
    #[Title('Edit Scoreboard')]

    public ScoreboardForm $form;

    public function mount($scoreId, $teamId)
    {
        $this->form->matchId = $scoreId;

        $match = MatchModel::findOrFail($this->form->matchId);

        $this->form->tournamentId = $match->tournament_id;

        // Set tournaments
        $this->form->tournaments = Tournament::select('id', 'name_en')
            ->where('status', 1)
            ->get();

        // Set matches
        $this->form->matches = MatchModel::select('id', 'name')
            ->where('tournament_id', $this->form->tournamentId)
            ->where('status', 1)
            ->get();

        // Set teams
        $this->form->teams = Team::select('id', 'name_en')
            ->whereIn('id', [$match->team1_id, $match->team2_id])
            ->get();

        // Select the team based on route param
        // $this->form->teamId = $teamId;

        // if ($this->form->teamId == $match->team1_id) {
        //     $this->form->batters = optional(
        //         $match->squads->firstWhere('team_id', $match->team1_id)
        //     )?->players ?? collect();

        //     $this->form->opponentPlayers = optional(
        //         $match->squads->firstWhere('team_id', $match->team2_id)
        //     )?->players ?? collect();
        // } else {
        //     $this->form->batters = optional(
        //         $match->squads->firstWhere('team_id', $match->team2_id)
        //     )?->players ?? collect();

        //     $this->form->opponentPlayers = optional(
        //         $match->squads->firstWhere('team_id', $match->team1_id)
        //     )?->players ?? collect();
        // }

        // Fetch squad players for this match
        $this->form->teamId = $teamId;

        // Batters = players from the selected team
        $this->form->batters = optional(
            $match->squads->firstWhere('team_id', $teamId)
        )?->players ?? collect();

        // Opponent players = players from the other team
        $opponentTeamId = ($teamId == $match->team1_id)
            ? $match->team2_id
            : $match->team1_id;

        $this->form->opponentPlayers = optional(
            $match->squads->firstWhere('team_id', $opponentTeamId)
        )?->players ?? collect();


        // Pre-fill batting (only for this team)
        $battingRecords = $match->battings->where('team_id', $this->form->teamId);

        if ($battingRecords->isNotEmpty()) {
            foreach ($battingRecords as $bat) {
                $this->form->batting[] = [
                    'batterId'  => (string) $bat->player_id,
                    'runs'      => $bat->runs,
                    'balls'     => $bat->balls,
                    'fours'     => $bat->fours,
                    'sixes'     => $bat->sixes,
                    'dismissal' => $bat->dismissal,
                    'fielderId' => $bat->fielder_id ? (string) $bat->fielder_id : '',
                    'bowlerId'  => $bat->bowler_id ? (string) $bat->bowler_id : '',
                ];
            }
        } else {
            $this->form->batting[] = [
                'batterId'  => '',
                'runs'      => 0,
                'balls'     => 0,
                'fours'     => 0,
                'sixes'     => 0,
                'dismissal' => '',
                'fielderId' => null,
                'bowlerId'  => null,
            ];
        }

        // Pre-fill bowling (only opponent’s bowlers)
        $opponentTeamId = $this->form->teamId == $match->team1_id
            ? $match->team2_id
            : $match->team1_id;

        $bowlingRecords = $match->bowlings->where('team_id', $opponentTeamId);

        if ($bowlingRecords->isNotEmpty()) {
            foreach ($bowlingRecords as $bowl) {
                $this->form->bowling[] = [
                    'bowlerId' => (string) $bowl->player_id,
                    'overs'    => $bowl->overs,
                    'maiden'   => $bowl->maiden,
                    'runs'     => $bowl->runs,
                    'wickets'  => $bowl->wickets,
                    'no_balls'  => $bowl->no_balls,
                    'wides'  => $bowl->wides,
                ];
            }
        } else {
            $this->form->bowling[] = [
                'bowlerId' => '',
                'overs'    => 0,
                'maiden'   => 0,
                'runs'     => 0,
                'wickets'  => 0,
                'no_balls'  => 0,
                'wides'  => 0,
            ];
        }

        // Pre-fill extras
        $extra = $match->extras()->where('team_id', $opponentTeamId)->first();

        if ($extra) {
            $this->form->fill([
                'byes' => $extra->byes,
                'leg_byes' => $extra->leg_byes,
                'wides' => $extra->wides,
                'no_balls' => $extra->no_balls,
            ]);
        }

        // Pre-fill fall of wickets (only for this team)
        if ($match && $match->exists) {
            // Edit mode — only wickets belonging to this team
            $this->form->wickets = $match->fallWickets()
                ->where('team_id', $teamId)
                ->get()
                ->map(function ($item, $index) {
                    return [
                        'score' => $item->score,
                        'wicket' => $index + 1,
                        'playerOut' => $item->player_id,
                        'over' => $item->over,
                    ];
                })
                ->toArray();
        }

        // If no wickets found (create mode or empty)
        if (empty($this->form->wickets)) {
            $this->form->wickets = [
                ['score' => 0, 'wicket' => 0, 'playerOut' => '', 'over' => 0],
            ];
        }

        // Pre-fill commentary (only for this team)
        $commentary = $match->commentary->where('team_id', $this->form->teamId);

        if ($commentary->isNotEmpty()) {
            foreach ($commentary as $c) {
                $this->form->commentary[] = [
                    'over_number'   => $c->over_number,
                    'score_at'      => $c->score_at,
                    'ball_number'   => $c->ball_number,
                    'ball_per_run'  => $c->ball_per_run,
                    'description'   => $c->description,
                ];
            }
        } else {
            $this->form->commentary[] = [
                'over_number' => 0,
                'score_at'    => 0,
                'ball_number' => 0,
                'ball_per_run' => 0,
                'description' => '',
            ];
        }
    }

    // public function addWicketRow()
    // {
    //     $this->form->wickets[] = ['score' => 0, 'wicket' => 0, 'playerOut' => '', 'over' => 0];
    // }

    // public function removeWicketRow($index)
    // {
    //     unset($this->form->wickets[$index]);
    //     $this->form->wickets = array_values($this->form->wickets);
    // }

    // ✅ Add new row
    public function addWicketRow()
    {
        // Convert any '0' wicket to '1' (first real wicket)
        if (count($this->form->wickets) === 1 && $this->form->wickets[0]['wicket'] == 0) {
            $this->form->wickets[0]['wicket'] = 1;
        }

        // Add new wicket row
        $this->form->wickets[] = [
            'score' => 0,
            'wicket' => count($this->form->wickets) + 1, // sequentially increasing
            'playerOut' => '',
            'over' => 0,
        ];
    }


    // ✅ Remove row and resequence
    public function removeWicketRow($index)
    {
        unset($this->form->wickets[$index]);
        $this->form->wickets = array_values($this->form->wickets); // reindex numerically

        // Re-sequence wicket numbers
        foreach ($this->form->wickets as $i => &$wicket) {
            $wicket['wicket'] = $i + 1;
        }
    }

    // Add new rows
    // public function addBatterRow()
    // {
    //     $this->form->batting[] = ['batterId' => '', 'runs' => 0, 'balls' => 0, 'fours' => 0, 'sixes' => 0, 'dismissal' => '', 'fielderId' => '', 'bowlerId' => ''];
    // }

    public function addBatterRow()
    {
        $this->form->batting[] = [
            'batterId'  => '',
            'runs'      => 0,
            'balls'     => 0,
            'fours'     => 0,
            'sixes'     => 0,
            'dismissal' => '',
            'fielderId' => null,
            'bowlerId'  => null,
        ];
    }

    // public function removeBatterRow($index)
    // {
    //     unset($this->form->batting[$index]);
    //     $this->form->batting = array_values($this->form->batting); // reindex
    // }
    public function removeBatterRow($key)
    {
        unset($this->form->batting[$key]);
    }

    public function addBowlerRow()
    {
        $this->form->bowling[] = ['bowlerId' => '', 'overs' => 0, 'maiden' => 0, 'runs' => 0, 'wickets' => 0, 'no_balls' => 0, 'wides' => 0];
    }

    public function removeBowlerRow($index)
    {
        unset($this->form->bowling[$index]);
        $this->form->bowling = array_values($this->form->bowling);
    }

    // public function removeWicketRow($index)
    // {
    //     unset($this->form->wickets[$index]);
    //     $this->form->wickets = array_values($this->form->wickets); // reindex numerically

    //     // Re-sequence wicket numbers
    //     foreach ($this->form->wickets as $i => &$wicket) {
    //         $wicket['wicket'] = $i + 1;
    //     }
    // }


    public function addCommentaryRow()
    {
        $this->form->commentary[] = ['over_number' => 0, 'score_at' => 0, 'ball_number' => 0, 'ball_per_run' => 0, 'description' => ''];
    }

    public function removeCommentaryRow($index)
    {
        unset($this->form->commentary[$index]);
        $this->form->commentary = array_values($this->form->commentary);
    }

    public function update()
    {
        $matchId      = $this->form->matchId;
        $tournamentId = $this->form->tournamentId;
        $teamId       = $this->form->teamId;

        $match = MatchModel::findOrFail($matchId);
        $opponentTeamId = $teamId == $match->team1_id ? $match->team2_id : $match->team1_id;

        // Batting
        $battingIds = [];
        foreach ($this->form->batting as $row) {
            if (!empty($row['batterId'])) {
                $bat = Batting::updateOrCreate(
                    [
                        'match_id'  => $matchId,
                        'player_id' => $row['batterId'],
                    ],
                    [
                        'tournament_id' => $tournamentId,
                        'team_id'    => $teamId,
                        'runs'       => $row['runs'] ?? 0,
                        'balls'      => $row['balls'] ?? 0,
                        'fours'      => $row['fours'] ?? 0,
                        'sixes'      => $row['sixes'] ?? 0,
                        'dismissal'  => $row['dismissal'],
                        'fielder_id' => $row['fielderId'] ?: null,
                        'bowler_id'  => $row['bowlerId'] ?: null,
                    ]
                );
                $battingIds[] = $bat->id;
            }
        }
        // Delete removed batting rows
        Batting::where('match_id', $matchId)
            ->where('team_id', $teamId)
            ->whereNotIn('id', $battingIds)
            ->delete();

        // Bowling
        $bowlingIds = [];
        foreach ($this->form->bowling as $row) {
            if (!empty($row['bowlerId'])) {
                $bowl = Bowling::updateOrCreate(
                    [
                        'match_id'  => $matchId,
                        'player_id' => $row['bowlerId'],
                    ],
                    [
                        'tournament_id' => $tournamentId,
                        'team_id'    => $opponentTeamId,
                        'overs'    => $row['overs'] ?? 0,
                        'maiden'   => $row['maiden'] ?? 0,
                        'runs'     => $row['runs'] ?? 0,
                        'wickets'  => $row['wickets'] ?? 0,
                        'no_balls'  => $row['no_balls'] ?? 0,
                        'wides'  => $row['wides'] ?? 0,
                        'economy'  => ($row['overs'] > 0) ? round($row['runs'] / $row['overs'], 2) : 0,
                    ]
                );
                $bowlingIds[] = $bowl->id;
            }
        }
        // Delete removed bowling rows
        Bowling::where('match_id', $matchId)
            ->where('team_id', $opponentTeamId)
            ->whereNotIn('id', $bowlingIds)
            ->delete();

        // Extras (one row only → update or create)
        Extra::updateOrCreate(
            [
                'match_id' => $matchId,
                'team_id'  => $opponentTeamId,
            ],
            [
                'tournament_id' => $tournamentId,
                'byes'      => $this->form->byes ?? 0,
                'leg_byes'  => $this->form->leg_byes ?? 0,
                'wides'     => $this->form->wides ?? 0,
                'no_balls'  => $this->form->no_balls ?? 0,
            ]
        );

        // Fall of Wickets
        $wicketIds = [];
        foreach ($this->form->wickets as $row) {
            if (!empty($row['playerOut'])) {
                $wicket = FallWicket::updateOrCreate(
                    [
                        'match_id'  => $matchId,
                        'player_id' => $row['playerOut'],
                    ],
                    [
                        'tournament_id' => $tournamentId,
                        'team_id'    => $teamId,
                        'score'     => $row['score'] ?? 0,
                        'wicket'    => $row['wicket'] ?? 0,
                        'over'      => $row['over'] ?? 0,
                    ]
                );
                $wicketIds[] = $wicket->id;
            }
        }
        // Delete removed wickets
        FallWicket::where('match_id', $matchId)
            ->where('team_id', $teamId)
            ->whereNotIn('id', $wicketIds)
            ->delete();


        // 🗣️ Ball-by-Ball Commentaries
        $commentaryIds = [];

        foreach ($this->form->commentary as $row) {
            // Skip empty rows
            if (
                empty($row['over_number']) &&
                empty($row['score_at']) &&
                empty($row['description'])
            ) {
                continue;
            }

            // If the row already has an ID, update it
            if (!empty($row['id'])) {
                $commentary = Commentary::find($row['id']);
                if ($commentary) {
                    $commentary->update([
                        'tournament_id' => $tournamentId,
                        'score_at'      => $row['score_at'] ?? 0,
                        'ball_per_run'  => $row['ball_per_run'] ?? 0,
                        'description'   => $row['description'] ?? '',
                        'over_number'   => $row['over_number'] ?? 0,
                        'ball_number'   => $row['ball_number'] ?? 0,
                    ]);
                }
            } else {
                // Otherwise, create a brand-new record
                $commentary = Commentary::create([
                    'tournament_id' => $tournamentId,
                    'match_id'      => $matchId,
                    'team_id'       => $teamId,
                    'over_number'   => $row['over_number'] ?? 0,
                    'score_at'      => $row['score_at'] ?? 0,
                    'ball_number'   => $row['ball_number'] ?? 0,
                    'ball_per_run'  => $row['ball_per_run'] ?? 0,
                    'description'   => $row['description'] ?? '',
                ]);
            }

            $commentaryIds[] = $commentary->id;
        }

        // Delete commentary not in current form
        Commentary::where('match_id', $matchId)
            ->where('team_id', $teamId)
            ->whereNotIn('id', $commentaryIds)
            ->delete();

        session()->flash('success', 'Scoreboard updated successfully!');
        return redirect()->route('score');
    }

    public function render()
    {
        return view('livewire.backend.score-board.edit-score-board')->extends('livewire.backend.layouts.app');
    }
}
