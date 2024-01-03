<?php

namespace App\Models\PunjabiReadingModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Punjabireading extends Model
{
    use HasFactory;

    public $table = 'punjabi_reading';
    protected $fillable = [
        'punjabireadingCategoriesid', 'thumbnail_big_image', 'reading_summary_pdf', 'reading_video_url', 'featured_punabi_reading',
    ];

    public function PunjabireadingCategoryDetails()
    {
        return $this->belongsTo('App\Models\PunjabiReadingModel\Punjabireadingcategories', 'punjabireadingCategoriesid', 'id');
    }
}
