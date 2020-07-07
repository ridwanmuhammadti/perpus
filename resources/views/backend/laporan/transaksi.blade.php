<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi</title>

    <style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        th, td {
          padding: 5px;
        }
        th {
          text-align: left;
        }
        hr.new1{
          border: 1px solid;
          text-align: center;
        }
        hr.new2 {
  border-top: 1px dashed;
}
.col-md-5{
  text-align: center;
  margin-left: 30px
}
p.p{
  margin-top: -15px;
}

th, td{
  text-align: center
}

table {
    border-spacing: 0;
    width: 100%;
    }
    th {
    background: #404853;
    background: linear-gradient(#687587, #404853);
    border-left: 1px solid rgba(0, 0, 0, 0.2);
    border-right: 1px solid rgba(255, 255, 255, 0.1);
    color: #fff;
    padding: 8px;
    text-align: center;
    text-transform: uppercase;
    }
    th:first-child {
    border-top-left-radius: 4px;
    border-left: 0;
    }
    th:last-child {
    border-top-right-radius: 4px;
    border-right: 0;
    }
    td {
    border-right: 1px solid #c6c9cc;
    border-bottom: 1px solid #c6c9cc;
    padding: 8px;
    text-align: center !important;
    }
    td:first-child {
    border-left: 1px solid #c6c9cc;
    }
    tr:first-child td {
    border-top: 0;
    }
    tr:nth-child(even) td {
    background: #e8eae9;
    }
    tr:last-child td:first-child {
    border-bottom-left-radius: 4px;
    }
    tr:last-child td:last-child {
    border-bottom-right-radius: 4px;
    }
  
    .center {
    	text-align: center;
    }
    .badge {
  display: inline-block;
  padding: 0.25em 0.4em;
  font-size: 75%;
  font-weight: 700;
  line-height: 1;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: 0.25rem; 
}
  .badge-warning {
  color: #212529;
  background-color: #ffaf00; 
}


  .badge-warning[href]:hover, .preview-list .preview-data .preview-thumbnail [href].badge.badge-busy:hover, .badge-warning[href]:focus, .preview-list .preview-data .preview-thumbnail [href].badge.badge-busy:focus {
    color: #212529;
    text-decoration: none;
    background-color: #cc8c00;
   }

.badge-success, .preview-list .preview-data .preview-thumbnail .badge.badge-online {
  color: #fff;
  background-color: #00ce68; 
}
  .badge-success[href]:hover, .preview-list .preview-data 
  .preview-thumbnail [href].badge.badge-online:hover, 
  .badge-success[href]:focus, 
  .preview-list .preview-data .preview-thumbnail [href].badge.badge-online:focus {
    color: #fff;
    text-decoration: none;
    background-color: #009b4e;
   }

   .badge-primary, .preview-list .preview-data .preview-thumbnail .badge.badge-online {
  color: #fff;
  background-color: #0052ce; 
}
.badge-danger, .preview-list .preview-data .preview-thumbnail .badge.badge-online {
  color: #fff;
  background-color: #f51b1b; 
}

.badge-secondary, .preview-list .preview-data .preview-thumbnail .badge.badge-online {
  color: #fff;
  background-color: #e160e6; 
}

        </style>
</head>
<body>
  <div class="row">
    <div class="col-md-3">
      @php $image = '/images/kalsel.png' @endphp
      <img src="{{ public_path() . $image }}" style="width: 80px; float: left" alt="" srcset="">
      
    </div>
    <div class="col-md-5">
      <h4>PEMERINTAH PROVINSI KALIMANTAN SELATAN</h4>
      <h3 style="margin-top: -20px">BADAN PENGEMBANGAN SUMBER DAYA MANUSIA DAERAH</h3>
      <h5 class="" style="margin-top: -10px">Graha Panglima Batur, Jalan Panglima Batur Timur Nomor 1A Telp.(0511)4772551 Banjarbaru 70711,<br>website : www.bpsdm.kalselprov.go.id; e-mail : diklat@kalselprov.go.id</h5>
        <br>

      <hr>
      <hr class="new1" style="margin-top: -5px">
      {{-- <hr class="new2"> --}}
    </div>

  </div>

  <table id="pseudo-demo" style="margin-top: 10px">
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
       
      </tr>
    </thead>
    <tbody>
    @foreach($datas as $data)
                                       
      <tr>
        <td class="py-1">
          {{ $data->kode_transaksi }}
        </td>
       
        <td>{{ $data->buku->judul }}</td>
        <td>{{ $data->anggota->nama }}</td>
        <td> {{date('d/m/y', strtotime($data->tgl_pinjam))}}</td>
        <td> {{date('d/m/y', strtotime($data->tgl_kembali))}}</td>
        <td>@if ($data->status == 'pinjam')
          <span class="badge badge-warning">Pinjam
          </span>
            @else
            <span class="badge badge-primary">Kembali
            </span>
        @endif</td>
        <td style="">@if ($data->status == 'pinjam')
            <span class="badge badge-secondary">Sedang di pinjam</span>
            @elseif($data->status = 'kembali' && $data->ket =='denda')
            <span class="badge badge-danger">Denda</span>
           
            @else 
           <span class="badge badge-success">Clear</span>
        @endif</td>
      
      </tr>
    @endforeach
    </tbody>
  </table>

    <table style="width:100%">
      <tr>
      
      
        
      </tr>
      @foreach ($datas as $data)
    
    
      @endforeach      
      </table>
</body>
</html>