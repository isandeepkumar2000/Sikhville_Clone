<?php

namespace App\Models\VideoModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Video extends Model
{
    use HasFactory;
    public $table = 'video';

    protected $fillable = [
        'videoCategoriesid',
        'uuid',
        'top_video_slider',
        'top_featured_video_Image_slider',
        'middle_video_slider',
        'middle_featured_video_Image_slider',
        'bottom_video_slider',
        'bottom_featured_video_Image_slider',
        'thumbnail_image',
        'short_description',
        'details',
        'playnow_link',
        'youtube_video_url',
        'move_of_the_year_content',
        'video_release_type',
        'video_singer_details',
        'video_lyrics_details',
        'film_certificate_ratings',
        'video_playback_singer_by',
        'video_quality_in',
        'video_genre_by',
        'video_dimension_type',
        'startquiz_easy',
        'startquiz_hard',
        'downloadpdf_link',
        'video_duration',
        'top_video',
        'highlighting_video_Image',
        'highlighting_second_video_Image',

    ];
    public function videoCategoryDetails()
    {
        return $this->belongsTo('App\Models\VideoModel\VideoCategories', 'videoCategoriesid', 'id');
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = $model->uuid ?: Str::uuid()->toString();
        });
    }
}
