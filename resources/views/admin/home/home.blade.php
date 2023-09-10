@extends('admin.app')

@section('content')
    <div class="col-xl-10 col-xxl-8 container px-4 mt-auto">
        <div class="row align-items-center g-lg-5">
            <div class="col-md-8 col-lg-5 mx-auto my-4">
                <img src="{{ asset('images/undraw_editable_re_4l94.svg') }}" class="d-block mx-lg-auto img-fluid"
                     alt="Login"
                     loading="lazy">
            </div>
            <div class="col-md-8 col-lg-5 mx-auto">
                <h1 class="fs-1">Selamat Datang, {{ Auth::user()->name }}!</h1>
            </div>
        </div>
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
