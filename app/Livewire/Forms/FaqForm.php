<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class FaqForm extends Form
{
    public $faqId, $question_en, $question_bn, $answer_en, $answer_bn, $status = true;
    public $search = '';
    public $rowsPerPage = 20;

    public function rules()
    {
        return [

            'question_en' => 'required|string|max:100',
            'question_bn' => 'required|string|max:100',
            'answer_en' => 'required|string|max:500',
            'answer_bn' => 'required|string|max:500',
            'status' => 'boolean',
        ];
    }

    public function messages()
    {
        return [

            // Question
            'question_en.required' => 'Question EN field is required.',
            'question_en.string'   => 'Question EN must be a valid string.',
            'question_en.max'      => 'Question EN may not be greater than :max characters.',

            // Question_bn
            'question_bn.required' => 'Question BN field is required.',
            'question_bn.string'   => 'Question BN must be a valid string.',
            'question_bn.max'      => 'Question BN may not be greater than :max characters.',

            // Answer_en
            'answer_en.required' => 'Answer EN field is required.',
            'answer_en.string'   => 'Answer EN must be a valid string.',
            'answer_en.max'      => 'Answer EN may not be greater than :max characters.',

            // Answer_bn
            'answer_bn.required' => 'Answer BN field is required.',
            'answer_bn.string'   => 'Answer BN must be a valid string.',
            'answer_bn.max'      => 'Answer BN may not be greater than :max characters.',
            
            // Status
            'status.boolean' => 'Status must be true or false.',
        ];
    }
}
