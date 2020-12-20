<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="shortcut icon" href="{{ asset('img/icon.ico') }}" />

    <title>{{ env('APP_NAME') }}</title>
    @livewireStyles
  </head>
  <body>
    <!-- Web Navbar -->
    <div class="header d-none d-xl-block sticky-top">
        <div class="logo-img">
            <a href="/">
                <img src="img/logo.png" alt="">
            </a>
        </div>
        <div class="kategori">
            <button class="dropdown">
                Kategori
            </button>
            <div class="dropdown-content">
                @foreach ($category as $cat)
                <a href="{{ url('/kategori/' . $cat->id) }}">{{ $cat->nama_kategori }}</a>
                @endforeach
            </div>
        </div>
        <div class="search">
            <form url="/" class="form-header" method="GET" role="search">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        @if (Route::has('login'))
        <div class="header-right">
            @auth
                <a href="/cart" class="cart">
                    <i class="fas fa-shopping-cart"></i><sup class="sup-cart">{{ \Cart::getTotalQuantity()}}</sup>
                </a>
                <a class="nav-link dropdown-toggle profile" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} &nbsp; <img src="img/1.png" alt="Img">
                </a>
                <div class="dropdown-menu profile-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Daftar Pesanan</a>
                    <a class="dropdown-item" href="{{ url('alamat') }}">Alamat</a>
                    @if (Auth::user()->level == 'Admin')
                    <a class="dropdown-item" href="home">Menu Admin</a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <div class="row bagi-dua">
                        <div class="col-md-6">
                            <a href="#">
                                <i class="fas fa-cog"></i> Profil
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"">
                                <i class="fas fa-power-off"></i> Keluar
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="auth-btn">
                    <a href="{{ route('login') }}" class="btn-login">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-register">
                            Daftar
                        </a>
                    @endif
                </div>
            @endauth
        </div>
        @endif
    </div>
    <!-- Mobile Navbar -->
    <div class="header-mobile sticky-top d-xl-none">
        <div class="logo-img-mobile">
            <img src="img/logo.png" alt="">
        </div>
    </div>

    <nav class="navbar navbar-dark bg-primary navbar-expand fixed-bottom d-xl-none">
        <ul class="navbar-nav nav-justified w-100">
            <li class="nav-item">
                <a href="/" class="nav-link">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <svg width="2em" height="2em" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M448.994 375.164C455.877 375.164 461.877 370.479 463.546 363.802L511.545 171.805C513.913 162.332 506.733 153.167 496.993 153.167H465.057L506.929 111.294C512.787 105.437 512.787 95.9397 506.929 90.0818L422.08 5.23292C416.223 -0.625002 406.725 -0.625002 400.868 5.23292L319.202 86.8998C301.741 73.287 279.8 65.1681 255.997 65.1681C204.297 65.1681 161.378 103.458 154.094 153.167H92.5907L86.6768 125.077C85.2158 118.136 79.0919 113.167 71.999 113.167H14.9998C6.71591 113.167 0 119.883 0 128.167C0 136.451 6.71591 143.167 14.9998 143.167H59.8282C119.112 424.768 114.626 403.459 118.246 420.655C101.108 427.673 88.9988 444.526 88.9988 464.163C88.9988 490.078 110.082 511.162 135.998 511.162C168.989 511.162 191.761 477.87 179.803 447.163H381.19C369.22 477.899 392.04 511.162 424.994 511.162C450.91 511.162 471.994 490.078 471.994 464.163C471.994 438.242 450.778 416.81 424.328 417.18C423.156 417.154 152.798 417.163 148.168 417.163L139.326 375.164H448.994ZM112.379 247.166H157.957L163.624 281.165H119.537L112.379 247.166ZM188.371 247.166H231.529L234.362 281.165H194.037L188.371 247.166ZM177.705 183.167H226.195L229.028 217.166H183.37L177.705 183.167ZM453.283 281.165H412.368L418.035 247.166H461.783L453.283 281.165ZM381.955 281.165H341.631L344.464 247.166H387.622L381.955 281.165ZM336.297 345.164L339.13 311.165H376.954L371.287 345.164H336.297ZM269.798 345.164L266.965 311.165H309.027L306.194 345.164H269.798ZM264.465 281.165L261.632 247.166H314.361L311.528 281.165H264.465ZM346.964 217.166L349.797 183.167H398.288L392.621 217.166H346.964ZM316.861 217.166H259.132L256.3 183.167H319.695L316.861 217.166ZM236.862 311.165L239.695 345.164H204.704L199.037 311.165H236.862ZM401.702 345.164L407.368 311.165H445.783L437.283 345.164H401.702ZM469.283 217.166H423.034L428.701 183.167H477.782L469.283 217.166ZM422.631 153.167H380.218L453.904 79.4809L475.111 100.688L422.631 153.167ZM411.474 37.0515L432.691 58.2682L354.119 136.84C350.854 126.637 346.045 117.118 339.958 108.568L411.474 37.0515ZM255.997 95.1677C291.109 95.1677 320.511 120.085 327.447 153.167H184.546C191.482 120.085 220.884 95.1677 255.997 95.1677ZM147.291 183.167L152.958 217.166H106.065L98.9066 183.167H147.291ZM152.998 464.163C152.998 473.537 145.372 481.162 135.998 481.162C126.624 481.162 118.998 473.537 118.998 464.163C118.998 454.789 126.624 447.163 135.998 447.163C145.372 447.163 152.998 454.789 152.998 464.163ZM424.994 481.162C415.62 481.162 407.994 473.537 407.994 464.163C407.994 454.789 415.62 447.163 424.994 447.163C434.368 447.163 441.994 454.789 441.994 464.163C441.994 473.537 434.368 481.162 424.994 481.162ZM125.853 311.165H168.624L174.291 345.164H133.011L125.853 311.165Z" fill="#C7C7C7"/>
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                @guest
                <a href="{{ route('login') }}" class="nav-link">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                </a>
                @else
                <a href="{{ url('/') }}" class="nav-link">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                </a>
                @endguest
            </li>
        </ul>
    </nav>