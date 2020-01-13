<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    protected $table = 'pengaturan';
    protected $guarded = ['pengaturan_id'];
    protected $primaryKey = 'pengaturan_id';
    public $timestamps = false;
}
