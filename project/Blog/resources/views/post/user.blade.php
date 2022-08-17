<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>

    @include('header')

    @if(Session::get('error'))
            <div class='alert alert-danger alert-block'>
                <button type = 'button' class='close' data-dismiss='alert'>x</button>
                <strong>{{ Session::get('error') }}</strong>
            </div>
    @endif

    <div class='container'>
        @foreach($posts as $post)
            <hr>
            <form action = "/posts/view/{{ $post['id'] }}" method = 'GET'>
                @csrf
                <div>
                    <h3>{{ $post['title'] }}</h3>
                    <h4>Date: {{ $post['created_at'] }}</h4>
                </div>
                <div class = 'form-group'>
                    <button type = 'submit' class='btn btn-primary' >View</button>
                    <button formaction = "/posts/edit/{{ $post['id'] }}" formmethod = 'POST' class='btn btn-default'>Edit</button>
                    <button formaction = "/posts/delete/{{ $post['id'] }}" formmethod = 'POST' class='btn btn-default'>Delete</button>
                </div>
            </form>
        @endforeach

        {{ $posts->links() }}
    </div>

</body>
</html>