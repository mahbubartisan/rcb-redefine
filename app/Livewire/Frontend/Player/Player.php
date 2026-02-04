<?php

namespace App\Livewire\Frontend\Player;

use App\Models\Player as ModelPlayer;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Player extends Component
{
    use WithPagination;

    #[Title('RCB - Players')]

    public $filter = null;
    public $paginate = 12;

    public function setFilter($role)
    {
        $this->filter = $role;
    }

    public function render()
    {
        $players = ModelPlayer::query()
            ->select([
                'players.id',
                'players.first_name_en',
                'players.first_name_bn',
                'players.slug',
                'players.photo',
                'players.role_icon',
                'players.player_tag',
                'players.playing_role',
                'players.status',
            ])
            ->join('team_player', 'team_player.player_id', '=', 'players.id')
            ->where('team_player.team_id', 1)
            ->where('players.status', 1)
            ->when(
                $this->filter,
                fn($q) =>
                $q->where('players.playing_role', $this->filter)
            )
            ->with(['media', 'icon.media'])

            // Matches
            ->withCount('squads as matches')

            // Runs + Average
            ->addSelect([
                'runs' => DB::table('battings')
                    ->selectRaw('COALESCE(SUM(runs), 0)')
                    ->whereColumn('battings.player_id', 'players.id'),
                'average' => DB::table('battings')
                    ->selectRaw('ROUND(COALESCE(SUM(runs),0) / NULLIF(COUNT(dismissal),0), 1)')
                    ->whereColumn('battings.player_id', 'players.id'),
                'wickets' => DB::table('bowlings')
                    ->selectRaw('COALESCE(SUM(wickets), 0)')
                    ->whereColumn('bowlings.player_id', 'players.id'),
            ])

            ->paginate($this->paginate);

        return view('livewire.frontend.player.player', [
            'players' => $players,
        ])->extends('livewire.frontend.layouts.app');
    }
}
