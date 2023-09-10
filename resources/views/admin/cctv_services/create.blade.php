@extends('admin.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/basiclightbox@5.0.4/dist/basicLightbox.min.css">
@endpush

@section('content')
    <div class="bg-white mt-5rem shadow">
        <div class="container p-4 text-center">
            <h2>Tambah CCTV</h2>
        </div>
    </div>
    <div class="container p-4">
        <form enctype="multipart/form-data" action="{{ url('/admin/cctv-services/create') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nama CCTV</label>
                <input class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                       aria-describedby="name" placeholder="Masukkan Nama Paket *"
                       value="{{ old('name') ?? '' }}">
                @error('name')
                <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Deskripsi CCTV</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                          id="description" rows="3"
                          placeholder="Masukkan Deskripsi *">{{ old('description') ?? '' }}</textarea>
                @error('description')
                <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label fw-bold">Harga CCTV</label>
                <div class="d-flex align-items-center">
                    <span class="lead me-2">
                        Rp.
                    </span>
                    <input class="form-control @error('price') is-invalid @enderror" name="price" id="price"
                           aria-describedby="price" placeholder="Masukkan Harga *"
                           value="{{ old('price') ?? '' }}">
                </div>
                @error('price')
                <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label fw-bold">Unggah Gambar</label>
                <div>
                    <div class="cctv-image">
                        <img src="{{ asset('/images/no-img-available.png') }}" width="100" height="100"
                             class="img-preview d-block rounded-4 border mb-2" alt="Image Preview">
                    </div>
                </div>
                <input type="file" class="form-control @error('image') is-invalid @enderror"
                       name="image" id="image" aria-describedby="image" value="{{ old('image') }}">
                @error('image')
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
                            <h5 class="mb-3">Anda akan menambahkan paket layanan CCTV ini?</h5>
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

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/basiclightbox@5.0.4/dist/basicLightbox.min.js"></script>

    <script>
        const imageInput = document.getElementById('image');
        const imagePreview = document.querySelector('.img-preview');
        const defaultImage = imagePreview.src;

        imageInput.addEventListener('change', function () {
            const file = this.files[0];
            const reader = new FileReader();

            reader.onload = function (e) {
                if (file.type.includes('image')) {
                    imagePreview.src = e.target.result;
                }
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = defaultImage;
            }
        });

        document.querySelector('.cctv-image').onclick = () => {
            basicLightbox.create(
                `<div class="img-popup">
                    <div class="container px-4">
                        <img src="${imagePreview.src}" alt="Image Popup" class="rounded-4">
                    </div>
                </div>`
            ).show();
        };
    </script>
@endpush

