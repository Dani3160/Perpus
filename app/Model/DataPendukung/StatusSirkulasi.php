<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class StatusSirkulasi extends Model
{
    protected $table = 'status_sirkulasi';
    protected $guarded = ['status_sirkulasi_id'];
    protected $primaryKey = 'status_sirkulasi_id';
    
    const CREATED_AT = 'pembuatan';
    const UPDATED_AT = 'perubahan';
}
