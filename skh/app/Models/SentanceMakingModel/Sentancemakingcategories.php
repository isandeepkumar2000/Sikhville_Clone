<?php

namespace App\Models\SentanceMakingModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sentancemakingcategories extends Model
{
    use HasFactory;
    public $table = 'sentance_making';
    protected $fillable = [
        'name', 'game_play_link', 'thumbnail_image', 'long_description' ,'short_description'
    ];

    protected $casts = [
        'id' => 'string'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = $model->uuid ?: Str::uuid()->toString();
        });
    }
}
