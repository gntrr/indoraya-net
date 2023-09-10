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
                <form method="post" action="{{ url('/admin/edit-profile') }}">
                    @csrf
                    <h2 class="mb-3">Ubah Profil</h2>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input class="form-control @error('email') is-invalid @enderror" name="name" id="name"
                               placeholder="Masukkan Nama Anda *" value="{{ $user->name }}">
                        @error('name')
                        <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control " name="email" id="email" value="{{ $user->email }}"
                               disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="L"
                                   id="male" {{ $user->gender == 'L' ? 'checked' : '' }}>
                            <label class="form-check-label" for="male">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="P"
                                   id="female" {{ $user->gender == 'P' ? 'checked' : '' }}>
                            <label class="form-check-label" for="female">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label @error('date_of_birth') is-invalid @enderror">
                            Tanggal Lahir
                        </label>
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                               placeholder="Masukkan Tanggal Lahir Anda *" value="{{ $user->date_of_birth }}">
                        @error('date_of_birth')
                        <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-dark">Ubah Profil</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
