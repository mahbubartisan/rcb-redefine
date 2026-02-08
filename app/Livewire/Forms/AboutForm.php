<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AboutForm extends Form
{
    public $aboutId, $image, $established_en, $established_bn, $location_en, $location_bn, $player_en, $player_bn, $fan_en, $fan_bn, $contact_en, $contact_bn, $year_en, $year_bn, $description_en, $description_bn;

    public function rules()
    {
        return [

            'image' => $this->aboutId ? 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048' : 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'established_en' => 'required',
            'established_bn' => 'required',
            'location_en' => 'required|string|max:100',
            'location_bn' => 'required|string|max:100',
            'player_en' => 'required',
            'player_bn' => 'required',
            'fan_en' => 'required',
            'fan_bn' => 'required',
            'contact_en' => 'required',
            'contact_bn' => 'required',
            'year_en' => 'required',
            'year_bn' => 'required',
            'description_en' => 'required',
            'description_bn' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Please upload an image.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Only jpeg, png, or jpg images are allowed.',
            'image.max' => 'The image size must not exceed 2MB.',

            'established_en.required' => 'Established EN field is required.',
            // 'established_en.date' => 'Please provide a valid date format.',

            'established_bn.required' => 'Established BN field is required.',
            // 'established_bn.date' => 'Please provide a valid date format.',

            'location_en.required' => 'Please enter the location EN.',
            'location_en.string' => 'Location EN must be a valid string.',
            'location_en.max' => 'Location EN cannot exceed 100 characters.',

            'location_bn.required' => 'Please enter the location BN.',
            'location_bn.string' => 'Location BN must be a valid string.',
            'location_bn.max' => 'Location BN cannot exceed 100 characters.',

            'player_en.required' => 'Please enter the number of players EN.',
            // 'player_en.numeric' => 'Players EN must be a numeric value.',
            // 'player_en.min' => 'Players EN cannot be less than 0.',

            'player_bn.required' => 'Please enter the number of players BN.',
            // 'player_bn.numeric' => 'Players BN must be a numeric value.',
            // 'player_bn.min' => 'Players BN cannot be less than 0.',
            
            'fan_en.required' => 'Please enter the number of fans EN.',
            // 'fan_en.numeric' => 'Fans EN must be a numeric value.',
            // 'fan_en.min' => 'Fans EN cannot be less than 0.',

            'fan_bn.required' => 'Please enter the number of fans BN.',
            // 'fan_bn.numeric' => 'Fans BN must be a numeric value.',
            // 'fan_bn.min' => 'Fans BN cannot be less than 0.',

            'contact_en.required' => 'Contact EN field is required.',
            // 'contact_en.numeric' => 'Contact EN must be a numeric value.',
            // 'contact_en.digits_between' => 'Contact EN number must be between 6 and 11 digits.',

            'contact_bn.required' => 'Contact BN field is required.',
            // 'contact_bn.numeric' => 'Contact BN must be a numeric value.',
            // 'contact_bn.digits_between' => 'Contact BN number must be between 6 and 11 digits.',

            'year_en.required' => 'Year EN field is required.',
            // 'year_en.numeric' => 'Year EN must be a numeric value.',
            // 'year_en.min' => 'Year EN cannot be less than 0.',
            
            'year_bn.required' => 'Year BN field is required.',
            // 'year_bn.numeric' => 'Year BN must be a numeric value.',
            // 'year_bn.min' => 'Year BN cannot be less than 0.',
            
            'description_en.required' => 'Description EN field is required.',
            'description_bn.required' => 'Description BN field is required.',
        ];
    }
}
