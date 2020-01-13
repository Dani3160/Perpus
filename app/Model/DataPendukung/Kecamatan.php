<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $guarded = ['kecamatan_id'];
    protected $primaryKey = 'kecamatan_id';
    public $timestamps = false;
}
