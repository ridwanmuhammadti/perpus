

  @extends('backend.master')

  @section('judul')
      Judul {{$bukus->judul}}
  @endsection
  
  @section('content')
  <div class="section-body">
      <h2 class="section-title">{{$bukus->judul}}</h2>
      <p class="section-lead">
          
                              
      </p>
  
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
          <div class="card profile-widget">
            <div class="profile-widget-header">                     
              <img alt="image" src="{{$bukus->getFoto()}}" class="" width="400px" height="400px">
            
            </div>
            <div class="profile-widget-description">
              <div class="profile-widget-name">Lokasi :{{$bukus->lokasi}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{ $bukus->tahun_terbit }} Tahun</div></div>
            </div>
            <div class="card-body">
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">{{$bukus->isbn}}
                  <span class="badge badge-primary badge-pill"><i class="fas fa-id-card"></i></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">{{$bukus->penerbit}}
                  <span class="badge badge-primary badge-pill"><i class="fas fa-envelope"></i></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  
                  {{ $bukus->pengarang }}
                
                  <span class="badge badge-primary badge-pill"><i class="fas fa-user"></i></span>
                </li>
         
                
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  {{$bukus->deskripsi}}<span class="badge badge-primary badge-pill"></span>
                </li>
              </ul>

              <div class="mt-4" style="text-align: center">
              <a href="/cetak/{{ $bukus->id }}/buku" target="_blank" class="btn btn-primary">Cetak Details Buku</a>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form method="post" class="needs-validation" novalidate="" action="/buku/{{$bukus->id}}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="card-header">
                <h4>Edit Buku</h4>
              </div>
              <div class="card-body">
                  <div class="row">        
                    
                    @foreach ($errors->all() as $error)
                    <li style="color: red">{{ $error }}</li>
                   @endforeach
                    
                    <div class="form-group col-md-12 col-12">
                      <label>Judul </label>
                      <input type="text" class="form-control" value="{{$bukus->judul}}" name="judul" required="">
                      <div class="invalid-feedback">
                        Please fill in the first name
                      </div>
                    </div>
                   
                  </div>
                  <div class="row">                               
                    <div class="form-group col-md-12 col-12">
                      <label>ISBN</label>
                      <input type="text" class="form-control" value="{{$bukus->isbn}}" name="isbn"  required="">
                      <div class="invalid-feedback">
                        Please fill in the first name
                      </div>
                    </div>
                   
                  </div>

                  <div class="row">                               
                    <div class="form-group col-md-12 col-12">
                      <label>Pengarang</label>
                      <input type="text" class="form-control" value="{{$bukus->pengarang}}" name="pengarang"  required="">
                      <div class="invalid-feedback">
                        Please fill in the first name
                      </div>
                    </div>
                   
                  </div>

                  <div class="row">                               
                    <div class="form-group col-md-12 col-12">
                      <label>Penerbit</label>
                      <input type="text" class="form-control" value="{{$bukus->penerbit}}" name="penerbit"  required="">
                      <div class="invalid-feedback">
                        Please fill in the first name
                      </div>
                    </div>
                   
                  </div>

                  <div class="row">                               
                    <div class="form-group col-md-12 col-12">
                      <label>Tahun Terbit</label>
                      <input type="text" class="form-control" value="{{$bukus->tahun_terbit}}" name="tahun_terbit"  required="">
                      <div class="invalid-feedback">
                        Please fill in the first name
                      </div>
                    </div>
                   
                  </div>

                  <div class="row">                               
                    <div class="form-group col-md-12 col-12">
                      <label>Jumlah Buku</label>
                      <input type="text" class="form-control" value="{{$bukus->jumlah_buku}}" name="jumlah_buku"  required="">
                      <div class="invalid-feedback">
                        Please fill in the first name
                      </div>
                    </div>
                   
                  </div>


                
                  <div class="form-group">
                      <label for="">Lokasi</label>
                      <select name="lokasi" id="" class="form-control select2" required>
                         <option>-- Pilih Lokasi --</option>
                         <option value="rak1" @if ($bukus->lokasi == 'rak1')
                          selected
                      @endif>Rak 1</option>
                      <option value="rak2"  @if ($bukus->lokasi == 'rak2')
                        selected
                    @endif>Rak 2</option>
                    <option value="rak3"  @if ($bukus->lokasi == 'rak3')
                      selected
                  @endif>Rak 2</option>
                      </select>
                  </div>
                  <div class="row">                               
                    <div class="form-group col-md-12 col-12">
                      <label>Deskripsi</label>
                      <textarea type="text" class="form-control" name="deskripsi"  required="">{{$bukus->deskripsi}}</textarea>
                      <div class="invalid-feedback">
                        Please fill in the first name
                      </div>
                    </div>
                   
                  </div>
                  <div class="row">                               
                    <div class="form-group col-md-12 col-12">
                      <label>Cover</label>
                      <input type="file" class="form-control"name="cover" >
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
  