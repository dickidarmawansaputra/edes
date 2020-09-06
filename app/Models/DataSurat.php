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
