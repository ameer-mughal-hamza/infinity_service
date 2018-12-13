<?php

namespace Infinity_Service;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function subservices()
    {
        return $this->belongsToMany('Infinity_Service\Subservice', 'subservice_service', 'service_id', 'subservice_id');
    }
}
