<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | {{ $title ?? 'Unknown' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="{{ url('/css/main.css') }}" rel="stylesheet">
    @stack('css')
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-smooth-scroll="true"
      tabindex="0">
<nav class="navbar fixed-top bg-light shadow">
    <div class="container px-4">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
                aria-controls="sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    <i class="far fa-user-circle fs-6 pe-1"></i>
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li>
                        <a class="dropdown-item" href="{{ url('admin/edit-profile') }}">
                            Ubah Profil
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ url('admin/edit-password') }}">
                            Ubah Kata Sandi
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a role="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout">
                            <i class="fas fa-sign-out-alt pe-1"></i>Keluar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="offcanvas offcanvas-start d-flex flex-column flex-shrink-0 p-4 text-bg-dark" data-bs-scroll="true"
             tabindex="-1" id="sidebar" aria-labelledby="sidebarAdmin">
            <div class="d-flex align-items-center justify-content-between">
                <a class="navbar-brand fw-bold text-white" href="{{ url('/') }}">INDORAYA.NET</a>
                <button class="btn btn-close btn-close-white" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#sidebar" aria-controls="offcanvasWithBothOptions">
                </button>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ url('/admin') }}">
                        <div class="icon-neat">
                            <i class="fas fa-home"></i>
                        </div>
                        Home
                    </a>
                </li>
                @if(auth()->user()->role == 'admin')
                    <li class="nav-item mb-2">
                        <a class="nav-link text-white" href="{{ url('/admin/employees') }}">
                            <div class="icon-neat">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            List Pegawai
                        </a>
                    </li>
                @endif
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ url('/admin/wifi-services') }}"
                       aria-expanded="false">
                        <div class="icon-neat">
                            <i class="fas fa-wifi"></i>
                        </div>
                        Wi-Fi
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ url('/admin/cctv-services') }}"
                       aria-expanded="false">
                        <div class="icon-neat">
                            <i class="fas fa-eye"></i>
                        </div>
                        CCTV
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ url('/admin/equipment-networks') }}"
                       aria-expanded="false">
                        <div class="icon-neat">
                            <i class="fas fa-network-wired"></i>
                        </div>
                        Peralatan Jaringan
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ url('/admin/testimonies') }}"
                       aria-expanded="false">
                        <div class="icon-neat">
                            <i class="fas fa-user-check"></i>
                        </div>
                        Testimoni
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@if(session('login_success'))
    <div class="alert alert-success alert-dismissible fade show mt-5rem mb-4 container px-4" role="alert">
        <i class="fas fa-thumbs-up me-2"></i>{{ session('login_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@yield('content');

<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logout" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin untuk keluar?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda tidak bisa mengakses fitur admin jika anda logout.
            </div>
            <div class="modal-footer">
                <form action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button type="submit" role="button" class="btn btn-dark">Keluar</button>
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="container p-4 text-center">
    <hr class="mb-4">
    <p>© 2023 All rights reserved. INDORAYA.NET powered by PT Java Digital Nusantara</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/51ab965bab.js" crossorigin="anonymous"></script>
<script>
    const dropdownItems = document.querySelectorAll(".dropdown-item");

    dropdownItems.forEach(item => {
        if (item.getAttribute("href") === window.location.href) {
            item.classList.add("active");
        }
    });

    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach(link => {
        if (link.getAttribute("href") === window.location.href) {
            link.classList.add("active");
        }
    });
</script>

@stack('script')
</body>
</html>
