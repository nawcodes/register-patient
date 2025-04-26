<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MsRuangPelayanan extends Model
{
    protected $table = 'ms_ruang_pelayanan';
    protected $primaryKey = 'id_ruang_pelayanan';
    protected $keyType = 'string';
    protected $guarded = [];
}
