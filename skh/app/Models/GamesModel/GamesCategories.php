<?php

namespace App\Models\GamesModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamesCategories extends Model
{
    use HasFactory;
    public $table = 'game_categories';
    protected $fillable = [
        'name', 'games_logo',
    ];
}
