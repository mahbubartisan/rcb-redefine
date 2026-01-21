<?php

namespace App\Livewire\Frontend\News;

use App\Models\News;
use Livewire\Component;

class NewsDetail extends Component
{
    public $news;

    public function mount($slug)
    {
        $this->news = News::with('media')->where('slug', $slug)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.frontend.news.news-detail')->extends('livewire.frontend.layouts.app');
    }
}
