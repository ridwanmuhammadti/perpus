
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>BPSDMD  &mdash; KAL-SEL </title>
  <link rel="shortcut icon" href="{{ asset('/front/assets') }}/img/favicon.png">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="{{asset('/backend')}}/assets/modules/bootstrap-daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <link rel="stylesheet" href="{{asset('/backend')}}/assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/modules/summernote/summernote-bs4.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/css/style.css">
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/css/components.css">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>

    {{-- navbar --}}
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
           
          </ul>
         
        </form>
        <ul class="navbar-nav navbar-right">
         
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            @if (auth()->user()->role == 'admin')

            <img alt="image" src="{{ asset('/images') }}/user/default.png" class="rounded-circle mr-1">

            @elseif (auth()->user()->role == 'anggota')

            <img alt="image" src="{{auth()->user()->anggota->getFoto()}}" class="rounded-circle mr-1">

            @endif
            <div class="d-sm-none d-lg-inline-block"></div>{{ auth()->user()->email }}</a>

            <div class="dropdown-menu dropdown-menu-right">
              @if (auth()->user()->role == 'anggota')
                  
              <a href="/anggota/{{ auth()->user()->anggota->id }}/edit" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>

              <a href="/password/{{ auth()->user()->id }}/edit" class="dropdown-item has-icon">
                <i class="far fa-eye"></i> Ganti Password
              </a>
             
              @endif
              <div class="dropdown-divider"></div>
              <a href="/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

      {{-- end navbar --}}

      {{-- sidebar --}}
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand mb-4 mt-4">
            <img src="{{ asset('/images') }}/kalsel.png" style="width: 50px" alt="" srcset="">
            <a href="/"> BPSDMD KAL-SEL</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <img src="{{ asset('/images') }}/kalsel.png" style="width: 20px" alt="" srcset="">
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="/utama"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="/dashboard"><i class="fas fa-tachometer-alt"></i> <span>Pengembalian</span></a></li>
            <li class="menu-header">Starter</li>
            @if (auth()->user()->role == 'admin')
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-th-large"></i> <span>Data Master</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/anggota">Data Anggota</a></li>
                <li><a href="/buku" class="nav-link">Data Buku</a></li>
                <li><a href="/user" class="nav-link">User</a></li>
              </ul>
            </li>

            <li><a class="nav-link" href="/transaksi"><i class="fa fa-undo"></i> <span>Peminjaman</span></a></li>
            <li><a class="nav-link" href="/laporan"><i class="fa fa-file-alt"></i> <span>Laporan</span></a></li>
         
            
           
            
          
            @endif
          
        </aside>
      </div>

      {{-- end sidebar --}}

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('judul')</h1>
          </div>
    
          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div> 
     

      {{-- end main content --}}

      {{-- footer --}}

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> <a href="#">Muhammad Ridwan</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('/backend')}}/assets/modules/jquery.min.js"></script>
  <script src="{{asset('/backend')}}/assets/modules/popper.js"></script>
  <script src="{{asset('/backend')}}/assets/modules/tooltip.js"></script>
  <script src="{{asset('/backend')}}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{asset('/backend')}}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="{{asset('/backend')}}/assets/modules/moment.min.js"></script>
  <script src="{{asset('/backend')}}/assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

  <script src="{{asset('/backend')}}/assets/modules/izitoast/js/iziToast.min.js"></script>

  <script src="{{asset('/backend')}}/assets/modules/datatables/datatables.min.js"></script>
  <script src="{{asset('/backend')}}/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('/backend')}}/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="{{asset('/backend')}}/assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <script src="{{asset('/backend')}}/assets/modules/summernote/summernote-bs4.js"></script>
  <script src="{{asset('/backend')}}/assets/modules/select2/dist/js/select2.full.min.js"></script>

  <script src="{{asset('/backend')}}/assets/modules/sweetalert/sweetalert.min.js"></script>

  <script src="{{asset('/backend')}}/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- Page Specific JS File -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="{{asset('/backend')}}/assets/js/page/modules-datatables.js"></script>
  <script src="{{asset('/backend')}}/assets/js/page/modules-sweetalert.js"></script>
  <!-- Template JS File -->
  <script src="{{asset('/backend')}}/assets/js/scripts.js"></script>
  <script src="{{asset('/backend')}}/assets/js/custom.js"></script>

  <script>
    @if(Session::has('sukses'))
    toastr.success("{{ Session::get('sukses') }}", "Sukses")
    @elseif(Session::has('error'))
    toastr.error("{{ Session::get('error') }}", "Error")
    @endif
  </script>

  @yield('js')
</body>
</html>