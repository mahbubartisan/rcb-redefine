<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Thana extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
