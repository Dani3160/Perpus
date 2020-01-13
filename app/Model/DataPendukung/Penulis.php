<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $table = 'penulis';
    protected $guarded = ['penulis_id'];
    protected $primaryKey = 'penulis_id';
    const CREATED_AT = 'pembuatan';
    const UPDATED_AT = 'perubahan';

    public function biblio()
    {
    	return $this->hasOne('App\Model\DataMaster\Biblio');
    }
}
