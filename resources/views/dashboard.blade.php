<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('image/ARTEC FAVICON.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <script src="{{ asset('js/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/chart.js-4.4.4/package/dist/chart.umd.js') }}"></script>
    <title> Admin </title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg container-fluid p-3 mb-3 sticky-top" style="background-color: #c0392b">
        <span> <i class="fa fa-user" style="color:white; font-size:1.25rem"></i> &nbsp;</span>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <span class="lead text-white dipslay-6"> {{ Auth::user()->nom . ' ' . Auth::user()->prenom }} </span>
                </li>
                <li class="nav-item mx-5">
                    <span class="text-white lead dipslay-6" id="b1" style="cursor: pointer"> <i class="fas fa-poll"></i> &nbsp; Sondage </span>
                </li>
                <li class="nav-item">
                    <span class="text-white lead dipslay-6" id="b2" style="cursor: pointer"> <i class="fas fa-list"></i>&nbsp; Liste des sondages </span>
                </li>
            </ul>
        </div>
        <div>
            <a href="{{ URL::to('deconnexion') }}"> <i class="fas fa-power-off" style="font-size: 1.25rem; color:white">
                </i></a>
        </div>
    </nav>
    <div class="container-fluid mx-0 my-0">
        <div class="row">
            <div class="col-12 bg-light  rightView">
                @include('Admin.listSondage')
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#b1').on('click', function() {
                $('.rightView').load('{{ URL::to('dashboard/sondage') }}')
            })

            $('#b2').on('click', function() {
                $('.rightView').load('{{ URL::to('dashboard/listSondage') }}')
            })


        })
    </script>
</body>

</html>
