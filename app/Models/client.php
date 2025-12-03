<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    function visites(){
        return $this->hasMany(visite::class);
    }
}
