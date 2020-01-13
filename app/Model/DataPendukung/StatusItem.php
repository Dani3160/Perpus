<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class StatusItem extends Model
{
    protected $table = 'status_item';
    protected $guarded = ['status_item_id'];
    protected $primaryKey = 'status_item_id';
    const CREATED_AT = 'pembuatan';
    const UPDATED_AT = 'perubahan';

    public function biblio()
    {
    	return $this->hasOne('App\Model\DataMaster\Biblio');
    }
}
