<?php

namespace App\Helpers;

use App\Models\Pengaturan;

class Helper
{
    public static function pengaturan($code)
    {
    	return Pengaturan::where('code', $code)->first();
    }
}
