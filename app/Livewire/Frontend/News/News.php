<?php

namespace App\Livewire\Frontend\News;

use App\Models\News as ModelsNews;
use Livewire\Component;
use Livewire\WithPagination;

class News extends Component
{
    use WithPagination;

    public $paginate = 12;
    
    public function render()
    {
        $news = ModelsNews::with('media')->where('status', 1)->latest()->paginate($this->paginate);
        return view('livewire.frontend.news.news', [
            'news' => $news,
        ])->extends('livewire.frontend.layouts.app');
    }
}
