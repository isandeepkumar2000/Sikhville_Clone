<?php

namespace App\Models\MusicModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicSong extends Model
{
    use HasFactory;
    public $table = 'music_song';
    protected $fillable = [
        'musicid', 'song_name', 'song_size', 'song_path', 'song_duration', 'music_song_details_image',
    ];

    public function musicfolderDetails()
    {
        return $this->belongsTo('App\Models\MusicModel\Music', 'musicid', 'id');
    }
}