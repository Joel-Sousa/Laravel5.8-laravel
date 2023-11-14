<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- helper | route() -->
<body>
    <h1>App</h1>
    <div>
        <a href="{{route('app.user')}}">User</a><br>
        <a href="{{route('app.profile')}}">Profile</a><br>
        <a href="{{route('app')}}">App</a><br>
    </div>
</body>

</html>