<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    //
    protected $fillable = ['name','email','cv','vacant_id'];
}
