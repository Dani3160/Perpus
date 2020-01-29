<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    protected $table = 'novel';
    protected $guarded = ['novel_id'];
    protected $primaryKey = 'novel_id';

    const CREATED_AT = 'pembuatan';
    const UPDATED_AT = 'perubahan';
}
