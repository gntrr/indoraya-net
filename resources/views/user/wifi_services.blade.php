@extends('user/app')

@section('content')
    <div class="bg-white mt-5rem shadow">
        <div class="container p-4 text-center">
            <h2>Paket Wi-Fi INDORAYA.NET</h2>
            <p class="lead">
                Berbagai paket yang dapat sesuai dengan layanan kebutuhan internet dan multimedia anda.
            </p>
        </div>
    </div>
    <div class="container p-4">
        <div class="row row-cols-1 row-cols-md-3 my-4 text-center">
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
                                <li>Up to <span class="fw-bold">3 Mb</span></li>
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
    <div class="bg-dark py-4">
        <div class="p-4 text-white text-center">
            <h4 class="mb-4">Pemasangan Wi-Fi Pertama Gratis 1 Bulan Pemakaian</h4>
            <p class="lead mb-4">Nikmati pemasangan pertama gratis selama 1 bulan pemakaian. Jangan lewatkan
                kesempatan ini!</p>
            <button type="button" class="btn btn-lg btn-outline-aqua">Pesan Sekarang</button>
        </div>
    </div>
@endsection
