<?php

namespace App\Livewire\Backend\Match;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Livewire\Forms\MatchForm;
use App\Models\MatchModel;

class MatchList extends Component
{
    use WithPagination;

    #[Title('Match')]

    public MatchForm $form;

    public function delete($id)
    {
        $match = MatchModel::findOrFail($id);
        $match->delete();
        $this->dispatch('toastr:success', 'Match deleted successfully.');
    }

    public function render()
    {
        $matches = MatchModel::with(['team1', 'team2'])
            ->where(function ($query) {
                $search = $this->form->search;

                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('venue', 'like', "%{$search}%")
                    ->orWhereHas('team1', function ($q) use ($search) {
                        $q->where('name_en', 'like', "%{$search}%");
                    })
                    ->orWhereHas('team2', function ($q) use ($search) {
                        $q->where('name_en', 'like', "%{$search}%");
                    });
            })
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.match.match-list', [
            'matches' => $matches
        ])->extends('livewire.backend.layouts.app');
    }
}
