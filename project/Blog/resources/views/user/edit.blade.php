<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>

    @include('header')

    <div class='container'>
        <div class='row'>
            <h2 class='col-md-offset-3'><strong>Profile</strong></h2>
        </div>

        <form method='POST' action='/user/edit'>
            @csrf
            <div class='row'>
                <h3 class='col-md-offset-3'>Name </h3>
                <textarea class='col-md-offset-4' name='username' type='text'>{{ $user['username'] }}</textarea>
            </div>

            <div class='row'>
                <h3 class='col-md-offset-3'>Email address </h3>
                <textarea class='col-md-offset-4' name='email' type='email'>{{ $user['email'] }}</textarea>
            </div>

            <div class='row'>
                <h3 class='col-md-offset-3'>Education</h3>
                <textarea class='col-md-offset-4' name='education' type='text' rows='4'>{{ $user['education'] }}</textarea>
            </div>

            <div class='row'>
                <h3 class='col-md-offset-3'>Country</h3>
                <textarea class='col-md-offset-4' name='country' type='text'>{{ $user['country'] }}</textarea>
            </div>

            <div class='row'>
                <h3 class='col-md-offset-3'>Skills</h3>
                <textarea class='col-md-offset-4' name='skills' type='text' rows='5'>{{ $user['skills'] }}</textarea>
            </div>

            <div class='row'>
                <h3 class='col-md-offset-3'>About</h3>
                <textarea class='col-md-offset-4' name='about' type='text' rows='5'>{{ $user['about'] }}</textarea>
            </div>

            <br>
            <button class='col-md-offset-4 btn btn-primary' type='submit'>Save</button>
        </form>
    </div>

</body>
</html>