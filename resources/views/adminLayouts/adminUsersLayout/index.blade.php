<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Users</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



</head>
<body>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="undo-delete">Close</button>
              <form action="" id="formToDelete" method="post">
                @csrf
                @method('delete')
                    <button type="button" class="btn btn-primary" id="confirm-delete" data-href="{{ url('users/') }}">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    <a href="{{route('users.index')}}">Go back</a>

    <h2>All the users</h2>
    <div class="create-users-buttons">
        <a href="{{route('users.create')}}">Create user</a>
    </div>

    <div class="users-container">
        @foreach ($users as $user)
            <ul class="user-data-list">
                <li>{{$user->name}}</li>
                <li>{{$user->email}}</li>
                <li>{{$user->role}}</li>
                <li><a href="{{route('users.show', [$user->id])}}">View</a></li>
                @if($user->role != 'user')
                    <li><a href="{{route('users.edit', [$user->id])}}">Edit</a></li>
                @endif
                <li><a href="" class="btn btn-primary deleteUserBtn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-email = "{{$user->email}}" data-id = "{{$user->id}}" data-role = "{{$user->role}}">Delete</a></li>
            </ul>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="{{asset('js/index.js')}}"></script>
</body>
</html>
