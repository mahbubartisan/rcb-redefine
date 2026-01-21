<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PlayerForm extends Form
{
    public $playerId, $player, $status = true;
    public $search = '';
    public $rowsPerPage = 20;

    // Name
    public $first_name_en, $first_name_bn, $last_name_en, $last_name_bn;

    // Address
    public $district_id, $thana_id, $post_office, $village;

    // Personal Info
    public $religion, $blood_group, $dob, $nationality_en, $nationality_bn;

    // Cricket Info
    public $playing_role, $batting_style, $bowling_style, $debut, $player_tag;

    // Media
    public $role_icon, $photo;

    // Description
    public $description_en, $description_bn;

    // Dropdowns
    public $districts = [], $thanas = [];

    public function rules()
    {
        return [
            'first_name_en'     => 'nullable|string|max:100',
            'first_name_bn'     => 'nullable|string|max:100',
            'last_name_en'      => 'nullable|string|max:100',
            'last_name_bn'      => 'nullable|string|max:100',
            'district_id'       => 'nullable|exists:districts,id',
            'thana_id'          => 'nullable|exists:thanas,id',
            'post_office'       => 'nullable|string|max:100',
            'village'           => 'nullable|string|max:200',
            'religion'          => 'nullable|string',
            'blood_group'       => 'nullable|string',
            'dob'               => 'nullable|date',
            'playing_role'      => 'nullable|string',
            'batting_style'     => 'nullable|string',
            'bowling_style'     => 'nullable|string',
            'nationality_en'    => 'nullable|string|max:100',
            'nationality_bn'    => 'nullable|string|max:100',
            'debut'             => 'nullable|date',
            'player_tag'        => 'nullable|string|max:50',
            'role_icon'         => 'nullable',
            'photo'             => 'nullable|image|mimes:avif,webp|max:1024',
            'description_en'    => 'nullable|string',
            'description_bn'    => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [

            'first_name_en.max'     => 'First Name (EN) cannot exceed 100 characters.',
            'first_name_bn.max'     => 'First Name (BAN) cannot exceed 100 characters.',

            'last_name_en.max'  => 'Last Name (EN) cannot exceed 100 characters.',
            'last_name_bn.max'  => 'Last Name (BAN) cannot exceed 100 characters.',

            // 'district_id.required'   => 'Please select a district.',
            'district_id.exists'     => 'Selected district is invalid.',

            // 'thana_id.required'      => 'Please select a thana.',
            'thana_id.exists'        => 'Selected thana is invalid.',

            // 'post_office.required'   => 'Post office name is required.',
            'post_office.max'        => 'Post office name cannot exceed 100 characters.',

            // 'village.required'       => 'Please enter village name.',
            'village.max'            => 'Village name cannot exceed 200 characters.',

            // 'religion.required'      => 'Please select a religion.',

            // 'blood_group.required'   => 'Please select a blood group',

            // 'dob.required'           => 'Please enter date of birth.',
            'dob.date'               => 'Date of birth must be a valid date.',

            // 'playing_role.required'   => 'Please select a playing role.',


            // 'description_en.required'     => 'Description (EN) is required.',
            // 'description_bn.required'     => 'Description (BAN) is required.',

            'debut.date'             => 'Debut must be a valid date.',

            'player_tag.max'         => 'Player tag cannot exceed 50 characters.',

            // 'role_icon.image'     => 'Role icon must be a valid image.',
            // 'role_icon.mimes'     => 'Role icon must be a jpg, jpeg, png, or webp file.',
            // 'role_icon.max'       => 'Role icon cannot be larger than 1MB.',

            'player_image.image'     => 'Player image must be a valid image.',
            'player_image.mimes'     => 'Player image must be a jpg, jpeg, png, or webp file.',
            'player_image.max'       => 'Player image cannot be larger than 1MB.',
        ];
    }
}
