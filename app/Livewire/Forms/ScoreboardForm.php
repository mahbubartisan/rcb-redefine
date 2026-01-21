<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ScoreboardForm extends Form
{
    public $scoreId, $tournamentId, $matchId, $teamId, $status = true;

    // Batting form
    public $batterId, $runs, $balls, $fours, $sixes, $dismissal, $fielderId;

    // Bowling form
    public $bowlerId, $overs, $maiden, $bowlingRuns, $bowlingWickets, $bowlingNoBalls, $bowlingWides;

    // Extra form
    public $byes = 0, $leg_byes = 0, $wides = 0, $no_balls = 0;

    
    // Wicket form
    public $wicket, $score, $playerOut, $over;

    // Commentary form
    public $over_number, $score_at, $ball_number, $ball_per_run, $description;

    // Match Result form
    public $toss, $team1_score, $team1_played_over, $team2_score, $team2_played_over, $match_result, $player_of_match, $won, $type;

    public $search = '', $rowsPerPage = 20;
    public $tournaments = [], $matches = [], $teams = [];
    public $batting = [], $bowling = [], $wickets = [], $commentary = [];
    public $batters = [], $opponentPlayers = [];
    public $players = [];
}
