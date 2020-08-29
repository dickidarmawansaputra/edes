<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
    	return view('pengaturan.index');
    }

    public function pengaturan(Request $request)
    {
    	if (isset($request->kabupaten)) {
    		Pengaturan::where('code', $request->kabupaten_code)->update(['value' => $request->kabupaten]);
    	}

    	if (isset($request->kecamatan)) {
    		Pengaturan::where('code', $request->kecamatan_code)->update(['value' => $request->kecamatan]);
    	}

    	if (isset($request->desa)) {
    		Pengaturan::where('code', $request->desa_code)->update(['value' => $request->desa]);
    	}

    	if (isset($request->alamat)) {
    		Pengaturan::where('code', $request->alamat_code)->update(['value' => $request->alamat]);
    	}

    	if (isset($request->logo)) {
    		if ($request->hasFile('logo')) {
	    		$fileName = $request->logo->getClientOriginalName();
	    		$path = $request->file('logo')->storeAs('public/pengaturan', $fileName);
	    		Pengaturan::where('code', $request->logo_code)->update(['value' => $path]);
    		}
    	}

    	return redirect()->back();
    }
}
