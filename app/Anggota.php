<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{


    protected $table = 'anggota';
    protected $fillable = ['user_id', 'nip', 'nama','email', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin','alamat', 'gambar'];

    public function getRouteKeyName()
    {
        return 'nama';
    }

    public function getFoto(){
        if(!$this->gambar){
           return asset('images/user/default.png');
        }
        return asset('images/'.$this->gambar);
     }

    public function getUmur(){
        $now = Carbon::now();
        $tgl_lahirs = Carbon::parse($this->tgl_lahir);
        $age = $tgl_lahirs->diffInYears($now);
        return $age;
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    /**
     * Method One To Many 
     */
    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
}
