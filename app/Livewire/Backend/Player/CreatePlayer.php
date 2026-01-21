<?php

namespace App\Livewire\Backend\Player;

use App\Models\Thana;
use App\Models\Player;
use Livewire\Component;
use App\Models\District;
use App\Models\RoleIcon;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Livewire\Forms\PlayerForm;

class CreatePlayer extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Create Player')]

    public PlayerForm $form;

    public function mount()
    {
        // Load all districts from DB when component loads
        $this->form->districts = District::orderBy('name')->get();
    }

    public function updatedFormDistrictId($districtId)
    {
        $this->form->thana_id = '';
        $this->form->thanas = $districtId ?
            Thana::where('district_id', $districtId)->orderBy('name')->get()
            : [];
    }

    public function store()
    {
        $this->validate();

        // Handle image upload if present
        if ($this->form->photo) {
            $photo = $this->uploadMedia($this->form->photo, 'images/player', 80);
            $photoPath = $photo->id;
        }

        // if ($this->form->role_icon) {
        //     $roleIcon = $this->uploadMedia($this->form->role_icon, 'images/icon', 80);
        //     $iconPath = $roleIcon->id;
        // }

        // 3. Save to database
        Player::create([
            'photo' => $photoPath ?? null,
            'role_icon' => $this->form->role_icon ?? null,
            'first_name_en' => $this->form->first_name_en,
            'first_name_bn' => $this->form->first_name_bn,
            'last_name_en' => $this->form->last_name_en ?: $this->form->first_name_en,
            'last_name_bn' => $this->form->last_name_bn ?: $this->form->first_name_bn,
            'slug' => str()->slug($this->form->first_name_en),
            'district_id' => $this->form->district_id,
            'thana_id' => $this->form->thana_id,
            'village' => $this->form->village,
            'post_office' => $this->form->post_office,
            'religion' => $this->form->religion,
            'blood_group' => $this->form->blood_group,
            'playing_role' => $this->form->playing_role,
            'dob' => $this->form->dob,
            'nationality_en' => $this->form->nationality_en,
            'nationality_bn' => $this->form->nationality_bn,
            'batting_style' => $this->form->batting_style,
            'bowling_style' => $this->form->bowling_style,
            'debut' => $this->form->debut,
            'player_tag' => $this->form->player_tag,
            'description_en' => $this->form->description_en,
            'description_bn' => $this->form->description_bn,
            'status' => $this->form->status,
        ]);

        // 4. Reset form
        $this->form->reset();

        // 5. Notify user
        session()->flash('success', 'Player created successfully!');
        return redirect()->route('player');
    }

    public function render()
    {
        return view('livewire.backend.player.create-player', [
            'icons' => RoleIcon::with('media')->get(),
        ])->extends('livewire.backend.layouts.app');
    }
}
