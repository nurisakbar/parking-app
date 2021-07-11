<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>IOT Parking - Kementrian Kesehatan</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sticky-footer/">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="sticky-footer.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
    <p>
        <a href="/">Masuk Parkir</a> | <a href="/out">Keluar Parkir</a> |<a href="/list">List Parkir</a> | <a
            href="/search">Cari Data</a>
    </p>
    @yield('content')

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted text-center">IOT Simple Application - Build With Love From Bandung </span>
        </div>
    </footer>
    <script src="{{ asset('jquery.min.js')}}"></script>
    @yield('javascript')
</body>

</html>
