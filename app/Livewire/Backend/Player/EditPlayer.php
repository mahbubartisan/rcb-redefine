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

class EditPlayer extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Edit Player')]

    public PlayerForm $form;

    public function mount($playerId)
    {
        $this->form->playerId = $playerId;

        $this->form->player = Player::with('media')->findOrFail($this->form->playerId);
        // player data
        $this->form->fill([
            'first_name_en' => $this->form->player->first_name_en,
            'first_name_bn' => $this->form->player->first_name_bn,
            'last_name_en' => $this->form->player->last_name_en,
            'last_name_bn' => $this->form->player->last_name_bn,
            'slug' => str()->slug($this->form->first_name_en),
            'role_icon' => $this->form->player->role_icon,
            'district_id' => $this->form->player->district_id,
            'thana_id' => $this->form->player->thana_id,
            'village' => $this->form->player->village,
            'post_office' => $this->form->player->post_office,
            'religion' => $this->form->player->religion,
            'blood_group' => $this->form->player->blood_group,
            'playing_role' => $this->form->player->playing_role,
            'dob' => $this->form->player->dob,
            'nationality_en' => $this->form->player->nationality_en,
            'nationality_bn' => $this->form->player->nationality_bn,
            'batting_style' => $this->form->player->batting_style,
            'bowling_style' => $this->form->player->bowling_style,
            'debut' => $this->form->player->debut,
            'player_tag' => $this->form->player->player_tag,
            'description_en' => $this->form->player->description_en,
            'description_bn' => $this->form->player->description_bn,
        ]);

        // Load districts
        $this->form->districts = District::orderBy('name')->get();

        // Load thanas for the selected district
        $this->form->thanas = $this->form->player->district_id
            ? Thana::where('district_id', $this->form->player->district_id)->orderBy('name')->get()
            : [];
    }

    public function updatedFormDistrictId($districtId)
    {
        $this->form->thana_id = '';
        $this->form->thanas = $districtId ?
            Thana::where('district_id', $districtId)->orderBy('name')->get()
            : [];
    }

    public function update()
    {
        $this->validate();

        $player = Player::with(['media', 'icon'])->findOrFail($this->form->playerId);

        // Handle profile image upload
        if ($this->form->photo && !is_int($this->form->photo)) {
            // Delete the old media if it exists
            if ($player->photo) {
                $this->deleteMedia($player->photo);
            }

            // Upload the new image
            $newPhoto = $this->uploadMedia($this->form->photo,'images/player',80
            );

            $newPhotoId = $newPhoto->id;
        } else {
            $newPhotoId = $player->photo; // keep the existing image
        }

        // Handle profile icon upload
        // if ($this->form->role_icon && !is_int($this->form->role_icon)) {
        //     // Delete the old media if it exists
        //     if ($player->role_icon) {
        //         $this->deleteMedia($player->role_icon);
        //     }

        //     // Upload the new image
        //     $newIcon = $this->uploadMedia($this->form->role_icon,'images/icon',80);

        //     $newIconId = $newIcon->id;
        // } else {
        //     $newIconId = $player->role_icon; // keep the existing image
        // }

        // Update player data
        $player->update([
            'photo' => $newPhotoId,
            'role_icon' => $this->form->role_icon,
            'first_name_en' => $this->form->first_name_en,
            'first_name_bn' => $this->form->first_name_bn,
            'last_name_en' => $this->form->last_name_en,
            'last_name_bn' => $this->form->last_name_bn,
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

        session()->flash('success', 'Player updated successfully!');
        return redirect()->route('player');
    }
    
    public function render()
    {
        return view('livewire.backend.player.edit-player', [
            'icons' => RoleIcon::with('media')->get(),
        ])->extends('livewire.backend.layouts.app');
    }
}
