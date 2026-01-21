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

class EditSquad extends Component
{
    public SquadForm $form;

    #[Title('Edit Squad')]

    public $initialPlayers, $initialSelectedPlayerIds;

    public function mount($squadId)
    {
        $this->form->squadId = $squadId;
        $squad = Squad::with([
            'tournament:id,name_en',
            'match:id,name,team1_id,team2_id',
            'team:id,name_en',
            'players:id,first_name_en,last_name_en',
        ])->findOrFail($this->form->squadId);

        $this->form->tournamentId = $squad->tournament_id;
        $this->form->matchId      = $squad->match_id;
        $this->form->teamId       = $squad->team_id;
        $this->form->status       = $squad->status;

        $this->form->tournaments = Tournament::select('id', 'name_en')->where('status', 1)->get();
        $this->form->matches = MatchModel::select('id', 'name')->where('tournament_id', $this->form->tournamentId)->where('status', 1)->get();
        if ($squad->match) {
            $this->form->teams = Team::select('id', 'name_en')
                ->whereIn('id', [$squad->match->team1_id, $squad->match->team2_id])
                ->get();
        } else {
            $this->form->teams = collect();
        }

        $this->form->playerId  = $squad->players->pluck('id')->map(fn($id) => (string)$id)->toArray();

        // These are the only players you send initially
        $this->initialPlayers = $squad->team?->players->map(fn($p) => [
            'id'            => (string) $p->id,
            'first_name_en' => $p->first_name_en,
        ])->values()->all() ?? [];

        // These are the preselected players for the squad
        $this->initialSelectedPlayerIds = $this->form->playerId;
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

        // Dispatch to update Match dropdown
        $this->dispatch('match-updated', ['matches' => $this->form->matches]);
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

    public function update()
    {
        $this->validate();

        $squad = Squad::findOrFail($this->form->squadId);

        // Update squad main fields
        $squad->update([
            'tournament_id' => $this->form->tournamentId,
            'match_id'      => $this->form->matchId,
            'team_id'       => $this->form->teamId,
            'status'        => $this->form->status,
        ]);

        // Sync players on pivot table
        $squad->players()->sync($this->form->playerId);

        session()->flash('success', 'Squad updated successfully!');
        return redirect()->route('squad');
    }

    public function render()
    {
        return view('livewire.backend.squad.edit-squad', [
            'initialPlayers' => $this->initialPlayers,
            'initialSelectedPlayerIds' => $this->initialSelectedPlayerIds,
        ])->extends('livewire.backend.layouts.app');
    }
}
