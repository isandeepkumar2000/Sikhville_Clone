<?php

namespace App\Models\WebsiteContentModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Websitecontent extends Model
{
    use HasFactory;
    public $table = 'website_content';

    protected $fillable = [
        'title', 'content', 'type'
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
