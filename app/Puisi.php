<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puisi extends Model
{
    protected $table = 'puisi';
    protected $guarded = ['puisi_id'];
    protected $primaryKey = 'puisi_id';
}
