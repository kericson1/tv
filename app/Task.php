<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   
    protected $guard = [];

    protected $fillable = [
        'name',
    ];
}
