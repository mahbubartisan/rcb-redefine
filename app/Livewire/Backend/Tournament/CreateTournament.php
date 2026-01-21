<?php

namespace App\Livewire\Backend\Tournament;

use App\Models\Team;
use Livewire\Component;
use App\Models\Tournament;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Livewire\Forms\TournamentForm;

class CreateTournament extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Create Tournament')]

    public TournamentForm $form;

    function mount()
    {
        $this->form->teams = Team::select('id', 'name_en')->where('status', 1)->get();
    }

    public function store()
    {
        $this->validate();

        // Default null in case no photo is uploaded
        $photoPath = null;

        // Handle image upload if present
        if ($this->form->photo) {
            $photo = $this->uploadMedia($this->form->photo, 'images/tournament', 80);
            $photoPath = $photo->id;
        }

        // Create tournament
        $tournament = Tournament::create([
            'photo' => $photoPath,
            'name_en' => $this->form->name_en,
            'name_bn' => $this->form->name_en,
            'date' => $this->form->date,
            'status' => $this->form->status,
        ]);

        // Attach the selected classes
        $tournament->teams()->attach($this->form->teamId);

        // Success
        session()->flash('success', 'Tournament created successfully.');
        return redirect()->route('tournament');
    }

    public function render()
    {
        return view('livewire.backend.tournament.create-tournament')->extends('livewire.backend.layouts.app');
    }
}
