<?php

namespace App\Livewire\Backend\Tournament;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\TournamentForm;
use App\Models\Team;
use App\Models\Tournament;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;

class EditTournament extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Edit Tournament')]

    public TournamentForm $form;

    public function mount($tournamentId)
    {
        $this->form->tournamentId = $tournamentId;

        $this->form->tournament = Tournament::with('media')->findOrFail($this->form->tournamentId);
        $this->form->fill([
            'name_en'     => $this->form->tournament->name_en,
            'name_bn' => $this->form->tournament->name_bn,
            'date' => $this->form->tournament->date,
            'status'   => $this->form->tournament->status,
            'teamId' => $this->form->tournament->teams?->pluck('id')->toArray(),
        ]);

        $this->form->teams = Team::select('id', 'name_en')->where('status', 1)->get();
    }

    public function update()
    {
        $this->validate();

        $tournament = Tournament::findOrFail($this->form->tournamentId);

        // Handle new image upload
        if ($this->form->photo && !is_int($this->form->photo)) {
            // Delete the old media if it exists
            if ($tournament->photo) {
                $this->deleteMedia($tournament->photo);
            }

            // Upload the new image
            $newPhoto = $this->uploadMedia($this->form->photo, 'images/tournament', 80);

            $newPhotoId = $newPhoto->id;
        } else {
            $newPhotoId = $tournament->photo; // keep the existing image
        }

        $tournament->update([
            'photo' => $newPhotoId,
            'name_en' => $this->form->name_en,
            'name_bn' => $this->form->name_bn,
            'date' => $this->form->date,
            'status' => $this->form->status,
        ]);

        // Sync the updated team IDs
        $tournament->teams()->sync($this->form->teamId);

        session()->flash('success', 'Tournament updated successfully.');
        return redirect()->route('tournament');
    }
    
    public function render()
    {
        return view('livewire.backend.tournament.edit-tournament')->extends('livewire.backend.layouts.app');
    }
}
