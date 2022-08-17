<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>
<body>

    <nav class = 'navbar navbar-dark bg-dark'>
        <div class = 'container-fluid'>
            <div class='navbar-header'>
                <a class = 'navbar-brand' href='/'>Blogs</a>
            </div>
        </div>
    </nav>

    <div class = 'container d-flex flex-column align-items-center'>
        <h2 class = 'mt-4'>Welcome</h2>
        @if(Session::get('error'))
            <div class='alert alert-danger alert-block'>
                <button type = 'button' class='close' data-dismiss='alert'>x</button>
                <strong>{{ Session::get('error') }}</strong>
            </div>
        @endif
        <form class='mt-5' method='POST' action='/loginCheck'>
            @csrf
            <div class='form-floating mb-3'>
                <input type='email' id='Email' name='email' placeholder='name@example.com' class='form-control'>
                <label for='Email' class='form-label'>Email address</label>
            </div>
            <div class='form-floating mb-2'>
                <input type='password' id='Password' name='password' placeholder='password' class='form-control'>
                <label for='Password' class='form-label'>Password</label>
            </div>

            <button type = 'submit' class='mt-3 btn btn-primary'>Login</button>
        </form>

        <a class = 'mt-5' href='/register'>Register instead?</a>
        <h4 class = 'mt-3' >OR</h4>
        <a class = 'mt-2' href="/auth/google/redirect"><h3><i class="bi bi-google"></i> Sign in with Google</h3></a>
        <a class = 'mt-2' href="/auth/github/redirect"><h3><i class="bi bi-google"></i> Sign in with Github</h3></a>
    </div>

</body>
</html>