<?php

namespace App\Model\DataMaster;

use Illuminate\Database\Eloquent\Model;

class Biblio extends Model
{
    protected $table = 'biblio';
    protected $guarded = ['biblio_id'];
    protected $primaryKey = 'biblio_id';
    const CREATED_AT = 'pembuatan';
    const UPDATED_AT = 'perubahan';

    public function penerbit()
    {
    	return $this->belongsTo('App\Model\DataPendukung\Penerbit');
    }
    public function penulis()
    {
    	return $this->belongsTo('App\Model\DataPendukung\Penulis');
    }
    public function status_item()
    {
    	return $this->belongsTo('App\Model\DataPendukung\StatusItem');
    }
}


