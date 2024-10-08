<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artec Survey | Inscription </title>
    <link rel="shortcut icon" href="{{asset('image/ARTEC FAVICON.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css')}}"> 
    <script src="{{ asset('js/js/bootstrap.min.js') }}"> </script>
</head>
<body class="bg-light p-3">
      <div class="container d-flex content-justify-center align-items-center mt-3 mb-3">
        <div class="container  mt-3 w-50 border rounded p-4 bg-white">
            <h2 class="text-center">Formulaire d'inscription</h2>
            <p class="text-center"> Veuillez fournir votre identité pour béneficiez de notre service</p>

            <form class="inscription"> 
              @csrf
              <div class=" d-inline mb-3 mt-3">
                  <label for="nom">Nom:</label>
                  <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom " name="nom">      
              </div> 

              <div class="mb-3 mt-3">
                <label for="prenom">Prénom:</label>
                  <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prénom" name="prenom">
              </div>

              <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Entrez votre adrresse email" name="email">
              </div> 

              <div class="mb-3 mt-3 ">
                <span> Genre : </span>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="genre" id="Masculin" value="Masculin">
                  <label class="form-check-label" for="Masculin">
                    Masculin 
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="genre" id="Feminin" value="Feminin">
                  <label class="form-check-label" for="Feminin">
                    Féminin
                  </label>
                </div>
              </div> 

              <div class="mb-3 mt-3">
                <label for="departement">Département:</label>
                <select id="departement" class="w-100 p-2" name="departement">
                  <option value="SI">Système d'information </option>
                  <option value="RM">Régulation des marchés </option>
                  <option value="NCS">Normalisation, Contrôles et Sécurisation des Réseaux </option>
                  <option value="GFN">Gestion des Fréquences et de la Numérotation</option>
                  <option value="AF"> Administration et Financière </option>
                </select>
              </div>

              <div class="mb-3 mt-3">
                <label for="matricule">Numéro Matricule:</label>
                <input type="text" class="form-control" id="matricule" placeholder="Entrez votre numero matricule" name="matricule">
              </div>

              <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
              </div>

              <div class="row"> 
                <div class="col"> <button type="submit" class="btn btn-primary">Confirmer</button> </div>
              </div>

            </form>
            <hr> 
            <div class="mb-3 mt-3 text-center">
                <span> Vous avez déjà de compte?</span><a href="{{URL::to('connexion')}}">se connecter</a>
            </div>
          </div>
      </div> 
      <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script> 
      <script> 
        $(document).ready(function(){
          $('.inscription').on('submit', function(e){
            e.preventDefault()
              var data = $(this)[0]; 
              var formdata = new FormData(data);
          $.ajax({
              url:'{{URL::to('inscrire')}}',
              type:'post',
              data:formdata,
              contentType:false,
              processData:false,
              success:(response) => {  
                alert(response.success)
                data.reset()
                window.location.href="{{URL::to('connexion')}}"
              }, 
              error:(error) => {
                console.log(error)
              }
              });
          });
        });

      </script>
</body>
</html>