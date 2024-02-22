<?php

namespace App\Models\PunjabiReadingModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Punjabireadingcategories extends Model
{
    use HasFactory;
    public $table = 'punjabi_reading_catagories';
    protected $fillable = [
        'name', 'thumbnail_ishort_image', 'reading_title',
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
