<?php

namespace App\Livewire\Frontend\Navbar;

use App\Models\Player;
use App\Models\Team;
use Livewire\Component;

class Navbar extends Component
{
    public $query = '';
    public $players = [];
    public $teams = [];

    // public function updatedQuery()
    // {
    //     $this->players = Player::with('media')
    //         ->select('id', 'first_name_en', 'first_name_bn', 'last_name_en', 'last_name_bn', 'slug', 'photo', 'playing_role')
    //         ->where(function ($q) {
    //             $q->where('first_name_en', 'like', '%' . $this->query . '%')
    //                 ->orWhere('last_name_en', 'like', '%' . $this->query . '%');
    //         })
    //         ->take(10)
    //         ->get()
    //         ->unique('id')
    //         ->values();
    // }

    public function updatedQuery()
    {
        if (strlen($this->query) < 2) {
            $this->players = [];
            $this->teams = [];
            return;
        }

        // Players
        $this->players = Player::with('media')
            ->select(
                'id',
                'first_name_en',
                'first_name_bn',
                'last_name_en',
                'last_name_bn',
                'slug',
                'photo',
                'playing_role'
            )
            ->where(function ($q) {
                $q->where('first_name_en', 'like', "%{$this->query}%")
                    ->orWhere('last_name_en', 'like', "%{$this->query}%")
                    ->orWhere('first_name_bn', 'like', "%{$this->query}%")
                    ->orWhere('last_name_bn', 'like', "%{$this->query}%");
            })
            ->take(5)
            ->get();

        // Teams
        $this->teams = Team::select(
            'id',
            'name_en',
            'name_bn',
            'slug',
            'photo'
        )
            ->where(function ($q) {
                $q->where('name_en', 'like', "%{$this->query}%")
                    ->orWhere('name_bn', 'like', "%{$this->query}%");
            })
            ->take(5)
            ->get();
    }


    public function render()
    {
        return view('livewire.frontend.layouts.navbar');
    }
}
