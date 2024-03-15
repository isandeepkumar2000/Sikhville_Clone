<?php

namespace App\Models\DynamicPageModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DynamicPage extends Model
{
    use HasFactory;
    public $table = 'dynamic_pages';
    protected $fillable = [
        'slug', 'title', 'body', 'description',
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
