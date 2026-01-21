<?php

namespace App\Livewire\Backend\News;

use App\Models\News;
use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Livewire\Forms\NewsForm;

class EditNews extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Edit News')]

    public NewsForm $form;

    public function mount($newsId)
    {

        $this->form->newsId = $newsId;
        $news = News::findOrFail($this->form->newsId);
        $this->form->fill([
            'title_en'  => $news->title_en,
            'title_bn' => $news->title_bn,
            // 'image'     => null, // file uploads can’t be preloaded
            'date'      => $news->date,
            'desc_en'   => $news->desc_en,
            'desc_bn'  => $news->desc_bn,
            'status'    => $news->status,
        ]);
    }

    public function update()
    {
        $this->validate();

        $news = News::findOrFail($this->form->newsId);

        // If new image uploaded
        if ($this->form->image) {
            // Delete old image
            if ($news->image) {
                $this->deleteMedia($news->image);
            }

            // Upload new one
            $image = $this->uploadMedia($this->form->image, 'images/news', 80);
            $imagePath = $image->id;
        } else {
            // Keep old image if no new one
            $imagePath = $news->image;
        }

        // dd($news);
        $news->update([
            'title_en'     => $this->form->title_en,
            'title_bn'    => $this->form->title_bn,
            'slug'         => str()->slug($this->form->title_en),
            'date'         => $this->form->date,
            'image'        => $imagePath,
            'desc_en'      => $this->form->desc_en,
            'desc_bn'     => $this->form->desc_bn,
            'status'       => $this->form->status,
        ]);



        session()->flash('success', 'News updated successfully!');
        return redirect()->route('news');
    }

    public function render()
    {
        return view('livewire.backend.news.edit-news')->extends('livewire.backend.layouts.app');
    }
}
