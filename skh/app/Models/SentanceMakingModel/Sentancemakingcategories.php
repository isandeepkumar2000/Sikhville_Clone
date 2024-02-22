<?php

namespace App\Models\SentanceMakingModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sentancemakingcategories extends Model
{
    use HasFactory;
    public $table = 'sentance_making_categories';
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
