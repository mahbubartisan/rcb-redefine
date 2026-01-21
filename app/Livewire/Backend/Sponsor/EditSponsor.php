<?php

namespace App\Livewire\Backend\Sponsor;

use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Livewire\Forms\SponsorForm;
use App\Models\Sponsor;

class EditSponsor extends Component
{
    use WithFileUploads, MediaTrait;

    public SponsorForm $form;

    #[Title('Create Sponsor')]


    public function mount($sponsorId)
    {
        $this->form->sponsorId = $sponsorId;
        $sponsor = Sponsor::findOrFail($this->form->sponsorId);
        if ($sponsor) {
            // Editing existing slider
            $this->form->title  = $sponsor->title;
            $this->form->url    = $sponsor->url;
            $this->form->status = $sponsor->status;
        }
    }

    public function update()
    {
        $this->validate();

        $sponsor = Sponsor::findOrFail($this->form->sponsorId);

        // If new image uploaded
        if ($this->form->image) {
            // Delete old image
            if ($sponsor->image) {
                $this->deleteMedia($sponsor->image);
            }

            // Upload new one
            $image = $this->uploadMedia($this->form->image, 'images/sponsor', 80);
            $imagePath = $image->id;
        } else {
            // Keep old image if no new one
            $imagePath = $sponsor->image;
        }

        $sponsor->update([
            'title'  => $this->form->title,
            'url'  => $this->form->url,
            'image'  => $imagePath,
            'status' => $this->form->status,
        ]);

        session()->flash('success', 'Sponsor updated successfully!');
        return redirect()->route('sponsor');
    }


    public function render()
    {
        return view('livewire.backend.sponsor.edit-sponsor')->extends('livewire.backend.layouts.app');
    }
}
