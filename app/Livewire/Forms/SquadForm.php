<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SquadForm extends Form
{
    public $squadId, $tournamentId, $matchId, $teamId, $playerId, $status = true;
    public $search = '', $rowsPerPage = 20;
    public $tournaments = [], $matches = [], $teams = [], $players = [];

    public function rules()
    {
        return [
            'tournamentId' => 'required|exists:tournaments,id',
            'matchId'      => 'required|exists:matches,id',
            'teamId'       => 'required|exists:teams,id',
            'playerId'     => 'required|array|min:1',
            'playerId.*'   => 'exists:players,id',
        ];
    }

    public function messages()
    {
        return [
            'tournamentId.required' => 'Tournament field is required.',
            'form.tournamentId.exists'   => 'Selected tournament is invalid.',

            'matchId.required' => 'Match field is required.',
            'matchId.exists'   => 'Selected match is invalid.',

            'teamId.required' => 'Team field is required.',
            'teamId.exists'   => 'Selected team is invalid.',

            'playerId.required' => 'At least one player must be selected.',
            'playerId.array'    => 'Player selection must be an array.',
            'playerId.min'      => 'Select at least one player.',
            'playerId.*.exists' => 'One or more selected players are invalid.',
        ];
    }
}
