<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $guarded = ['kelas_id'];
    protected $primaryKey = 'kelas_id';
    public $timestamps = false;
}
