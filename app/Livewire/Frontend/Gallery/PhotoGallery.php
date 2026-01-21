<?php

namespace App\Livewire\Frontend\Gallery;

use Carbon\Carbon;
use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

// class PhotoGallery extends Component
// {
//     use WithPagination;

//     public $paginate = 11;

//     public function render()
//     {
//         $galleries = Gallery::with('media')->where('status', 1)->paginate($this->paginate);
//         return view('livewire.frontend.gallery.photo-gallery', [
//             'galleries' => $galleries,
//         ])->extends('livewire.frontend.layouts.app');
//     }
// }

class PhotoGallery extends Component
{
    use WithPagination;

    public $paginate = 11;

    public function render()
    {
        // 1️⃣ Current page galleries (with full media data)
        $galleries = Gallery::with('media')
            ->where('status', 1)
            ->latest()
            ->paginate($this->paginate);

        // 2️⃣ Lightweight full gallery list for modal navigation
        $allGalleries = Gallery::select('id', 'title_en', 'title_bn', 'date', 'image')
            ->with('media:id,path') // only fetch necessary media fields
            ->where('status', 1)
            ->latest()
            ->get()
            ->map(fn($g) => [
                'image' => asset(optional($g->media)->path ?? ''),
                'title' => app()->getLocale() === 'bn' ? ($g->title_bn ?? '') : ($g->title_en ?? ''),
                'date'  => $g->date ? Carbon::parse($g->date)->format('d M Y') : '',
            ]);

        return view('livewire.frontend.gallery.photo-gallery', [
            'galleries' => $galleries,
            'allGalleries' => $allGalleries,
        ])->extends('livewire.frontend.layouts.app');
    }
}
