<?php

namespace App\Livewire\Frontend\Team;

use App\Models\MatchModel;
use App\Models\Team as ModelTeam;
use Livewire\Component;
use Livewire\WithPagination;

class Team extends Component
{
    use WithPagination;
    
    public function render()
    {
        // Paginated teams
        $teams = ModelTeam::with('media')
            ->select('id', 'name_en', 'slug', 'photo')
            ->paginate(9); // change per page if needed

        // Get team IDs from current page ONLY
        $teamIds = $teams->pluck('id');

        // Load matches only for visible teams
        $matches = MatchModel::whereIn('team1_id', $teamIds)
            ->orWhereIn('team2_id', $teamIds)
            ->get();

        $teamStats = [];

        foreach ($teams as $team) {

            $teamMatches = $matches->filter(function ($match) use ($team) {
                return $match->team1_id === $team->id || $match->team2_id === $team->id;
            });

            $totalMatches = $teamMatches->count();
            $totalResultMatches = $teamMatches->whereNotNull('won')->count();
            $noResult = $teamMatches->whereNull('won')->count();

            $wins = $teamMatches->where('won', $team->id)->count();
            $losses = $totalResultMatches - $wins;

            $teamStats[$team->id] = [
                'matches' => $totalMatches,
                'wins' => $wins,
                'losses' => $losses,
                'noResult' => $noResult,
            ];
        }

        return view('livewire.frontend.team.team', [
            'teams' => $teams,
            'teamStats' => $teamStats,
        ])->extends('livewire.frontend.layouts.app');
    }
}
