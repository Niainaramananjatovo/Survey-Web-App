<div class="container p-2 mt-3 mb-3 bg-white header">
    <div class="mt-3-mb-3 p-3">
        <h1 class="lead display-3 title"> Titre </h1>
    </div>

</div>
<div>
    <form method="POST" class="form_reponse">
        @csrf
        <div>
            <div>
                <input type="text" name="UserID" value="{{ Auth::user()->id }}" hidden>
                {{-- Id of the user who respond to the questions --}}
            </div>
            <div>

                <input type="text" name="PollID" value="{{ $id }}" hidden>
                {{-- Id of the Poll --}}
            </div>
        </div>
</div>
<script>
    var id = {{ $id }}
    $(document).ready(function() {
        $.ajax({
            url: '{{ URL::to('titre') }}/' + id,
            type: 'GET',
            dataType: 'json',
            processData: false,
            contentType: false,
            success: (response) => {
                $('.title').text(response[0])
                if (response[1] != null) {
                    image_path = '/storage/' + response[1]
                    $('.header').append(
                        '<div class="container p-2 mt-3 mb-3 bg-white">' +
                        ' <div class="mt-3-mb-3 p-2 image"> ' +
                        '<img src="' + image_path + '" alt="image" class="w-100 p-2" style="height:350px">' +
                        '</div>' +
                        '</div> ')
                }

            },
            error: (error) => {
                console.log(error)
            }
        })
    })
    $.ajax({
        url: '{{ URL::to('all_question') }}/' + id,
        type: 'get',
        dataType: 'json',
        processData: false,
        contentType: false,
        success: (response) => {
            for (i = 0; i < response.length; i++) {
                if (response[i].type == "open_question") {
                    $('form').append(
                        '<div class="container p-3 mt-3 mb-3 bg-white">' +
                        '<div class="mt-3 mb-3">' +
                        '<p class="fs-5">' + (i + 1) + '. ' + response[i].contenu +
                        '</p>' +
                        '</div>' +
                        '<div class="mt-3 mb-3">' +
                        '<input type="text" name="questionID[' + (i + 1) + ']" value="' + response[i]
                        .id + '" hidden>' +
                        ' <textarea name="reponse[' + (i + 1) +
                        ']" id="reponse" cols="30" rows="1" placeholder="Votre réponse ici...."' +
                        'class="border-top-0 container p-2 " style="resize: none; border-left:0px solid black; border-right:0px solid black; font-size:1.25rem"></textarea>' +
                        '</div>' +
                        '</div>')
                } else if (response[i].type == "liker") {
                    $('form').append(
                        '<div class="container mb-4 bg-white">' +
                        ' <div class="mt-3 mb-3 p-2">' +
                        '<p class="fs-5">' + (i + 1) + '. ' + response[i].contenu +
                        '</p>' +
                        ' </div>' +
                        ' <div class="mt-3 mb-3 container btn-group">' +
                        ' <input type="radio" class="btn-check" name="reponse[' + (i + 1) +
                        ']" id="option1" value="1 (colère)" autocomplete="off" />' +
                        ' <label class="btn btn-light align-items-center justify-content-center d-flex" for="option1"' +
                        ' data-mdb-ripple-init><img src="{{ asset('/image/emojicon/angry-svgrepo-com.svg') }}" alt=""' +
                        ' srcset="" style="width: 50%; height:50%"></label>' +
                        ' <input type="radio" class="btn-check" name="reponse[' + (i + 1) +
                        ']" id="option2" value="2 (triste)" autocomplete="off" />' +
                        '<label class="btn btn-light align-items-center justify-content-center d-flex" for="option2"' +
                        'data-mdb-ripple-init><img src="{{ asset('/image/emojicon/sad-svgrepo-com.svg') }}" alt=""' +
                        'srcset="" style="width: 50%; height:50%"></label>' +
                        '<input type="radio" class="btn-check" name="reponse[' + (i + 1) +
                        ']" id="option3" value="3 (pas d\'humeur)" autocomplete="off" />' +
                        '<label class="btn btn-light align-items-center justify-content-center d-flex" for="option3"' +
                        'data-mdb-ripple-init> <img src="{{ asset('/image/emojicon/confused-svgrepo-com.svg') }}" alt=""' +
                        'srcset="" style="width: 50%; height:50%"></label>' +
                        '<input type="radio" class="btn-check" name="reponse[' + (i + 1) +
                        ']" id="option4" value="4 (content)" autocomplete="off" />' +
                        '<label class="btn btn-light align-items-center justify-content-center d-flex" for="option4"' +
                        'data-mdb-ripple-init> <img src="{{ asset('/image/emojicon/smiling-svgrepo-com.svg') }}" alt=""' +
                        ' srcset="" style="width: 50%; height:50%"></label>' +
                        ' <input type="radio" class="btn-check" name="reponse[' + (i + 1) +
                        ']" id="option5" value="5 (joyeux)" autocomplete="off" />' +
                        '<label class="btn btn-light align-items-center justify-content-center d-flex" for="option5"' +
                        'data-mdb-ripple-init> <img src="{{ asset('/image/emojicon/happy-svgrepo-com.svg') }}" alt=""' +
                        'srcset="" style="width: 50%; height:50%"></label>' +
                        '<input type="text" name="questionID[' + (i + 1) + ']" value="' + response[i]
                        .id + '" hidden>' +
                        '</div>' +
                        // '</form>' +
                        ' </div>'
                    )
                } else if (response[i].type == "choix") {
                    $('form').append(
                        '<div class="container p-3 bg-white">' +
                        '<div class="mt-3 mb-3">' +
                        '<p class="fs-5">' + (i + 1) + '. ' + response[i].contenu +
                        '</p>' +
                        '</div>' +
                        '<div class="mt-3 mb-3">' +
                        ' <input type="radio" name="reponse[' + (i + 1) +
                        ']" id="reponse1" class="form-check-input" value="Oui">' +
                        '<label for="reponse1" id="l1" class="mx-2 form-check-label"> Oui </label>' +
                        '</div>' +
                        '<div class="mt-3 mb-3">' +
                        '<input type="radio" name="reponse[' + (i + 1) +
                        ']" id="reponse2" class="form-check-input" value="Non">' +
                        ' <label for="reponse2" id="l2" class="mx-2 form-check-label"> Non </label>' +
                        '<input type="text" name="questionID[' + (i + 1) + ']" value="' + response[i]
                        .id + '" hidden>' +
                        '</div>' +
                        '</div>' +
                        '</div>')
                }
            }
            $('form').append('<div class="mt-3 mb-3 d-flex align-items-center justify-content-center">' +
                '<button type="submit" class="btn btn-primary p-3"> Envoyer la réponse </button>' +
                '</div>' +
                '</form>')
        },
        error: (error) => {
            console.log(error)
        }
    })

    $(document).on('submit', '.form_reponse', function(e) {
        e.preventDefault()
        var data = $(this)[0];
        var formdata = new FormData(data);
        $.ajax({
            url: '{{ URL::to('envoyer_reponse') }}',
            type: 'post',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(response) {
                alert(response.message)
                data.reset()
                $('.right').load('{{ URL::to('success') }}')
            },
            error: function(error) {
                alert('Erreur lors de la soumission');
                console.log(error)
            }
        })
    })
</script>
