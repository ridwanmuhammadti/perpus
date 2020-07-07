@extends('backend.master')

@section('judul')
  Tambah Anggota
@endsection

@section('content')
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                   @endforeach
                <form action="/anggota/store" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="">Nama</label>
                      <input type="text" name="nama" id="" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">NIP</label>
                    <input type="text" name="nip" id="" class="form-control">
                </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="" class="form-control">
                </div>
                
                  
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control datepicker"  data-language='en'  name="tgl_lahir">
                    </div>
                  </div>

                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control select2" required>
                       <option>-- Jenis Kelamin --</option>
                       <option value="L">Laki - laki</option>
                    <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                   <textarea name="alamat" id="" class="form-control"></textarea>
                </div>
                
                                           
                    <div class="form-group">
                      <label>Foto Profile</label>
                      <input type="file" class="form-control"name="gambar" id="image-source" onchange="previewImage();">
                      <div class="invalid-feedback">
                        Please fill in the Photos
                      </div>
               
                   
                  </div>

                  <img id="image-preview" style="
                    display:none;
                    width : 150px;
                    height : 150px;
                " /><br/>
                      <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    
<script>
    function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
</script>
@endsection