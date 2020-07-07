

  @extends('backend.master')

  @section('judul')
      Profile {{$anggotas->name}}
  @endsection
  
  @section('content')
  <div class="section-body">
      <h2 class="section-title">{{$anggotas->nama}}</h2>
      <p class="section-lead">
          
                              
      </p>
  
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
          <div class="card profile-widget">
            <div class="profile-widget-header">                     
              <img alt="image" src="{{$anggotas->getFoto()}}" class="rounded-circle profile-widget-picture" width="100px" height="100px">
              <div class="profile-widget-items">
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Posts</div>
                  <div class="profile-widget-item-value">187</div>
                </div>
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Followers</div>
                  <div class="profile-widget-item-value">6,8K</div>
                </div>
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Following</div>
                  <div class="profile-widget-item-value">2,1K</div>
                </div>
              </div>
            </div>
            <div class="profile-widget-description">
              <div class="profile-widget-name">{{$anggotas->tgl_lahir}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{$anggotas->getUmur()}} Tahun</div></div>
            </div>
            <div class="card-body">
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">{{$anggotas->nip}}
                  <span class="badge badge-primary badge-pill"><i class="fas fa-id-card"></i></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">{{$anggotas->email}}
                  <span class="badge badge-primary badge-pill"><i class="fas fa-envelope"></i></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  @if ($anggotas->jenis_kelamin == 'L')
                      Laki - laki
                  @else
                  Perempuan
                  @endif
                
                  <span class="badge badge-primary badge-pill"><i class="fas fa-user"></i></span>
                </li>
         
                
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  {{$anggotas->alamat}}<span class="badge badge-primary badge-pill"><i class="fas fa-map-marker-alt"></i></span>
                </li>
              </ul>

              <div class="mt-4" style="text-align: center">
              <a href="/cetak/{{ $anggotas->id }}/kartuanggota" target="_blank" class="btn btn-primary">Cetak Kartu Anggota</a>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form method="post" class="needs-validation" novalidate="" action="/anggota/{{$anggotas->id}}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                  <div class="row">        
                    
                    @foreach ($errors->all() as $error)
                    <li style="color: red">{{ $error }}</li>
                   @endforeach
                    
                    <div class="form-group col-md-12 col-12">
                      <label>Nama </label>
                      <input type="text" class="form-control" value="{{$anggotas->nama}}" name="nama" required="">
                      <div class="invalid-feedback">
                        Please fill in the first name
                      </div>
                    </div>
                   
                  </div>
                  <div class="row">                               
                    <div class="form-group col-md-12 col-12">
                      <label>NIP</label>
                      <input type="text" class="form-control" value="{{$anggotas->nip}}" name="nip"  required="">
                      <div class="invalid-feedback">
                        Please fill in the first name
                      </div>
                    </div>
                   
                  </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" value="{{$anggotas->email}}" name="email" required="" readonly>
                      <div class="invalid-feedback">
                        Please fill in the email
                      </div>
                    </div>
                    
                
                 
                  <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control datepicker"  data-language='en'  name="tgl_lahir" value="{{ $anggotas->tgl_lahir }}">
                      </div>
                    </div>
                  <div class="row">
                  
                  </div>
                  <div class="form-group">
                      <label for="">Jenis Kelamin</label>
                      <select name="jenis_kelamin" id="" class="form-control select2" required>
                         <option>-- Jenis Kelamin --</option>
                         <option value="L" @if ($anggotas->jenis_kelamin == 'L')
                          selected
                      @endif>Laki - laki</option>
                      <option value="P"  @if ($anggotas->jenis_kelamin == 'P')
                        selected
                    @endif>Perempuan</option>
                      </select>
                  </div>
                  <div class="row">                               
                    <div class="form-group col-md-12 col-12">
                      <label>Alamat</label>
                      <textarea type="text" class="form-control" name="alamat"  required="">{{$anggotas->alamat}}</textarea>
                      <div class="invalid-feedback">
                        Please fill in the first name
                      </div>
                    </div>
                   
                  </div>
                  <div class="row">                               
                    <div class="form-group col-md-12 col-12">
                      <label>Foto Profile</label>
                      <input type="file" class="form-control"name="gambar" >
                      <div class="invalid-feedback">
                        Please fill in the Photos
                      </div>
                    </div>
                   
                  </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
        </div>
     </div>
  
  
  @endsection
  