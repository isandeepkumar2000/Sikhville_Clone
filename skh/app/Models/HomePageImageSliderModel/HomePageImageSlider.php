<?php

namespace App\Models\HomePageImageSliderModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class HomePageImageSlider extends Model
{
    use HasFactory;

    public    $table    = 'homepage_slider_banners';
    protected $fillable = [
        'banner_thumbnail_image', 'youtube_banner_link',
    ];

    protected $casts = [
        'id' => 'string'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = $model->id ?: Str::uuid()->toString();
        });
    }
}
