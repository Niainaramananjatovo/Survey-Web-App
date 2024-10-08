<h1 class="lead display-3"> Liste des Questionnaires </h1>
<hr>
<div class="container-fluid p-2">
    <div class="row gx-3 lists">

    </div>

</div>
</div>
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '{{ URL::to('listSurvey') }}',
            type: 'get',
            dataType: 'json',
            contentType: false,
            processData: false,
            success: (response) => {
                for (i = 0; i < response.length; i++) {
                    if (response[i].invite == 'Tous' || response[i].invite ==
                        '{{ Auth::user()->departement }}') {
                        // convertisseur de date 
                        var expiredDate = new Date(response[i].date_fin)
                        var date = expiredDate.getDate() + '/' + (expiredDate.getMonth() + 1) +
                            '/' +
                            expiredDate.getFullYear()
                        var time = expiredDate.getHours()
                        //affichage sous-forme de liste en bloc 
                        $('.lists').append('' +
                            '<div class="col-lg-2 col-md-6 align-items-center p-3 rounded shadow mx-3 bg-white"> ' +
                            '<div class="mt-3 d-flex align-items-center justify-content-center Q1" style="cursor:pointer" id="' +
                            response[i].id + '">' +
                            '<span class="text-center lead">' + response[i].titre + '</span>' +
                            '</div> ' +
                            '<div class="mt-5">' +
                            '<p class="text-center text-muted"> Expirée le ' + date + ' à ' +
                            time +
                            ' heures' +
                            '</p>' + '</div>'
                        )
                    }
                }

            },
            error: (error) => {
                console.log(error)
            }
        })
    })
    $(document).on('click', '.Q1', function() {
        var to = $(this).attr('id')
        $('.right').load('{{ URL::to('dashboard/questionnaire') }}/' + to)
    })
     
</script>
