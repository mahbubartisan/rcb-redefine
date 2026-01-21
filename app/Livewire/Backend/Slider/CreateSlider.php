<?php

namespace App\Livewire\Backend\Slider;

use App\Models\Slider;
use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Livewire\Forms\SliderForm;

class CreateSlider extends Component
{
    use WithFileUploads, MediaTrait;

    public SliderForm $form;
    
    #[Title('Create Slider')]

    public function store()
    {
        $this->validate();

        if ($this->form->image) {
            $image = $this->uploadMedia($this->form->image, 'images/slider', 80);
            $imagePath = $image->id;
        }

        Slider::create([
            'title'       => $this->form->title,
            'image'       => $imagePath,
            'status'      => $this->form->status,
        ]);

        session()->flash('success', 'Slider added successfully!');
        $this->reset();
        return redirect()->route('slider');
    }

    public function render()
    {
        return view('livewire.backend.slider.create-slider')->extends('livewire.backend.layouts.app');
    }
}
