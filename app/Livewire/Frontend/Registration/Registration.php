<?php

namespace App\Livewire\Frontend\Registration;

use App\Models\Thana;
use Livewire\Component;
use App\Models\District;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use App\Models\RegisterPlayer;
use App\Livewire\Forms\PlayerRegistrationForm;

class Registration extends Component
{
    use WithFileUploads, MediaTrait;

    public PlayerRegistrationForm $form;

    public $showModal = false;

    public function mount()
    {
        // Load all districts from DB when component loads
        $this->form->districts = District::orderBy('name')->get();
    }

    public function updatedFormPresentDistrict($districtName)
    {
        $this->form->present_thana = ''; // reset thana

        $district = District::where('name', $districtName)->first();

        $this->form->thanas = $district
            ? Thana::where('district_id', $district->id)->orderBy('name')->get()
            : [];
    }

    public function store()
    {
        $this->validate();

        if ($this->form->sameAsPresent) {
            $this->form->permanent_village = $this->form->present_village;
            $this->form->permanent_district = $this->form->present_district;
            $this->form->permanent_thana = $this->form->present_thana;
            $this->form->permanent_post_office = $this->form->present_post_office;
        }

        $photoPath = null;

        if ($this->form->photo) {
            $photo = $this->uploadMedia($this->form->photo, 'images/player', 80);
            $photoPath = $photo->id;
        }

        RegisterPlayer::create([
            'photo'               => $photoPath,
            'full_name'            => $this->form->full_name,
            'email'               => $this->form->email,
            'phone'               => $this->form->phone,
            'dob'                 => $this->form->dob,
            'role'                => $this->form->role,
            'jersey_no'           => $this->form->jersey_no,

            'present_village'     => $this->form->present_village,
            'present_district'    => $this->form->present_district,
            'present_thana'       => $this->form->present_thana,
            'present_post_office' => $this->form->present_post_office,

            'permanent_village'   => $this->form->permanent_village,
            'permanent_district'  => $this->form->permanent_district,
            'permanent_thana'     => $this->form->permanent_thana,
            'permanent_post_office' => $this->form->permanent_post_office,

            'nationality' => $this->form->nationality ?: 'Bangladeshi',
            'religion'            => $this->form->religion,
            'blood_group'         => $this->form->blood_group,
            'height'              => $this->form->height,
            'facebook_id'         => $this->form->facebook_id,
        ]);

        $this->form->reset();
        $this->showModal = true;
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.frontend.registration.registration')->extends('livewire.frontend.layouts.app');
    }
}
