@extends('user/app')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
@endpush

@section('content')
    <div class="bg-aqua">
        <div class="container px-4 h-100vh d-flex">
            <div class="row flex-lg-row-reverse align-items-center">
                <div class="col-8 col-sm-6 col-lg-4 mx-auto mt-5">
                    <img src="{{ asset('images/undraw_mobile_re_q4nk.svg') }}" class="img-fluid"
                         alt="Data Reports" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold mb-4">Layanan WiFi dan CCTV Terbaik di Wilayah Ponorogo</h1>
                    <div class="d-md-flex">
                        <a href="#tentang" role="button" class="btn btn-dark btn-lg px-4 me-md-2">Jelajahi<i
                                class="fas fa-chevron-down ms-2 fs-6"></i></a>
                        <a href="https://api.whatsapp.com/send/?phone=6281615946588" role="button"
                           class="btn btn-outline-dark btn-lg px-4">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="tentang" class="pb-3">
        <div class="bg-aqua">
            <img src="{{ asset('images/wave.svg') }}" alt="Wave">
        </div>
        <div class="container px-4  row flex-lg-row align-items-center">
            <div class="col-10 col-sm-8 col-lg-5 mx-md-auto mb-4 mb-md-4 mb-lg-0">
                <img src="{{ asset('images/undraw_Profile_re_4a55.svg') }}" class="img-fluid"
                     alt="Data Reports" loading="lazy">
            </div>
            <div class="col-lg-6 text-center text-md-center text-lg-start">
                <h1 class="display-6 fw-bold mb-4 text-sm-center text-md-center text-lg-start">Tentang INDORAYA.NET</h1>
                <div class="mx-auto">
                    <p class="lead mb-4">
                        Mitra terpercaya Anda dalam layanan WiFi dan CCTV yang menghadirkan
                        konektivitas digital yang handal dan aman. Dengan komitmen terhadap kualitas, kami tidak hanya
                        menyediakan layanan unggulan, tetapi juga menyuplai peralatan jaringan berkualitas tinggi untuk
                        memastikan fondasi yang kuat bagi pengalaman online yang tak terputus.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-4">
        <div class="mx-auto py-4 text-center">
            <h1 class="display-6 fw-bold mb-4">Keunggulan Kami</h1>
            <p class="lead mb-4">
                Solusi terbaik untuk layanan WiFi, CCTV, dan Peralatan Jaringan. Pengalaman konektivitas yang tak
                tertandingi dalam genggaman Anda.
            </p>
        </div>
        <div class="row mb-5 text-center">
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <h4 class="mb-2 fw-normal"><i class="fas fa-shield-alt text-aqua me-2"></i>Solusi Terpadu</h4>
                <p class="lead">
                    Layanan WiFi, CCTV, dan Peralatan Jaringan dalam satu platform.
                </p>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <h4 class="mb-2 fw-normal"><i class="fas fa-user-friends text-aqua me-2"></i>Harga Kompetitif</h4>
                <p class="lead">
                    Penawaran yang bersaing untuk solusi berkualitas tinggi.
                </p>
            </div>
            <div class="col-12 col-sm-12 col-lg-4 mb-4">
                <h4 class="mb-2 fw-normal"><i class="far fa-thumbs-up text-aqua me-2"></i>Dukungan 24/7</h4>
                <p class="lead">
                    Tim ahli siap membantu Anda kapan saja Anda membutuhkannya.
                </p>
            </div>
        </div>
    </div>
    <div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified navbar-dark" id="tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="wifi-tab" data-bs-toggle="tab"
                            data-bs-target="#wifi" type="button"
                            role="tab" aria-selected="true">Paket Wi-Fi
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="cctv-tab" data-bs-toggle="tab" data-bs-target="#cctv"
                            type="button"
                            role="tab" aria-selected="false">CCTV
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="network-tab" data-bs-toggle="tab" data-bs-target="#network"
                            type="button"
                            role="tab" aria-selected="false">Peralatan Jaringan
                    </button>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="wifi" role="tabpanel" aria-labelledby="wifi-tab"
                 tabindex="0">
                <div class="container px-4">
                    <div class="mx-auto py-4 text-center">
                        <h1 class="display-6 fw-bold mb-4">Paket Wi-Fi</h1>
                        <p class="lead mb-4">
                            Berbagai paket yang dapat sesuai dengan layanan kebutuhan internet dan multimedia anda.
                        </p>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 mb-4 text-center">
                        @foreach($wifi_services as $service)
                            <div class="col mx-auto">
                                <div class="card mb-4 rounded-4 shadow-sm">
                                    <div class="card-header py-4">
                                        <h4 class="my-0 fw-normal">{{ $service->name }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">Rp. {{ $service->price }}<small
                                                class="text-muted fw-light">/bln</small></h1>
                                        <ul class="list-unstyled my-4">
                                            <li>Up to <span class="fw-bold">{{ $service->speed }} Mbps</span></li>
                                            <li>Full optical fiber</li>
                                            <li>Free installation</li>
                                        </ul>
                                        <p class="mb-4">{{ $service->description }}</p>
                                        <a href="https://api.whatsapp.com/send/?phone=6281615946588&text=Pesan Wi-Fi {{ $service->name }}"
                                           role="button"
                                           class="w-100 btn btn-lg btn-dark mb-2">
                                            <i class="fab fa-whatsapp me-2"></i>
                                            Pesan Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="bg-dark my-4 py-4">
                    <div class="p-4 text-white text-center">
                        <h4 class="mb-4">Pemasangan Wi-Fi Pertama Gratis 1 Bulan Pemakaian</h4>
                        <p class="lead mb-4">Nikmati pemasangan pertama gratis selama 1 bulan pemakaian. Jangan lewatkan
                            kesempatan ini!</p>
                        <a href="{{ url('wifi_services') }}" role="button" class="btn btn-lg btn-outline-aqua">
                            Lihat Semua
                        </a>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="cctv" role="tabpanel" aria-labelledby="cctv-tab" tabindex="0">
                <div class="container px-4">
                    <div class="mx-auto py-4 text-center">
                        <h1 class="display-6 fw-bold mb-4">Pasang CCTV</h1>
                        <p class="lead mb-4">
                            Dengan teknologi CCTV mutakhir, kami memberikan perlindungan 24/7 untuk lingkungan Anda.
                        </p>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 text-center">
                        @foreach($cctv_services as $service)
                            <div class="col mx-auto">
                                <div class="card mb-4 rounded-4 shadow-sm">
                                    <div class="card-body">
                                        <div class="mx-auto">
                                            <img src="{{ asset('storage/' . $service->image) }}" class="h-120px"
                                                 alt="CCTV"
                                                 loading="lazy">
                                        </div>
                                        <h1 class="card-title my-4">{{ $service->price }}</h1>
                                        <div class="my-4">
                                            <h4 class="card-subtitle">{{ $service->name }}</h4>
                                            <p>{{ $service->description }}</p>
                                        </div>
                                        <a href="https://api.whatsapp.com/send/?phone=6281615946588&text=Pesan {{ $service->name }}"
                                           role="button"
                                           class="w-100 btn btn-lg btn-dark mb-2">
                                            <i class="fab fa-whatsapp me-2"></i>
                                            Pesan Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="network" role="tabpanel" aria-labelledby="network-tab" tabindex="0">
                <div class="container px-4">
                    <div class="mx-auto py-4 text-center">
                        <h1 class="display-6 fw-bold mb-4">List Peralatan Jaringan</h1>
                        <p class="lead mb-4">
                            Berbagai peralatan jaringan yang dapat menunjang kebutuhan internet dan multimedia anda.
                        </p>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 mb-4 text-center">
                        @foreach($equipment_networks as $equipment)
                            <div class="col mx-auto">
                                <div class="card mb-4 rounded-4 shadow-sm">
                                    <div class="card-body">
                                        <div class="mx-auto">
                                            <img src="{{ asset('storage/' . $equipment->image) }}" class="h-120px"
                                                 alt="Network Equipment"
                                                 loading="lazy">
                                        </div>
                                        <h1 class="card-title my-4">{{ $equipment->price }}</h1>
                                        <div class="my-4">
                                            <h4 class="card-subtitle">{{ $equipment->name }}</h4>
                                            <p>{{ $equipment->description }}</p>
                                        </div>
                                        <a href="{{ $equipment->link }}"
                                           role="button"
                                           class="w-100 btn btn-lg btn-dark mb-2">
                                           <i class="fas fa-link me-2"></i>
                                            Pesan Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-4">
        <h1 class="display-6 fw-bold mb-4 text-center">Testimoni</h1>
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach($testimonies as $testimony)
                    <div class="swiper-slide shadow rounded-4 my-4 p-4 border border-1 border-secondary text-center">
                        <h4 class="fw-normal my-2">{{ $testimony->name }}</h4>
                        <p class="fw-light">"{{ $testimony->content }}"</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        const triggerTabList = document.querySelectorAll('#tab button')
        triggerTabList.forEach(triggerEl => {
            const tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', event => {
                event.preventDefault()
                tabTrigger.show()
            })
        })

        const triggerEl = document.querySelector('#tab button[data-bs-target="#cctv"]')
        bootstrap.Tab.getInstance(triggerEl).show()

        const triggerFirstTabEl = document.querySelector('#tab li:first-child button')
        bootstrap.Tab.getInstance(triggerFirstTabEl).show()

        const swiper = new Swiper('.swiper', {
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                100: {
                    slidesPerView: 1.1,
                    spaceBetween: 10
                },
                280: {
                    slidesPerView: 1.2,
                    spaceBetween: 20
                },
                484: {
                    slidesPerView: 1.5,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 2.2,
                    spaceBetween: 20
                },
                1000: {
                    slidesPerView: 4,
                    spaceBetween: 20
                },
            },
        });

        (function matchHeight() {
            let i;
            const matchDivs = document.querySelectorAll('.swiper-slide');
            const heights = [];

            for (i = 0; i < matchDivs.length; i++) {
                heights.push(matchDivs[i].offsetHeight);
            }

            const tallestHeight = Math.max(...heights);

            for (i = 0; i < matchDivs.length; i++) {
                matchDivs[i].style.height = tallestHeight + 'px';
            }
        })();
    </script>
@endpush
