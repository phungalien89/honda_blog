<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NavBar</title>
    <script src="https://kit.fontawesome.com/bc8527f611.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
    img.logo{
            width: 50px;
    }
    img.logo:hover{
        box-shadow: 0px 0px 0px 3px var(--primary);
    }
</style>
<body>
    <div class="navbar navbar-dark navbar-expand-sm bg-dark text-light">
        <a href="/">
            <img class="rounded-lg logo" src="https://img.icons8.com/emoji/96/000000/motorcycle-emoji.png"/>
        </a>
        <button data-toggle="collapse" data-target="#menu1" class="btn btn-dark navbar-toggler">
            <span class="fa fa-bars"></span>
        </button>
        <div id="menu1" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <div class="btn-group">
                            <a href="/profile/{{Auth::user()->profile->id}}" class="nav-link btn btn-dark">{{Auth::user()->displayName}}</a>
                            <button data-toggle="dropdown" class="btn btn-dark dropdown-toggle-split rounded-right">
                                <span class="fa fa-caret-down"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item text-center" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{route('login')}}" class="nav-link btn btn-dark">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('register')}}" class="nav-link btn btn-dark">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</body>
</html>
