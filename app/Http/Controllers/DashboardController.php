<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Buku;
use App\Transaksi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        
        $transaksi = Transaksi::all();
        $transaksis = Transaksi::where('status','pinjam');
        $bukus = Buku::all();
        $anggotas = Anggota::all();
      
        if(Auth::user()->role == 'anggota')
        {
            $datas = Transaksi::where('status', 'pinjam')
                                ->where('anggota_id', Auth::user()->anggota->id)
                                ->get();
        } else {
            $datas = Transaksi::where('status', 'pinjam')->get();
        }
        
        return view('backend.dashboard.index',compact('anggotas','bukus','transaksis','transaksi','datas'));
    }

}
