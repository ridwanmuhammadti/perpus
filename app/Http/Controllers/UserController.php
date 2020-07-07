<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('backend.user.index',compact('users'));
    }

    public function edit($id){
        $users = User::find($id);
        return view('backend.user.edit',compact('users'));
    }

    public function update(Request $request, $id){
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->save();
        return redirect('/user')->with('sukses','Data User berhasil di update');
    }

    public function destroy($id){
        $users = User::find($id);
        $users->delete();
        return back()->with('sukses','Data berhasil dihapus');
    }
}
