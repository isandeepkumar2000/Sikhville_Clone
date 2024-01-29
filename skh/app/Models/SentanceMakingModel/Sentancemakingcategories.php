<?php

namespace App\Models\SentanceMakingModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentancemakingcategories extends Model
{
    use HasFactory;
    public $table = 'sentance_making_categories';
    protected $fillable = [
        'name',
    ];
}
