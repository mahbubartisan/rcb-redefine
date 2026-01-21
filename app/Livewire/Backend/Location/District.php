<?php

namespace App\Livewire\Backend\Location;

use App\Livewire\Forms\DistrictForm;
use App\Models\District as ModelsDistrict;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

class District extends Component
{
    use WithPagination;

    #[Title('District')]

    public DistrictForm $form;

    public function openModal()
    {
        $this->form->isOpen = true;
    }

    public function closeModal()
    {
        $this->form->isOpen = false;
        $this->reset(['form.name']);
    }

    public function store()
    {
        $this->validate();

        ModelsDistrict::create([
            'name' => $this->form->name,
        ]);

        $this->form->isOpen = false;
        $this->reset(['form.name']);
        $this->dispatch('toastr:success', 'District created successfully!');
    }

    public function edit($id)
    {
        $district = ModelsDistrict::findOrFail($id);
        $this->form->editMode = $district->id;
        $this->form->name = $district->name;
        $this->form->isOpen = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->form->editMode) {
            $district = ModelsDistrict::findOrFail($this->form->editMode);
            $district->update([
                'name' => $this->form->name,
            ]);

            $this->form->isOpen = false;
            $this->reset(['form.editMode', 'form.name']);
            $this->dispatch('toastr:success', 'District updated successfully!');
        }
    }

    public function delete($id)
    {
        $district = ModelsDistrict::findOrFail($id);

        $district->thana()->delete();

        $district->delete();
        
        $this->dispatch('toastr:success', 'District deleted successfully!');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $districts = ModelsDistrict::where('name', 'like', '%' . $this->form->search . '%')
            ->latest()->paginate($this->form->rowsPerPage);
        return view('livewire.backend.location.district.district', [
            'districts' => $districts
        ])->extends('livewire.backend.layouts.app');
    }
}
