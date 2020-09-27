<?php

namespace App\Http\Controllers;

use App\Models\PenanggungJawab;
use DataTables;
use Illuminate\Http\Request;
use Alert;

class PjController extends Controller
{
    public function index()
    {
    	return view('pj.index');
    }

    public function data()
    {
    	$data = PenanggungJawab::all();

        return Datatables::of($data)
            ->addColumn('aksi', function($data) {
                return '
               <button type="button" class="btn btn-icon btn-primary btn-xs" data-toggle="modal" data-target="#edit" data-id="'.$data->id.'" data-nip="'.$data->nip.'" data-jabatan="'.$data->jabatan.'" data-nama="'.$data->nama.'"
               ><i class="far fa-edit"></i></button>
               <button href="#" class="btn btn-icon btn-danger btn-xs delete" data-id="'.$data->id.'"><i class="fas fa-trash"></i></button>';
            })
            ->rawColumns(['aksi'])
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        PenanggungJawab::create($data);
        session()->flash('store');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $data = $request->all();
        PenanggungJawab::find($request->id)->update($data);
        session()->flash('update');
        return redirect()->back();
    }

    public function destroy($id)
    {
        PenanggungJawab::find($id)->delete();
        return redirect()->back();
    }
}
