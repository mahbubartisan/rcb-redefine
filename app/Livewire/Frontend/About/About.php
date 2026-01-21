<?php

namespace App\Livewire\Frontend\About;

use App\Models\About as ModelsAbout;
use App\Models\Faq;
use Livewire\Attributes\Title;
use Livewire\Component;

class About extends Component
{
    #[Title('About Us')]

    public function render()
    {
        $faqs = Faq::select('question', 'answer')->where('status', 1)->get();
        $abouts = ModelsAbout::with('media')->get();
        return view('livewire.frontend.about.about', [
            'abouts' => $abouts,
            'faqs' => $faqs,
        ])->extends('livewire.frontend.layouts.app');
    }
}
