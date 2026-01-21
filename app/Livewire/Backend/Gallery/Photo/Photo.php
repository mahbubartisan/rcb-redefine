<?php

namespace App\Livewire\Backend\Gallery\Photo;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Livewire\Forms\GalleryForm;
use App\Models\Gallery;
use App\Traits\MediaTrait;

class Photo extends Component
{
    use WithPagination, MediaTrait;

    #[Title('Gallery')]

    public GalleryForm $form;

    public function delete($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Delete profile photo if exists
        if ($gallery->image) {
            $this->deleteMedia($gallery->image);
        }

        // Delete the news itself
        $gallery->delete();

        $this->dispatch('toastr:success', 'Gallery deleted successfully.');
    }

    public function render()
    {
        $galleries = Gallery::with('media')->where('title_en', 'like', '%' . $this->form->search . '%')
            ->orWhere('status', 'like', '%' . $this->form->search . '%')
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.gallery.photo.photo', [
            'galleries' => $galleries
        ])->extends('livewire.backend.layouts.app');
    }
}
