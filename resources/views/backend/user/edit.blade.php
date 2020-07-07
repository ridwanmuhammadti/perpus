@extends('backend.master')

@section('judul')
 Edit User
@endsection

@section('content')
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form action="/user/{{ $users->id }}/update" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" name="name" id="" class="form-control" value="{{ $users->name }}">
                  </div>
                 
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" class="form-control" value="{{ $users->email}}" readonly>
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="text" name="password" id="" class="form-control">
              </div>
            
          
              
                      <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>
            </div>
        </div>
    </div>

@endsection