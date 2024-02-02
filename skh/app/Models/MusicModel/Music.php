<?php

namespace App\Models\MusicModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Music extends Model
{
    use HasFactory;

    public $table = 'music';

    protected $fillable = [
        'uuid', 'musicCategoriesid', 'thumbnail_image', 'short_description', 'title', 'featured_music', 'featured_music_Image_Url', 'music_song_details_banner',
    ];

    public function musicCategoryDetails()
    {
        return $this->belongsTo('App\Models\MusicModel\MusicCategories', 'musicCategoriesid', 'id');
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = $model->uuid ?: Str::uuid()->toString();
        });
    }
}
