<?php

namespace App\Http\Controllers;

use App\Models\DataSurat;
use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    	$surat = DataSurat::count();
    	$penduduk = Penduduk::count();
    	$pengguna = User::count();
    	return view('dashboard.index', compact('surat', 'penduduk', 'pengguna'));
    }
}
