<?php

namespace App\Livewire\Backend\Gallery\Photo;

use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Livewire\Forms\GalleryForm;
use App\Models\Gallery;

class EditPhoto extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Edit Gallery')]

    public GalleryForm $form;

    public function mount($galleryId)
    {
        $this->form->galleryId = $galleryId;
        $this->form->gallery = Gallery::findOrFail($this->form->galleryId);
        $this->form->fill([
            'title_en'  => $this->form->gallery->title_en,
            'title_bn' => $this->form->gallery->title_bn,
            'date'      => $this->form->gallery->date,
            'status'    => $this->form->gallery->status,
        ]);
    }

    public function update()
    {
        $this->validate();

        $gallery = Gallery::findOrFail($this->form->galleryId);

        // If new image uploaded
        if ($this->form->image) {
            // Delete old image
            if ($gallery->image) {
                $this->deleteMedia($gallery->image);
            }

            // Upload new one
            $image = $this->uploadMedia($this->form->image, 'images/gallery', 80);
            $imagePath = $image->id;
        } else {
            // Keep old image if no new one
            $imagePath = $gallery->image;
        }

        $gallery->update([
            'title_en'     => $this->form->title_en,
            'title_bn'    => $this->form->title_bn,
            'date'         => $this->form->date,
            'image'        => $imagePath,
            'status'       => $this->form->status,
        ]);

        session()->flash('success', 'Gallery updated successfully!');
        return redirect()->route('gallery');
    }

    public function render()
    {
        return view('livewire.backend.gallery.photo.edit-photo')->extends('livewire.backend.layouts.app');
    }
}
