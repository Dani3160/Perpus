<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class TipeKoleksi extends Model
{
    protected $table = 'tipekoleksi';
    protected $guarded = ['tipekoleksi_id'];
    protected $primaryKey = 'tipekoleksi_id';
    const CREATED_AT = 'pembuatan';
    const UPDATED_AT = 'perubahan';
}
