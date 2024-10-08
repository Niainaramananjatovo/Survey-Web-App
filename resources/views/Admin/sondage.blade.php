<div class="container rounded bg-white w-25 p-3 mt-5" style="border: 1px solid lightgrey;">
    <div class="d-flex align-items-center justify-content-center">
        <h1 class="text-center"> Création d'un sondage </h1>
    </div> 
    <div class="mt-3 mb-3">
        <form class="form_sondage">
            @csrf
            <div class="mt-3 mb-3">
                <div>
                    <input type="text" class="form-control w-100 border-top-0" placeholder="Titre" name="titre"
                        style="border-radius:0px;border-bottom:1.5px solid black; border-left: 0px solid black; border-right:0px solid black">
                </div>
            </div>
            <div class="mt-3 mb-3">
                <div>
                    <label for="date_fin"> Date Limite :</label>
                    <input type="datetime-local" class="form-control w-100" name="date_fin" id="date_fin">
                </div>
            </div>
            <div class="mb-3 mt-3">
                <label for="invite"> Invité : </label>
                <select name="invite" id="invite" class="w-100 p-2 form-control bg-light">
                    <option value="Tous"> Tous </option>
                    <option value="SI"> Système d'Information </option>
                    <option value="RM"> Régulation des Marchés </option>
                    <option value="AF">Administration et financière</option>
                    <option value="GFN">Gestion de la Fréquence et de la Numérotaion </option>
                    <option value="NCS"> Normalisation, Contrôle et Sécurisation des Réseaux </option>
                </select>
            </div>
            <div> 
                <label for="image"> <i class="fas fa-image"> </i></label>
                <input type="file" name="image" id="image" hidden>
            </div>
            <div class="displayImage "> </div>
            <div class="mt-4">
                <button class="btn btn-primary creation w-100" type="submit"> Creér </button>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
    $(document).ready(function() { 
        $('#image').on('change', function(){
            var files = this.files[0].name;
            var url = URL.createObjectURL(this.files[0]);  
            if(files.endsWith('png')|| files.endsWith('jpg')|| files.endsWith('jpeg') || files.endsWith('svg') || files.endsWith('gif')) { 
                $('.displayImage').append( 
           ' <img src="'+ url +'" alt="" class="w-100 rounded p-1"> ')
            }
        })
        $(".form_sondage").on('submit', function(e) {
            e.preventDefault()
            var data = $(this)[0];
            var formdata = new FormData(data);
            $.ajax({
                url: '{{ URL::to('creer_sondage') }}',
                type: 'post',
                data: formdata,
                contentType: false,
                processData: false,
                success: (response) => {
                    alert(response.success)
                    data.reset()
                    $('.rightView').load('dashboard/listSondage')
                },
                error: (error) => {
                    console.log(error)
                }
            });
        });
    })
</script>
