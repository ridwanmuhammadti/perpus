<?php

use App\Transaksi;
use Illuminate\Support\Facades\DB;

function kodetransaksi(){

    $kode = DB::table('transaksi')->max('kode_transaksi');
    $addnol = '';
    $kode = str_replace("TR","", $kode);
    $kode = (int) $kode + 1;
    $incrementkode = $kode;

    if (strlen($kode) == 1){
        $addnol = "00";
    } elseif (strlen($kode) == 2){
        $addnol = "0";
    } elseif(strlen($kode) == 3 ) {
        $addnol = "";
    }
    $kodebaru = "TR".$addnol.$incrementkode;
    return $kodebaru;
    }

   
