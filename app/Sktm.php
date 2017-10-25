<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sktm extends Model
{
    protected $table = 'sktms';
    protected $fillable = ['name', 'nokk','nohp'];
}
