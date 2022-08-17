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

    <nav class = 'navbar navbar-dark bg-dark'>
        <div class = 'container-fluid'>
            <div class='navbar-header'>
                <a class = 'navbar-brand' href='/'>Blogs</a>
            </div>
        </div>
    </nav>

    <div class = 'container d-flex flex-column align-items-center'>
        <h2 class = 'mt-4'>Register</h2>
        @if(Session::get('error'))
        <div class='alert alert-danger alert-block'>
                <button type = 'button' class='close' data-dismiss='alert'>x</button>
                <strong>{{ Session::get('error') }}</strong>
            </div>
        @endif
        <form class='mt-5' method='POST' action='/registerCheck'>
            @csrf
            <div class = 'form-floating mt-4'>
                
                <input type='email'  id='email' name='email' class='form-control' placeholder=''>
                <label for='email' class='form-label'>Email</label>
            </div>
            <div class = 'form-floating mt-3'>
                <input placeholder='' type='password' name='password' id='password' class='form-control'>
                <label for='password' class='form-label'>Password</label>
            </div>
            <div class = 'form-floating mt-3'>
                <input placeholder='' type='username' name='username' class='form-control'>
                <label for='username' class='form-label'>Username</label>
            </div>
            <button type='submit' class='mt-4 btn btn-primary' name='submit'>Register</button>
        </form>
    </div>

</body>
</html>