<?php

namespace App\Livewire\Backend\Match;

use App\Models\Team;
use Livewire\Component;
use App\Models\MatchModel;
use App\Models\Tournament;
use Livewire\Attributes\Title;
use App\Livewire\Forms\MatchForm;

class EditMatch extends Component
{
    #[Title('Edit Match')]

    public MatchForm $form;

    public function mount($matchId)
    {
        $this->form->matchId = $matchId;

        $match = MatchModel::findOrFail($this->form->matchId);
        $this->form->fill([
            'tournamentId'     => $match->tournament_id,
            'team1Id'     => $match->team1_id,
            'team2Id'     => $match->team2_id,
            'name'     => $match->name,
            'venue' => $match->venue,
            'date_time' => $match->date_time,
            'match_info' => $match->match_info,
            'status'   => $match->status,
        ]);

        // Load tournaments list for dropdown
        $this->form->tournaments = Tournament::select('id', 'name_en')
            ->where('status', 1)
            ->get();

        // Load tournament’s teams (for pre-filling team dropdown)
        $this->form->teams = collect();
        if ($match->tournament_id) {
            $tournament = Tournament::with('teams:id,name_en')
                ->find($match->tournament_id);

            $this->form->teams = $tournament?->teams ?? collect();
        }
    }

    public function updatedFormTournamentId($tournamentId)
    {
        $this->form->team1Id = '';
        $this->form->team2Id = '';

        if ($tournamentId) {
            $tournament = Tournament::with('teams:id,name_en')
                ->find($tournamentId);

            $this->form->teams = $tournament?->teams ?? collect();
        } else {
            $this->form->teams = collect();
        }
    }

    public function update()
    {
        $this->validate();

        $match = MatchModel::findOrFail($this->form->matchId);

        // Update match
        $match->update([
            'tournament_id' => $this->form->tournamentId,
            'team1_id' => $this->form->team1Id,
            'team2_id' => $this->form->team2Id,
            'name' => $this->form->name,
            'venue' => $this->form->venue,
            'date_time' => $this->form->date_time,
            'match_info' => $this->form->match_info,
            'status' => $this->form->status,
        ]);

        session()->flash('success', 'Match updated successfully.');
        return redirect()->route('match');
    }

    public function render()
    {
        return view('livewire.backend.match.edit-match')->extends('livewire.backend.layouts.app');
    }
}
