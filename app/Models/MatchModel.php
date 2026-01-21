<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MatchModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'matches';

    public function tournament()
    {
        return $this->belongsTo(Tournament::class, 'tournament_id');
    }

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }

    public function squads()
    {
        return $this->hasMany(Squad::class, 'match_id', 'id');
    }

    public function battings()
    {
        return $this->hasMany(Batting::class, 'match_id', 'id');
    }

    public function bowlings()
    {
        return $this->hasMany(Bowling::class, 'match_id', 'id');
    }

    public function fallWickets()
    {
        return $this->hasMany(FallWicket::class, 'match_id', 'id');
    }

    public function extras()
    {
        return $this->hasMany(Extra::class, 'match_id', 'id');
    }

    public function commentary()
    {
        return $this->hasMany(Commentary::class, 'match_id', 'id');
    }

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_of_match');
    }

    public function winner()
    {
        return $this->belongsTo(Team::class, 'won');
    }

    public function manOfTheMatch()
    {
        return $this->belongsTo(Player::class, 'player_of_match');
    }
}
