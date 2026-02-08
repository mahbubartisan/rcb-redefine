<?php

namespace App\Livewire\Backend\Faq;

use App\Livewire\Forms\FaqForm;
use App\Models\Faq;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditFaq extends Component
{
    #[Title('Edit Faq')]

    public FaqForm $form;

    public function mount($faqId)
    {
        $this->form->faqId = $faqId;
        $faq = Faq::findOrFail($this->form->faqId);
        $this->form->fill([
            'question_en'   => $faq->question_en,
            'question_bn'   => $faq->question_bn,
            'answer_en'   => $faq->answer_en,
            'answer_bn'   => $faq->answer_bn,
            'status' => $faq->status,
        ]);
    }

    public function update()
    {
        $this->validate();

        $faq = Faq::findOrFail($this->form->faqId);

        $faq->update([
            'question_en'     => $this->form->question_en,
            'question_bn'     => $this->form->question_bn,
            'answer_en'     => $this->form->answer_en,
            'answer_bn'     => $this->form->answer_bn,
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
