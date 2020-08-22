<?php

namespace App\Http\Controllers;

use App\Warga;
use DataTables;
use Illuminate\Http\Client\redirect;
use Illuminate\Http\Request;


class WargaController extends Controller
{
    public function index()
    {
    	return view('warga.index');
    }
 
    public function data()

    {
        $data = Warga::all();

        return Datatables::of($data)
            ->addColumn('aksi', function($data) {
                return '
                <a href="'.route('warga-edit', $data->id).'" class="btn btn-icon btn-primary btn-sm"><i class="far fa-edit"></i></a>
                <button type="button" class="btn btn-icon btn-danger btn-sm hapus" data-id="'.$data->id.'"><i class="fas fa-trash"></i></button>';
            })
            ->rawColumns(['aksi'])
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Warga::create($data);
        // toast('Data berhasil ditambahkan','success');
        return redirect()->route('warga-index');
    }

    public function edit($id)
    {
        $data = Warga::find($id);
        return view('warga.update', compact('data'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        Warga::find($request->id)->update($data);
        
        // toast('Data berhasil diedit','success');
        return redirect()->route('warga-index');
    }

    public function destroy($id)
    {
        Warga::find($id)->delete();
        return redirect()->back();
    }

}
