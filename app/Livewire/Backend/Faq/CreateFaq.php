<?php

namespace App\Livewire\Backend\Faq;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\FaqForm;
use App\Models\Faq;

class CreateFaq extends Component
{
    #[Title('Create Faq')]

    public FaqForm $form;

    public function store()
    {
        $this->validate();

        Faq::create([
            'question' => $this->form->question,
            'answer' => $this->form->answer,
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
