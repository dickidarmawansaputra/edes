<?php

namespace App\Http\Controllers;

use App\Penanggung_jwb;
use DataTables;
use Illuminate\Http\Request;

class PjController extends Controller
{
    public function index()
    {
    	return view('penanggung_jwb.index');
    }

    public function data()
    {
    	$data = Penanggung_jwb::all();

        return Datatables::of($data)
            ->addColumn('aksi', function($data) {
                return '
               <button type="button" class="btn btn-icon btn-primary btn-sm" data-toggle="modal" data-target="#edit" data-id="'.$data->id.'" data-nip="'.$data->nip.'" data-jabatan="'.$data->jabatan.'" data-nama="'.$data->nama.'"
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
        Penanggung_jwb::create($data);
        // toast('Data berhasil ditambahkan','success');
        return redirect()->route('pj-index');
    }

    // public function edit($id)
    // {
    //     $data = Warga::find($id);
    //     return view('warga.update', compact('data'));
    // }

    public function update(Request $request)
    {
        $data = $request->all();
        Penanggung_jwb::find($request->id)->update($data);
        // toast('Data berhasil diedit','success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Penanggung_jwb::find($id)->delete();
        return redirect()->back();
    }
}
