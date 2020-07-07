<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Buku;
use App\Transaksi;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
        $transaksi = Transaksi::all();
        $pinjam = Transaksi::where('status','pinjam');
        $kembali = Transaksi::where('status','kembali');
        $denda = Transaksi::where('ket','denda');
        $bukus = Buku::all();
        $rak1 = Buku::where('lokasi','rak1');
        $rak2 = Buku::where('lokasi','rak2');
        $rak3 = Buku::where('lokasi','rak3');
        $anggotas = Anggota::all();
        $l = Anggota::where('jenis_kelamin','L');
        $p = Anggota::where('jenis_kelamin','P');
        return view('backend.laporan.index',compact('l','p','transaksi','kembali','denda','pinjam','bukus','anggotas','rak1','rak2','rak3'));
    }

    public function cetakTransaksi(Request $request){
        $q = Transaksi::query();
        
        if($request->get('status')) 
        {
             if($request->get('status') == 'pinjam') {
                $q->where('status', 'pinjam');
            } else {
                $q->where('status', 'kembali');
            }
        }

        if($request->get('ket')) 
        {
             if($request->get('ket') == 'denda') {
                $q->where('ket', 'denda');
            } else {
                $q->where('ket', 'null');
            }
        }

        if(Auth::user()->role == 'anggota')
        {
            $q->where('anggota_id', Auth::user()->anggota->id);
        }

        $datas = $q->get();

        return PDF::loadview('backend.laporan.transaksi',compact('datas'))->setPaper('legal', 'potrait')->stream();
    }

    public function cetakBuku(Request $request){
        $q = Buku::query();
        
        if($request->get('lokasi')) 
        {
             if($request->get('lokasi') == 'rak1') {
                $q->where('lokasi', 'rak1');
            } elseif($request->get('lokasi') == 'rak2') {
                $q->where('lokasi', 'rak2');
            } else{
                $q->where('lokasi','rak3');
            }
        }

        $datas = $q->get();

        return PDF::loadview('backend.laporan.buku',compact('datas'))->setPaper('legal', 'potrait')->stream();
    }

    public function cetakAnggota(Request $request){
        $q = Anggota::query();
        
        if($request->get('jenis_kelamin')) 
        {
             if($request->get('jenis_kelamin') == 'L') {
                $q->where('jenis_kelamin', 'L');
            } else{
                $q->where('jenis_kelamin','P');
            }
        }

        $datas = $q->get();

        return PDF::loadview('backend.laporan.anggota',compact('datas'))->setPaper('legal', 'potrait')->stream();
    }
   
}
