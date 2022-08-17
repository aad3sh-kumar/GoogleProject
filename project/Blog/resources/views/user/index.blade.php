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
        <h2> Users </h2>
        <p>Top ranking users who have contributed to our Blog website.</p>
        <table class = 'table table-striped'>
            <thead>
                <tr>
                    <th></th>
                    <th>Username</th>
                    <th>Country</th>
                    <th>Registered</th>
                </tr>
            </thead>
            <tbody>
                @for($i = 0; $i < sizeof($users); $i++)
                    <tr>
                        <th>{{ $i + 1 }}</th>
                        <th><a href="/user/view/{{ $users[$i]['id'] }}">{{ $users[$i]['username'] }}</a></th>
                        <th>{{ $users[$i]['country'] }}</th>
                        <th>{{ $users[$i]['created_at'] }}</th>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

</body>
</html>