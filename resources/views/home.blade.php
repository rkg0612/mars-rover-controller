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
            <div class="col-md-12">
                <form action="{{ route('give.commands') }}" method="POST">
                    @csrf
                    <h3 class="text-center">Mars Rover Setup</h3>
                    <div class="form-group">
                        <label>Starting X Coordinate</label>
                        <input type="number" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" class="form-control" max="200" name="x" value="{{ old('x') }}" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Starting Y Coordinate</label>
                        <input type="number" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" class="form-control" max="200" name="y" value="{{ old('y') }}" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Starting Facing Direction</label>
                        <select name="facing_direction" class="form-control" required>
                            <option value="" disabled selected>- Select One -</option>
                            <option value="N">North</option>
                            <option value="E">East</option>
                            <option value="W">West</option>
                            <option value="S">South</option>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Command String (F = forward, L = left, R = right)</label>
                        <input type="text" class="form-control" name="command_string" value="{{ old('command_string') }}" required>
                    </div>
                    <hr>
                    <div class="form-group text-center">
                        <button class="btn btn-block btn-success" type="submit">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>