@extends('admin.app')

@section('content')
    <div class="bg-white mt-5rem shadow">
        <div class="container p-4 text-center">
            <h2>Tambah Pegawai</h2>
        </div>
    </div>
    <div class="container p-4">
        <form action="{{ url('/admin/employees/create') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                <input class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                       aria-describedby="name" placeholder="Masukkan Email Pegawai *" value="{{ old('name') ?? '' }}">
                @error('name')
                <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                       aria-describedby="name" placeholder="Masukkan Email Pegawai *" value="{{ old('email') ?? '' }}">
                @error('email')
                <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="L"
                           id="male" checked>
                    <label class="form-check-label" for="male">
                        Laki-laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="P"
                           id="female">
                    <label class="form-check-label" for="female">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label fw-bold">Tanggal Lahir</label>
                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                       name="date_of_birth" id="date_of_birth" aria-describedby="date_of_birth"
                       placeholder="Masukkan Tanggal Lahir Pegawai *" value="{{ old('date_of_birth') ?? '' }}">
                @error('date_of_birth')
                <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Password</label>
                <input class="form-control @error('password') is-invalid @enderror" name="password" id="password"
                       aria-describedby="password" placeholder="Masukkan Password Pegawai *">
                @error('password')
                <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Password</label>
                <input class="form-control" name="password_confirmation" id="password_confirmation"
                       aria-describedby="password_confirmation" placeholder="Masukkan Konfirmasi Password Pegawai *">
                @error('password_confirmation')
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
                            <h5 class="mb-3">Anda akan menambahkan Pegawai ini?</h5>
                            <p class="mb-0">
                                Pegawai yang telah ditambahkan tidak dapat diubah oleh Admin. Pastikan
                                informasi yang Anda ubah sudah benar dan relevan. Apakah Anda yakin ingin melanjutkan
                            </p>
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

