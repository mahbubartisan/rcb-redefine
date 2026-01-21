<?php

namespace App\Livewire\Backend\Team;

use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Livewire\Forms\TeamForm;
use App\Models\Team as ModelsTeam;

class Team extends Component
{
    use WithPagination, WithFileUploads, MediaTrait;

    #[Title('Team')]

    public TeamForm $form;

    public function delete($id)
    {
        $team = ModelsTeam::findOrFail($id);

        // Delete team image from media
        if ($team->photo) {
            $this->deleteMedia($team->photo);
        }
        // Detach all related players from pivot table
        $team->players()->detach();

        // Delete team
        $team->delete();

        session()->flash('success', 'Team deleted successfully!');
        return redirect()->back();
    }

    public function render()
    {
        $teams = ModelsTeam::with('media')
            ->when($this->form->search, function ($q) {
                $q->where(function ($query) {
                    $query->where('name_en', 'like', '%' . $this->form->search . '%')
                        ->orWhere('status', 'like', '%' . $this->form->search . '%');
                });
            })
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.team.team', [
            'teams' => $teams
        ])->extends('livewire.backend.layouts.app');
    }
}
