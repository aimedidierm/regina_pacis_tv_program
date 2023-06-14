<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>
    @if($errors->any())<span style="color: red;"> {{$errors->first()}}</span>@else
    <p class="login-box-msg">Fill your details</p> @endif
    <form action="/" method="post">
        @csrf
        <input type="email" name="email" id="">
        <input type="password" name="password" id="">
        <button type="submit"></button>
    </form>
</body>

</html>