<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class TournamentForm extends Form
{
    public $tournamentId, $tournament, $name_en, $name_bn, $photo, $date, $status = true;
    public $search = '', $rowsPerPage = 20;
    public $teams = [], $teamId = [];

    public function rules()
    {
        return [

            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name_en' => 'required|string|max:200',
            'name_bn' => 'required|string|max:200',
            'date' => 'required|date',
            'teamId'      => 'required|array|min:1',
            'teamId.*'    => 'exists:teams,id',
        ];
    }

    public function messages()
    {
        return [
            'photo.image' => 'The file must be an image.',
            'photo.mimes' => 'Only jpeg, png, jpg or webp images are allowed.',
            'photo.max' => 'Tournament logo size must not exceed 2MB.',

            'name_en.required' => 'Please enter the tournament name (EN).',
            'name_en.string' => 'Tournament name (EN) must be a valid string.',
            'name_en.max' => 'Tournament name (EN) cannot exceed 100 characters.',

            'name_bn.required' => 'Please enter the tournament name (BAN).',
            'name_bn.string' => 'Tournament name (BAN) must be a valid string.',
            'name_bn.max' => 'Tournament name (BAN) cannot exceed 100 characters.',

            'date.required' => 'Please enter the tournament date.',
            'date.date' => 'Please provide a valid date format.',

            // Team ID
            'teamId.required'   => 'Please select at least one team.',
            'teamId.array'      => 'Team selection must be a list.',
            'teamId.min'        => 'You must select at least one team.',
            'teamId.*.exists'   => 'One or more selected teams are invalid.',
        ];
    }
}
