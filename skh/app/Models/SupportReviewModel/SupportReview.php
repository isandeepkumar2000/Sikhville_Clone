<?php

namespace App\Models\SupportReviewModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SupportReview extends Model
{
    use HasFactory;
    public $table = 'support_review';
    protected $fillable = [
        'person_name', 'country_name', 'review_description'
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
