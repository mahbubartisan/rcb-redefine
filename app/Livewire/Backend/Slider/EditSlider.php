<?php

namespace App\Livewire\Backend\Slider;

use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Livewire\Forms\SliderForm;
use App\Models\Slider;

class EditSlider extends Component
{
    use WithFileUploads, MediaTrait;

    public SliderForm $form;

    #[Title('Edit Slider')]

    public function mount($sliderId)
    {
        $this->form->sliderId = $sliderId;
        $slider = Slider::findOrFail($this->form->sliderId);
        if ($slider) {
            // Editing existing slider
            $this->form->title  = $slider->title;
            $this->form->status = $slider->status;
        }
    }

    public function update()
    {
        $this->validate();

        $slider = Slider::findOrFail($this->form->sliderId);

        // If new image uploaded
        if ($this->form->image) {
            // Delete old image
            if ($slider->image) {
                $this->deleteMedia($slider->image);
            }

            // Upload new one
            $image = $this->uploadMedia($this->form->image, 'images/slider', 80);
            $imagePath = $image->id;
        } else {
            // Keep old image if no new one
            $imagePath = $slider->image;
        }

        $slider->update([
            'title'  => $this->form->title,
            'image'  => $imagePath,
            'status' => $this->form->status,
        ]);

        session()->flash('success', 'Slider updated successfully!');
        return redirect()->route('slider');
    }

    public function render()
    {
        return view('livewire.backend.slider.edit-slider')->extends('livewire.backend.layouts.app');
    }
}
