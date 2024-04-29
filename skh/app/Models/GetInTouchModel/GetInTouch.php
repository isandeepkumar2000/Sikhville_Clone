<?php

namespace App\Models\GetInTouchModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GetInTouch extends Model
{
    use HasFactory;

    public $table = 'get_in_touch';
    protected $fillable = [
        'name', 'email_id', 'phone_number', 'user_message', 'uuid'
    ];

    protected $casts = [
        'id' => 'string'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = $model->uuid ?: Str::uuid()->toString();
        });
    }
}
