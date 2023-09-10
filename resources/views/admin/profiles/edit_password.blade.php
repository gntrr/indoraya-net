@extends('admin.app')

@section('content')
    <div class="container p-4 mt-5 mt-md-auto">
        <div class="row justify-content-center mt-4">
            <div class="col-md-9">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                        <i class="fas fa-thumbs-up me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form method="post" action="{{ url('/admin/edit-password') }}">
                    @csrf
                    <h2 class="mb-3">Ubah Profil</h2>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" id="email" name="email"
                                   value="{{ auth()->user()->email }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="current_password" class="col-sm-3 col-form-label">Password Saat Ini</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="current_password" name="current_password"
                                   placeholder="Masukkan Kata Sandi Saat Ini *">
                            @error('current_password')
                            <small class="text-danger">{{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="new_password" class="col-sm-3 col-form-label">Password Baru</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="new_password" name="new_password"
                                   placeholder="Masukkan Kata Sandi Baru Anda *">
                            @error('new_password')
                            <small class="text-danger">{{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="new_password_confirmation" class="col-sm-3 col-form-label">
                            Konfirmasi Password Baru
                        </label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="new_password_confirmation"
                                   name="new_password_confirmation" placeholder="Masukkan Konfirmasi Kata Sandi Anda *">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-dark">Ubah Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
