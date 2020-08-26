<?php

namespace App\Http\Controllers;

use App\Models\DataSurat;
use Illuminate\Http\Request;
use DataTables;

class DataSuratController extends Controller
{
    public function index()
    {
    	return view('datasurat.index');
    }

    public function data()
    {
    	$data = DataSurat::all();
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
    	DataSurat::create($data);
    	toast('Data tersimpan!','success');
    	return redirect()->back();
    }

    public function update(Request $request)
    {
    	$data = $request->all();
    	DataSurat::find($request->id)->update($data);
    	toast('Data tersimpan!','success');
    	return redirect()->back();
    }

    public function destroy($id)
    {
    	DataSurat::find($id)->delete();
    	return redirect()->back();
    }
}
