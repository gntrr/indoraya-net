<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
<div class="col-xl-10 col-xxl-8 container px-4 mt-auto">
    <div class="row align-items-center g-lg-5">
        <div class="col-md-8 col-lg-6 mx-auto my-4">
            <img src="{{ asset('images/undraw_Login_re_4vu2.svg') }}" class="d-block mx-lg-auto img-fluid" alt="Login"
                 loading="lazy">
        </div>
        <div class="col-md-8 col-lg-5 mx-auto">
            <form class="p-4 p-md-5 border rounded-3 bg-light shadow" action={{ url('/login') }} method="post">
                @csrf
                <h1 class="display-5 fw-bold mb-4 text-center">Login</h1>
                <div class="form-floating mb-3">
                    <input class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email"
                           value="{{ old('email') ?? '' }}" name="email">
                    <label for="email">Email</label>
                    @error('email')
                    <small class="text-danger">{{ $message }} </small>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword"
                           placeholder="Password" name="password">
                    <label for="password">Password</label>
                    @error('password')
                    <small class="text-danger">{{ $message }} </small>
                    @enderror
                </div>
                <hr>
                <button class="w-100 btn btn-lg btn-dark" type="submit">Sign In</button>
            </form>
        </div>
    </div>
</div>
<footer class="container p-4 text-center">
    <hr class="mb-4">
    <p>© 2023 All rights reserved. INDORAYA.NET powered by PT Java Digital Nusantara</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>
</html>
