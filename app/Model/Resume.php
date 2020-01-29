<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $table = 'resume';
    protected $guarded = ['resume_id'];
    protected $primaryKey = 'resume_id';

    const CREATED_AT = 'pembuatan';
    const UPDATED_AT = 'perubahan';
}
