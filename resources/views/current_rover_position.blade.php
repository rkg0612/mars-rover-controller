<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mars Rover</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            @if($errors->any())
            <div class="col-md-12">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                    <li>
                        <div class="alert alert-danger" role="alert">
                          {{$error}}
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="col-md-12 text-center">
                <h3>Current X Position: {{ $position->x }}</h3>
                <h3>Current Y Position: {{ $position->y }}</h3>
                <h3>Current Direction Facing: {{ $position->direction }}</h3>
                <hr>
                <a href="{{ route('home') }}" class="btn btn-warning">GO BACK</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    
</body>
</html>