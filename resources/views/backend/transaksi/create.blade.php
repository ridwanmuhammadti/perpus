@extends('backend.master')

@section('judul')
  Tambah Transaksi
@endsection

@section('content')


    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                 
                    @foreach ($errors->all() as $error)
                    <li style="color: red">{{ $error }}</li>
                   @endforeach
                <form action="/transaksi/store" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="">Kode Transaksi</label>
                      <input type="text" name="kode_transaksi" id="" class="form-control" value="{{ kodetransaksi() }}" readonly>
                  </div>
                    
                  <div class="form-group">
                    <label>Tanggal Pinjam</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control datepicker"  data-language='en'  name="tgl_pinjam">
                    </div>
                  </div>
                       
                <div class="form-group">
                  <label>Tanggal Kembali</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-calendar"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control datepicker"  data-language='en'  name="tgl_kembali">
                  </div>
                </div>

                <div class="form-group">
                  <label for="">Buku</label>
                  <select name="buku_id" id="" class="form-control select2" required>
                     <option>-- Pilih Buku --</option>
                     @foreach ($bukus as $item)
                         <option value="{{ $item->id }}">{{ $item->judul }} - {{ $item->pengarang }} - {{ $item->jumlah_buku }}</option>
                     @endforeach
                  </select>
              </div>

              @if (auth()->user()->role == 'admin')
              <div class="form-group">
                <label for="">Anggota</label>
                <select name="anggota_id" id="" class="form-control select2" required>
                   <option>-- Pilih Anggota --</option>
                   @foreach ($anggotas as $item)
                       <option value="{{ $item->id }}">{{ $item->nip }} - {{ $item->nama}}</option>
                   @endforeach
                </select>
            </div>
            @else
            <div class="form-group">
              <label for="">Anggota</label>
              <input type="text" name="anggota_nama" id="" class="form-control" value="{{ auth()->user()->anggota->nama }}" readonly>
              <input type="hidden" name="anggota_id" id="" class="form-control" value="{{ auth()->user()->anggota->id }}" readonly>
          </div>
            
              @endif
          

                      <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            </div>
        </div>
    </div>

 
   

@endsection