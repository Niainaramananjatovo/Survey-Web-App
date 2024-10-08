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
    <title> Connexion avec Gmail </title>
</head>
<body class="bg-light">
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh">  
        <div class="container mt-3 w-25 border rounded p-4 bg-white">  
            <center> 
                <div class="mt-3 mb-3"> 
                    <img src="{{ asset('/image/icons8-google.svg') }}" alt="Google Icon">
                </div>
            </center> 
            <center> 
                <div class="mt-3 mb-3"> 
                    <p class="fs-4"> Validation du Compte Google </p>
                </div>
            </center>
            <div class="mt-3 mb-3">
                <input type="text" class="form-control border-top-0" id="email"
                        placeholder="Saisissez votre adresse email" name="email"
                        style="border-radius:0px;border-bottom:1.5px solid black; border-left: 0px solid black; border-right:0px solid black">
            </div> 
            <div class="mt-3 mb-3">
                
            </div> 
            <div class="mt-4 mb-3 justify-content-end align-items-end d-flex">
                <button type="submit" class="btn btn-primary"> Send </button>
            </div>
        </div>
    </div>
</body>
</html>
