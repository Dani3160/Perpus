<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cerpen extends Model
{
    protected $table = 'cerpen';
    protected $guarded = ['cerpen_id'];
    protected $primaryKey = 'cerpen_id';
}
