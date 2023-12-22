<?php

namespace App\Models\ShabdkoshModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shabdkosh extends Model
{
    use HasFactory;
    public $table = 'shabdkosh';
    protected $fillable = [
        'title', 'thumbnail_short_image', 'shabdkosh_video_url', 'short_description', 'short_description',
    ];
}
