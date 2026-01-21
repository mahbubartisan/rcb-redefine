<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PlayerRegistrationForm extends Form
{
    public $regId, $search = '', $rowsPerPage = 20;
    public $photo, $full_name, $email, $phone, $dob, $role, $jersey_no;
    public $present_village, $present_district, $present_thana, $present_post_office;
    public $permanent_village, $permanent_district, $permanent_thana, $permanent_post_office;
    public $nationality, $religion, $blood_group, $height, $permanent_email, $facebook_id;
    public $sameAsPresent = false;

    public $districts  = [];
    public $thanas = [];


    public function rules()
    {

        return [
            'photo'               => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'full_name'           => 'required|string|max:200',
            'email'               => 'required|email|unique:register_players,email',
            'phone'               => 'required|numeric',
            'dob'                 => 'required|date',
            'role'                => 'required|string',
            'jersey_no'           => 'required|string',

            'present_village'     => 'required|string|max:200',
            'present_district'    => 'required|exists:districts,name',
            'present_thana'       => 'required|string|max:100',
            'present_post_office' => 'required|string|max:100',

            'permanent_village'   => 'nullable|string|max:150',
            'permanent_district'  => 'nullable|exists:districts,name',
            'permanent_thana'     => 'nullable|string|max:100',
            'permanent_post_office' => 'nullable|string|max:100',

            'nationality'         => 'nullable',
            'religion'            => 'required|string',
            'blood_group'         => 'required|string',
            'height'              => 'required|string|max:20',
            'facebook_id'         => 'nullable|string|max:150',
        ];
    }

    public function messages()
    {
        return [

            'photo.image'     => 'Player image must be a valid image.',
            'photo.mimes'     => 'Player image must be a jpg, jpeg, png, or webp file.',
            'photo.max'       => 'Player image cannot be larger than 2MB.',

            'fullname.required'      => 'Full name field is required.',
            'fullname.max'           => 'Full name cannot exceed 200 characters.',

            'email.required'         => 'Email field is required.',
            'email.email'            => 'Please enter a valid email address.',
            'email.unique'           => 'This email is already registered.',

            'phone.required'         => 'Phone number field is required.',
            'phone.numeric'          => 'Phone number must be digits only.',

            'dob.required' => 'Please enter your date of birth.',
            'dob.date'     => 'The date of birth must be a valid date.',

            'role.required' => 'Playing role field is required.',

            'present_village.required' => 'Village field is required.',
            'present_village.max'      => 'Village cannot exceed 100 characters.',

            'present_district.required' => 'District field is required.',
            'present_district.exists' => 'The selected district is invalid.',

            'present_thana.required'   => 'Thana field is required.',

            'present_post_office.required' => 'Post office name is required.',
            'present_post_office.string'   => 'Post office must be a valid text.',
            'present_post_office.max'      => 'Post office name cannot exceed 100 characters.',
            
            'religion.required'      => 'Please select your religion.',

            'blood_group.required'   => 'Please select your blood group.',

            'height.required'        => 'Height field is required.',
        ];
    }


    // protected $messages = [
    //     'fullname.required'      => 'Full name field is required.',
    //     'email.required'         => 'Email field is required.',
    //     'email.email'            => 'Please enter a valid email address.',
    //     'email.unique'           => 'This email is already registered.',
    //     'phone.required'         => 'Phone number field is required.',
    //     'phone.numeric'          => 'Phone number must be digits only.',
    //     'dob.required'           => 'Date of birth field is required.',
    //     'role.required'          => 'Playing role field is required.',

    //     'village.required'       => 'Village field is required.',
    //     'district.required'      => 'District field is required.',
    //     'thana.required'         => 'Thana field is required.',
    //     'postal_code.required'   => 'Post Office field is required.',

    //     'nationality.required'   => 'Nationality field is required.',
    //     'religion.required'      => 'Religion field is required.',
    //     'blood_group.required'   => 'Blood group field is required.',
    //     'height.required'        => 'Height is required.',
    // ];
}
