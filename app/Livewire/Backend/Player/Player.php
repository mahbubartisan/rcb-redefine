<?php

namespace App\Livewire\Backend\Player;


use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Livewire\Forms\PlayerForm;
use App\Models\Player as ModelsPlayer;
use App\Traits\MediaTrait;

// class Player extends Component
// {
//     use WithPagination;

//     #[Title('Player')]

//      public PlayerForm $form;

//     public function delete($id)
//     {
//         $player = ModelsPlayer::findOrFail($id);

//         // Delete profile photo if exists
//         if ($player->photo) {
//             $this->deleteMedia($player->photo);
//         }

//         // Delete role icon if exists
//         if ($player->role_icon) {
//             $this->deleteMedia($player->role_icon);
//         }

//         // Finally delete the player record
//         $player->delete();

//         $this->dispatch('toastr:success', 'Player deleted successfully!');
//     }

//     public function updatingFormSearch()
//     {
//         $this->resetPage();
//     }

//     public function render()
//     {
//         $players = ModelsPlayer::with('media')
//             ->where(function ($q) {
//                 $q->where('first_name_en', 'like', '%' . $this->form->search . '%')
//                     ->orWhere('last_name_en', 'like', '%' . $this->form->search . '%')
//                     ->orWhere('dob', 'like', '%' . $this->form->search . '%');
//             })
//             ->latest()
//             ->paginate($this->form->rowsPerPage);

//         return view('livewire.backend.player.player', [
//             'players' => $players,
//         ])->extends('livewire.backend.layouts.app');
//     }
// }
class Player extends Component
{
    use WithPagination, MediaTrait;

    #[Title('Player')]

    public PlayerForm $form;

    public function delete($id)
    {
        $player = ModelsPlayer::findOrFail($id);

        if ($player->photo) {
            $this->deleteMedia($player->photo);
        }

        if ($player->role_icon) {
            $this->deleteMedia($player->role_icon);
        }

        $player->delete();

        $this->dispatch('toastr:success', 'Player deleted successfully!');
    }

    public function updatingFormSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $players = ModelsPlayer::with('media')
            ->when($this->form->search, function ($q) {
                $q->where(function ($query) {
                    $query->where('first_name_en', 'like', '%' . $this->form->search . '%')
                        ->orWhere('last_name_en', 'like', '%' . $this->form->search . '%')
                        ->orWhere('first_name_bn', 'like', '%' . $this->form->search . '%')
                        ->orWhere('last_name_bn', 'like', '%' . $this->form->search . '%')
                        ->orWhere('dob', 'like', '%' . $this->form->search . '%');
                });
            })
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.player.player', [
            'players' => $players,
        ])->extends('livewire.backend.layouts.app');
    }
}