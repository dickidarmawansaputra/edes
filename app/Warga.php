<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = "warga";
    protected $fillable = [
    						'nik', 
    						'no_kk', 
    						'nama', 
    						'alamat', 
    						'tempat_lahir', 
    						'tgl_lahir', 
    						'status_pernikahan', 
    						'agama', 
    						'no_hp', 
    						'j_kel', 
    						'warga_negara', 
    						'pekerjaan'

						  ];

}
