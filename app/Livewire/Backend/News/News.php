<?php

namespace App\Livewire\Backend\News;

use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Livewire\Forms\NewsForm;
use App\Models\News as ModelsNews;

class News extends Component
{
    use WithPagination, MediaTrait;

    #[Title('News')]

    public NewsForm $form;

    public function delete($id)
    {
        $news = ModelsNews::findOrFail($id);

        // Delete profile photo if exists
        if ($news->image) {
            $this->deleteMedia($news->image);
        }

        // Delete the news itself
        $news->delete();

       $this->dispatch('toastr:success', 'News deleted successfully.');
    }

    public function render()
    {
        $news = ModelsNews::with('media')->where('title_en', 'like', '%' . $this->form->search . '%')
            ->orWhere('status', 'like', '%' . $this->form->search . '%')
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.news.news', [
            'news' => $news,
        ])->extends('livewire.backend.layouts.app');
    }
}
