<?php

namespace App\Livewire\Backend\Gallery\Photo;

use App\Models\Gallery;
use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Livewire\Forms\GalleryForm;

class CreatePhoto extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Create Gallery')]

    public GalleryForm $form;

    public function store()
    {
        $this->validate();

        if ($this->form->image) {
            $image = $this->uploadMedia($this->form->image, 'images/gallery', 80);
            $imagePath = $image->id;
        }

        Gallery::create([
            'title_en'     => $this->form->title_en,
            'title_bn'    => $this->form->title_bn,
            'date'         => $this->form->date,
            'image'        => $imagePath,
            'status'       => $this->form->status,
        ]);

        session()->flash('success', 'Gallery added successfully!');
        return redirect()->route('gallery');
    }

    public function render()
    {
        return view('livewire.backend.gallery.photo.create-photo')->extends('livewire.backend.layouts.app');
    }
}
