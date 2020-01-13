<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';

    protected $fillable = [	'anggota_id',
                            'anggota_nama', 
    						'jenis_kelamin', 
    						'tanggal_lahir', 
    						'anggota_tipe_id',
    						'alamat', 
    						'provinsi_id',
    						'kabupaten_id',
    						'kecamatan_id',
    						'desa_id',
    						'kode_pos',
    						'telepon',
    						'whatsapp',
    						'facebook',
    						'instagram',
    						'jurusan_id',
    						'kelas_id',
    						'posel',
    						'foto',
    						'katasandi',
    						'konfirmasii',
    						'status_anggota'
    					];

    protected $guarded = ['anggota_id'];
    protected $primaryKey = 'anggota_id';
    const CREATED_AT = 'pembuatan';
    const UPDATED_AT = 'perubahan';
}
