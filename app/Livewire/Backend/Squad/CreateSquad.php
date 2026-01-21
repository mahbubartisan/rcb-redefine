<?php

namespace App\Livewire\Backend\Squad;

use App\Models\Team;
use App\Models\Squad;
use App\Models\Player;
use Livewire\Component;
use App\Models\MatchModel;
use App\Models\Tournament;
use Livewire\Attributes\Title;
use App\Livewire\Forms\SquadForm;

class CreateSquad extends Component
{
    public SquadForm $form;

    #[Title('Create Squad')]

    public function mount()
    {
        $this->form->tournaments = Tournament::select('id', 'name_en')
            ->where('status', 1)
            ->get();

        $this->form->teams = [];
        $this->form->players = [];
    }

    public function refreshTournaments()
    {
        $this->form->tournaments = Tournament::select('id', 'name_en')
            ->where('status', 1)
            ->get();

        $this->dispatch('tournament-updated', ['tournaments' => $this->form->tournaments]);
    }

    public function updatedFormTournamentId($tournamentId)
    {
        $this->form->matches = MatchModel::select('id', 'name')
            ->where('tournament_id', $tournamentId)
            ->where('status', 1)
            ->get();

        // $this->form->matchId = null;
        $this->form->teams = [];
        $this->form->players = [];
        $this->form->teamId = null;

        // Dispatch to update Match dropdown
        $this->dispatch('match-updated', matches: $this->form->matches);

        // $this->dispatch('match-updated', ['matches' => $this->form->matches]);
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
            $this->form->players = [];
        }
    }

    // When team is selected
    public function updatedFormTeamId($teamId)
    {
        if (!$teamId) {
            $this->form->players = [];
            $this->form->playerId = null;
            $this->dispatch('players-updated', players: []);
            return;
        }

        $team = Team::with(['players' => fn($q) => $q->select('players.id', 'players.first_name_en')])
            ->find($teamId);

        $this->form->players = $team ? $team->players : collect();
        $this->form->playerId = null;

        // send players to frontend
        $this->dispatch('players-updated', players: $this->form->players);
    }

    public function store()
    {
        $this->validate();

        $squad = Squad::create([
            'tournament_id' => $this->form->tournamentId,
            'match_id'      => $this->form->matchId,
            'team_id'       => $this->form->teamId,
            'status'        => $this->form->status,
        ]);

        // Attach players (pivot table: squad_player)
        $squad->players()->sync($this->form->playerId);

        session()->flash('success', 'Squad saved successfully!');
        return redirect()->route('squad');
    }
    
    public function render()
    {
        return view('livewire.backend.squad.create-squad')->extends('livewire.backend.layouts.app');
    }
}
