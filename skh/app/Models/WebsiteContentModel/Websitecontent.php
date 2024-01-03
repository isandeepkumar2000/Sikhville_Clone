<?php

namespace App\Models\WebsiteContentModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Websitecontent extends Model
{
    use HasFactory;
    public $table = 'website_content';

    protected $fillable = [
        'title', 'content', 'type'
    ];
}
