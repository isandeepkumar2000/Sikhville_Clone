<?php

namespace App\Models\DownloadModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadCategories extends Model
{
    use HasFactory;
    public $table = 'download_categories';

    protected $fillable = [
        'name', 'downlord_categories_icons',
    ];
}
