<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>

    @include('header')

    <div class = 'container'>
        <div class = 'row mt-3'>
            <div class = 'col-md-8'>
                <h1> {{ $post['title'] }} </h1>
                <h3 class='mt-2'> By {{ $post['author'] }} </h3>
                <br>
                <br>
                {{ $post['text'] }}
            </div>
            <div class='col'>
                <br><br><br>
                <h3>
                    <a href="/posts/{{$post['id']}}/vote/downvote"><i class="bi bi-dash-lg"></i></a>
                    {{ $post['votes'] }}
                    <a href="/posts/{{$post['id']}}/vote/upvote"><i class="bi bi-plus-lg"></i></a>
                </h3>
            </div>
        </div>
    </div>

    <hr>
    <div class = 'container'>
        <h2>Discussion</h2>
        
        <form method='POST' action="/discussions/write/{{ $post['id'] }}">
            @csrf
            <div class = 'form-group mt-3'>
                <input type='text' placeholder='Use this to discuss' name='comment' size='70'>
            </div>
            <button type='submit' class='form-group btn btn-primary mt-3'>Write</button>
        </form>
        <br>
        <br>
        @foreach($discussions as $discussion)
            <label>{{ $discussion['author'] }} says</label>
            <p>{{ $discussion['text'] }}</p>
        @endforeach
    </div>
</body>
</html>