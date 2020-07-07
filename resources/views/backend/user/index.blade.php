@extends('backend.master')

@section('judul')
    User
@endsection

@section('content')

   <div class="row">
    <div class="col-12">
      <div class="card">
        {{-- <div class="card-header">
          
        </div> --}}
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>                                 
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Role</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th> 
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              <tbody>   
                @foreach ($users as $item)
                          
                <tr>
                   <td>{{ $loop->iteration }}</td>
                   <td>@if ($item->role == 'admin')
                     <span class="badge badge-info">Admin</span>
                   @else
                   <span class="badge badge-warning">Anggota</span></td>
                 
                   @endif
                   <td>{{ $item->name }}</td>
                   <td>{{ $item->email }}</td>
                 
                   <td>
                     <a href="/user/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                     <a href="#" class="btn btn-danger btn-sm delete" user-id="{{ $item->id }}"><i class="far fa-trash-alt"></i></a>
            
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
@endsection



@section('js')
    <script>
      $('.delete').click(function(){
        var user_id = $(this).attr('user-id');
        swal({
            title: "Yakin?",
            text: "Mau dihapus Data user dengan Id "+user_id+" ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
              window.location = "/user/"+user_id+"/destroy";
              swal("Data Berhasil dihapus !!", {
                icon: "success",
              });
            } 
          });
      });
    </script>
@endsection