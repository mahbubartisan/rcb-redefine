<?php

namespace App\Livewire\Backend\Gallery\Video;

use App\Livewire\Forms\VideoForm;
use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Models\Video as ModelsVideo;

class Video extends Component
{
    use WithPagination, WithFileUploads, MediaTrait;

    #[Title('Videos')]

    public VideoForm $form;

    public function openModal()
    {
        $this->form->isOpen = true;
    }

    public function closeModal()
    {
        $this->form->isOpen = false;
        $this->reset(['form.video_code', 'form.image', 'form.status']);
    }

    public function store()
    {
        $this->validate();

        if ($this->form->image) {
            $mediaId = $this->uploadMedia($this->form->image, 'images/video', 80);
            $mediaPath = $mediaId->id;
        }

        ModelsVideo::create([
            'video_code' => $this->form->video_code,
            'image' => $mediaPath,
            'status' => $this->form->status,
        ]);

        $this->form->isOpen = false;
        $this->reset(['form.video_code', 'form.image', 'form.status']);
        $this->dispatch('toastr:success', 'Video created successfully!');
    }

    public function edit($id)
    {
        $video = ModelsVideo::findOrFail($id);
        $this->form->editMode = $video->id;
        $this->form->video_code = $video->video_code;
        $this->form->status = $video->status;
        $this->form->isOpen = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->form->editMode) {
            $video = ModelsVideo::findOrFail($this->form->editMode);

            if ($this->form->image) {
                // Delete old image
                if ($video->image) {
                    $this->deleteMedia($video->image);
                }

                // Upload new one
                $image = $this->uploadMedia($this->form->image, 'images/video', 80);
                $imagePath = $image->id;
            } else {
                // Keep old image if no new one
                $imagePath = $video->image;
            }

            $video->update([
                'video_code' => $this->form->video_code,
                'image' => $imagePath,
                'status' => $this->form->status,
            ]);

            $this->form->isOpen = false;
            $this->reset(['form.editMode', 'form.video_code', 'form.image', 'form.status']);
            $this->dispatch('toastr:success', 'Video updated successfully!');
        }
    }

    public function delete($id)
    {
        $video = ModelsVideo::findOrFail($id);

        // Delete profile photo if exists
        if ($video->image) {
            $this->deleteMedia($video->image);
        }

        // Delete the news itself
        $video->delete();

        $this->dispatch('toastr:success', 'Video deleted successfully.');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $videos = ModelsVideo::where('video_code', 'like', '%' . $this->form->search . '%')
            ->orWhere('status', 'like', '%' . $this->form->search . '%')
            ->latest()
            ->paginate($this->form->rowsPerPage);
        return view('livewire.backend.gallery.video.video', [
            'videos' => $videos
        ])->extends('livewire.backend.layouts.app');
    }

}
