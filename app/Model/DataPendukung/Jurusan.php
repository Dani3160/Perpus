<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    protected $fillable = ['jurusan_nama'];
    protected $guarded = ['jurusan_id'];
    protected $primaryKey = 'jurusan_id';
    public $timestamps = false;
}
