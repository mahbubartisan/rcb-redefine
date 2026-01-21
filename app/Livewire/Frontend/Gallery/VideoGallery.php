<?php

namespace App\Livewire\Frontend\Gallery;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class VideoGallery extends Component
{
    use WithPagination;

    public $paginate = 12;

    public function render()
    {
        $videos = Video::with('media')->where('status', 1)->paginate($this->paginate);
        return view('livewire.frontend.gallery.video-gallery', [
            'videos' => $videos
        ])->extends('livewire.frontend.layouts.app');
    }
}
