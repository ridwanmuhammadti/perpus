@extends('backend.master')

@section('judul')
    Data Transaksi
@endsection

@section('content')

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="/transaksi/create" class="btn btn-primary">Tambah Transaksi</a>  
      
          </div>
            <div class="card-body">
              <div class="table-responsive">
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
                      <th>Keterangan</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>   
                    @foreach ($transaksis as $item)
                                                
                    <tr>
                      <td>
                        {{ $item->kode_transaksi }}
                      </td>
                     
                      <td>{{ $item->buku->judul }}</td>
                      <td>{{ $item->anggota->nama }}</td>
                      <td>{{$item->tgl_pinjam}}</td>
                      <td>{{ $item->tgl_kembali }}</td>
                      <td>@if ($item->status == 'pinjam')
                        <span class="badge badge-warning">Pinjam
                        </span>
                          @else
                          <span class="badge badge-primary">Kembali
                          </span>
                      @endif</td>
                      <td>@if ($item->status == 'pinjam')
                          <span class="badge badge-secondary">Sedang di pinjam</span>
                          @elseif($item->status = 'kembali' && $item->ket =='denda')
                          <span class="badge badge-danger">Denda</span>
                         
                          @else 
                         <span class="badge badge-success">Clear</span>
                      @endif</td>
                      <td>
                        @if($item->status === 'pinjam')
                        <form action="/transaksi/{{ $item->id }}/update" method="post">
                          {{ csrf_field() }}
                        <button class="btn btn-success btn-sm"  onclick="return confirm('Anda yakin data ini sudah kembali?')"><i class="far fa-edit"></i></i></button>
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
          </div>
        </div>
      </div>
  </div>
      </div>
   </div>


@endsection


@section('js')
    <script>
      $('.delete').click(function(){
        var transaksi_id = $(this).attr('transaksi-id');
        swal({
            title: "Yakin?",
            text: "Mau dihapus Data transaksi dengan Id "+transaksi_id+" ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
              window.location = "/transaksi/"+transaksi_id+"/destroy";
              swal("Data Berhasil dihapus !!", {
                icon: "success",
              });
            } 
          });
      });
    </script>
@endsection