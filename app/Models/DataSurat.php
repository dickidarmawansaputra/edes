<?php

namespace App\Models;

// use App\Models\Surat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataSurat extends Model
{
    use SoftDeletes;

    protected $table = 'data_surat';

    protected $fillable = [
    	'nomor_surat',
    	'penduduk_id',
    	'penanggung_jawab_id',
    	'jenis_surat_id',
        'pelapor_id',
        'saksi_satu_id',
        'saksi_dua_id',
        'suami_id',
        'istri_id',
        'tambahan_id',
        'keterangan',
        'jenazah_id',
        'ayah_id',
        'istri_id',
        'nama_istri_terdahulu',
        'nama_suami_terdahulu',
        'kelengkapan_kk',
        'kelengkapan_photo',
        'kelengkapan_akte',
        'kelengkapan_lain',
        'nomor_rt',
        'nomor_rw',
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }

    public function jenisSurat()
    {
        return $this->belongsTo(Surat::class, 'jenis_surat_id');
    }
}
