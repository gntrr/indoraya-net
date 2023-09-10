<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INDORAYA.NET | {{ $title ?? 'Unknown' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="{{ url('/css/main.css') }}" rel="stylesheet">
    @stack('css')
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-smooth-scroll="true" tabindex="0">

<nav id="navbar" class="navbar navbar-expand-lg fixed-top bg-white shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}/">INDORAYA.NET</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="d-flex justify-content-end w-100 gap-3 navbar-nav my-2">
                <li class="nav-item">
                    <a class="nav-link is-active" href="{{ url('') }}/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link is-active" href="{{ url('/about_us') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Layanan
                        </a>
                        <ul class="dropdown-menu shadow">
                            <li><a class="dropdown-item is-active" href="{{ url('/wifi_services') }}">Wi-Fi</a></li>
                            <li><a class="dropdown-item is-active" href="{{ url('/cctv_services') }}">CCTV</a></li>
                            <li><a class="dropdown-item is-active" href="{{ url('/equipment_networks') }}">
                                    Beli Peralatan Jaringan</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
        <div class="row gy-3 pb-4">
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <a href="https://goo.gl/maps/fw4EkakKBk6o2zPG9" class="row text-decoration-none text-white">
                    <div class="col-4 col-md-8 col-lg-4 mb-4 mb-lg-0 mx-auto mx-md-0">
                        <img src="{{ asset('images/map.png') }}" alt="Map" class="w-100 rounded-4">
                    </div>
                    <span class="col-12 col-lg-8 text-center text-md-start">
                        Jl. Bung Tomo, Blembem, Jambon, Ponorogo, Jawa Timur 63456
                    </span>
                </a>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3 text-center">
                <h5 class="text-uppercase font-weight-bold text-aqua">INDORAYA.NET</h5>
                <p>Terhubung Lebih Dekat, Jaga Lebih Akrab</p>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3 text-center">
                <div class="d-flex gap-2 justify-content-center">
                    <a href="" class="rounded-2 bg-aqua text-decoration-none">
                        <i class="p-2 fs-4 text-dark fab fa-instagram"></i>
                    </a>
                    <a href="" class="rounded-2 bg-aqua text-decoration-none">
                        <i class="p-2 fs-4 text-dark fab fa-telegram"></i>
                    </a>
                    <a href="" class="rounded-2 bg-aqua text-decoration-none">
                        <i class="p-2 fs-4 text-dark fas fa-envelope"></i>
                    </a>
                    <a href="" class="rounded-2 bg-aqua text-decoration-none">
                        <i class="p-2 fs-4 text-dark fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr class="mb-4">

        <div class="text-center">
            <p>© 2023 All rights reserved. INDORAYA.NET powered by PT Java Digital Nusantara
            </p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/51ab965bab.js" crossorigin="anonymous"></script>
<script>
    const isActive = document.querySelectorAll(".is-active");

    isActive.forEach(link => {
        if (link.getAttribute("href") === window.location.href) {
            link.classList.add("active");
        }
    });
</script>

@stack('script')
</body>
</html>
