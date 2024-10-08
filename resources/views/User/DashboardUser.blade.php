<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('image/ARTEC FAVICON.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <script src="{{ asset('js/js/bootstrap.min.js') }}"></script>
    <title> User | {{ Auth::user()->nom . ' ' . Auth::user()->prenom }} </title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg container-fluid p-3 mb-3" style="background-color: #1abc9c">
        <span> <i class="fa fa-user" style="color:white; font-size:1.25rem"></i> &nbsp;</span>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <span class="lead text-white dipslay-6"> {{Auth::user()->nom.' '.Auth::user()->prenom}} </span>
                </li>
            </ul>
        </div> 
        <div> 
            <a href="{{URL::to('deconnexion')}}"> <i class="fas fa-power-off" style="font-size: 1.25rem; color:white"> </i> </a>
        </div>
    </nav>
    <div class="container-fluid mx-0 my-0">
        <div class="row">
            {{-- right side view  --}}
            <div class="col-md-12 bg-light right">
                @include('User.listQuestionnaire')
            </div>

        </div>
    </div>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#b2').on('click', function() {
                $('.right').load('{{ URL::to('listQuestionnaire') }}')
            })
        })
    </script>
</body>

</html>
