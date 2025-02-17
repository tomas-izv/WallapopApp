<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Swapply</title>
</head>
<body>
    <header style="background-color: purple; color:white;">
        <h3>SWAPPLY</h3>

        <nav>
            <ul class="link-list">
                @if(Auth::user() == null)
                    <li><a href="{{route('login')}}" style="color:white;">Log in</a></li>
                    <li><a href="{{route('register')}}" style="color:white;">Sign in</a></li>
                @else
                    <li><a href="{{route('home')}}" style="color:white;">My account</a></li>
                @endif
            </ul>
        </nav>
    </header>
</body>
</html>
