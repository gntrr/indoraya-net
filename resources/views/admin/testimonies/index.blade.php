@extends('admin.app')

@section('content')
    <div class="bg-white mt-5rem mb-4 shadow">
        <div class="container p-4 mx-auto">
            <h2 class="text-center text-md-start mb-4">Testimoni</h2>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="text-center text-md-start mb-2 mb-md-0">
                        <a href="{{ url('/admin/testimonies/create') }}"
                           class="btn btn-dark mb-3 mx-auto">
                            <i class="small me-2 fas fa-plus"></i>
                            Tambah Testimoni
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <form action="{{ url('/admin/testimonies/') }}" method="GET">
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
        @if($testimonies->isEmpty())
            <div class="text-center">
                <img src="{{ asset('images/undraw_No_data_re_kwbl.svg') }}" width="200px" class="img-fluid"
                     alt="No Data"
                     loading="lazy">
                <h4 class="mt-3">Tidak ada data yang tersedia.</h4>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle mb-4">
                    <thead class="table-dark">
                    <tr class="align-middle">
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Konten</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($testimonies as $testimony)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $testimony->name }}</td>
                            <td>{{ $testimony->content }}</td>
                            <td>
                                <a href="{{ url('/admin/testimonies/' . $testimony->id . '/edit') }}" role="button"
                                   class="btn btn-sm btn-dark">
                                    <i class="small fas fa-edit me-1"></i>
                                    Edit
                                </a>
                                <a role="button"
                                   class="delete-button d-flex d-md-inline-block align-items-center btn btn-sm btn-outline-danger"
                                   data-id="{{ $testimony->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="small fas fa-trash-alt me-1"></i>
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal fade" tabindex="-1" role="dialog" data-bs-backdrop="static"
                 data-bs-keyboard="false" aria-hidden="true" id="deleteModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-3 shadow">
                        <div class="modal-body p-4 text-center">
                            <h5 class="mb-3">Anda akan menghapus testimoni ini?</h5>
                            <p class="mb-0">Testimoni ini akan dihapus secara permanen. Apakah Anda
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
        @endif
    </div>
@endsection

@push('script')
    <script>
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                const testimonyId = this.getAttribute('data-id');
                const deleteForm = document.getElementById('deleteForm');
                deleteForm.action = '{{ url("/admin/testimonies/") }}/' + testimonyId;
            })
        })
    </script>
@endpush
