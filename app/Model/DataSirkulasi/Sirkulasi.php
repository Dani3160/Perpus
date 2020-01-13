<?php

namespace App\Model\DataSirkulasi;

use Illuminate\Database\Eloquent\Model;

class Sirkulasi extends Model
{
    protected $table = 'sirkulasi';
    protected $guarded = ['sirkulasi_id'];
    protected $primaryKey = 'sirkulasi_id';
    
    const CREATED_AT = 'pembuatan';
    const UPDATED_AT = 'perubahan';
}
