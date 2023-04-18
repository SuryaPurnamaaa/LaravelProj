<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title>Edit Game</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="head">Edit Game</a>
        <a class="navbar-brand" href="/games">Games</a>
    </nav>
    <div class="container">
        <form action="{{ url('/game/editgame/'.$game->id) }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="Title" value="{{ $game->Title }}" required>
            </div>
            <div class="form-group">
                <label for="publisher">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="Publisher" value="{{ $game->Publisher }}"required>
            </div>
            <div class="form-group">
                <label for="year">Release Year</label>
                <input type="number" class="form-control" id="year" name="Release_Year" value="{{ $game->Release_Year }}"required>
            </div>
            <button type="submit" class="btn btn-primary">Update Game</button>
        </form>
    </div>
</body>
<style>
    .head {
        font-size: 30px;
        font-weight: bold;
        margin-left: 13%;
    }
    .navbar-brand {
        margin-left: 59%;
        margin-top: 10px;
    }
</style>
</html>
