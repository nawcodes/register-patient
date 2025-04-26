<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrPembayaran extends Model
{
    protected $table = 'tr_pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $guarded = [];
}
