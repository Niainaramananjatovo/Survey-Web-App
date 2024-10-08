<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Connexion </title>
    <link rel="shortcut icon" href="{{ asset('image/ARTEC FAVICON.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css') }}">
</head>

<body class="bg-light">
    <div class="container d-flex content-justify-center align-items-center" style="height: 85vh">
        <div class="container mt-3 w-25 border rounded p-4 bg-white">
            <center>
                <div class="mt-3 mb-3">
                    <a class="navbar-brand" href="{{ URL::to('/') }}">
                        <img src="image/Logo_artec_complet.png" alt="artec" style="width:45%;">
                    </a>
                </div>
            </center>
            <h2 class=" text-center"> Connexion </h2>
            <form class="connexion" method="post">
                @csrf
                <div class="mb-3 mt-5">
                    <input type="text" class="form-control border-top-0" id="email"
                        placeholder="Entrez votre matricule" name="matricule"
                        style="border-radius:0px;border-bottom:1.5px solid black; border-left: 0px solid black; border-right:0px solid black">
                </div>
                <div class="mb-3 btn-group w-100">
                    <input type="password" class="form-control border-top-0 pass" id="pwd"
                        placeholder="Entrez votre mot de passe" name="password"
                        style="border-radius:0px; border-bottom:1.5px solid black; border-left: 0px solid black; border-right:0px solid black">
                    <button type="button" class="btn btn-light see_password" style="background-color: transparent"> <i
                            class="fas fa-eye ico"> </i> </button>
                </div>
                <button type="submit" class="btn btn-success w-100">Se Connecter </button>
            </form>
            <div class="mt-1 mb-1 justify-content-center d-flex">
                <span class="text-center"> Ou </span>
            </div>
            <div class="mt-3 mb-3">
                <a type="button" class="btn border border-black w-100" style="background-color: #fafafa" href="{{URL::to('/emailRegister')}}"> Se Connecter
                    avec Gmail <img src="{{ asset('/image/icons8-google.svg') }}" alt="" height="25px"
                        width="25px"> </a>
            </div>
            <hr class="">
            <div class="mb-3 mt-3 text-center">
                <span> Vous n'êtes pas inscrit?</span><a href="{{ URL::to('inscription') }}">s'inscrire</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.connexion').on('submit', function(e) {
                e.preventDefault();
                var data = $(this)[0];
                var formdata = new FormData(data);
                $.ajax({
                    url: '{{ URL::to('connecter') }}',
                    type: 'post',
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        if (response.success == '1') {
                            data.reset();
                            window.location.href = "{{ URL::to('dashboard/') }}";
                        } else if (response.success == '0') {
                            data.reset();
                            window.location.href = "{{ URL::to('user/') }}";
                        } else {
                            alert(response.error)
                        }
                    },
                    error: (error) => {
                        console.log(error);
                    }
                });
            })
        });
        $('#Admin').click(function() {
            $('#utilisateur').css('color', 'black')
            $('#utilisateur').css('fontWeight', '')
            $('#Admin').css('color', '#1abc9c')
            $('#Admin').css('fontWeight', 'bold')
        })

        $('#utilisateur').click(function() {
            $('#Admin').css('color', 'black')
            $('#Admin').css('fontWeight', '')
            $('#utilisateur').css('color', '#1abc9c')
            $('#utilisateur').css('fontWeight', 'bold')
        })

        $('.see_password').click(function() {
            const InputClass = $('.pass')
            const icon = $('.ico')
            if (InputClass.attr('type') == 'password') {
                InputClass.attr('type', 'text')
                icon.removeClass('fas fa-eye')
                icon.addClass('fas fa-eye-slash')
            } else {
                InputClass.attr('type', 'password')
                icon.removeClass('fas fa-eye-slash')
                icon.addClass('fas fa-eye')
            }

        })
    </script>
</body>

</html>
