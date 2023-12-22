<?php

namespace App\Models\MusicModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    public $table = 'music';
    protected $fillable = [
        'musicCategoriesid', 'thumbnail_image', 'short_description', 'title', 'featured_music'
    ];

    public function musicCategoryDetails()
    {
        return $this->belongsTo('App\Models\MusicModel\MusicCategories', 'musicCategoriesid', 'id');
    }
}
