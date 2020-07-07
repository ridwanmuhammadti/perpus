@extends('backend.master')

@section('judul')
    Data Buku
@endsection

@section('content')

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="/buku/create" class="btn btn-primary">Tambah Buku</a>  
      
          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>                                 
                    <tr>
                      <th class="text-center">
                        No
                      </th>
                      <th>Judul</th>
                      <th>ISBN</th>
                      <th>Pengarang</th>
                      <th>Tahun</th>
                      <th>Stok</th>
                      <th>Rak</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>   
                    @foreach ($bukus as $item)
                                                
                    <tr>
                      <td>
                        {{ $loop->iteration }}
                      </td>
                      <td> <img src="{{ $item->getFoto() }}" style="width: 50px; border-radius: 50%" alt="" srcset="">
                      &nbsp;  {{ $item->judul }}</td>
                      <td>{{ $item->isbn }}</td>
                      <td>{{ $item->pengarang }}</td>
                      <td>{{$item->tahun_terbit}}</td>
                      <td>{{ $item->jumlah_buku }}</td>
                      <td>{{ $item->lokasi }}</td>
                      <td>
                        <a href="/buku/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btn-sm delete" buku-id="{{ $item->id }}"><i class="far fa-trash-alt"></i></a>
              
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
        var buku_id = $(this).attr('buku-id');
        swal({
            title: "Yakin?",
            text: "Mau dihapus Data buku dengan Id "+buku_id+" ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
              window.location = "/buku/"+buku_id+"/destroy";
              swal("Data Berhasil dihapus !!", {
                icon: "success",
              });
            } 
          });
      });
    </script>
@endsection