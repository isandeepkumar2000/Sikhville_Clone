<?php

namespace App\Models\MusicModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MusicSong extends Model
{
    use HasFactory;
    public    $table    = 'music_song';
    protected $fillable = [
        "internal_music_link", "sportify", "wynk", "sound_cloud", "youtube", "apple", "amazon", 'uuid', 'musicid', 'song_name', 'song_size', 'song_path', 'song_duration', 'music_composers_by ', 'music_lyrics_by', ' music_artists_name', 'music_song_details_image',
    ];

    public function musicfolderDetails()
    {
        return $this->belongsTo('App\Models\MusicModel\Music', 'musicid', 'id');
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = $model->uuid ?: Str::uuid()->toString();
        });
    }
}
