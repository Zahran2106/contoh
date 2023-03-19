<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Aplikasi Pengkat</title>
    
    <link rel="stylesheet" href="{{ asset('assets/template/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/icons/icon-kabupaten.png') }}" type="image/x-icon">
    
<link rel="stylesheet" href="{{ asset('assets/template/assets/css/shared/iconly.css') }}">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="">
                <a href="index.html" class="text-primary"><img src="{{ asset('assets/icons/icon-kabupaten.png') }}" alt="Logo" style="height:30px"> PENGKAT </a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            @if (Auth::guard('masyarakat')->user())
                <li class="sidebar-item @if (request()->is('masyarakat')) active @endif">
                    <a href="{{ route('masyarakat.landing') }}" class='sidebar-link'>
                        <img src="{{ asset('assets/bootstrap-icons/grid-fill.svg') }}" alt="">
                        <span>Landing</span>
                    </a>
                </li>
                <li class="sidebar-item @if (request()->is('pengaduan')) active @endif">
                    <a href="{{ route('pengaduan.index') }}" class='sidebar-link'>
                        <img src="{{ asset('assets/bootstrap-icons/megaphone.svg') }}" alt="">
                        <span>Data Pengaduan</span>
                    </a>
                </li>
            @endif

            @if (Auth::guard('petugas')->user())
                <li class="sidebar-item @if (request()->is('petugas')) active @endif">
                    <a href="{{ route('petugas.landing') }}" class='sidebar-link'>
                        <img src="{{ asset('assets/bootstrap-icons/grid-fill.svg') }}" alt="">
                        <span>Landing</span>
                    </a>
                </li>
                <li class="sidebar-item @if (request()->is('petugas/pengaduan')) active @endif">
                    <a href="{{ route('pengaduan.indexPetugas') }}" class='sidebar-link'>
                        <img src="{{ asset('assets/bootstrap-icons/megaphone.svg') }}" alt="">
                        <span>Data Pengaduan</span>
                    </a>
                </li>
                <li class="sidebar-item @if (request()->is('petugas/tanggapan')) active @endif">
                    <a href="{{ route('tanggapan.index') }}" class='sidebar-link'>
                        <img src="{{ asset('assets/bootstrap-icons/chat.svg') }}" alt="">
                        <span>Data Tanggapan</span>
                    </a>
                </li>
                <li class="sidebar-item @if (request()->is('petugas/masyarakat')) active @endif">
                    <a href="{{ route('masyarakat.index') }}" class='sidebar-link'>
                        <img src="{{ asset('assets/bootstrap-icons/person.svg') }}" alt="">
                        <span>Data Masyarakat</span>
                    </a>
                </li>
                <li class="sidebar-item @if (request()->is('petugas/petugas')) active @endif">
                    <a href="{{ route('petugas.index') }}" class='sidebar-link'>
                        <img src="{{ asset('assets/bootstrap-icons/person-gear.svg') }}" alt="">
                        <span>Data Petugas</span>
                    </a>
                </li>
                <li class="sidebar-item @if (request()->is('petugas/log')) active @endif">
                    <a href="{{ route('petugas.log') }}" class='sidebar-link'>
                        <img src="{{ asset('assets/bootstrap-icons/person-gear.svg') }}" alt="">
                        <span>Data Log</span>
                    </a>
                </li>
            @endif
            
            <li class="sidebar-item">
                <a href="{{ route('logout') }}" class='sidebar-link'>
                    <img src="{{ asset('assets/bootstrap-icons/box-arrow-right.svg') }}" alt="">
                    <span>Logout</span>
                </a>
            </li>
            
        </ul>
    </div>
</div>
        </div>
        
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')
        </div>
    </div>
    <script src="{{ asset('assets/template/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/template/assets/js/app.js') }}"></script>
    
<!-- Need: Apexcharts -->
<script src="{{ asset('assets/template/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/template/assets/js/pages/dashboard.js') }}"></script>

</body>

</html>
