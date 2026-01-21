<?php

namespace App\Livewire\Backend\Faq;

use App\Livewire\Forms\FaqForm;
use App\Models\Faq as ModelsFaq;
use Livewire\Component;
use Livewire\Attributes\Title;

class Faq extends Component
{
    #[Title('Faq')]

    public FaqForm $form;

    public function delete($id)
    {
        ModelsFaq::findOrFail($id)->delete();

        $this->dispatch('toastr:success', 'Faq deleted successfully!');
    }
    
    public function render()
    {
        $faqs = ModelsFaq::where('question', 'like', '%' . $this->form->search . '%')
            ->orWhere('status', 'like', '%' . $this->form->search . '%')
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.faq.faq', ['faqs' => $faqs])->extends('livewire.backend.layouts.app');
    }
}
