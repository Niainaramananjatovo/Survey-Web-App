<div class="container p-3 rounded bg-white">
    <div>
        <h1 class="lead display-5 titre"> Titre du sondage </h1> <br>
    </div>
    <div class="">
        <span class="lead"> Nombre de question : </span>
        <h4 id="number"> 0 </h4>
    </div>
</div>
<div class="container p-2 main">
</div>
<div class="mt-3 mb-3 justify-content-center align-items-center d-flex">
    <button type="button" class="p-3 btn btn-primary" id="ajouter"> Ajouter une question </button>
</div>

<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
    var id = {{ $id }}
    var nbr_question = 0

    $.ajaxSetup({
        processData: false,
        contentType: false,
    });

    $(document).ready(function() {
        $.ajax({
            url: '{{ URL::to('getModification') }}/' + id,
            type: 'get',
            dataType: 'json',
            success: (response) => {
                $('.titre').text(response[0].titre)
            },
            error: (error) => {
                console.log(error)
            }
        })

        $.ajax({
            url: '{{ URL::to('list_question') }}/' + id,
            type: 'get',
            dataType: 'json',
            success: (response) => {
                for (i = 0; i < response.length; i++) {
                    $('.main').append('<div class="container p-3 rounded">' +
                        '<div class="container p-2 " style="background-color: white"> ' +
                        ' <div class="p-3 mt-3 mb-3"> ' +
                        '<input type="text" class="form-control" value="' + response[i]
                        .contenu + '" disabled readonly>' +
                        '</div>' +
                        '<div class="mt-3 mb-3 d-flex align-items-center justify-content-center"> ' +
                        '<button type="button" class="btn btn-success disabled"> Succès <i class="fa fa-check" aria-hidden="true"></i>' +
                        ' </button>' +
                        ' </div>' +
                        '</div>' +
                        ' </div>')
                }
            },
            error: (error) => {
                console.log(error)
            }
        })
    })

    $(document).on('click', '#ajouter', function() {
        nbr_question++
        var formID = nbr_question
        var CSRF = ' {{ csrf_field() }}';

        //ajoute les questions dynamiquement 
        $('#number').text(nbr_question);
        $('.main').append('<div class="container p-3 rounded">' +
            '<div class="container p-2 bg-white">' +
            '  <div>' +
            '<nav class="navbar navbar-expand-lg bg-body-tertiary">' +
            '<div class="container-fluid">' +
            '<div class="collapse navbar-collapse justify-content-center align-items-center d-flex"' +
            ' id="navbarNavAltMarkup">' +
            '<div class="navbar-nav gap-3">' +
            '<span class="nav-link" aria-current="page" href="#"  style="cursor: pointer" id="sondage' +
            formID + '"> Question Directe </span>' +
            '<span class="nav-link" href="#"  style="cursor: pointer" id="question_ouverte' + formID +
            '"> Question Ouverte </span>' +
            '<span class="nav-link" href="#"  style="cursor: pointer" id="likert_scale' + formID +
            '">Likert Scale </span>' +
            '</div>' +
            ' </div>' +
            '</div>' +
            '</nav>' +
            '' + //Choice Question
            '</div>' +
            '<form class="form_question_' + formID + '"  method="post">' +
            '<div class="container" style="background-color: white">' +
            CSRF + ' <div class="mt-3 mb-3">' +
            '  <input type="text" name="contenu" class="form-control" placeholder="Poser une question">' +
            '       </div>' +
            '    <div class="container choice' + formID + '"> ' +
            ' <input type="text" value="choix" name="type" hidden>' + 
            '<p class="lead text-center"> Ceci est une question directe, l\'utilisateur est prié de répondre par un \'Oui\'ou \'Non\' </p>' +
            '</div>' +
            '' + // Likert_scale
            '<div class="container  d-flex justify-content-center align-items-center">' +
            '<div class="row gx-3 gap-3 liker_scale' + formID + ' mx-3" style="display:none">' +
            '  <input type="text" value="liker" name="type" hidden> ' +
            ' <div class="col-lg-2 col-md-12 bg-light p-2 rounded align-items-center justify-content-center d-flex" >' +
            '<img src="{{ asset('/image/emojicon/angry-svgrepo-com.svg') }}" alt="" srcset="" style="width: 70%; height:70%">' +
            ' </div>' +
            '<div class="col-lg-2 col-md-6 bg-light p-2 rounded align-items-center justify-content-center d-flex">' +
            '<img src="{{ asset('/image/emojicon/sad-svgrepo-com.svg') }}" alt="" srcset="" style="width: 70%; height:70%">' +
            ' </div>' +
            '<div class="col-lg-2 col-md-6 bg-light p-2 rounded align-items-center justify-content-center d-flex">' +
            '<img src="{{ asset('/image/emojicon/confused-svgrepo-com.svg') }}" alt="" srcset="" style="width: 70%; height:70%">' +
            '</div>' +
            '<div class="col-lg-2 col-md-6 bg-light p-2 rounded align-items-center justify-content-center d-flex">' +
            '<img src="{{ asset('/image/emojicon/smiling-svgrepo-com.svg') }}" alt="" srcset="" style="width: 70%; height:70%">' +
            '</div>' +
            ' <div class="col-lg-2 col-md-6 bg-light p-2 rounded align-items-center justify-content-center d-flex">' +
            '<img src="{{ asset('/image/emojicon/happy-svgrepo-com.svg') }}" alt="" srcset="" style="width: 70%; height:70%">' +
            '  </div>' +
            '</div>' +
            ' </div>' +
            '' + //Open Question 
            '<div class="container open_Question' + formID + '" style="display: none"> ' +
            '<input type="text" value="open_question" name="type" hidden>' +
            '<p class="lead text-center"> Ceci est une question ouverte, les répondants pourront entrer du texte librement </p>' +
            '</div>' +
            '<div>' +
            ' <input type="text" name="survey" value="{{ $id }}" class="form-control w-25" hidden>' +
            '</div>' +
            '<div class="mt-3 mb-3 d-flex align-items-center justify-content-center">' +
            '<button type="submit" class="btn btn-primary p-3 creer_' + formID + '"' +
            ' style="background-color: #152238; border-color:#152238"> Créer </button>' +
            '  </div>' +
            ' </div>' +
            '</form>' +
            '<hr>' + '</div>' +
            '</div>')

        let count = 0
        //ajouter une nouvelle option dynamiquement 
        $('.option_' + formID).click(function() {
            count++
            $('#add_option_' + formID).append(
                '<div class="mt-3 mb-3"><input type="text" name="options[]" class="form-control w-25" placeholder="option' +
                count + '"></div>')
        })

        //basculement de type de question 

        $('#sondage' + formID + '').click(function() {
            $('input[name="type"]').val('choix'); // Dynamically change the type
            $('.choice' + formID).show()
            $('.open_Question' + formID).hide()
            $('.liker_scale' + formID).hide()
        })

        $('#question_ouverte' + formID + '').click(function() {
            $('input[name="type"]').val('open_question'); // Dynamically change the type
            $('.choice' + formID).hide()
            $('.open_Question' + formID).show()
            $('.liker_scale' + formID).hide()
        })

        $('#likert_scale' + formID + '').click(function() {
            $('input[name="type"]').val('liker'); // Dynamically change the type
            $('.choice' + formID).hide()
            $('.open_Question' + formID).hide()
            $('.liker_scale' + formID).show();
        })

        //submit les questions indépendaments 
        $('.form_question_' + formID).on('submit', function(e) {
            e.preventDefault()
            var data = $(this)[0];
            var formdata = new FormData(data);
            $.ajax({
                url: '{{ URL::to('submit_question') }}',
                type: 'POST',
                data: formdata,
                success: (response) => {
                    console.log(response.success)
                    $('.creer_' + formID + '').text('succès')
                    $('.creer_' + formID + '').css('backgroundColor', '#00b894')
                    $('.creer_' + formID + '').css('border', '2px #00b894 solid')
                    $('.creer_' + formID + '').css('color', 'white')
                    $('.creer_' + formID + '').addClass('disabled')
                },
                error: (error) => {
                    alert('erreur durant la création de la question')
                }
            })
        })
    })
</script>
