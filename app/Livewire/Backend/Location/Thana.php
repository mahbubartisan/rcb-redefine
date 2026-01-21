<?php

namespace App\Livewire\Backend\Location;

use Livewire\Component;
use App\Models\District;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Livewire\Forms\ThanaForm;
use App\Models\Thana as ModelsThana;

class Thana extends Component
{
    use WithPagination;

    #[Title('Thana')]

    public ThanaForm $form;

    public function mount()
    {
        $this->form->districts = District::all();
    }

    public function openModal()
    {
        $this->form->isOpen = true;
    }

    public function closeModal()
    {
        $this->form->isOpen = false;
        $this->reset(['form.district_id', 'form.name']);
    }

    public function store()
    {
        $this->validate();

        ModelsThana::create([
            'name' => $this->form->name,
            'district_id' => $this->form->district_id,
        ]);

        $this->form->isOpen = false;
        $this->reset(['form.district_id', 'form.name']);
        $this->dispatch('toastr:success', 'Thana created successfully!');
    }

    public function edit($id)
    {
        $thana = ModelsThana::findOrFail($id);
        $this->form->editMode = $thana->id;
        $this->form->name = $thana->name;
        $this->form->district_id = $thana->district_id;
        $this->form->isOpen = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->form->editMode) {
            $thana = ModelsThana::findOrFail($this->form->editMode);
            $thana->update([
                'name' => $this->form->name,
                'district_id' => $this->form->district_id,
            ]);

            $this->form->isOpen = false;
            $this->reset(['form.editMode', 'form.name', 'form.district_id']);
            $this->dispatch('toastr:success', 'Thana updated successfully!');
        }
    }

    public function delete($id)
    {
        ModelsThana::findOrFail($id)->delete();
        $this->dispatch('toastr:success', 'Thana deleted successfully!');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $thanas = ModelsThana::with('district')
            ->where(function ($query) {
                $search = $this->form->search;

                $query->where('name', 'like', "%{$search}%")
                    ->orWhereHas('district', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.location.thana.thana', [
            'thanas' => $thanas
        ])->extends('livewire.backend.layouts.app');
    }
}
