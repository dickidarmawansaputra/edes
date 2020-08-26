<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penanggung_jwb extends Model
{
    protected $table = "penanggung_jawab";
    protected $fillable = [
    						'nip', 
    						'nama', 
    						'jabatan', 
    						'ttd'
						  ];
}
