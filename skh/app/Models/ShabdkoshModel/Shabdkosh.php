<?php

namespace App\Models\ShabdkoshModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Shabdkosh extends Model
{
    use HasFactory;
    public $table = 'shabdkosh';
    protected $fillable = [
        'title', 'thumbnail_short_image', 'shabdkosh_video_url', 'short_description', 'short_description',
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
