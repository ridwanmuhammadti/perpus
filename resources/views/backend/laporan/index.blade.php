@extends('backend.master')

@section('judul')
   Laporan
@endsection

@section('content')
<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-12">
  <div class="card card-statistic-2">
    <div class="card-stats">
      <div class="card-stats-title">Report - 
        <div class="dropdown d-inline">
          <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month" aria-expanded="false">Master</a>
          <ul class="dropdown-menu dropdown-menu-sm" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 18px, 0px); top: 0px; left: 0px; will-change: transform;">
      
            <li><a href="{{ url('laporan/transaksi') }}"  target="_blank" class="dropdown-item">Semua Transaksi</a></li>
            <li><a href="{{ url('laporan/transaksi?status=pinjam') }}" target="_blank"  class="dropdown-item">Sedang dipinjam</a></li>
            <li><a href="{{ url('laporan/transaksi?status=kembali') }}" target="_blank"  class="dropdown-item">Sudah dikembalikan</a></li>
            <li><a href="{{ url('laporan/transaksi?ket=denda') }}"  target="_blank" class="dropdown-item">Denda</a></li>
          </ul>
        </div>
      </div>
      <div class="card-stats-items">
        <div class="card-stats-item">
          <div class="card-stats-item-count">{{ $pinjam->count() }}</div>
          <div class="card-stats-item-label">Dipinjam</div>
        </div>
        <div class="card-stats-item">
          <div class="card-stats-item-count">{{ $kembali->count() }}</div>
          <div class="card-stats-item-label">Kembali</div>
        </div>
        <div class="card-stats-item">
          <div class="card-stats-item-count">{{ $denda->count() }}</div>
          <div class="card-stats-item-label">Denda</div>
        </div>
      </div>
    </div>
    <div class="card-icon shadow-primary bg-primary">
      <i class="fas fa-poll	"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Total Transaksi</h4>
      </div>
      <div class="card-body">
        {{ $transaksi->count() }}
      </div>
    </div>
  </div>
  </div>

 
    <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card card-statistic-2">
      <div class="card-stats">
        <div class="card-stats-title">Report - 
          <div class="dropdown d-inline">
            <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month" aria-expanded="false">Buku</a>
            <ul class="dropdown-menu dropdown-menu-sm" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 18px, 0px); top: 0px; left: 0px; will-change: transform;">
              
              <li><a href="{{ url('laporan/buku') }}"  target="_blank" class="dropdown-item">Semua Buku</a></li>
              <li><a href="{{ url('laporan/buku?lokasi=rak1') }}" target="_blank"  class="dropdown-item">Rak 1</a></li>
              <li><a href="{{ url('laporan/buku?lokasi=rak2') }}" target="_blank"  class="dropdown-item">Rak 2</a></li>
              <li><a href="{{ url('laporan/buku?lokasi=rak3') }}"  target="_blank" class="dropdown-item">Rak 3</a></li>
            </ul>
          </div>
        </div>
        <div class="card-stats-items">
          <div class="card-stats-item">
            <div class="card-stats-item-count">{{ $rak1->count() }}</div>
            <div class="card-stats-item-label">Rak 1</div>
          </div>
          <div class="card-stats-item">
            <div class="card-stats-item-count">{{ $rak2->count() }}</div>
            <div class="card-stats-item-label">Rak 2</div>
          </div>
          <div class="card-stats-item">
            <div class="card-stats-item-count">{{ $rak3->count() }}</div>
            <div class="card-stats-item-label">Rak 3</div>
          </div>
        </div>
      </div>
      <div class="card-icon shadow-primary bg-primary">
        <i class="fas fa-book-open"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Buku</h4>
        </div>
        <div class="card-body">
          {{ $bukus->count() }}
        </div>
      </div>
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-stats">
          <div class="card-stats-title">Report - 
            <div class="dropdown d-inline">
              <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month" aria-expanded="false">Anggota</a>
              <ul class="dropdown-menu dropdown-menu-sm" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 18px, 0px); top: 0px; left: 0px; will-change: transform;">
                
                <li><a href="{{ url('laporan/anggota') }}"  target="_blank" class="dropdown-item">Semua Anggota</a></li>
                <li><a href="{{ url('laporan/anggota?jenis_kelamin=L') }}" target="_blank"  class="dropdown-item">Anggota Laki - laki</a></li>
                <li><a href="{{ url('laporan/anggota?jenis_kelamin=P') }}" target="_blank"  class="dropdown-item">Anggota Perempuan</a></li>
               
              </ul>
            </div>
          </div>
          <div class="card-stats-items">
            <div class="card-stats-item">
              <div class="card-stats-item-count">{{ $l->count() }}</div>
              <div class="card-stats-item-label">Laki - laki</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">{{ $p->count() }}</div>
              <div class="card-stats-item-label">Perempuan</div>
            </div>
         
          </div>
        </div>
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-user-friends"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Anggota</h4>
          </div>
          <div class="card-body">
            {{ $anggotas->count() }}
          </div>
        </div>
      </div>
      </div>
  

</div>

<div class="row">

</div>
@endsection