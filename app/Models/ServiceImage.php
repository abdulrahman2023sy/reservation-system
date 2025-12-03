<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    protected $fillable = [
        'image_path',
        'service_id',
        'is_primary',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
