<?php

namespace App\Livewire\Backend\News;

use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Livewire\Forms\NewsForm;
use App\Models\News;

class CreateNews extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Create News')]

    public NewsForm $form;

    public function store()
    {
        $this->validate();

        if ($this->form->image) {
            $image = $this->uploadMedia($this->form->image, 'images/news', 80);
            $imagePath = $image->id;
        }

        News::create([
            'title_en'     => $this->form->title_en,
            'title_bn'    => $this->form->title_bn,
            'slug'         => str()->slug($this->form->title_en),
            'date'         => $this->form->date,
            'image'        => $imagePath,
            'desc_en'      => $this->form->desc_en,
            'desc_bn'     => $this->form->desc_bn,
            'status'       => $this->form->status,
        ]);

        session()->flash('success', 'News added successfully!');
        return redirect()->route('news');
    }

    public function render()
    {
        return view('livewire.backend.news.create-news')->extends('livewire.backend.layouts.app');
    }
}
