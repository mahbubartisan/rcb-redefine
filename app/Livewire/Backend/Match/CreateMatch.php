<?php

namespace App\Livewire\Backend\Match;

use App\Livewire\Forms\MatchForm;
use App\Models\MatchModel;
use App\Models\Team;
use App\Models\Tournament;
use Livewire\Component;
use Livewire\Attributes\Title;

class CreateMatch extends Component
{
    #[Title('Create Match')]

    public MatchForm $form;

    public function mount()
    {
        $this->form->tournaments = Tournament::select('id', 'name_en')->where('status', 1)->get();
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

    public function store()
    {
        $this->validate();

        // Create match
        MatchModel::create([
            'tournament_id' => $this->form->tournamentId,
            'team1_id' => $this->form->team1Id,
            'team2_id' => $this->form->team2Id,
            'name' => $this->form->name,
            'venue' => $this->form->venue,
            'date_time' => $this->form->date_time,
            'match_info' => $this->form->match_info,
            'status' => $this->form->status,
        ]);

        // Success
        session()->flash('success', 'Match created successfully.');
        return redirect()->route('match');
    }

    public function render()
    {
        return view('livewire.backend.match.create-match')->extends('livewire.backend.layouts.app');
    }
}
