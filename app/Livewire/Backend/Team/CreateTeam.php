<?php

namespace App\Livewire\Backend\Team;

use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Livewire\Forms\TeamForm;
use App\Models\Player;
use App\Models\Team;

class CreateTeam extends Component
{
    use WithFileUploads, MediaTrait;
    
    #[Title('Create Team')]

    public TeamForm $form;

    function mount()
    {
        $this->form->players = Player::select('id', 'first_name_en')->get();
        // $this->form->players = Player::select('id', 'first_name_en')->where('status', 1)->get();
    }

    public function store()
    {
        $this->validate();

        // Default null in case no photo is uploaded
        $photoPath = null;

        // Handle image upload if present
        if ($this->form->photo) {
            $photo = $this->uploadMedia($this->form->photo, 'images/team', 80);
            $photoPath = $photo->id;
        }

        // Create team
        $team = Team::create([
            'photo' => $photoPath,
            'name_en' => $this->form->name_en,
            'slug'   => str()->slug($this->form->name_en),
            'name_bn' => $this->form->name_en,
            'status' => $this->form->status,
        ]);

        // Attach the selected classes
        $team->players()->attach($this->form->playerId);

        // Success
        session()->flash('success', 'Team created successfully.');
        return redirect()->route('team');
    }

    public function render()
    {
        return view('livewire.backend.team.create-team')->extends('livewire.backend.layouts.app');
    }
}
