@extends('user/app')

@section('content')
    <div class="bg-white mt-5rem shadow">
        <div class="container p-4 text-center">
            <h2>Pasang CCTV INDORAYA.NET</h2>
            <p class="lead">
                Dengan teknologi CCTV mutakhir, kami memberikan perlindungan 24/7 untuk lingkungan anda.
            </p>
        </div>
    </div>
    <div class="container p-4">
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
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
@endsection
