@extends('backend.master')

@section('judul')
   {{-- Dashboard --}}
@endsection

@section('content')


<div class="row">
  <div class="col-lg-3 col-md-3 col-sm-12">
    <div class="card card-statistic-2">
      <div class="card-stats">
        <div class="card-stats-title"><h4>Transaksi </h4>
       
        </div>
      
      </div>
      <div class="card-icon shadow-success bg-success">
        <i class="fas fa-poll"></i>
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
  <div class="col-lg-3 col-md-3 col-sm-12">
    <div class="card card-statistic-2">
      <div class="card-stats">
        <div class="card-stats-title"><h4>Sedang Pinjam </h4>
       
        </div>
      
      </div>
      <div class="card-icon shadow-warning bg-warning">
        <i class="fas fa-clipboard-list"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total dipinjam</h4>
        </div>
        <div class="card-body">
          {{ $transaksis->count() }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-12">
    <div class="card card-statistic-2">
      <div class="card-stats">
        <div class="card-stats-title"><h4>Buku </h4>
       
        </div>
      
      </div>
      <div class="card-icon shadow-danger bg-danger">
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
  <div class="col-lg-3 col-md-3 col-sm-12">
    <div class="card card-statistic-2">
      <div class="card-stats">
        <div class="card-stats-title"><h4>Anggota </h4>
       
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

@if (auth()->user()->role == 'anggota')
    
<div class="row ml-2">
  <a href="/transaksi/create" class="btn btn-primary">Tambah Transaksi</a>  
</div>

@endif

<div class="table-responsive mt-4">
  <table class="table table-striped" id="table-1">
    <thead>                                 
      <tr>
        <th class="text-center">
         Kode
        </th>
        <th>Buku</th>
        <th>Peminjam</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
        <th>Kondisi</th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>  
    
                                      
     @foreach ($datas as $item)
     <tr>
      <td style="text-align: center">
        {{ $item->kode_transaksi }}
      </td>
     
      <td style="text-align: center">{{ $item->buku->judul }}</td>
      <td style="text-align: center">{{ $item->anggota->nama }}</td>
      <td style="text-align: center">{{$item->tgl_pinjam}}</td>
      <td style="text-align: center">{{ $item->tgl_kembali }}</td>
      <td style="text-align: center">@if ($item->status == 'pinjam')
        <span class="badge badge-warning">Pinjam
        </span>
          @else
          <span class="badge badge-primary">Kembali
          </span>
      @endif</td>
      <td style="text-align: center">@if ($item->status == 'pinjam')
          <span class="badge badge-secondary">Sedang di pinjam</span>
          @elseif($item->status = 'kembali' && $item->ket =='denda')
          <span class="badge badge-danger">Denda</span>
         
          @else 
         <span class="badge badge-success">Clear</span>
      @endif</td>
      <td style="text-align: center">
        @if($item->status === 'pinjam')
        <form action="/transaksi/{{ $item->id }}/update" method="post">
          {{ csrf_field() }}
        <button href="/transaksi/{{$item->id}}/edit" class="btn btn-success btn-sm"  onclick="return confirm('Anda yakin data ini sudah kembali?')"><i class="far fa-edit"></i></i></button>
      </form>
       @endif
        {{-- <a href="/transaksi/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a> --}}
        <a href="#" class="btn btn-danger btn-sm delete" transaksi-id="{{ $item->id }}"><i class="far fa-trash-alt"></i></a>

      </td>
    </tr>
     @endforeach
   
    

       
    </tbody>
  </table>
</div>



</div>

@endsection