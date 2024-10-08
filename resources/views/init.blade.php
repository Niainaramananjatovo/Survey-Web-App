<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('image/ARTEC FAVICON.png') }}" type="image/x-icon">
    <script src="{{ asset('/js/chart.js-4.4.4/package/dist/chart.umd.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <script src="{{ asset('js/js/bootstrap.min.js') }}"></script>
    <title>Document</title>
</head>

<body class="bg-light"> 
    <div class="container p-2 mt-3 mb-3 shadow-sm bg-white">
        <!-- The only way to do great work is to love what you do. - Steve Jobs -->
        <h1 class="lead display-5 text-center" id="title"> Liste des répondants  </h1>
    </div>
    <table class="table table-hover" >
        <thead>
          <tr >
            <th scope="col" class="p-3">#</th>
            <th scope="col"class="p-3">Nom & prénom </th>
            <th scope="col"class="p-3"> Départment</th> 
            <th scope="col"class="p-3"> Matricule</th> 
            <th scope="col" class="p-3">Liens </th>
          </tr>
        </thead>
        <tbody class="value">
        </tbody>
      </table>
    <script>
        $(document).ready(function(){
            var id = {{$id}}
             $.ajax({
                url:'{{URL::to('responder')}}/'+id,
                type:'GET',
                dataType:'json',
                processData:false,
                contentType:false,
                success: (response) => {   
                    for(i=0; i<response.length;i++) { 
                        var username = response[i].nom+' '+ response[i].prenom
                        $('.value').append(
                        '<tr>'+
                          ' <th scope="row"  class="p-3">'+ (i+1) +'</th>'+
                           '<td class="p-3">'+ username +'</td>'+
                           '<td class="p-3">'+ response[i].departement +'</td>'+ 
                           '<td class="p-3">'+ response[i].matricule +'</td>'+
                           '<td class="p-3"> <a class="btn btn-primary to_view" id="'+response[i].id +'"> <i class="fa fa-eye"> </i></a></td>'+
                       ' </tr>')
                    }
                }, error: (error) => {
                    alert("error excepted")
                }
             })
        }) 

        $(document).on('click', '.to_view', function (){
            var Id_user = $(this).attr('id')
            var poll_id = {{$id}}
            $('.rightView').load('{{URL::to('response')}}/'+Id_user+'/'+poll_id)
        })
    </script>
</body>

</html>

