<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class NewsForm extends Form
{
    public $newsId, $title_en, $title_bn, $date, $image, $desc_en, $desc_bn, $status = true;
    public $search = '';
    public $rowsPerPage = 20;

    public function rules()
    {
        return [
            'title_en'  => 'required|string|max:255',
            'title_bn' => 'required|string|max:255',
            'date'      => 'required|date',
            'image'       => $this->newsId ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048' : 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'desc_en'   => 'required|string',
            'desc_bn'  => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title_en.required'  => 'English title field is required.',
            'title_en.string'    => 'English title must be a valid text.',
            'title_en.max'       => 'English title may not be greater than 255 characters.',

            'title_bn.required' => 'Bangla title field is required.',
            'title_bn.string'   => 'Bangla title must be a valid text.',
            'title_bn.max'      => 'Bangla title may not be greater than 255 characters.',

            'date.required'      => 'Date field is required.',
            'date.date'          => 'Please provide a valid date.',

            'image.required'     => 'Please upload an image.',
            'image.image'        => 'The file must be an image.',
            'image.mimes'        => 'Only jpg, jpeg, png, and webp formats are allowed.',
            'image.max'          => 'Image size may not be greater than 2MB.',

            'desc_en.required'   => 'English description is required.',
            'desc_en.string'     => 'English description must be valid text.',

            'desc_bn.required'  => 'Bangla description is required.',
            'desc_bn.string'    => 'Bangla description must be valid text.',
        ];
    }
}
