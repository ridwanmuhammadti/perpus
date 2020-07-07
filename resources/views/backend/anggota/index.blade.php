@extends('backend.master')

@section('judul')
    Anggota
@endsection

@section('content')

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="/anggota/create" class="btn btn-primary">Tambah Anggota</a>  
      
          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>                                 
                    <tr>
                      <th class="text-center">
                        No
                      </th>
                      <th>Nama</th>
                      <th>NIP</th>
                      <th>Email</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir</th>
                      <th>Umur</th>
                      <th>Gambar</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>   
                    @foreach ($anggotas as $item)
                                                
                    <tr>
                      <td>
                        {{ $loop->iteration }}
                      </td>
                      <td>{{ $item->nama }}</td>
                      <td>{{ $item->nip }}</td>
                      <td>{{ $item->email }}</td>
                      <td>@if ($item->jenis_kelamin == 'L')
                          Laki - laki
                          @else
                          Perempuan
                      @endif</td>
                      <td>{{ $item->tgl_lahir }}</td>
                      <td>{{ $item->getUmur() }}</td>
                      <td><img src="{{ $item->getFoto() }}" style="width: 100px" alt="" srcset="">
                        </td>
                      
                      <td>
                        <a href="/anggota/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btn-sm delete" anggota-id="{{ $item->id }}"><i class="far fa-trash-alt"></i></a>
              
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
        var anggota_id = $(this).attr('anggota-id');
        swal({
            title: "Yakin?",
            text: "Mau dihapus Data anggota dengan Id "+anggota_id+" ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
              window.location = "/anggota/"+anggota_id+"/destroy";
              swal("Data Berhasil dihapus !!", {
                icon: "success",
              });
            } 
          });
      });
    </script>
@endsection