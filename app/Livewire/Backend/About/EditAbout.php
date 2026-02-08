<?php

namespace App\Livewire\Backend\About;

use App\Livewire\Forms\AboutForm;
use App\Models\About;
use App\Traits\MediaTrait;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditAbout extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Edit About')]

    public AboutForm $form;

    public function mount($aboutId)
    {
        $this->form->aboutId = $aboutId;

        $about = About::findOrFail($this->form->aboutId);

        $this->form->fill([
            'established_en' => $about->established_en,
            'established_bn' => $about->established_bn,
            'location_en' => $about->location_en,
            'location_bn' => $about->location_bn,
            'player_en' => $about->player_en,
            'player_bn' => $about->player_bn,
            'fan_en' => $about->fan_en,
            'fan_bn' => $about->fan_bn,
            'contact_en' => $about->contact_en,
            'contact_bn' => $about->contact_bn,
            'year_en' => $about->year_en,
            'year_bn' => $about->year_bn,
            'description_en' => $about->description_en,
            'description_bn' => $about->description_bn,
        ]);
    }

    public function update()
    {
        $this->validate();

        $about = About::findOrFail($this->form->aboutId);

        // Handle new image upload
        if ($this->form->image && !is_int($this->form->image)) {
            // Delete the old media if it exists
            if ($about->image) {
                $this->deleteMedia($about->image);
            }

            // Upload the new image
            $newPhoto = $this->uploadMedia(
                $this->form->image,
                'images/about',
                80
            );

            $newPhotoId = $newPhoto->id;
        } else {
            $newPhotoId = $about->image; // keep the existing image
        }

        $about->update([
            'image' => $newPhotoId,
            'established_en' => $this->form->established_en,
            'established_bn' => $this->form->established_bn,
            'location_en' => $this->form->location_en,
            'location_bn' => $this->form->location_bn,
            'player_en' => $this->form->player_en,
            'player_bn' => $this->form->player_bn,
            'fan_en' => $this->form->fan_en,
            'fan_bn' => $this->form->fan_bn,
            'contact_en' => $this->form->contact_en,
            'contact_bn' => $this->form->contact_bn,
            'year_en' => $this->form->year_en,
            'year_bn' => $this->form->year_bn,
            'description_en' => $this->form->description_en,
            'description_bn' => $this->form->description_bn,
        ]);

        session()->flash('success', 'About information updated!');
        return redirect()->route('about');
    }

    public function render()
    {
        return view('livewire.backend.about.edit-about')->extends('livewire.backend.layouts.app');
    }
}
