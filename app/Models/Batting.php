<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Batting extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }

    public function match()
    {
        return $this->belongsTo(MatchModel::class);
    }

    public function batter()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }

    public function fielder()
    {
        return $this->belongsTo(Player::class, 'fielder_id');
    }

    public function bowler()
    {
        return $this->belongsTo(Player::class, 'bowler_id');
    }
}
