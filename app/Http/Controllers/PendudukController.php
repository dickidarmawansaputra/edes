<?php

namespace App\Http\Controllers;

use App\Penduduk;
use DataTables;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
    	return view('warga.index');
    }

    public function data()
    {
    	$data = Penduduk::all();

        return Datatables::of($data)
            ->addColumn('aksi', function($data) {
                return '
                <button type="button" class="btn btn-icon btn-primary btn-sm" data-toggle="modal" data-target="#view" data-id="'.$data->id.'" data-nik="'.$data->nik.'" data-no_kk="'.$data->no_kk.'" data-nama="'.$data->nama.'" data-tempat_lahir="'.$data->tempat_lahir.'" data-tgl_lahir="'.$data->tgl_lahir.'" data-alamat="'.$data->alamat.'" data-jenis_kelamin="'.$data->jenis_kelamin.'" data-pekerjaan="'.$data->pekerjaan.'" data-agama="'.$data->agama.'" data-status_nikah="'.$data->status_nikah.'" data-no_hp="'.$data->no_hp.'" data-tgl_lahir="'.$data->tgl_lahir.'"
               ><i class="far fa-eye"></i></button>
               <button type="button" class="btn btn-icon btn-primary btn-sm" data-toggle="modal" data-target="#edit" data-id="'.$data->id.'" data-nik="'.$data->nik.'" data-no_kk="'.$data->no_kk.'" data-nama="'.$data->nama.'" data-tempat_lahir="'.$data->tempat_lahir.'" data-tgl_lahir="'.$data->tgl_lahir.'" data-alamat="'.$data->alamat.'" data-jenis_kelamin="'.$data->jenis_kelamin.'" data-pekerjaan="'.$data->pekerjaan.'" data-agama="'.$data->agama.'" data-status_nikah="'.$data->status_nikah.'" data-no_hp="'.$data->no_hp.'" data-tgl_lahir="'.$data->tgl_lahir.'"
               ><i class="far fa-edit"></i></button>
                <button type="button" class="btn btn-icon btn-danger btn-sm hapus" data-id="'.$data->id.'"><i class="fas fa-trash"></i></button>';
            })
            ->rawColumns(['aksi'])
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Penduduk::create($data);
        // toast('Data berhasil ditambahkan','success');
        return redirect()->route('Penduduk-index');
    }

    // public function edit($id)
    // {
    //     $data = Warga::find($id);
    //     return view('warga.update', compact('data'));
    // }

    public function update(Request $request)
    {
        $data = $request->all();
        Penduduk::find($request->id)->update($data);
        // toast('Data berhasil diedit','success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Penduduk::find($id)->delete();
        return redirect()->back();
    }
}
