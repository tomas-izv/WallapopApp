<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome {{ $admin->role }}</title>
</head>

<body style="background-color:mediumpurple">
    <h3 style="color: white">Welcome! {{ $admin->role }}</h3>

    <nav>
        <ul class="actions-list">
            <li><a class="dropdown-item" style="color: white;" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form></li>
            <li><a href="" style="color: white;">Category</a></li>
            <li><a href="" style="color: white;">Sale</a></li>
            <li><a href="{{route('setting.index')}}" style="color: white;">Setting</a></li>
            @if ($admin->role == 'superadmin')
                <li><a href="{{route('allUsers')}}" style="color: white;">Users</a></li>
            @endif
        </ul>
    </nav>

</body>

</html>
