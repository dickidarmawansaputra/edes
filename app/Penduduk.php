<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
     protected $table = "penduduk";
    protected $fillable = [
    						'nik', 
    						'no_kk', 
    						'nama', 
    						'alamat', 
    						'tempat_lahir', 
    						'tgl_lahir', 
    						'status_nikah', 
    						'agama', 
    						'no_hp', 
    						'jenis_kelamin', 
    						'pekerjaan'

						  ];
}
