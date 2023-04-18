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

    <title>Games</title>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand">Games</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item add">
                    <a href="{{ url('/game/addgame') }}" class="btn btn-secondary">Add Game</a>
                </li>
                <li class="nav-item reset">
                    <a href="{{ url('/game/reset') }}" class="btn btn-warning">Reset IDs</a>
                </li>
            </ul>
            @if (Auth::check())
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->username }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        </div>
                    </li>
                </ul>
            @endif
        </div>
    </nav>
    <div class="container">
        <table class="table">
            <thead>                
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Publisher</th>
                    <th>Release Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($games as $game)
                    <tr>
                        <td>{{ $game->id }}</td>
                        <td>{{ $game->Title }}</td>
                        <td>{{ $game->Publisher }}</td>
                        <td>{{ $game->Release_Year }}</td>
                        <td>
                            <a href="{{ url('/game/editgame/'.$game->id) }}" class="btn btn-primary">Edit</a>                       
                            <a href="#" class="btn btn-danger" onclick="confirmDelete({{ $game->id }})">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-success text-center">
            {{ Session::get('success') }}
        </div>
    @endif

    <script>
        function confirmDelete(gameId) {
            if (confirm("Are you sure you want to delete this game?")) {
                window.location.href = "{{ url('/game/delgame/') }}/" + gameId;
            }
        }
    </script>
    <style>
        .navbar {
            margin-left: 12%;
            margin-bottom: 10px;
            margin-top: 10px;
        }
        .nav-item {
            margin-left: 10px;
        }
    </style>
</body>
</html>