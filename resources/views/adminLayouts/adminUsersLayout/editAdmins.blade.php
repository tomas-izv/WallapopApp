<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creating a new user</title>
</head>
<body>
    <p>{{$errors}}</p>
    <a href="{{url()->previous()}}">Go back</a>

    <form action="{{route('users.update', [$user->id])}}"  method="post">
        @csrf
        @method('put')
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value=" {{$user->email}}">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{$user->name}}">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="{{$user->password}}">
        <label for="role">Role:</label>
        <select name="role" id="role">
            @foreach ($roles as $role)
                @if ($role != "superadmin")
                    <option value="{{$role}}"
                        {{ old('role') == $role ? 'selected' : ($role == $user->role ? 'selected' : '') }} >
                        {{$role}}
                    </option>
                @endif
            @endforeach
        </select>
        <button>Update</button>
    </form>

</body>
</html>
