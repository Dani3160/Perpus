<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class SumberItem extends Model
{
    protected $table = 'sumber_item';
    protected $guarded = ['sumber_item_id'];
    protected $primaryKey = 'sumber_item_id';
    const CREATED_AT = 'pembuatan';
    const UPDATED_AT = 'perubahan';

    public function biblio()
    {
    	return $this->hasOne('App\Model\DataMaster\Biblio');
    }
}
