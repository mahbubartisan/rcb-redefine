<?php

namespace App\Livewire\Backend\Register;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\RegisterPlayer;
use Livewire\Attributes\Title;
use App\Livewire\Forms\PlayerRegistrationForm;

class ViewRegisterPlayerDetail extends Component
{
    #[Title('Register Player Detail')]

    public PlayerRegistrationForm $form;
    public $player;

    public function mount($regId)
    {
        $this->form->regId = $regId;

        $this->player = RegisterPlayer::with(['media', 'district', 'thana'])->findOrFail($this->form->regId);

        $this->form->fill([
            // 'media'                 => $this->player->media,
            'full_name'             => $this->player->full_name,
            'email'                 => $this->player->email,
            'phone'                 => $this->player->phone,
            'dob'                   => Carbon::parse($this->player->dob)->format('jS F Y'),
            'role'                  => $this->player->role,
            'jersey_no'             => $this->player->jersey_no,
            'present_village'       => $this->player->present_village,
            'present_district'      => $this->player->present_district,
            'present_thana'         => $this->player->present_thana,
            'present_post_office'   => $this->player->present_post_office,
            'permanent_village'     => $this->player->permanent_village,
            'permanent_district'    => $this->player->permanent_district,
            'permanent_thana'       => $this->player->permanent_thana,
            'permanent_post_office' => $this->player->permanent_post_office,
            'nationality'           => $this->player->nationality,
            'religion'              => $this->player->religion,
            'blood_group'           => $this->player->blood_group,
            'height'                => $this->player->height,
            'facebook_id'           => $this->player->facebook_id,
        ]);
    }

    public function render()
    {
        return view('livewire.backend.register.view-register-player-detail')->extends('livewire.backend.layouts.app');
    }
}
