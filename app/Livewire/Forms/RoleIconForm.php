<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RoleIconForm extends Form
{
    public $icon, $name;
    public $search = '';
    public $rowsPerPage = 20;
    public $editMode = null;
    public $isOpen = false;

    public function rules()
    {
        return [
            'icon' => $this->editMode ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024' : 'required|image|mimes:jpg,jpeg,png,webp|max:1024',
            'name' => 'required|string|max:100|unique:role_icons,name,' . $this->editMode,
        ];
    }

    public function messages()
    {
        return [

            'icon.required'  => 'Role icon field is required.',
            'icon.image'     => 'Role icon must be a valid image.',
            'icon.image'     => 'Role icon must be a valid image.',
            'icon.mimes'     => 'Role icon must be a jpg, jpeg, png, or webp file.',
            'icon.max'       => 'Role icon cannot be larger than 1MB.',

            'name.required' => 'Role icon name field is required.',
            'name.string'   => 'Role icon name must be a valid string.',
            'name.max'      => 'Role icon name must not be greater than 50 characters.',
            'name.unique'   => 'This Role icon name already exists. Please choose another.',
        ];
    }
}
