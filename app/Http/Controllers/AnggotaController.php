<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use App\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PDF;

class AnggotaController extends Controller
{
    public function index(){
        $anggotas = Anggota::all();
        return view('backend.anggota.index',compact('anggotas'));
    }

    
    public function create(){
        return view('backend.anggota.create');
    }

    public function store(Request $request){

        // dd($request->all());

        $this->validate($request, [
            'nama' => 'required',
            'nip' => 'required|numeric|digits:16',
            'jenis_kelamin' => 'required',
            'tgl_lahir'=> 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'gambar' => 'mimes:jpeg,png|max:512',
            
        ]);

        
        $anggotas = new User;
        $anggotas->role = 'anggota';
        $anggotas->name = $request->nama;
        $anggotas->email = $request->email;
        $anggotas->password = bcrypt('12345678');
        $anggotas->remember_token = Str::random(50);
        $anggotas->save();

        $request->request->add(['user_id' => $anggotas->id]);
        
        $doct = Anggota::create($request->all());
          // jika ada gambar yang diupload
          if($request->hasFile('gambar')){
            $request->file('gambar')->move('images/',$request->file('gambar')->getClientOriginalName());
            $doct->gambar = $request->file('gambar')->getClientOriginalName();
            $doct->save();
        }
          // jika ada gambar yang diupload
       

        return redirect('/anggota')->with('sukses','Data Profile berhasil diupdate');

    }

    public function edit($id){
        $anggotas = Anggota::findOrFail($id);

      
        if($anggotas->user()->where('id',auth()->user()->id)->first() or auth()->user()->role == 'admin'){
            return view('backend.anggota.edit',compact('anggotas'));
        }
        App::abort(403, 'You Cannot view this project');
        
    }

    public function profile($id){
        
        $anggotas = Anggota::findOrFail($id);
        $users = User::findOrFail($id);
        return view('front.profile',compact('anggotas','users'));
    }

    public function update(Request $request, $id){
       
        // $user = User::find($id);
        // $user->name = $request->name;
        // $user->password = bcrypt($request->password);
        // $user->save();


        // dd($request->all());

        $this->validate($request, [
            'nama' => 'required',
            'nip' => 'required|numeric|digits:16',
            'jenis_kelamin' => 'required',
            'tgl_lahir'=> 'required',
            'gambar' => 'mimes:jpeg,png|max:512',
            
        ]);

        $anggotas = Anggota::find($id);
        $anggotas->nama = $request->nama;
        $anggotas->nip = $request->nip;

        // $anggotas->tgl_lahir = Carbon::createFromFormat('m/d/Y', $request->tgl_lahir)->format('Y-m-d');
        $anggotas->tgl_lahir = $request->tgl_lahir;
        $anggotas->jenis_kelamin = $request->jenis_kelamin;
        $anggotas->alamat = $request->alamat;
        // jika ada gambar yang diupload
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('images/',$request->file('gambar')->getClientOriginalName());
            $anggotas->gambar = $request->file('gambar')->getClientOriginalName();
            $anggotas->save();
        }
        $anggotas->save();


        return redirect()->back()->with('sukses','Data Profile berhasil diupdate');
    }

    public function destroy($id){
        $anggotas = Anggota::find($id);
        $anggotas->delete();
        return redirect()->back()->with('sukses','Data Berhasil dihapus');
    }

    public function cetakkartuanggota($id){
        $anggotas = Anggota::findOrFail($id);
        $customPaper = array(-80,15,400,400);
        return PDF::setOptions(['images' => true, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('backend.anggota.cetak',compact('anggotas'))->setPaper($customPaper, 'potrait')->stream();
        
    }
}
