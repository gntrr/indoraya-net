@extends('admin.app')

@section('content')
    <div class="bg-white mt-5rem shadow">
        <div class="container p-4 text-center">
            <h2>Ubah Paket Wi-Fi</h2>
        </div>
    </div>
    <div class="container p-4">
        <form action="{{ url('/admin/wifi-services/' . $wifiService->id) }}"
              method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nama Paket</label>
                <input class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                       aria-describedby="name" placeholder="Masukkan Nama Paket *"
                       value="{{ $wifiService->name }}">
                @error('name')
                <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Deskripsi Paket</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                          id="description" rows="3"
                          placeholder="Masukkan Deskripsi *">{{ $wifiService->description }}</textarea>
                @error('description')
                <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="speed" class="form-label fw-bold">Kecepatan Wi-Fi</label>
                <div class="d-flex align-items-center">
                    <input class="form-control @error('speed') is-invalid @enderror" name="speed" id="speed"
                           aria-describedby="speed" placeholder="Masukkan Kecepatan Wi-Fi *"
                           value="{{ $wifiService->speed }}">
                    <span class="lead ms-2">
                        Mb
                    </span>
                </div>
                @error('speed')
                <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label fw-bold">Harga Paket</label>
                <div class="d-flex align-items-center">
                    <span class="lead me-2">
                        Rp.
                    </span>
                    <input class="form-control @error('price') is-invalid @enderror" name="price" id="price"
                           aria-describedby="price" placeholder="Masukkan Harga *"
                           value="{{ $wifiService->price }}">
                </div>
                @error('price')
                <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <button type="button" class="btn btn-dark d-block mb-4" data-bs-toggle="modal"
                    data-bs-target="#modalChoice">UBAH
            </button>
            <div class="modal fade" tabindex="-1" role="dialog" data-bs-backdrop="static"
                 data-bs-keyboard="false" aria-hidden="true" id="modalChoice">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-3 shadow">
                        <div class="modal-body p-4 text-center">
                            <h5 class="mb-3">Anda akan mengubah paket layanan Wi-Fi ini?</h5>
                            <p class="mb-0">Pastikan informasi yang Anda ubah sudah benar dan relevan. Apakah Anda yakin
                                ingin melanjutkan?</p>
                        </div>
                        <div class="modal-footer flex-nowrap p-0">
                            <button type="submit"
                                    class="btn btn-lg btn-link fs-6 text-dark text-decoration-none col-6 py-3 m-0 rounded-0 border-end"
                                    data-bs-dismiss="modal"><strong>Ya, ubah</strong></button>
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

