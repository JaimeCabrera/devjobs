<?php

namespace App;

use App\Vacant;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //relacion de 1:n categoria:vacantes
    public function vacants()
    {
        return $this->hasMany(Vacant::class);
    }
}
