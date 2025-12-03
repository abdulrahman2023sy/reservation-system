<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceVideo extends Model
{
    protected $fillabele = [
        'video_path',
        'service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
