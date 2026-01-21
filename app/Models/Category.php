<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Category extends Model
{
    use HasFactory, LogsActivity;
    
    protected $guarded = [];

    public function categoryPhoto()
    {
        return $this->belongsTo(Media::class, 'mediaId', 'id');
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Category')
            ->setDescriptionForEvent(function (string $eventName) {
                return "Category {$eventName}";
            });
    }
}
