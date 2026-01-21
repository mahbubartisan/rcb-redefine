<?php

namespace App\Livewire\Backend\RoleIcon;

use App\Livewire\Forms\RoleIconForm;
use App\Models\RoleIcon as ModelsRoleIcon;
use App\Traits\MediaTrait;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

class RoleIcon extends Component
{
    use WithPagination, WithFileUploads, MediaTrait;

    #[Title('Role Icons')]

    public RoleIconForm $form;

    public function openModal()
    {
        $this->form->isOpen = true;
    }

    public function closeModal()
    {
        $this->form->isOpen = false;
        $this->reset(['form.icon', 'form.name']);
    }

    public function store()
    {
        $this->validate();

        if ($this->form->icon) {
            $icon = $this->uploadMedia($this->form->icon, 'images/icon', 80);
            $iconPath = $icon->id;
        }

        ModelsRoleIcon::create([
            'icon' => $iconPath,
            'name' => $this->form->name,
        ]);

        $this->form->isOpen = false;
        $this->reset(['form.icon', 'form.name']);
        $this->dispatch('toastr:success', 'Role Icon created successfully!');
    }

    public function edit($id)
    {
        $icon = ModelsRoleIcon::findOrFail($id);
        $this->form->editMode = $icon->id;
        $this->form->name = $icon->name;
        $this->form->isOpen = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->form->editMode) {

            $icon = ModelsRoleIcon::findOrFail($this->form->editMode);

            if ($this->form->icon) {
                // Delete old icon
                if ($icon->icon) {
                    $this->deleteMedia($icon->icon);
                }

                // Upload new one
                $uploaded = $this->uploadMedia($this->form->icon, 'images/icon', 80);
                $iconPath = $uploaded->id;
            } else {
                // Keep old icon if no new one
                $iconPath = $icon->icon;
            }

            // Now update the correct model
            $icon->update([
                'icon' => $iconPath,
                'name' => $this->form->name,
            ]);

            $this->form->isOpen = false;
            $this->reset(['form.editMode', 'form.icon', 'form.name']);
            $this->dispatch('toastr:success', 'Role Icon updated successfully!');
        }
    }


    public function delete($id)
    {
        ModelsRoleIcon::findOrFail($id)->delete();
        $this->dispatch('toastr:success', 'Role Icon deleted successfully!');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $icons = ModelsRoleIcon::with('media')->latest()->paginate($this->form->rowsPerPage);
        return view('livewire.backend.role-icon.role-icon', [
            'icons' => $icons
        ])->extends('livewire.backend.layouts.app');
    }
}
