<?php

namespace App\Model\DataMaster;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $guarded = ['anggota_id'];
    protected $primaryKey = 'anggota_id';
    const CREATED_AT = 'pembuatan';
    const UPDATED_AT = 'perubahan';
}
