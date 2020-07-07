@extends('backend.master')

@section('judul')
  Tambah Buku
@endsection

@section('content')
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @foreach ($errors->all() as $error)
                    <li style="color: red">{{ $error }}</li>
                   @endforeach
                <form action="/buku/store" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="">Judul Buku</label>
                      <input type="text" name="judul" id="" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">ISBN</label>
                    <input type="text" name="isbn" id="" class="form-control">
                </div>
                  <div class="form-group">
                    <label for="">Nama Pengarang</label>
                    <input type="text" name="pengarang" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Penerbit</label>
                    <input type="text" name="penerbit" id="" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Tahun Terbit</label>
                  <input type="text" name="tahun_terbit" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Jumlah Buku</label>
                <input type="text" name="jumlah_buku" id="" class="form-control">
            </div>

            <div class="form-group">
              <label for="">Lokasi</label>
              <select name="lokasi" id="" class="form-control select2" required>
                <option>-- Pilih Lokasi --</option>
               <option value="Rak1">Rak 1</option>
               <option value="Rak2">Rak 2</option>
               <option value="Rak3">Rak 3</option>
             </select>
            </div>
              
                  
             

                <div class="form-group">
                    <label for="">Deskripsi</label>
                   <textarea name="deskripsi" id="" class="form-control"></textarea>
                </div>
                
                                           
                    <div class="form-group">
                      <label>Cover</label>
                      <input type="file" class="form-control"name="cover" id="image-source" onchange="previewImage();">
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