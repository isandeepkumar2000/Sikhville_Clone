<?php

namespace App\Models\ViewLogsModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewLogsModel extends Model
{
    use HasFactory;
    public $table = 'view_logs';
    protected $fillable = [
        'ip_address', 'country', 'region', 'content_type', 'content_id',
    ];
}
