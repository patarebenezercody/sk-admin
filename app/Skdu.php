<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skdu extends Model
{
    protected $table = 'skdus';
    protected $fillable = ['name', 'nokk','nohp'];
}
