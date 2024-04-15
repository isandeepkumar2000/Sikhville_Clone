<?php

namespace App\Models\DownloadModel;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadCategories extends Model
{
    use HasFactory;
    public $table = 'download_categories';
    protected $fillable = [
        'name', 'downlord_categories_icons',
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
