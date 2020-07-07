
@extends('front.master')

@section('content')
<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreens d-flex justify-content-center align-items-center">
            <div class="banner-content col-lg-9 col-md-12 justify-content-center">
                <h6 class="text-uppercase">SILAHKAN ANDA BUAT AKUN DULU</h6>
                <h1>
					.
                </h1>
                
                
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start open-hour Area -->
<section class="open-hour-login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 open-hour-wrap">
                <h1>BUAT AKUN</h1>
                <p>
                    
                </p>
                <a class="open-btn" href="#"> <span class="circle"></span>Silahkan Daftar</a>
                @foreach ($errors->all() as $error)
                <li style="color: red">{{ $error }}</li>
               @endforeach
                <div class="date-list d-flex flex-row justify-content-center">
                   
					<div class="col-lg-8 col-md-8">
						
						<form class="login100-form validate-form" action="/postregister" method="POST">
                            {{ csrf_field() }}
                            <div class="input-group-icon mt-10">
								<div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
								<input type="text" name="name" placeholder="Nama Lengkap" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Lengkap'" required="" class="single-input">
							</div>
							<div class="input-group-icon mt-10">
								<div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
								<input type="email" name="email" placeholder="example@gmail.com" onfocus="this.placeholder = ''" onblur="this.placeholder = 'example@gmail.com'" required="" class="single-input">
                            </div>
                          
							<div class="input-group-icon mt-10">
								<div class="icon"><i class="fa fa-lock" aria-hidden="true"></i></div>
								<input type="password" id="password" name="password" placeholder="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'password'" required="" class="single-input" onkeyup='check();'>
                            </div>
                            <div class="input-group-icon mt-10">
								<div id='message' class="icon"></div>
                                <input type="password" name="password_confirmation" id="confirm_password"  placeholder="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'password'" required="" class="single-input" onkeyup='check();' >
                                {{-- <span id='message'></span> --}}
							</div>
                        
                            <div class="g-recaptcha mt-10" data-sitekey="{{ env('CAPTCHA_KEY') }}">
                           
                        </div>


							<button type="submit" id="submit" class="genric-btn primary radius mt-20 mb-20">DAFTAR</button>
							{{-- <a class="genric-btn danger radius" href="/register"> DAFTAR</a> --}}
							<br>
							<a class="open-btn mt-50" href="/user/login"> <span class="circle"></span>Sudah Punya Akun ?></a>
               
						</form>
					</div>
                </div>

				
              
            </div>
        </div>
    </div>
</section>
<!-- End open-hour Area -->

<script>
		

    var check = function() {
      if (document.getElementById('password').value ==
        document.getElementById('confirm_password').value) {
        document.getElementById('submit').disabled = false;
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = '<i class="fa fa-check" aria-hidden="true"></i>';
      } else {
        document.getElementById('submit').disabled = true;
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = '<i class="fa fa-close" aria-hidden="true"></i>';
      }
    }
        </script>

@endsection