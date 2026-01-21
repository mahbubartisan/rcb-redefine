<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SliderForm extends Form
{
    public $sliderId, $title, $image, $status = true;
    public $search = '';
    public $rowsPerPage = 20;

    protected function rules()
    {
        return [
            'title'       => 'required|string|max:150',
            'image'       => $this->sliderId ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048' : 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'      => 'boolean',
        ];
    }

    protected $messages = [
        'title.string'        => 'Title field is required.',
        'title.string'        => 'Title must be a valid text.',
        'title.max'           => 'Title may not be longer than 150 characters.',

        'image.required'      => 'Please upload a slider image.',
        'image.image'         => 'The file must be an image.',
        'image.mimes'         => 'Only JPG, JPEG, PNG, WEBP formats are allowed.',
        'image.max'           => 'The image size may not exceed 2MB.',

        'status.boolean'      => 'Status must be either active or inactive.',
    ];
}
