<?php

namespace App\Models\HomePageImageSliderModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageImageSlider extends Model
{
    use HasFactory;

    public    $table    = 'homepage_slider_banners';
    protected $fillable = [
        'banner_thumbnail_image', 'youtube_banner_link',
    ];
}
