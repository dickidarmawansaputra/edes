<?php

namespace App\Http\Controllers;

use App\Models\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
    	return view('user.index');
    }

    public function data()
    {
    	$data = User::all();
    	return Datatables::of($data)
    	    ->addColumn('aksi', function($data) {
    	        return '
    	        <button href="#" class="btn btn-icon btn-primary btn-xs" data-toggle="modal" data-target="#edit" data-id="'.$data->id.'" data-name="'.$data->name.'" data-email="'.$data->email.'"><i class="far fa-edit"></i></button>
    	        <button href="#" class="btn btn-icon btn-danger btn-xs delete" data-id="'.$data->id.'"><i class="fas fa-trash"></i></button>';
    	    })
    	    ->addIndexColumn()
    	    ->rawColumns(['aksi'])
    	    ->make(true);
    }

    public function store(Request $request)
    {
    	$data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()->back();
    }

    public function update(Request $request)
    {
	    $data = $request->all();
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }
        User::find($request->id)->update($data);
        toast('Data berhasil diedit!','success');
        return redirect()->back();
    }

    public function destroy($id)
    {
    	User::find($id)->delete();
        return redirect()->back();
    }
}
