<?php

namespace App\Livewire\Backend\Category;

use App\Models\Media;
use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Category as ModelCategory;

class Category extends Component
{
    use WithPagination, WithFileUploads, MediaTrait;

    #[Title('Categories')]

    public $name;
    public $description;
    public $mediaId;
    public $search = '';
    public $rowsPerPage = 20;
    public $status = true;
    public $editMode = null;
    public $isOpen = false;

    protected function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'mediaId' => $this->editMode ? 'nullable|image|mimes:jpeg,png,jpg' : 'required|image|mimes:jpeg,png,jpg',
            'status' => 'required|boolean',
        ];
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->reset(['name', 'description', 'mediaId', 'status']);
    }

    public function store()
    {
        $this->validate($this->rules());

        if ($this->mediaId) {
            $mediaId = $this->uploadMedia($this->mediaId, 'images/category', 80);
            $mediaPath = $mediaId->id;
        }

        ModelCategory::create([
            'name' => $this->name,
            'slug' => str()->slug($this->name),
            'description' => $this->description,
            'mediaId' => $mediaPath,
            'status' => $this->status,
            'created_by' => Auth::id(),
        ]);

        $this->isOpen = false;
        $this->reset(['name', 'description', 'mediaId', 'status']);
        $this->dispatch('toastr:success', 'Category created successfully!');
    }

    public function edit($id)
    {
        $category = ModelCategory::findOrFail($id);
        $this->editMode = $category->id;
        $this->name = $category->name;
        $this->description = $category->description;
        $this->status = $category->status;
        $this->isOpen = true;
    }

    public function update()
    {
        $this->validate($this->rules());

        if ($this->editMode) {
            $category = ModelCategory::findOrFail($this->editMode);

            if ($this->mediaId) {
                $oldMedia = Media::where('id', $category->mediaId)->first();

                if ($oldMedia && File::exists(public_path($oldMedia->path))) {
                    File::delete(public_path($oldMedia->path));
                    $oldMedia->delete();
                }

                $newPhoto = $this->uploadMedia($this->mediaId, 'images/category', 80);
                $newPhotoId = $newPhoto->id;
            } else {
                $newPhotoId = $category->mediaId;
            }

            $category->update([
                'name' => $this->name,
                'slug' => str()->slug($this->name),
                'description' => $this->description,
                'mediaId' => $newPhotoId,
                'status' => $this->status,
                'updated_by' => Auth::id(),
            ]);

            $this->isOpen = false;
            $this->reset(['editMode', 'name', 'description', 'mediaId', 'status']);
            $this->dispatch('toastr:success', 'Category updated successfully!');
        }
    }

    public function delete($id)
    {
        $category = ModelCategory::findOrFail($id);

        if ($category->mediaId) {
            $media = Media::where('id', $category->mediaId)->first();

            if ($media && File::exists(public_path($media->path))) {
                File::delete(public_path($media->path));
                $media->delete();
            }
        }

        $category->delete();

        $this->dispatch('toastr:success', 'Category deleted successfully!');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = ModelCategory::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('status', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate($this->rowsPerPage);
        return view('livewire.backend.category.category', [
            'categories' => $categories
        ])->extends('livewire.backend.layouts.app');
    }
}
