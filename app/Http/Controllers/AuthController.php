<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auths.login');
    }

    public function postlogin(Request $request){
       if(Auth::attempt($request->only('email','password'))){
           return redirect('/dashboard')->with('sukses','Berhasil Login');
       }
       return redirect()->back()->with('error','email atau password salah');
        
    }

    public function gantipassword($id){
        $users = User::findOrFail($id);
        return view('auths.gantipassword',compact('users'));
    }

    public function postpassword(Request $request, $id){

        $this->validate($request, [
           
            'password' => 'required|min:8',
            'new_password' => 'min:8|different:password', 
        ]);
        $data = $request->all();
        // dd($data);
        $user = auth()->user();
        if (!Hash::check($data['password'], $user->password)) {
            return back()->with('error','Password lama salah');
        } else {
            // write code to update password

            $user->update([
               
                'password' => bcrypt($request->new_password),
            ]);
            return redirect('/dashboard');
        }

    }

    public function logout(){
        
        Auth::logout();
        return redirect('/');
        
    }
}
