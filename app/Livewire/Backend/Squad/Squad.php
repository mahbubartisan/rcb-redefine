<?php

namespace App\Livewire\Backend\Squad;

use App\Livewire\Forms\SquadForm;
use App\Models\Squad as ModelsSquad;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

class Squad extends Component
{
    use WithPagination;

    public SquadForm $form;

    #[Title('Squad')]

    public function delete($id)
    {
        $squad = Squad::findOrFail($id);

        // Detach related players from pivot table
        $squad->players()->detach();

        // Delete the squad
        $squad->delete();

        $this->dispatch('toastr:success', 'Squad deleted successfully!');
    }


    public function render()
    {
        $squads = ModelsSquad::with([
            'tournament:id,name_en',
            'match:id,name',
            'team:id,name_en',
            'players:id,first_name_en,last_name_en'
        ])
            ->where(function ($query) {
                $search = $this->form->search;

                $query->where('status', 'like', "%{$search}%")
                    ->orWhereHas('tournament', function ($q) use ($search) {
                        $q->where('name_en', 'like', "%{$search}%");
                    })
                    ->orWhereHas('match', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('team', function ($q) use ($search) {
                        $q->where('name_en', 'like', "%{$search}%");
                    })
                    ->orWhereHas('players', function ($q) use ($search) {
                        $q->where('first_name_en', 'like', "%{$search}%")
                            ->orWhere('last_name_en', 'like', "%{$search}%");
                    });
            })
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.squad.squad', [
            'squads' => $squads
        ])->extends('livewire.backend.layouts.app');
    }
}
