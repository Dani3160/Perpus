<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    protected $guarded = ['provinsi_id'];
    protected $primaryKey = 'provinsi_id';
    public $timestamps = false;
}
