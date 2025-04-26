<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TrRegistrasi extends Model
{
    protected $table = 'tr_registrasi';
    protected $primaryKey = 'id_registrasi';
    protected $keyType = 'string';
    protected $guarded = [];


    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id_registrasi)) {
                $model->id_registrasi = 'REG-' . strtoupper(Str::random(6));
            }
        });
    }

    public function pasien()
    {
        return $this->belongsTo(MsPasien::class, 'mr_pasien', 'mr_pasien');
    }

    public function asuransi()
    {
        return $this->belongsTo(MsAsuransi::class, 'id_asuransi', 'id_asuransi');
    }

    public function pegawai()
    {
        return $this->belongsTo(MsPegawai::class, 'id_pegawai', 'id_pegawai');
    }

    public function ruangPelayanan()
    {
        return $this->belongsTo(MsRuangPelayanan::class, 'id_ruang_pelayanan', 'id_ruang_pelayanan');
    }

    public function tindakan()
    {
        return $this->belongsTo(MsTindakan::class, 'id_tindakan', 'id_tindakan');
    }

    public function transaksi()
    {
        return $this->hasOne(TrTransaksi::class, 'id_registrasi', 'id_registrasi');
    }
}
