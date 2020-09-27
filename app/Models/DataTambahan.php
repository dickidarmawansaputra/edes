<?php

namespace App\Models;

// use App\Models\Surat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataTambahan extends Model
{
    use SoftDeletes;

    protected $table = 'data_tambahan';

    protected $fillable = [
    	'nama_anak',
    	'jensi_kelamin',
    	'tempat_dilahirkan',
        'tempat_lahir',
    	'hari_tgl_lahir',
        'pukul',
        'jenis_kelahiran',
        'kelahiran_ke',
        'penolong_kelahiran',
        'berat_bayi',
        'anak_ke',
        'tgl_kematian',
        'jam_kematian',
        'sebab_kematian',
        'tempat_kematian',
        'menerangkan',
        'suami_istri_terdahulu',
    ];

}
