<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function media()
    {
        return $this->belongsTo(Media::class, 'photo', 'id');
    }

    public function players()
    {
        return $this->belongsToMany(Player::class, 'team_player', 'team_id', 'player_id')->withTimestamps();
    }

    public function matches()
    {
        // A team can appear as team1 or team2 — we can union both
        return $this->hasMany(MatchModel::class, 'team1_id')
            ->orWhere('team2_id', $this->id);
    }
}
