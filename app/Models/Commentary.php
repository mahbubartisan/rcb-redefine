<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentary extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function match()
    {
        return $this->belongsTo(MatchModel::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
