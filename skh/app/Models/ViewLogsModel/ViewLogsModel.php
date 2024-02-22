<?php

namespace App\Models\ViewLogsModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ViewLogsModel extends Model
{
    use HasFactory;
    public $table = 'view_logs';
    protected $fillable = [
        'ip_address', 'country', 'region', 'content_type', 'content_id',
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
