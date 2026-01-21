<?php

namespace App\Livewire\Frontend\Fixture;

use Livewire\Component;
use App\Models\MatchModel;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

class Fixture extends Component
{
    use WithPagination;

    #[Title('Fixtures')]

    public $filter = null;
    public $paginate = 12;

    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage();
    }

    public function render()
    {
        // $fixtures = MatchModel::with(['team1:id,name_en,slug,name_bn,photo', 'team2:id,name_en,slug,name_bn,photo'])
        //     ->whereIn('type', [0, 1, 2])
        //     ->where('status', 1)
        //     ->select('id', 'team1_id', 'team2_id', 'match_result', 'venue', 'type', 'date_time', 'team1_score', 'team1_played_over', 'team2_score', 'team2_played_over')
        //     ->latest()
        //     ->paginate($this->paginate);

        $query = MatchModel::with(['team1:id,name_en,slug,name_bn,photo', 'team2:id,name_en,slug,name_bn,photo'])
            ->where('status', 1)
            ->select('id', 'team1_id', 'team2_id', 'match_result', 'venue', 'type', 'date_time', 'team1_score', 'team1_played_over', 'team2_score', 'team2_played_over');

        // Apply filter if set
        if (!is_null($this->filter)) {
            $query->where('type', $this->filter);
        } else {
            $query->whereIn('type', [0, 1, 2]);
        }

        $fixtures = $query->latest()->paginate($this->paginate);

        return view('livewire.frontend.fixture.fixture', [
            'fixtures' => $fixtures
        ])->extends('livewire.frontend.layouts.app');
    }
}
