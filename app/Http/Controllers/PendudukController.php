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
    	        <a href="#" class="btn btn-info btn-xs"><ion-icon name="create-outline"></ion-icon></a>
    	        <a href="#" class="btn btn-danger btn-xs"><ion-icon name="trash-outline"></ion-icon></a>
    	        ';
    	    })
    	    ->addIndexColumn()
    	    ->rawColumns(['aksi'])
    	    ->make(true);
    }

    public function store(Request $request)
    {
    	$data = $request->all();
    	Penduduk::create($data);
    	toast('Data tersimpan!','success');
    	return redirect()->back();
    }

    public function update(Request $request)
    {
    	$data = $request->all();
    	Penduduk::find($request->id)->update($data);
    	toast('Data tersimpan!','success');
    	return redirect()->back();
    }

    public function destroy($id)
    {
    	Penduduk::find($id)->delete();
    	return redirect()->back();
    }
}
