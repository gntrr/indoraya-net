@extends('admin.app')

@section('content')
    <div class="bg-white mt-5rem mb-4 shadow">
        <div class="container p-4 mx-auto">
            <h2 class="text-center text-md-start mb-4">Wi-Fi Services</h2>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="text-center text-md-start mb-2 mb-md-0">
                        <a href="{{ url('/admin/wifi-services/create') }}"
                           class="btn btn-dark mb-3 mx-auto">
                            <i class="small me-2 fas fa-plus"></i>
                            Tambah Paket Wi-Fi
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <form action="{{ url('/admin/wifi-services/') }}" method="GET">
                        <div class="input-group max-width-100px mx-auto mx-md-0 ms-md-auto">
                            <input class="form-control border-dark bg-light" placeholder="Cari..." name="keyword"
                                   aria-label="Cari" aria-describedby="button-cari"
                                   value="{{ request()->input('keyword') }}">
                            <button type="submit" class="btn btn-dark">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="fas fa-thumbs-up me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if($wifi_services->isEmpty())
            <div class="text-center">
                <img src="{{ asset('images/undraw_No_data_re_kwbl.svg') }}" width="200px" class="img-fluid"
                     alt="No Data"
                     loading="lazy">
                <h4 class="mt-3">Tidak ada data yang tersedia.</h4>
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-3 mb-4 text-center">
                @foreach($wifi_services as $service)
                    <div class="col">
                        <div class="card mb-4 rounded-4 shadow-sm">
                            <div class="card-header py-4">
                                <h4 class="my-0 fw-normal">{{ $service->name }}</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">Rp. {{ $service->price }}<small
                                        class="text-muted fw-light">/bln</small></h1>
                                <div class="list-unstyled my-4">
                                    <p>Up to <b>{{ $service->speed }} Mb</b></p>
                                    <p>{{ $service->description }}</p>
                                </div>
                                <a href="{{ url('/admin/wifi-services/' . $service->id . '/edit') }}" role="button"
                                   class="w-100 btn btn-lg btn-dark mb-2">
                                    <i class="small fas fa-edit me-2"></i>
                                    Edit
                                </a>
                                <a role="button" class="delete-button w-100 btn btn-lg btn-outline-danger"
                                   data-id="{{ $service->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="small fas fa-trash-alt me-2"></i>
                                    Hapus
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="modal fade" tabindex="-1" role="dialog" data-bs-backdrop="static"
                     data-bs-keyboard="false" aria-hidden="true" id="deleteModal">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content rounded-3 shadow">
                            <div class="modal-body p-4 text-center">
                                <h5 class="mb-3">Anda akan menghapus paket layanan Wi-Fi ini?</h5>
                                <p class="mb-0">Layanan ini akan dihapus secara permanen. Apakah Anda
                                    yakin ingin melanjutkan?</p>
                            </div>
                            <div class="modal-footer flex-nowrap p-0">
                                <form id="deleteForm" method="POST" action="" class="col-6 py-3 m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-100 btn btn-lg btn-link fs-6 text-decoration-none text-danger rounded-0 border-end"
                                            data-bs-dismiss="modal"><strong>Ya, hapus</strong></button>
                                </form>
                                <button
                                    class="btn btn-lg btn-link fs-6 text-decoration-none text-dark col-6 py-3 m-0 rounded-0"
                                    data-bs-dismiss="modal">Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('script')
    <script>
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                const wifiServiceId = this.getAttribute('data-id');
                const deleteForm = document.getElementById('deleteForm');
                deleteForm.action = '{{ url("/admin/wifi-services/") }}/' + wifiServiceId;
            })
        })
    </script>
@endpush
