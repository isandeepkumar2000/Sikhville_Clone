<?php

namespace App\Models\PunjabiReadingModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Punjabireadingcategories extends Model
{
    use HasFactory;
    public $table = 'punjabi_reading_catagories';
    protected $fillable = [
        'name', 'thumbnail_ishort_image', 'reading_title',
    ];
}
