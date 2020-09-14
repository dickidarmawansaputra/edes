<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use DataTables;

class PendudukController extends Controller
{
    public function index()
    {
    	return view('penduduk.index');
    }

    public function data()
    {
    	$data = Penduduk::all();
    	return Datatables::of($data)
    	    ->addColumn('aksi', function($data) {
    	        return '
    	        <button href="#" class="btn btn-icon btn-primary btn-xs" data-toggle="modal" data-target="#edit" data-id="'.$data->id.'" data-nama="'.$data->nama.'" data-nik="'.$data->nik.'" data-no_kk="'.$data->no_kk.'" data-alamat="'.$data->alamat.'" data-tempat_lahir="'.$data->tempat_lahir.'" data-tgl_lahir="'.$data->tgl_lahir.'" data-agama="'.$data->agama.'" data-jenis_kelamin="'.$data->jenis_kelamin.'" data-status_nikah="'.$data->status_nikah.'" data-pekerjaan="'.$data->pekerjaan.'" data-no_hp="'.$data->no_hp.'"><i class="far fa-edit"></i></button>
                <button href="#" class="btn btn-icon btn-danger btn-xs delete" data-id="'.$data->id.'"><i class="fas fa-trash"></i></button>';
    	    })
    	    ->addIndexColumn()
    	    ->rawColumns(['aksi'])
    	    ->make(true);
    }

    public function store(Request $request)
    {
    	$data = $request->all();
    	Penduduk::create($data);
        session()->flash('store');
    	return redirect()->back();
    }

    public function update(Request $request)
    {
        $data = $request->all();
        Penduduk::find($request->id)->update($data);
        session()->flash('update');
        return redirect()->back();
    }

    public function destroy($id)
    {
    	Penduduk::find($id)->delete();
    	return redirect()->back();
    }
}
