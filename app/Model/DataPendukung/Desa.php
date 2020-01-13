<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desa';
    protected $guarded = ['desa_id'];
    protected $primaryKey = 'desa_id';
    public $timestamps = false;
}
