<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/iconfonts/ionicons/dist/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/shared/style.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/css/demo_1/style.css') }}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{ asset('img/icon.ico') }}" />
  </head>
  <body>
    @auth
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="/home">
            <img src="{{ asset('img/logo.png') }}" alt="logo" /> </a>
          <a class="navbar-brand brand-logo-mini" href="/home">
            <img src="{{ asset('img/icon.png') }}" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <form class="ml-auto search-form d-none d-md-block" action="#">
            <div class="form-group">
              <input type="search" class="form-control" placeholder="Search Here">
            </div>
          </form>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="{{ asset('admin/images/faces/face8.jpg') }}" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="{{ asset('admin/images/faces/face8.jpg') }}" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                  <p class="font-weight-light text-muted mb-0">{{ Auth::user()->email }}</p>
                </div>
                @if (Auth::user()->level == 'Admin')
                <a href="/" class="dropdown-item">Kembali ke Shop<i class="dropdown-item-icon ti-help-alt"></i></a>
                @endif
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"">Keluar<i class="dropdown-item-icon ti-power-off"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="{{ asset('admin/images/faces/face8.jpg') }}" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{ Auth::user()->name }}</p>
                  <p class="designation">{{ Auth::user()->level }}</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#home" aria-expanded="false" aria-controls="home">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Home</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="home">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                  </li>
                  @if (Auth::user()->level == 'Admin')
                  <li class="nav-item">
                    <a class="nav-link" href="/home">Home Admin</a>
                  </li>
                  @endif
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/alamat">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Alamat</span>
              </a>
            </li>
            @if (Auth::user()->level == 'Admin')
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#admin-menu" aria-expanded="false" aria-controls="admin-menu">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Admin Menu</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="admin-menu">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="/admin/users">Pengguna</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/admin/category">Kategori</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/admin/product">Produk</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/admin/order">Pesanan</a>
                  </li>
                </ul>
              </div>
            </li>
            @endif
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          @yield('content')
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 {{ env('APP_NAME') }}</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Theme <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('admin/js/shared/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/js/shared/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('admin/js/demo_1/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
    <script src="{{ asset('admin/js/shared/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
      var konten = document.getElementById("konten");
        CKEDITOR.replace(konten,{
        language:'en-gb'
      });
      CKEDITOR.config.allowedContent = true;
    </script>
    @else
    <script type="text/javascript">
        window.location = "{{ url('/') }}";//here double curly bracket
    </script>
    @endauth
  </body>
</html>