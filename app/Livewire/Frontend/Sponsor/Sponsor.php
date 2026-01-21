<?php

namespace App\Livewire\Frontend\Sponsor;

use App\Models\Sponsor as ModelsSponsor;
use Livewire\Component;

class Sponsor extends Component
{
    public function render()
    {
        $sponsors = ModelsSponsor::with('media')->select('id', 'title', 'url', 'image')->where('status', 1)->get();
        return view('livewire.frontend.layouts.partials.sponsor', ['sponsors' => $sponsors]);
    }
}
