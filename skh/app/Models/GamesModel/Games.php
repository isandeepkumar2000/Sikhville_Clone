<?php

namespace App\Models\GamesModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;
    public $table = 'games';
    protected $fillable = [
        'title', 'gameCategoriesid', 'thumbnail_image', 'short_description', 'details', 'top_game', 'featured_game', 'featured_game_Image_Url'
    ];

    public function gamesCategoryDetails()
    {
        return $this->belongsTo('App\Models\GamesModel\GamesCategories', 'gameCategoriesid', 'id');
    }
}
