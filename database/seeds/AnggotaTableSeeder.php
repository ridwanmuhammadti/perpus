<?php

use Illuminate\Database\Seeder;

class AnggotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Anggota::insert([
            [
              
              'user_id'  		=> 2,
              'nip'				=> 10000353,
              'nama' 			=> 'Ridwan Muhammad',
              'email' 			=> 'ridwan@gmail.com',
              'tempat_lahir'	=> 'Sungkai Baru',
              'tgl_lahir'		=> '1998-12-02',
              'jenis_kelamin'	=> 'L',
              'alamat'          => 'Sungkai Baru',
              'gambar'          => NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'user_id'  		=> 3,
                'nip'				=> 1000033343,
                'email' 			=> 'muja@gmail.com',
                'nama' 			=> 'Muja',
                'tempat_lahir'	=> 'Sungkai Baru',
                'tgl_lahir'		=> '1998-01-02',
                'jenis_kelamin'	=> 'L',
                'alamat'          => 'Sungkai Baru',
                'gambar'          => NULL,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
        ]);
    }
}
