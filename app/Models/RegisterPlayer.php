<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegisterPlayer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function media()
    {
        return $this->belongsTo(Media::class, 'photo', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function thana()
    {
        return $this->belongsTo(Thana::class);
    }
}
