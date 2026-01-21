<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class FaqForm extends Form
{
    public $faqId, $question, $answer, $status = true;
    public $search = '';
    public $rowsPerPage = 20;

    public function rules()
    {
        return [

            'question' => 'required|string|min:10|max:100',
            'answer' => 'required|string|min:10|max:300',
            'status' => 'boolean',
        ];
    }

    public function messages()
    {
        return [

            // Question
            'question.required' => 'Question field is required.',
            'question.string'   => 'Question must be a valid string.',
            'question.min'      => 'Question must be at least :min characters.',
            'question.max'      => 'Question may not be greater than :max characters.',

            // Answer
            'answer.required' => 'Answer field is required.',
            'answer.string'   => 'Answer must be a valid string.',
            'answer.min'      => 'Answer must be at least :min characters.',
            'answer.max'      => 'Answer may not be greater than :max characters.',

            // Status
            'status.boolean' => 'Status must be true or false.',
        ];
    }
}
