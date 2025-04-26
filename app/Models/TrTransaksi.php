<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrTransaksi extends Model
{
    protected $table = 'tr_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $guarded = [];
    protected $casts = [
        'id_tindakan' => 'array',
    ];

    public function registrasi()
    {
        return $this->belongsTo(TrRegistrasi::class, 'id_registrasi', 'id_registrasi');
    }

    public function tindakan()
    {
        return $this->belongsTo(MsTindakan::class, 'id_tindakan', 'id_tindakan');
    }

    public function pegawai()
    {
        return $this->belongsTo(MsPegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
