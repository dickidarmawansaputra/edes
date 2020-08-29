<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenanggungJawab extends Model
{
	use SoftDeletes;
	
    protected $table = "penanggung_jawab";

    protected $fillable = [
		'nip', 
		'nama', 
		'jabatan', 
	];
}
