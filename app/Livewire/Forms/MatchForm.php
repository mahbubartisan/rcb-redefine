<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MatchForm extends Form
{
    public $matchId, $name, $venue, $date_time, $tournamentId, $team1Id, $team2Id, $match_info, $status = true;
    public $search = '', $rowsPerPage = 20;
    public $tournaments = [], $teams = [];

    public function rules()
    {
        return [

            'name' => 'required|string|max:200',
            'venue' => 'required|string|max:200',
            'date_time' => 'required|date',
            'tournamentId'    => 'required|exists:tournaments,id',
            'team1Id'    => 'required|exists:teams,id',
            'team2Id'    => 'required|exists:teams,id',
        ];
    }

    public function messages()
    {
        return [
          
            'name.required' => 'Please enter the match name.',
            'name.string' => 'Match name must be a valid string.',
            'name.max' => 'Match name cannot exceed 100 characters.',

            'venue.required' => 'Please enter the match venue name.',
            'venue.string' => 'Venue name must be a valid string.',
            'venue.max' => 'Venue name cannot exceed 100 characters.',

            'date_time.required' => 'Please enter the match date & time.',
            'date_time.date' => 'Please provide a valid date & time format.',

            // Tournament ID
            'tournamentId.required'   => 'Please select a tournament.',
            'tournamentId.exists'   => 'Selected tournament is invalid.',

            // Team 1 ID
            'team1Id.required'   => 'Please select a team.',
            'team1Id.exists'   => 'Selected team is invalid.',

            // Team 2 ID
            'team2Id.required'   => 'Please select a team.',
            'team2Id.exists'   => 'Selected team is invalid.',
        ];
    }
}
