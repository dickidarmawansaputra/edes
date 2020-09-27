<?php

namespace App\Helpers;

use App\Models\Pengaturan;
use Carbon\Carbon;

class Helper
{
    public static function pengaturan($code)
    {
    	return Pengaturan::where('code', $code)->first();
    }

    public static function formNama($nama)
    {
    	return 25 - strlen($nama);
    }

    public static function formUmur($umur)
    {
    	return 3 - strlen($umur);
    }

    public static function form($kolom, $data)
    {
        return $kolom - strlen($data);
    }

    public static function formTempatLahir($tempat)
    {
    	return 12 - strlen($tempat);
    }

    public static function tanggal($tanggal_lahir)
    {
    	return (string)Carbon::parse($tanggal_lahir)->format('d');
    }

    public static function bulan($tanggal_lahir)
    {
    	return (string)Carbon::parse($tanggal_lahir)->format('m');
    }

    public static function tahun($tanggal_lahir)
    {
    	return (string)Carbon::parse($tanggal_lahir)->format('Y');
    }

    public static function umur($tanggal_lahir)
    {
    	return (string)Carbon::parse($tanggal_lahir)->age;
    }

    public static function jam($waktu)
    {
        return (string)Carbon::parse($waktu)->format('H');
    }

    public static function menit($waktu)
    {
        return (string)Carbon::parse($waktu)->format('i');
    }

    public static function detik($waktu)
    {
        return (string)Carbon::parse($waktu)->format('s');
    }
}
