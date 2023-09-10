@extends('admin.app')

@section('content')
    <div class="bg-white mt-5rem shadow">
        <div class="container p-4 text-center">
            <h2>Tambah Testimoni</h2>
        </div>
    </div>
    <div class="container p-4">
        <form action="{{ url('/admin/testimonies/create') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nama Testimoni</label>
                <input class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                       aria-describedby="name" placeholder="Masukkan Nama Pemberi Testimoni *"
                       value="{{ old('name') ?? '' }}">
                @error('name')
                <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label fw-bold">Isi Testimoni</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content"
                          rows="3" placeholder="Masukkan Isi Konten *">{{ old('content') ?? '' }}</textarea>
                @error('description')
                <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <button type="button" class="btn btn-dark d-block mb-4" data-bs-toggle="modal"
                    data-bs-target="#modalChoice">TAMBAH
            </button>
            <div class="modal fade" tabindex="-1" role="dialog" data-bs-backdrop="static"
                 data-bs-keyboard="false" aria-hidden="true" id="modalChoice">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-3 shadow">
                        <div class="modal-body p-4 text-center">
                            <h5 class="mb-3">Anda akan menambahkan Testimoni ini?</h5>
                            <p class="mb-0">Pastikan informasi yang Anda ubah sudah benar dan relevan. Apakah Anda yakin
                                ingin melanjutkan?</p>
                        </div>
                        <div class="modal-footer flex-nowrap p-0">
                            <button type="submit"
                                    class="btn btn-lg btn-link fs-6 text-dark text-decoration-none col-6 py-3 m-0 rounded-0 border-end"
                                    data-bs-dismiss="modal"><strong>Ya, tambah</strong></button>
                            <button type="button"
                                    class="btn btn-lg btn-link fs-6 text-dark text-decoration-none col-6 py-3 m-0 rounded-0"
                                    data-bs-dismiss="modal">Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

