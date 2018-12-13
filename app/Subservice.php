<?php

namespace Infinity_Service;

use Illuminate\Database\Eloquent\Model;

class Subservice extends Model
{
    public function services()
    {
        return $this->belongsToMany('Infinity_Service\Service', 'subservice_service', 'subservice_id', 'service_id');
    }
}
