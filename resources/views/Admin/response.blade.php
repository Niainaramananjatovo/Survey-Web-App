<div class="d-flex container justify-content-center align-items-center my-3" style="background-color: white">
    <h1 class="lead display-6 poll_title p-2"> Titre </h1>
</div>
<div class="card rounded-0 w-50 d-flex justify-content-center mx-auto mb-3">
    <div class="card-header">
        <span class="lead display-6 username"> Nom & Prénom </span>
    </div>
    <div class="card-body">
    </div>
</div>
<script>
    $(document).ready(function() {
        var poll = {{ $poll }}
        var user = {{ $user }}
        $.ajax({
            url: '{{ URL::to('get_all_question') }}/' + poll + '/' + user,
            type: 'get',
            dataType: 'json',
            processData: false,
            contentType: false,
            success: (response) => {
                for (i = 0; i < response.length; i++) {
                    if (i % 2 == 0) {
                        $('.card-body').append(
                            '<div class="mx-2 p-2 bg-light mt-3 mb-3 w-50 rounded" style="clear:both">' +
                            '<p>' + response[i] + '</p>' +
                            '</div>'
                        )
                    } else {
                        $('.card-body').append(
                            '<div class="mx-2 p-2 bg-primary mt-3 mb-3  w-50 rounded" style="float:right; clear:both">' +
                            '<p class="text-white">' + response[i] + '</p>' +
                            '</div>'
                        )
                    }

                }
            },
            error: (error) => {
                console.log(error)
            }
        })
        $.ajax({
            url: '{{ URL::to('get_User') }}/' + user,
            type: 'get',
            dataType: 'json',
            processData: false,
            contentType: false,
            success: (response) => {
                var username = response[0].nom + ' ' + response[0].prenom
                $('.username').text(username)
            },
            error: (error) => {
                console.log(error)
            }
        })
        $.ajax({
            url: '{{ URL::to('title') }}/' + poll,
            type: 'get',
            dataType: 'json',
            processData: false,
            contentType: false,
            success: (response) => {
                $('.poll_title').text(response[0])
            },
            error: (error) => {
                console.log(error)
            }
        })
    })
</script>
