<?php

namespace App\Livewire\Backend\Scoreboard;

use App\Models\Team;
use Livewire\Component;
use App\Models\MatchModel;
use Livewire\Attributes\Title;
use App\Livewire\Forms\ScoreboardForm;

class MatchResult extends Component
{
    #[Title('Match Result')]

    public ScoreboardForm $form;

    public function mount($matchId)
    {
        $this->form->matchId = $matchId;
        $match = MatchModel::findOrFail($this->form->matchId);
        $this->form->fill([
            'toss' => $match->toss,
            'player_of_match' => $match->player_of_match,
            'match_result' => $match->match_result,
            'type' => $match->type,
            'won' => $match->won,
            'team1_score' => $match->team1_score,
            'team1_played_over' => $match->team1_played_over,
            'team2_score' => $match->team2_score,
            'team2_played_over' => $match->team2_played_over,
        ]);

        // Set players
        // $this->form->players = optional($match->team1)->players
        //     ->merge(optional($match->team2)->players)
        //     ->unique('id')
        //     ->values();
        $this->form->players = $match->squads
            ->pluck('players')    // get all players collections from both squads
            ->flatten()           // merge them into a single collection
            ->unique('id')        // ensure no duplicates
            ->values();           // reset indexes


        // Set teams
        $this->form->teams = Team::select('id', 'name_en')
            ->whereIn('id', [$match->team1_id, $match->team2_id])
            ->get();
    }

    public function matchResult()
    {
        // Match Table
        MatchModel::updateOrCreate(
            [
                'id' => $this->form->matchId,
            ],
            [
                'toss'      => $this->form->toss,
                'player_of_match'  => $this->form->player_of_match,
                'match_result'     => $this->form->match_result,
                'type' => $this->form->type,
                'won'  => $this->form->won,
                'team1_score'  => $this->form->team1_score,
                'team1_played_over'  => $this->form->team1_played_over,
                'team2_score'  => $this->form->team2_score,
                'team2_played_over'  => $this->form->team2_played_over,
            ]
        );

        session()->flash('success', 'Match result saved successfully!');
        return redirect()->route('score');
    }

    public function render()
    {
        return view('livewire.backend.score-board.match-result')->extends('livewire.backend.layouts.app');
    }
}
