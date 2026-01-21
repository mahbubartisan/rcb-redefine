<?php

namespace App\Livewire\Backend\Register;

use App\Livewire\Forms\PlayerRegistrationForm;
use App\Models\RegisterPlayer;
use App\Traits\MediaTrait;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

class RegisterPlayerList extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Register Player List')]

    public PlayerRegistrationForm $form;

    public function delete($id)
    {
        $player = RegisterPlayer::findOrFail($id);

        if ($player->photo) {
            $this->deleteMedia($player->photo);
        }

        $player->delete();

        $this->dispatch('toastr:success', 'Player deleted successfully!');
    }

    public function render()
    {
        $players = RegisterPlayer::with('media')
            ->where('full_name', 'like', '%' . $this->form->search . '%')
            ->orWhere('email', 'like', '%' . $this->form->search . '%')
            ->orWhere('phone', 'like', '%' . $this->form->search . '%')
            ->orWhere('dob', 'like', '%' . $this->form->search . '%')
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.register.register-player-list', [
            'players' => $players
        ])->extends('livewire.backend.layouts.app');
    }
}
