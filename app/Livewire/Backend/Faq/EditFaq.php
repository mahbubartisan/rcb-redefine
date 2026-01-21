<?php

namespace App\Livewire\Backend\Faq;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\FaqForm;
use App\Models\Faq;

class EditFaq extends Component
{
    #[Title('Edit Faq')]

    public FaqForm $form;

    public function mount($faqId)
    {
        $this->form->faqId = $faqId;
        $faq = Faq::findOrFail($this->form->faqId);
        $this->form->fill([
            'question'   => $faq->question,
            'answer'   => $faq->answer,
            'status' => $faq->status,
        ]);
    }

    public function update()
    {
        $this->validate();

        $faq = Faq::findOrFail($this->form->faqId);

        $faq->update([
            'question'     => $this->form->question,
            'answer'     => $this->form->answer,
            'status'   => $this->form->status,
        ]);

        session()->flash('success', 'Faq updated successfully!');
        return redirect()->route('faq');
    }
    
    public function render()
    {
        return view('livewire.backend.faq.edit-faq')->extends('livewire.backend.layouts.app');
    }
}
