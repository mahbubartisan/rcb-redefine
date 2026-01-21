<?php

namespace App\Livewire\Backend\Slider;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Livewire\Forms\SliderForm;
use App\Models\Slider as ModelsSlider;
use App\Traits\MediaTrait;

class Slider extends Component
{
    use WithPagination, MediaTrait;

    #[Title('Slider')]

    public SliderForm $form;

    public function delete($id)
    {
        $slider = ModelsSlider::findOrFail($id);

        // Delete slider image from media
        if ($slider->image) {
            $this->deleteMedia($slider->image);
        }

        // Delete slider record
        $slider->delete();

        session()->flash('success', 'Slider deleted successfully!');
        return redirect()->route('slider');
    }

    public function render()
    {
        $sliders = ModelsSlider::with('media')->where('title', 'like', '%' . $this->form->search . '%')
            ->orWhere('status', 'like', '%' . $this->form->search . '%')
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.slider.slider', [
            'sliders' => $sliders
        ])->extends('livewire.backend.layouts.app');
    }
}
