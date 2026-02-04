<?php

namespace App\Livewire\Frontend\Home;

use App\Models\MatchModel;
use App\Models\News;
use App\Models\Player;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;


class HomePage extends Component
{
    #[Title('RCB - Homepage')]

    public function render()
    {
        // $sliders = Slider::with('media')->select('id', 'title', 'image')->where('status', 1)
        //     ->latest()
        //     ->take(5)
        //     ->get();
        $sliders = Slider::with('media')
            ->where('status', 1)
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($slider) {
                return [
                    'id' => $slider->id,
                    'title' => $slider->title,
                    'image' => optional($slider->media)->path,
                ];
            });

        $latestResults = MatchModel::with(['team1:id,name_en,slug,name_bn,photo', 'team2:id,name_en,slug,name_bn,photo'])
            ->whereIn('type', [1, 2])
            ->where('status', 1)
            ->latest()
            ->get(['id', 'team1_id', 'team2_id', 'match_result', 'type', 'date_time', 'team1_score', 'team1_played_over', 'team2_score', 'team2_played_over']);

        $upcomingMatches = MatchModel::with(['team1:id,name_en,slug,name_bn,photo', 'team2:id,name_en,slug,name_bn,photo'])
            ->where('type', 0)
            ->where('status', 1)
            ->latest()
            ->get(['id', 'team1_id', 'team2_id', 'match_result', 'venue', 'type', 'date_time', 'team1_score', 'team1_played_over', 'team2_score', 'team2_played_over']);

        $news = News::with('media')->select('id', 'title_en', 'title_bn', 'slug', 'image', 'date', 'desc_bn', 'desc_en')
            ->where('status', 1)
            ->latest()
            ->take(3)
            ->get();

        $players = Player::query()
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
            ->with(['media', 'icon.media'])

            // Matches (still separate since it comes from squads)
            ->withCount('squads as matches')

            // Combined stats: runs, average
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

            ->get();

        // dd($players);

        return view('livewire.frontend.home.home-page', [
            'latestResults' => $latestResults,
            'upcomingMatches' => $upcomingMatches,
            'news' => $news,
            'sliders' => $sliders,
            'players' => $players,
        ])->extends('livewire.frontend.layouts.app');
    }
}
