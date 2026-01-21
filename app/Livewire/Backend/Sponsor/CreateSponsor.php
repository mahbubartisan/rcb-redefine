<?php

namespace App\Livewire\Backend\Sponsor;

use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Livewire\Forms\SponsorForm;
use App\Models\Sponsor;

class CreateSponsor extends Component
{
    use WithFileUploads, MediaTrait;

    public SponsorForm $form;

    #[Title('Create Sponsor')]

    public function store()
    {
        $this->validate();

        if ($this->form->image) {
            $image = $this->uploadMedia($this->form->image, 'images/sponsor', 80);
            $imagePath = $image->id;
        }

        Sponsor::create([
            'title'       => $this->form->title,
            'url'         => $this->form->url,
            'image'       => $imagePath,
            'status'      => $this->form->status,
        ]);

        session()->flash('success', 'Sponsor added successfully!');
        $this->reset();
        return redirect()->route('sponsor');
    }

    public function render()
    {
        return view('livewire.backend.sponsor.create-sponsor')->extends('livewire.backend.layouts.app');
    }
}
