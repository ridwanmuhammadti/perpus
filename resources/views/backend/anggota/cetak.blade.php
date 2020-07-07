<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile {{ $anggotas->nama }}</title>

    <style>
     body{
/* margin: 0px;
padding: 0px; */
/* background: #f1f1f1; */
font-family: arial;
/* box-sizing: border-box; */
}
.card-container{
width: 300px;
height: 500px;
background:#6777ef;
border-radius: 6px;
position: absolute;
top: 45%;
left: 28%;
transform: translate(-50%,-50%);
border: 1px solid rgba(33, 243, 14, 0.1);;
  padding: 0px;
  box-shadow: 5px 5px 8px #6777ef, 10px 10px 8px red, 15px 15px 8px #6777ef;
overflow: hidden;
display: inline-block;
}
.upper-container{
    z-index: 1;
height: 150px;
background: #6777ef;
}
.image-container{
background: white;
width: 80px;
height: 80px;
border-radius: 100%;
padding: 5px;
transform: translate(100px,100px);
}
.image-container img{
width: 80px;
height: 80px;
border-radius: 50%;
}
.lower-container{
height: 280px;
background: #FFF;
padding: 20px;
padding-top: 40px;
text-align: center;
}
.lower-container h3, h4{
box-sizing: border-box;
line-height: .6;
font-weight: lighter;
}
.lower-container h4{
color: #6777ef;
opacity: .6;
font-weight: bold;
}
.lower-container p{
font-size: 16px;
color: gray;
margin-bottom: 30px;
}
.lower-container .btn{
padding: 50px 30px;
background: #6777ef;
border: none;
color: white;
border-radius: 50%;
font-size: 12px;
text-decoration: none;
font-weight: bold;
transition: all .3s ease-in;
}
.lower-container .btn:hover{
background: transparent;
color: #7F00FF;
border: 2px solid #7F00FF;
}
        </style>
</head>
<body>
    <div class="card-container">
        <div class="upper-container">
           <div class="image-container">
            @if (!$anggotas->gambar)
            @php $image = '/images/user/default.png' @endphp
            <img src="{{ public_path() . $image }}"></td>
           
            @else
            @php $image = '/images/'.$anggotas->gambar @endphp
            <img src="{{ public_path() . $image }}" style="border-radius: 50%; "></td>
            @endif
           </div>
        </div>
        <div class="lower-container">
           <div>
            <h3>{{ $anggotas->nip }}</h3>
              <h3>{{ $anggotas->nama }}</h3>
              <h4>{{ $anggotas->email }}</h4>
              <p>{{ $anggotas->tgl_lahir }} / {{ $anggotas->getUmur() }} Tahun <br>
            
            {{$anggotas->alamat}}
            </p>
           </div>
           <div>
             
           </div>
           <div>
              <a href="#" class="btn">BPSDMD  &mdash; KAL-SEL</a>
           </div>
        </div>
     </div>
</body>
</html>
