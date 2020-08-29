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

    public function store(Request $request)
    {
        $data = $request->all();
        $data['jenis'] = strtoupper($request->jenis);
        Surat::create($data);
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $data['jenis'] = strtoupper($request->jenis);
        Surat::find($request->id)->update($data);
        toast('Data berhasil diedit!','success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Surat::find($id)->delete();
        return redirect()->back();
    }

    // public function index()
    // {
    //     $pdf = PDF::loadView('surat.index')->setPaper('a4', 'portrait')->setWarnings(false);
    //     return $pdf->stream('Surat Pengantar KTP/KK.pdf');
    // }

    // public function data()
    // {
    // 	$data = Surat::all();
    // 	return Datatables::of($data)
    // 	    ->addColumn('aksi', function($data) {
    // 	        return '
    // 	        <a href="#" class="btn btn-info btn-xs"><ion-icon name="create-outline"></ion-icon></a>
    // 	        <a href="#" class="btn btn-danger btn-xs"><ion-icon name="trash-outline"></ion-icon></a>
    // 	        ';
    // 	    })
    // 	    ->addIndexColumn()
    // 	    ->rawColumns(['aksi'])
    // 	    ->make(true);
    // }

    // public function store(Request $request)
    // {
    // 	$data = $request->all();
    // 	Surat::create($data);
    // 	toast('Data tersimpan!','success');
    // 	return redirect()->back();
    // }

    // public function update(Request $request)
    // {
    // 	$data = $request->all();
    // 	Surat::find($request->id)->update($data);
    // 	toast('Data tersimpan!','success');
    // 	return redirect()->back();
    // }

    // public function destroy($id)
    // {
    // 	Surat::find($id)->delete();
    // 	return redirect()->back();
    // }
}
