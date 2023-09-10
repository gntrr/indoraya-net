@extends('user/app')

@section('content')
    <div class="bg-white mt-5rem shadow">
        <div class="container p-4 text-center">
            <h2>TENTANG KAMI</h2>
        </div>
    </div>
    <div class="container p-4">
        <div class="row flex-lg-row align-items-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 mx-md-auto mb-4 mb-md-4 mb-lg-0">
                <img src="{{ asset('images/undraw_welcoming_re_x0qo.svg') }}" class="img-fluid"
                     alt="Data Reports" loading="lazy">
            </div>
            <div class="col-lg-6 text-center text-md-center text-lg-start">
                <div class="mx-auto">
                    <h4 class="fw-bold text-sm-center text-md-center text-lg-start">INDORAYA.NET</h4>
                    <p class="lead mb-2">
                        Layanan Internet Broadbrand dengan jaringan full fiber optic. Dengan berbagai paket yang dapat
                        sesuai dengan layanan kebutuhan internet dan multimedia Sehingga anda bisa menikmati layanan
                        internet terbaik dari kami.
                    </p>
                    <p class="lead mb-2">
                        <b>INDORAYA.NET</b> merupakan metamorfosis atau Rebranding dari Stroomnet dengan produk layanan
                        internet broadband full fiber optic yang diberikan oleh <b>PT Java Digital Nusantara</b>
                        , mengedepankan pelayanan terbaik kepada para pelanggan kami.
                    </p>
                    <p class="lead mb-2">
                        Dengan pesatya perkembangan teknologi mempengaruhi berbagai aspek kehidupan kita yang semakin
                        bergantung pada internet, Indoraya network menawarkan kecepatan koneksi internet yang
                        tinggi,sehingga pengguna dapat mengakses dengan cepat.Indoraya network menawarkan harga yang
                        terjangkau,sehingga pelanggan mendapatkan koneksi internet yang baik tanpa membayar terlalu
                        mahal.
                    </p>
                </div>
            </div>
            <div class="container pt-4 px-4">
                <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                    <div class="col mb-4 text-center">
                        <div class="mb-4">
                            <img src="{{ asset('images/undraw_internet_on_the_go_re_vben.svg') }}" class="h-120px"
                                 alt="Internet">
                        </div>
                        <h4>Wi-Fi</h4>
                        <p class="lead">Akses internet cepat dengan fiber optik.</p>
                        <a href="{{ url('/wifi_services') }}" class="text-decoration-none text-dark">
                            INFO DETAIL
                            <i class="ms-1 fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <div class="col mb-4 text-center">
                        <div class="mb-4">
                            <img src="{{ asset('images/undraw_surveillance_re_8tkl.svg') }}" class="h-120px"
                                 alt="Internet">
                        </div>
                        <h4>CCTV</h4>
                        <p class="lead">Keamanan terjaga dengan teknologi CCTV terkini.</p>
                        <a href="{{ url('/cctv_services') }}" class="text-decoration-none text-dark">
                            INFO DETAIL
                            <i class="ms-1 fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <div class="col mb-4 text-center">
                        <div class="mb-4">
                            <img src="{{ asset('images/undraw_drone_delivery_re_in95.svg') }}" class="h-120px"
                                 alt="Internet">
                        </div>
                        <h4>Peralatan Jaringan</h4>
                        <p class="lead">Peralatan Jaringan terlengkap.</p>
                        <a href="{{ url('/equipment_networks') }}" class="text-decoration-none text-dark">
                            INFO DETAIL
                            <i class="ms-1 fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
