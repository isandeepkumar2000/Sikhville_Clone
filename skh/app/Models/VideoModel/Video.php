<?php

namespace App\Models\VideoModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    public $table = 'video';

    protected $fillable = [
        'videoCategoriesid', 'thumbnail_image', 'short_description', 'details', 'youtube_video_url', 'donating_link', 'playnow_link', 'startquiz_easy', 'startquiz_hard', 'downlordpdf_link', 'featured_video_Image_Url',  'featured_video',   'top_video',
    ];
    public function videoCategoryDetails()
    {
        return $this->belongsTo('App\Models\VideoModel\VideoCategories', 'videoCategoriesid', 'id');
    }
}
