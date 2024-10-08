<div class="container mt-3">
    <table class="table  text-center">
        <thead>
            <tr>
                <th> #</th>
                <th> Titre</th>
                <th> Date limite </th> 
                <th> Invité (s) </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody class="addTable">
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center align-items-center mt-3 create">
    <button type="button" class="btn btn-primary p-3"> Créer une sondage </button>
</div>
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
    $.ajaxSetup({
        processData: false,
        contentType: false,
    });

    $(document).ready(function() {

        $.ajax({
            url: '{{ URL::to('supprimer') }}',
            type: 'delete',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (response) => {
                console.log(response.success);
            },
            error: (error) => {
                console.log(error);
            }
        })
        $.ajax({
            url: '{{ URL::to('list') }}',
            type: 'get',
            dataType: 'json',
            success: (response) => {
                for (i = 0; i < response.length; i++) {
                    $('.addTable').append('<tr>' +
                        ' <td>' + response[i].id + '</td>' +
                        '<td>' + response[i].titre + '</td>' +
                        '<td>' + response[i].date_fin + '</td>' +
                        '<td>' + response[i].invite + '</td>' +
                        '<td class="gap-2">  <a class="btn btn-secondary to_Result mx-2" id="' +
                        response[i].id +
                        '" aria-label="View"> Voir </a> ' +
                        '<a class="btn btn-warning to_Modify" id="' + response[i].id +
                        '"> Modifier </a>' +
                        '<a class="btn btn-danger to_delete mx-2" id="' + response[i].id +
                        '"> Supprimer  </a>' +
                        '</td>' +
                        '</tr>')
                }
            },
            error: (error) => {
                console.log(error)
            }
        })
    })
    $(document).ready(function() {
        $('.create').on('click', function() {
            $('.rightView').load('{{ URL::to('dashboard/sondage') }}')
        })
    })

    $(document).on('click', '.to_Result', function() {
        var to = $(this).attr('id')
        $('.rightView').load('{{ URL::to('init') }}/' + to)
    })

    $(document).on('click', '.to_Modify', function() {
        var to = $(this).attr('id')
        $('.rightView').load('{{ URL::to('dashboard/modify') }}/' + to)
    })

    $(document).on('click', '.to_delete', function(e) {
        e.preventDefault()
        var id = $(this).attr('id')
        $.ajax({
            url: '{{ URL::to('effacer') }}/' + id,
            type: 'delete',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (response) => {
                alert(response)
            },
            error: (error) => {
                console.log(error)
            }
        })
    })
</script>
