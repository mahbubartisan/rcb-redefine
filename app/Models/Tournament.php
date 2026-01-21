<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tournament extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function media()
    {
        return $this->belongsTo(Media::class, 'photo', 'id');
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'tournament_team', 'tournament_id', 'team_id')->withTimestamps();
    }
}
