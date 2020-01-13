<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class AnggotaTipe extends Model
{
    protected $table = 'anggota_tipe';
    protected $fillable = ['anggota_tipe_nama'];
    protected $guarded = ['anggota_tipe_id'];
    protected $primaryKey = 'anggota_tipe_id';
    const CREATED_AT = 'pembuatan';
    const UPDATED_AT = 'perubahan';
}
