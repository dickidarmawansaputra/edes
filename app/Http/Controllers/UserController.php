<?php

namespace App\Http\Controllers;

use App\Models\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
    	        <button href="#" class="btn btn-icon btn-primary btn-xs" data-toggle="modal" data-target="#edit" data-id="'.$data->id.'" data-name="'.$data->name.'" data-email="'.$data->email.'" data-photo="'.$data->photo.'" data-photo_file="'.Storage::url($data->photo).'"><i class="far fa-edit"></i></button>
    	        <button href="#" class="btn btn-icon btn-danger btn-xs delete" data-id="'.$data->id.'"><i class="fas fa-trash"></i></button>';
    	    })
    	    ->addIndexColumn()
    	    ->rawColumns(['aksi'])
    	    ->make(true);
    }

    public function store(Request $request)
    {
    	$data = $request->all();
        if ($request->hasFile('photo')) {
            $fileName = $request->photo->getClientOriginalName();
            $path = $request->file('photo')->storeAs('public/user', $fileName);
            $data['photo'] = $path;
        } else {
            $data['photo'] = 'public/user/avatar.png';
        }
        $data['password'] = Hash::make($request->password);
        User::create($data);
        session()->flash('store');
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
        if ($request->hasFile('photo')) {
            $fileName = $request->photo->getClientOriginalName();
            $path = $request->file('photo')->storeAs('public/user', $fileName);
            $data['photo'] = $path;
        } else {
            unset($data['photo']);
        }
        User::find($request->id)->update($data);
        session()->flash('update');
        return redirect()->back();
    }

    public function destroy($id)
    {
    	User::find($id)->delete();
        return redirect()->back();
    }

    public function profile()
    {
        $data = User::where('id', Auth::user()->id)->first();
        return view('user.profile', compact('data'));
    }
}
