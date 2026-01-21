<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class TeamForm extends Form
{
    public $teamId, $team, $name_en, $name_bn, $photo, $status = true;
    public $search = '', $rowsPerPage = 20;
    public $players = [], $playerId = [];

    public function rules()
    {
        return [

            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name_en' => 'required|string|max:200',
            'name_bn' => 'required|string|max:200',
            'playerId'      => 'required|array|min:1',
            'playerId.*'    => 'exists:players,id',
        ];
    }

    public function messages()
    {
        return [
            'photo.image' => 'The file must be an image.',
            'photo.mimes' => 'Only jpeg, png, jpg or webp images are allowed.',
            'photo.max' => 'Team logo size must not exceed 2MB.',

            'name_en.required' => 'Please enter the team name (EN).',
            'name_en.string' => 'Team name (EN) must be a valid string.',
            'name_en.max' => 'Team name (EN) cannot exceed 100 characters.',

            'name_bn.required' => 'Please enter the team name (BAN).',
            'name_bn.string' => 'Team name (BAN) must be a valid string.',
            'name_bn.max' => 'Team name (BAN) cannot exceed 100 characters.',

            // Player ID
            'playerId.required'   => 'Please select at least one player.',
            'playerId.array'      => 'Player selection must be a list.',
            'playerId.min'        => 'You must select at least one player.',
            'playerId.*.exists'   => 'One or more selected players are invalid.',
        ];
    }
}
