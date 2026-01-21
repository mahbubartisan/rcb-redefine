<?php

namespace App\Livewire\Backend\Tournament;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\TournamentForm;
use App\Models\Tournament as ModelsTournament;

class Tournament extends Component
{
    #[Title('Tournament')]

    public TournamentForm $form;

    public function delete($id)
    {
        $tournament = ModelsTournament::findOrFail($id);

        // Delete team image from media
        if ($tournament->photo) {
            $this->deleteMedia($tournament->photo);
        }

        // Detach all related teams from pivot table
        $tournament->teams()->detach();

        // Delete team
        $tournament->delete();

        session()->flash('success', 'Tournament deleted successfully!');
        return redirect()->back();
    }

    public function render()
    {
        $tournaments = ModelsTournament::with('media')
            ->where('name_en', 'like', '%' . $this->form->search . '%')
            ->orWhere('status', 'like', '%' . $this->form->search . '%')
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.tournament.tournament', [
            'tournaments' => $tournaments
        ])->extends('livewire.backend.layouts.app');
    }
}
