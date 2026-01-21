<?php

namespace App\Livewire\Frontend\Record;

use App\Models\MatchModel;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class Records extends Component
{
    use WithPagination;

    // public function render()
    // {
    //     $rcbId = 1; // Example RCB ID

    //     // Fetch matches with relationships
    //     $matches = MatchModel::with(['team1.media', 'team2.media', 'manOfTheMatch'])
    //         ->where(function ($q) use ($rcbId) {
    //             $q->where('team1_id', $rcbId)->orWhere('team2_id', $rcbId);
    //         })
    //         ->latest()
    //         ->paginate(2);

    //     // Group matches by opponent
    //     $grouped = $matches->groupBy(function ($match) use ($rcbId) {
    //         return $match->team1_id == $rcbId ? $match->team2_id : $match->team1_id;
    //     });

    //     $opponents = [];

    //     foreach ($grouped as $opponentId => $games) {
    //         $opponent = $games->first()->team1_id == $rcbId ? $games->first()->team2 : $games->first()->team1;

    //         $played = $games->count();
    //         $won    = $games->where('won', $rcbId)->count();
    //         $lost   = $games->whereNotNull('won')->where('won', '!=', $rcbId)->count();
    //         $draw   = $games->whereNull('match_result')->count();

    //         $opponents[] = [
    //             'id'       => $opponentId,
    //             'name_en'  => $opponent->name_en,
    //             'name_bn'  => $opponent->name_bn,
    //             'logo'     => $opponent->media?->path,
    //             'played'   => $played,
    //             'won'      => $won,
    //             'lost'     => $lost,
    //             'draw'     => $draw,
    //             'w_l'      => "{$won}:{$lost}",
    //             'w_percent' => $played ? round(($won / $played) * 100, 1) : 0,
    //             'l_percent' => $played ? round(($lost / $played) * 100, 1) : 0,
    //             'd_percent' => $played ? round(($draw / $played) * 100, 1) : 0,
    //             'matches'  => $games,
    //         ];

    //     }

    //     // dd($matches);
    //     return view('livewire.frontend.record.records', [
    //         'opponents' => $opponents,
    //         'rcbId' => $rcbId,
    //     ])->extends('livewire.frontend.layouts.app');
    // }

    public function render()
    {
        $rcbId = 1; // Example RCB ID

        $matches = MatchModel::with(['team1.media', 'team2.media', 'manOfTheMatch'])
            ->where(function ($q) use ($rcbId) {
                $q->where('team1_id', $rcbId)
                    ->orWhere('team2_id', $rcbId);
            })
            ->latest()
            ->get();

        // Group by opponent
        $grouped = $matches->groupBy(function ($match) use ($rcbId) {
            return $match->team1_id == $rcbId ? $match->team2_id : $match->team1_id;
        });

        $opponents = collect();

        // foreach ($grouped as $opponentId => $games) {
        //     $opponent = $games->first()->team1_id == $rcbId
        //         ? $games->first()->team2
        //         : $games->first()->team1;

        //     $played = $games->count();
        //     $won    = $games->where('won', $rcbId)->count();
        //     $lost   = $games->whereNotNull('won')->where('won', '!=', $rcbId)->count();
        //     $draw   = $games->whereNull('match_result')->count();

        //     $opponents->push([
        //         'id'        => $opponentId,
        //         'name_en'   => $opponent->name_en,
        //         'name_bn'   => $opponent->name_bn,
        //         'logo'      => $opponent->media?->path,
        //         'played'    => $played,
        //         'won'       => $won,
        //         'lost'      => $lost,
        //         'draw'      => $draw,
        //         'w_l'       => "{$won}:{$lost}",
        //         'w_percent' => $played ? round(($won / $played) * 100, 1) : 0,
        //         'l_percent' => $played ? round(($lost / $played) * 100, 1) : 0,
        //         'd_percent' => $played ? round(($draw / $played) * 100, 1) : 0,
        //         'matches'   => $games,
        //     ]);
        // }

        foreach ($grouped as $opponentId => $games) {

            $opponent = $games->first()->team1_id == $rcbId
                ? $games->first()->team2
                : $games->first()->team1;

            $played = $games->count();
            $won    = $games->where('won', $rcbId)->count();
            $lost   = $games->whereNotNull('won')->where('won', '!=', $rcbId)->count();
            $draw   = $games->whereNull('match_result')->count();

            // Percentages
            $wPercent = $played ? round(($won / $played) * 100) : 0;
            $lPercent = $played ? round(($lost / $played) * 100) : 0;
            $dPercent = max(0, 100 - ($wPercent + $lPercent)); // force total = 100

            // Status badge
            $status =
                $wPercent >= 60 ? 'STRONG'
                : ($wPercent >= 40 ? 'BALANCED' : 'WEAK');

            $opponents->push([
                'id'        => $opponentId,
                'name_en'   => $opponent->name_en,
                'name_bn'   => $opponent->name_bn,
                'logo'      => $opponent->media?->path,
                'played'    => $played,
                'won'       => $won,
                'lost'      => $lost,
                'draw'      => $draw,
                'w_l'       => "{$won}:{$lost}",
                'status'      => $status,

                // 👇 PERFORMANCE (UI READY)
                'performance' => [
                    'win'  => [
                        'label' => 'W',
                        'color' => 'bg-green-500',
                        'value' => $wPercent,
                    ],
                    'loss' => [
                        'label' => 'L',
                        'color' => 'bg-red-500',
                        'value' => $lPercent,
                    ],
                    'draw' => [
                        'label' => 'D',
                        'color' => 'bg-yellow-400',
                        'value' => $dPercent,
                    ],
                ],

                'matches' => $games,
            ]);
        }



        // Sort by ID
        $opponents = $opponents->sortByDesc('id')->values();

        // Use Livewire’s currentPage() properly
        $page = $this->getPage();
        $perPage = 10;

        $paginatedOpponents = new \Illuminate\Pagination\LengthAwarePaginator(
            $opponents->forPage($page, $perPage),
            $opponents->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('livewire.frontend.record.records', [
            'opponents' => $paginatedOpponents,
            'rcbId' => $rcbId,
        ])->extends('livewire.frontend.layouts.app');
    }
}
