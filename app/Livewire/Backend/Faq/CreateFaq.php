<?php

namespace App\Livewire\Backend\Faq;

use App\Livewire\Forms\FaqForm;
use App\Models\Faq;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateFaq extends Component
{
    #[Title('Create Faq')]

    public FaqForm $form;

    public function store()
    {
        $this->validate();

        Faq::create([
            'question_en' => $this->form->question_en,
            'question_bn' => $this->form->question_bn,
            'answer_en' => $this->form->answer_en,
            'answer_bn' => $this->form->answer_bn,
            'status' => $this->form->status,
        ]);

        session()->flash('success', 'Faq created successfully!');
        return redirect()->route('faq');
    }

    public function render()
    {
        return view('livewire.backend.faq.create-faq')->extends('livewire.backend.layouts.app');
    }
}
