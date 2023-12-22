<?php

namespace App\Models\VideoModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoCategories extends Model
{
    use HasFactory;
    public $table = 'video_categories';

    protected $fillable = [
        'name',
    ];
}
