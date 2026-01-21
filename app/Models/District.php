<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function thana()
    {
        return $this->hasMany(Thana::class);
    }
}
