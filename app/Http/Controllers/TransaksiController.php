<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Buku;
use App\Transaksi;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        $transaksis = Transaksi::orderBy('kode_transaksi', 'DESC')->get();
        // dd($transaksis);
        return view('backend.transaksi.index',compact('transaksis','anggotas','users','bukus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        $transaksis = Transaksi::all();
        return view('backend.transaksi.create',compact('transaksis','anggotas','users','bukus'));
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
            'kode_transaksi' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'buku_id'=> 'required',
            'anggota_id' => 'required',
            
        ]);

        $transaksi = Transaksi::create([
            'kode_transaksi' => $request->kode_transaksi,
                'tgl_pinjam' => $request->tgl_pinjam,
                'tgl_kembali' => $request->tgl_kembali,
                'buku_id' => $request->buku_id,
                'anggota_id' => $request->anggota_id,
                
                'status' => 'pinjam',
        ]);

        $transaksi->buku->where('id', $transaksi->buku_id)
        ->update([
            'jumlah_buku' => ($transaksi->buku->jumlah_buku - 1),
            ]);


        return redirect('/dashboard')->with('sukses','Transaksi berhasil');
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
        //
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
        // mengambil id dari data 
        $transaksi = Transaksi::find($id);
        // mengambil feild tgl_kambali dari table Transaksi
        $tgl_kembalis = $transaksi->tgl_kembali;
        // function mengambil tanggal hari ini
        $date = Carbon::now()->addDays(-1);
        // dd($tgl_kembalis);
        $datetime2 = new Carbon($transaksi->tgl_kembali);
        $datenow =Carbon::now()->addDays(-1);
        $durasi = date_diff($datetime2, $datenow);
        // $datetime2 = strtotime($transaksi->tgl_kembali);
        // $datenow = strtotime(Carbon::now()->addDays(-1));
        // $durasi = ($datetime2 - $datenow) / 86400 ;
        // dd($durasi->days);

        if($tgl_kembalis > $date){
            $transaksi->update([
                'status' => 'kembali',
                'telat' => $durasi->days
                ]);
                // dd($transaksi);
        $transaksi->buku->where('id', $transaksi->buku->id)
                        ->update([
                            'jumlah_buku' => ($transaksi->buku->jumlah_buku + 1),
                            ]);
        }else {
            $transaksi->update([
                'ket' => 'denda',
                    'status' => 'kembali',
                    'telat' => $durasi->days
                    ]);
                    
                // dd($transaksi);
            $transaksi->buku->where('id', $transaksi->buku->id)
                            ->update([
                                'jumlah_buku' => ($transaksi->buku->jumlah_buku + 1),
                                ]);
        }
      


       
        return redirect('/dashboard')->with('sukses','Buku berhasil dikembalikan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return redirect()->back()->with('sukses','Data Berhasil dihapus');
    }

}
