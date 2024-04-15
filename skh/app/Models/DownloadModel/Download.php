<?php

namespace App\Models\DownloadModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Download extends Model
{
    use HasFactory;
    public $table = 'download';

    protected $fillable = [
        'thumbnail_image', 'categoryid', 'short_title', 'downloadpdf_url', 'featured_download', 'featured_download_Image_Url',
    ];

    public function downloadcategoryDetails()
    {
        return $this->belongsTo('App\Models\DownloadModel\DownloadCategories', 'categoryid', 'id');
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = $model->uuid ?: Str::uuid()->toString();
        });
    }
}
