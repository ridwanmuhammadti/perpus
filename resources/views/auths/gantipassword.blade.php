
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Ganti Password &mdash; BPSDMD KAL-SEL</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('/backend') }}/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('/backend') }}/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('/backend') }}/assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('/backend') }}/assets/css/style.css">
  <link rel="stylesheet" href="{{ asset('/backend') }}/assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ asset('images/kalsel.png') }}" alt="logo" width="100">
              <h3 class="mt-4"> BPSDMD KAL-SEL</h3>
            </div>

            <div class="card card-primary">
			  {{-- <div class="card-header"><h4>Login</h4></div> --}}
			  
			  @if(\Session::has('error'))
			  <div class="alert alert-danger mt-3">
				  <div>{{Session::get('error')}}</div>
			  </div>
		  @endif

              <div class="card-body">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
               @endforeach
                <form class="need-validation" action="/postpassword/{{ auth()->user()->id }}" method="POST">
                    {{ csrf_field() }}
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus readonly value="{{ $users->email }}">
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

               
                  <div class="form-group">
                  
                    <label for="password" class="control-label">Old Password</label>
              
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-key"></i>
                          </div>
                        </div>
                        <input type="password" class="form-control" name="password" tabindex="2" required>
                      </div>
              </div>


                  <div class="form-group">
                  
                    	<label for="password" class="control-label">New Password</label>
                  
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                              </div>
                            </div>
                            <input id="password" type="password" class="form-control" name="new_password" tabindex="2" required onkeyup='check();'>
                          </div>
                  </div>

                  
                  <div class="form-group">
                  
                    <label for="password" class="control-label">Confirm Password</label>
              
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text" id="message">
                            
                          </div>
                        </div>
                        <input name="new_password" id="confirm_password"  type="password" class="form-control" tabindex="2" required onkeyup='check();'>
                      </div>
              </div>


                 

               
                  <div class="form-group">
                    <button type="submit" id="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Change Password
                    </button>
                  </div>
                </form>
          

              </div>
            </div>
        
            <div class="simple-footer">
              Copyright &copy; BPSDMD KAL-SEL 2020
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('/backend') }}/assets/modules/jquery.min.js"></script>
  <script src="{{ asset('/backend') }}/assets/modules/popper.js"></script>
  <script src="{{ asset('/backend') }}/assets/modules/tooltip.js"></script>
  <script src="{{ asset('/backend') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{ asset('/backend') }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="{{ asset('/backend') }}/assets/modules/moment.min.js"></script>
  <script src="{{ asset('/backend') }}/assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

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

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{ asset('/backend') }}/assets/js/scripts.js"></script>
  <script src="{{ asset('/backend') }}/assets/js/custom.js"></script>
</body>
</html>