<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HIMTI KIT</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('fonts/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="bg">
    @if (session()->has('LoginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('LoginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <h1 class="text-white text-title">HIMTI KIT</h1>
        <p class="text-white text-description text-justify mw-5">HIMTI KIT adalah kit pembelajaran untuk para mahasiswa
            baru School of
            Computer Science Universitas Bina Nusantara. Konten tersedia mulai dari
            materi semester 1 s.d 4, dan dapat diakses secara daring melalui situs ini.</p>

        <form action="/login" method="POST">
            @csrf
            {{-- <div class="mb-3">
                <label for="NIM" class="form-label text-white">NIM</label>
                <input type="text" class="form-control" id="NIM" aria-describedby="emailHelp" name="NIM" required
                    value="{{ old('NIM') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button> --}}

            <div class="input-group input-group-login mb-3">
                <input type="text" class="form-control" placeholder="Insert your Student ID (NIM)"
                    aria-label="Insert your Student ID (NIM)" aria-describedby="basic-addon2" id="NIM" name="NIM"
                    required value="{{ old('NIM') }}">
                <div class="input-group-append">
                    <button class="btn btn-login btn-secondary" type="submit">
                        <i class="fas fa-arrow-right text-black"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>
