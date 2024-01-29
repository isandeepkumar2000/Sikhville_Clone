<?php

namespace App\Models\MusicModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicCategories extends Model
{
    use HasFactory;
    public $table = 'music_description';
    protected $fillable = [
        'name',
    ];
}
