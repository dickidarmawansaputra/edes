<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use DataTables;
use Illuminate\Http\Request;
use PDF;

class SuratController extends Controller
{
    public function index()
    {
        return view('surat.index');
    }

    public function data()
    {
        $data = Surat::all();
        return Datatables::of($data)
            ->addColumn('aksi', function($data) {
                return '
                <button href="#" class="btn btn-icon btn-primary btn-xs" data-toggle="modal" data-target="#edit" data-id="'.$data->id.'" data-jenis="'.$data->jenis.'"><i class="far fa-edit"></i></button>';
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }

    // public function store(Request $request)
    // {
    //     $data = $request->all();
    //     $data['jenis'] = strtoupper($request->jenis);
    //     Surat::create($data);
    //     session()->flash('store');
    //     return redirect()->back();
    // }

    public function update(Request $request)
    {
        $data = $request->all();
        $data['jenis'] = strtoupper($request->jenis);
        Surat::find($request->id)->update($data);
        session()->flash('update');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Surat::find($id)->delete();
        return redirect()->back();
    }
}
