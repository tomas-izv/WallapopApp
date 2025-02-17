<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creating a new setting</title>
</head>
<body>
    <a href="{{url()->previous()}}">Go back</a>

    <form action="{{route('setting.store')}}" method="POST">
        @csrf
        @method('POST')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name"  maxlength="25" required>
        <label for="maxImages">Max of images for a sale:</label>
        <input type="number" name="maxImages" id="maxImages" min = "1" max = "6" value="1">
        <button>Create setting</button>
    </form>

</body>
</html>
