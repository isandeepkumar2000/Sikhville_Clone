<?php

namespace App\Models\MusicModel;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicCategories extends Model
{
    use HasFactory;
    public $table = 'music_description';
    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'id' => 'string'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = $model->id ?: Str::uuid()->toString();
        });
    }
}
