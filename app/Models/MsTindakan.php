<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MsTindakan extends Model
{
    protected $table = 'ms_tindakan';
    protected $primaryKey = 'id_tindakan';
    protected $keyType = 'string';
    protected $guarded = [];
}
