<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>

    @include('header')

    <div class = 'container mt-4'>
        <h2>Notifications</h1>
        <br>
        <h5>
            <i>You have {{ sizeof($notifications) }} new notifications</i>
        </h5>
        <table class='table table-borderless'>
            <tbody>
                @for($i = 0; $i < sizeof($notifications); $i++)
                    <tr>
                        <th>{{ $i+1 }}</th>
                        <th>{{ $notifications[$i]['text'] }}</th>
                        <th>{{ $notifications[$i]['created_at'] }}</th>
                        <th>
                            <form class='form-inline' method='POST' action="/user/notifications/delete/{{ $notifications[$i]['id'] }}">
                                @csrf
                                <button type='submit' class='btn btn-primary'>Close</button>
                            </form>
                        </th>
                    </tr>
                @endfor
            </tbody>
        </table>

        {{ $notifications->links() }}
    </div>

</body>
</html>