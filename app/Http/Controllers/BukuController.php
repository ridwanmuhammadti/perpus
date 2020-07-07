<?php

namespace App\Http\Controllers;

use PDF;
use App\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukus = Buku::all();
        return view('backend.buku.index',compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());

        $this->validate($request, [
            'judul' => 'required|unique:buku',
            'isbn' => 'required|numeric',
            'pengarang' => 'required',
            'penerbit'=> 'required',
            'tahun_terbit' => 'required',
            'jumlah_buku' => 'required|numeric',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'cover' => 'required|mimes:jpeg,png|max:512',
            
        ]);


        $bukus = Buku::create($request->all());
       
        // jika ada gambar yang diupload
        if($request->hasFile('cover')){
          $request->file('cover')->move('images/',$request->file('cover')->getClientOriginalName());
          $bukus->cover = $request->file('cover')->getClientOriginalName();
          $bukus->save();
      }

      return redirect('/buku')->with('sukses','Data Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bukus = Buku::find($id);
        return view('backend.buku.edit',compact('bukus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          // dd($request->all());

          $this->validate($request, [
            'judul' => 'required',
            'isbn' => 'required|numeric',
            'pengarang' => 'required',
            'penerbit'=> 'required',
            'tahun_terbit' => 'required|numeric',
            'jumlah_buku' => 'required|numeric',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'cover' => 'mimes:jpeg,png|max:512',
            
        ]);


        $bukus = Buku::find($id)->update($request->all());
       
        // jika ada gambar yang diupload
        if($request->hasFile('cover')){
          $request->file('cover')->move('images/',$request->file('cover')->getClientOriginalName());
          $bukus->cover = $request->file('cover')->getClientOriginalName();
          $bukus->save();
      }

      return redirect()->back()->with('sukses','Data Buku berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $anggotas =Buku::find($id);
        $anggotas->delete();
        return redirect()->back()->with('sukses','Data Berhasil dihapus');
    }

    public function cetakbuku($id){
        $bukus = Buku::find($id);
        // $customPaper = array(-80,15,400,400);
        return PDF::setOptions(['images' => true, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('backend.buku.cetak',compact('bukus'))->setPaper('legal', 'potrait')->stream();
        
    }
}
