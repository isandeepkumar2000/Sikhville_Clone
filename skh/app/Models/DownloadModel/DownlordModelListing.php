<?php

namespace App\Models\DownloadModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DownlordModelListing extends Model
{
    use HasFactory;
    public $table = "downlord_listing";

    protected $fillable = [
        'image_url', 'title', 'downlord_pdf_link', 'downlord_section_reference',
    ];

    public function DownloadDetailsSection()
    {
        return $this->belongsTo('App\Models\DownloadModel\DownloadCategories', 'downlord_section_reference', 'id');
    }

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
