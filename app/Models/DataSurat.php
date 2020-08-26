<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataSurat extends Model
{
    use SoftDeletes;

    protected $table = 'data_surat';

    protected $fillable = [
    	'penduduk_id',
    	'penanggung_jawab_id',
    	'perihal',
    ];
}
