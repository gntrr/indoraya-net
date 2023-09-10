@extends('user/app')

@section('content')
    <div class="bg-white mt-5rem shadow">
        <div class="container p-4 text-center">
            <h2>List Peralatan Jaringan</h2>
            <p class="lead">
                Berbagai peralatan jaringan yang dapat menunjang kebutuhan internet dan multimedia anda.
            </p>
        </div>
    </div>
    <div class="container p-4">
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
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
@endsection
