<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = 'penerbit';
    protected $guarded = ['penerbit_id'];
    protected $primaryKey = 'penerbit_id';
    const CREATED_AT = 'pembuatan';
    const UPDATED_AT = 'perubahan';

    public function biblio()
    {
    	return $this->hasOne('App\Model\DataMaster\Biblio');
    }
}
