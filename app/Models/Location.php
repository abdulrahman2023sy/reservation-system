<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
public function services()
{
    return $this->hasMany(Service::class);
}


}
