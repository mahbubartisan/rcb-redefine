<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SponsorForm extends Form
{
    public $sponsorId, $title, $image, $url, $status = true;
    public $search = '';
    public $rowsPerPage = 20;

    public function rules()
    {
        return [
            'title'       => 'required|string|max:150',
            'url'         => 'nullable',
            'image'       => $this->sponsorId ? 'nullable|image|mimes:jpg,jpeg,png|max:2048' : 'required|image|mimes:jpg,jpeg,png|max:2048',
            'status'      => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.string'        => 'Title field is required.',
            'title.string'        => 'Title must be a valid text.',
            'title.max'           => 'Title may not be longer than 150 characters.',

            'image.required'      => 'Please upload a slider image.',
            'image.image'         => 'The file must be an image.',
            'image.mimes'         => 'Only JPG, JPEG, PNG formats are allowed.',
            'image.max'           => 'The image size may not exceed 2MB.',

            'status.boolean'      => 'Status must be either active or inactive.',
        ];
    }
}
