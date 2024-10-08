<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Acceuil </title>
    <link rel="shortcut icon" href="{{ asset('image/ARTEC FAVICON.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/acceuil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <script src="{{ asset('js/js/bootstrap.min.js') }}"></script>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark p-2">
        <div class="container-fluid ">
            <img src="image/Logo_artec_complet.png" alt="artec" style="width:5%;">
            <div class="d-flex justify-content-end" style="float: right">
                <a href="{{ URL::to('/connexion') }}" class="mx-2 d-inline nav-link btn bg-light p-2"> Se connecter </a>
                <a href="{{ URL::to('/inscription') }}" class="mx-2 d-inline nav-link btn bg-success p-2 text-white">
                    S'inscrire</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid bg-light mt-3 mb-3" style="height: max-content">
        <div class="row gx-1 ">

            <div class="col-md-7 p-3">
                <h1 class=" display-1"
                    style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"> Artec Survey
                </h1>
                <p class="lead">
                    L'Autorité de Régulation des Technologies de Communication (ARTEC) est l'organisme responsable de la
                    régulation et de la supervision du secteur des technologies de communication à Madagascar. ARTEC est
                    chargée de veiller à ce que les services de télécommunications et de communication en général soient
                    fournis de manière efficace, transparente et équitable.
                </p>
                <p class="lead">
                    L'Artec Survey est une Application Web, développée internement par l'entreprise pour les
                    personnelles de l'entreprises. L'Application vise à
                    améliorer les requêtes formulaires de l'entreprise, ainsi que les sondages annuelles et par ailleurs
                    les votes d'opinion, de personnes...
                </p>
                <a href="{{ URL::to('http://www.artec.mg/') }}" class="btn btn-success p-3"> Voir la page officielle</a>
            </div>
            <div class="col-md-5">
                <img src="{{asset('/image/campaign-creators-pypeCEaJeZY-unsplash.jpg')}}" alt="Pylone" height="100%"
                    class="w-100 p-3 shadow slider" style="opacity:0.75 ">
            </div>
        </div>
    </div>
    <hr>

    <div class="container mt-5 mb-3">
        <div class="row justify-content-center align-items-center d-flex">

            <div class="col-12">
                <h1 class="display-1 text-center"
                    style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"> Nos Services
                    disponibles </h1>
            </div>

        </div>
    </div>

    <div class="container content-justify-center mb-5">
        <div class="row gx-4 justify-content-center" style="width:max-width">

            <div class="col-lg-3 col-md-12 rounded mx-1 shadow p-3 bg-white"
                style=" border:2px solid lightgrey">
                <div>
                    <i class="fa fa-poll" style="font-size: 3rem; color:#10ac84"> </i>
                </div>
                <h3> Sondage & Votes </h3>
                <p class="text-muted">
                    Un sondage est une méthode de collecte d'informations auprès d'un groupe de personnes afin de
                    connaître leurs opinions, attitudes ou comportements sur un sujet spécifique. Les sondages sont
                    souvent utilisés pour obtenir des données statistiques représentatives d'une population plus large.
                </p>
            </div>

            <div class="col-lg-3 col-md-6 rounded mx-1 shadow p-3 bg-white"
                style="border:2px solid lightgrey">
                <div>
                    <i class="fa fa-file-text" style="font-size: 3rem; color:#10ac84"> </i>
                </div>
                <h3> Questionnaires</h3>
                <p class="text-muted">
                    Un formulaire est un espace dédié au recueil d'informations saisies par un client ou prospect sur un
                    support papier ou une page web.
                    Le formulaire composé de boîtes texte, de menus déroulant et de cases à cocher est utilisé pour des
                    inscriptions, des commandes ou des processus de qualification.
                </p>
            </div>

            <div class="col-lg-3 col-md-6 rounded mx-1 shadow p-3 bg-white"
                style=" border:2px solid lightgrey">
                <div>
                    <i class="fa fa-question-circle" style="font-size: 3rem; color:#10ac84"> </i>
                </div>
                <h3> Forums </h3>
                <p class="text-muted">
                    Les questions fréquemment posées (FAQ en anglais pour Frequently Asked Questions) sont une
                    collection accessible au public des questions les plus courantes sur le produit/service/entreprise
                    et leurs réponses. Un système de FAQ dynamique existe désormais et permet de faciliter la recherche.
                </p>
            </div>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center">
        <div class="mt-3 mb-3">
            <a href="{{ URL::to('/connexion') }}" class="btn btn-success p-3" id="to_Dash"> Accédez à nos Produits
            </a>
        </div>
    </div>
    <hr>

    <!-- Footer -->
    <footer class="bg-dark mx-0 my-0" style="width:max-width">
        <!-- Grid container -->
        <div class="container p-4"style="width:max-width">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-0 mb-md-0 text-white">
                    {{-- <img src="/image/Logo_artec_complet.png" alt="Artec" style="height: 10%">  --}}
                    <h5 class="text-uppercase"> Artec </h5>
                    <p>
                        "La Régulation de la Télécommunication au profit de
                        la population "
                    </p>
                </div>
                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-white">
                    <h5 class="text-uppercase">Liens</h5>

                    <ul class="list-unstyled mb-0">
                        <li class="p-2">
                            <i class="fab fa-facebook" style="font-size: 1.75rem"> </i>
                            <span> ARTEC </span>
                        </li>
                        <li class="p-2">
                            <i class="fa fa-envelope" style="font-size: 1.75rem"> </i>
                            <span> artec@artec.mg </span>
                        </li>
                        <li class="p-2">
                            <i class="fa fa-home" style="font-size: 1.75rem"> </i>
                            <span> Lot IVL 41 Ter B Andohatapenaka - Antananarivo 101 </span>
                        </li>
                        <li class="p-2">
                            <i class="fa fa-mobile-phone" style="font-size: 1.75rem"> </i>
                            <span>
                              (+261)  033 37 421 19
                            </span>
                        </li>
                        <li class="p-2">
                            <i class="fa fa-mobile-phone" style="font-size: 1.75rem"> </i>
                            <span>
                             (+261)   034 02 421 19 </span>
                        </li>
                    </ul>
                </div>
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->
    </footer>

    {{-- End Section footer  --}}
    <script src="js/jquery-3.7.1.min.js"></script>
    <script></script>
</body>

</html>
