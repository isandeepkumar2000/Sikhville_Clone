<?php

namespace App\Models\DownloadModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    public $table = 'download';

    protected $fillable = [
        'thumbnail_image', 'categoryid', 'short_title', 'downloadpdf_url', 'featured_download',
    ];

    public function downloadcategoryDetails()
    {
        return $this->belongsTo('App\Models\DownloadModel\DownloadCategories', 'categoryid', 'id');
    }
}
