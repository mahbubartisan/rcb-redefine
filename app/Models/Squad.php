<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Squad extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function match()
    {
        return $this->belongsTo(MatchModel::class, 'match_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function players()
    {
        return $this->belongsToMany(Player::class, 'player_squad')->withTimestamps();
    }
}
