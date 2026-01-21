<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function media()
    {
        return $this->belongsTo(Media::class, 'photo', 'id');
    }

    public function icon()
    {
        return $this->belongsTo(RoleIcon::class, 'role_icon', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function thana()
    {
        return $this->belongsTo(Thana::class);
    }

    public function squads()
    {
        return $this->belongsToMany(Squad::class, 'player_squad', 'player_id', 'squad_id');
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_player', 'player_id', 'team_id');
    }

    public function battingStats()
    {
        return $this->hasMany(Batting::class, 'player_id', 'id');
    }

    public function bowlingStats()
    {
        return $this->hasMany(Bowling::class, 'player_id', 'id');
    }

    public function fieldingStats()
    {
        return $this->hasMany(Batting::class, 'fielder_id', 'id');
    }

    // public function matches()
    // {
    //     return $this->belongsToMany(MatchModel::class, 'match_players', 'player_id', 'match_id');
    // }
}
