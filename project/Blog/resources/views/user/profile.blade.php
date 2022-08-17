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

    <div class = 'container mt-3'>
        <div class='card'>
            <div class='card-body'>
                <h4 class='card-title'>{{$user['username']}}</h4>
                <h5 class='card-subtitle mb-2 text-muted'>{{$user['country']}}</h5>
                <h5>About</h5>
                <p class='card-text'>
                    {{$user['about']}}
                </p>
                <h5>Personal Information</h5>
                <p class='card-text'>{{$user['email']}}</p>
                <p class='card-text'>{{$user['skills']}}</p>
                <p class='card-text'>{{$user['education']}}</p>
                <h5>Statistics</h5>
                <p class='card-text'>{{$user['followers']}} Followers</p>
                <p class='card-text'>{{$user['blogs']}} Posts</p>
                <hr>
                @if (Auth::id() == $id)
                    <form method='POST' action="/user/edit">
                        @csrf
                        <button type='submit' class='btn btn-primary'>Edit</button>
                    </form>
                @endif
                @if (Auth::check() && Auth::id() != $id) 
                    <form method='POST' action="/user/follow/{{ $id }}">
                        @csrf
                        @if ($following)
                            <button type='submit' class='btn btn-primary'>Unfollow</button>
                        @else
                            <button type='submit' class='btn btn-primary'>Follow</button>
                        @endif
                    </form>
                @endif
            </div>
        </div>
    </div>

</body>
</html>