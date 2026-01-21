<?php

namespace App\Livewire\Backend\Team;

use App\Models\Team;
use App\Models\Player;
use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Livewire\Forms\TeamForm;

class EditTeam extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Edit Team')]

    public TeamForm $form;

    public function mount($teamId)
    {
        $this->form->teamId = $teamId;

        $this->form->team = Team::with('media')->findOrFail($this->form->teamId);
        $this->form->fill([
            'name_en'     => $this->form->team->name_en,
            'name_bn' => $this->form->team->name_bn,
            'status'   => $this->form->team->status,
            'playerId' => $this->form->team->players?->pluck('id')->toArray(),
        ]);

        $this->form->players = Player::select('id', 'first_name_en')->where('status', 1)->get();
    }

    public function update()
    {
        $this->validate();

        $team = Team::findOrFail($this->form->teamId);

        // Handle new image upload
        if ($this->form->photo && !is_int($this->form->photo)) {
            // Delete the old media if it exists
            if ($team->photo) {
                $this->deleteMedia($team->photo);
            }

            // Upload the new image
            $newPhoto = $this->uploadMedia($this->form->photo, 'images/team', 80);

            $newPhotoId = $newPhoto->id;
        } else {
            $newPhotoId = $team->photo; // keep the existing image
        }

        $team->update([
            'photo' => $newPhotoId,
            'name_en' => $this->form->name_en,
            'slug'   => str()->slug($this->form->name_en),
            'name_bn' => $this->form->name_bn,
            'status' => $this->form->status,
        ]);

        // Sync the updated class IDs
        $team->players()->sync($this->form->playerId);

        session()->flash('success', 'Team updated successfully.');
        return redirect()->route('team');
    }

    public function render()
    {
        return view('livewire.backend.team.edit-team')->extends('livewire.backend.layouts.app');
    }
}
