<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';
    protected $guarded = ['kabupaten_id'];
    protected $primaryKey = 'kabupaten_id';
    public $timestamps = false;
}
