<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class VideoForm extends Form
{
    public $video_code, $image, $status = true;
    public $editMode = null;
    public $isOpen = false;
    public $search = '';
    public $rowsPerPage = 20;

    public function rules()
    {
        return [
            'video_code'  => 'required|max:100',
            'image'       => $this->editMode ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048' : 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'video_code.required'  => 'Video Code field is required.',
            'video_code.max'       => 'Video Code may not be greater than 100 characters.',

            'image.required'     => 'Please upload an image.',
            'image.image'        => 'The file must be an image.',
            'image.mimes'        => 'Only jpg, jpeg, png, and webp formats are allowed.',
            'image.max'          => 'Image size may not be greater than 2MB.',
        ];
    }
}
