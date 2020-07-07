<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile {{ $bukus->nama }}</title>

    <style>
     body{
/* margin: 0px;
padding: 0px; */
/* background: #f1f1f1; */
font-family: arial;
/* box-sizing: border-box; */
}
.card-container{
width: 700px;
height: 500px;
background:#6777ef;
border-radius: 6px;
position: absolute;
top: 0%;
left: 2%;
/* transform: translate(-50%,-50%); */
border: 1px solid rgba(33, 243, 14, 0.1);;
  padding: 0px;
  box-shadow: 5px 5px 8px #6777ef, 10px 10px 8px red, 15px 15px 8px #6777ef;
overflow: hidden;
display: inline-block;
}
.upper-container{
    z-index: 0;
height: 150px;
background: #6777ef;
}
.image-container{
   margin-left: -70px;
background: white;
width: 300px;
height: 300px;
border-radius: 100%;
padding: 5px;
transform: translate(100px,100px);
}
.image-container img{
   /* margin-left: -70px; */
width: 300px;
height: 300px;
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
   margin-left: 300px;
box-sizing: border-box;
line-height: .6;
font-weight: lighter;
}
.lower-container h4{
   
   margin-left: 300px;
color: #6777ef;
opacity: .6;
font-weight: bold;
}
.lower-container p{
   
   margin-left: 300px;
font-size: 16px;
color: gray;
margin-bottom: 30px;
}
.lower-container .btn{
   
   margin-left: 300px;
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
   
   margin-left: 300px;
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
            @if (!$bukus->cover)
            @php $image = '/images/user/default.png' @endphp
            <img src="{{ public_path() . $image }}"></td>
           
            @else
            @php $image = '/images/'.$bukus->cover @endphp
            <img src="{{ public_path() . $image }}" style="border-radius: 50%; "></td>
            @endif
           </div>
        </div>
        <div class="lower-container">
           <div>
            <h3>{{ $bukus->judul }}</h3>
              <h3>{{ $bukus->pengarang }}</h3>
              <h4>{{ $bukus->penerbit }}</h4>
              <p>{{ $bukus->lokasi }} / {{ $bukus->tahun_terbit }} Tahun <br>
            
            {{$bukus->deskripsi}}
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
