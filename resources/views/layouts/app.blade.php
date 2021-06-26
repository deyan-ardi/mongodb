<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>App Mongo DB - @yield('title')</title>
</head>

<body>
    <section id="navbar">
        <nav class="navbar-expand-lg navbar navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">Sistem Penjadwalan Dosen</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                        <a class="nav-link" href="{{ route('dosen') }}">Dosen</a>
                        <a class="nav-link" href="{{ route('kelas') }}">Kelas</a>
                        <a class="nav-link" href="{{ route('jadwal') }}">Jadwal</a>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            @yield('main')
        </div>
    </div>
    {{-- Firebase Tasks --}}
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>
    <!-- TODO: Add SDKs for Firebase products that you want to use
https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-database.js"></script>
    <script>
        // Initialize Firebase
        var config = {
            apiKey: "{{ config('services.firebase.api_key') }}",
            authDomain: "{{ config('services.firebase.auth_domain') }}",
            databaseURL: "{{ config('services.firebase.database_url') }}",
            projectId: "{{ config('services.firebase.project_id') }}",
            storageBucket: "{{ config('services.firebase.storage_bucket') }}",
            messagingSenderId: "{{ config('services.firebase.messaging_sender_id') }}",
            appId: "{{ config('services.firebase.app_id') }}",
            measurementId: "{{ config('services.firebase.measurement_id') }}"
        };
        firebase.initializeApp(config);
        firebase.analytics();
        var database = firebase.database();
        var lastIndex = 0;
    </script>
    @yield('footer')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
