<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penduduk extends Model
{
    use SoftDeletes;

    protected $table = 'penduduk';

    protected $fillable = [
    	'nik',
    	'no_kk',
    	'nama',
    	'alamat',
    	'tempat_lahir',
    	'tgl_lahir',
    	'agama',
    	'jenis_kelamin',
    	'status_nikah',
    	'pekerjaan',
    	'no_hp',
    ];
}
