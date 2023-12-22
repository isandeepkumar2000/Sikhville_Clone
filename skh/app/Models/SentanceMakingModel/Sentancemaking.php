<?php

namespace App\Models\SentanceMakingModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentancemaking extends Model
{
    use HasFactory;
    public $table = 'sentance_making';
    protected $fillable = [
        'sentancemakingCategoriesid', 'video_game_play', 'thumbnail_image', 'sentance_making_vismaad_title', 'short_description',
    ];

    public function sentancemakingCategoryDetails()
    {
        return $this->belongsTo('App\Models\SentanceMakingModel\Sentancemakingcategories', 'sentancemakingCategoriesid', 'id');
    }
}
