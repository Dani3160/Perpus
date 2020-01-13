<?php

namespace App\Model\DataPendukung;

use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    protected $table = 'aturan';
    protected $guarded = ['aturan_id'];
    protected $primaryKey = 'aturan_id';
    const CREATED_AT = 'pembuatan';
    const UPDATED_AT = 'perubahan';
}
