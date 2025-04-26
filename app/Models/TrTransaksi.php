<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class TrTransaksi extends Model
{
    protected $table = 'tr_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $keyType = 'string';
    protected $guarded = [];
    protected $casts = [
        'id_tindakan' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id_transaksi)) {
                $model->id_transaksi = 'TRX-' . strtoupper(Str::random(6));
            }
        });
    }

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

    public function getPasienAttribute()
    {
        return $this->registrasi->pasien;
    }
}
