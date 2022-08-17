<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>

    @include('header')

    <div class = 'container mt-4 me-5'>
        <div class = 'row'>
            <div class = 'col-md-8'>
                <h1> Create new post</h1>

                <form action='/posts/create' method='POST'>
                    @csrf
                    <div class='form-group mt-3'>
                        <input type='text' class='form-control' name='title' placeholder='Enter blog title...'>
                    </div>
                    <div class='form-group mt-3'>
                        <textarea type='text' class='form-control' name='text' rows='10' placeholder='Enter blog description...'></textarea>
                    </div>
                    <div class='form-group mt-3'>
                        <button type='submit' class='btn btn-primary me-2'>Create</button>
                        <button type='cancel' formmethod='GET' formaction='/' class='btn btn-default'>Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>