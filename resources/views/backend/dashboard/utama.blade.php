@extends('backend.master')

@section('judul')
   {{-- Dashboard --}}
@endsection

@section('content')

<div class="row">

  <div class="col-12">
    <div class="align-items-center  text-black">
  
        <br>
        <img src="{{ asset('/images/perpus.png') }}" style="position: relative;
        z-index: 1;
        top: 0px; width: 100%" alt="" srcset="">
         <h2 style="position: absolute;
         top: 530px; left: 70px;
         z-index: 2;
         color: #fff;">PERPUSTAKAAN BPSDMD PROVINSI KALIMANTAN SELATAN</h2>
          
      </div>
    </div>
  </div>
</div>

@endsection

