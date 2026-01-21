<?php

namespace App\Livewire\Backend\Scoreboard;

use Livewire\Component;
use App\Models\MatchModel;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Livewire\Forms\ScoreboardForm;

class Scoreboard extends Component
{
    use WithPagination;

    #[Title('Scoreboard')]

    public ScoreboardForm $form;

    public function render()
    {
        $scores = MatchModel::with(['team1', 'team2'])
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

        return view('livewire.backend.score-board.score-board', [
            'scores' => $scores
        ])->extends('livewire.backend.layouts.app');
    }
}
