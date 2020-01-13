<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    protected $table = 'klasifikasi';
    protected $guarded = ['klasifikasi_id'];
    protected $primaryKey = 'klasifikasi_id';
    const CREATED_AT = 'pembuatan';
    const UPDATED_AT = 'perubahan';
}
