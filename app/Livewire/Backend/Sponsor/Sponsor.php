<?php

namespace App\Livewire\Backend\Sponsor;

use App\Livewire\Forms\SponsorForm;
use App\Models\Sponsor as ModelsSponsor;
use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

class Sponsor extends Component
{
    use WithPagination, MediaTrait;

    #[Title('Sponsor')]

    public SponsorForm $form;

    public function delete($id)
    {
        $sponsor = ModelsSponsor::findOrFail($id);

        // Delete slider image from media
        if ($sponsor->image) {
            $this->deleteMedia($sponsor->image);
        }

        // Delete slider record
        $sponsor->delete();

        session()->flash('success', 'Sponsor deleted successfully!');
        return redirect()->route('sponsor');
    }

    public function render()
    {
        $sponsors = ModelsSponsor::with('media')->where('title', 'like', '%' . $this->form->search . '%')
            ->orWhere('status', 'like', '%' . $this->form->search . '%')
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.sponsor.sponsor', [
            'sponsors' => $sponsors
        ])->extends('livewire.backend.layouts.app');
    }
}
