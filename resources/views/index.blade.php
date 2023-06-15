<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index page</title>
</head>

<body>
    @if($errors->any())<span style="color: red;"> {{$errors->first()}}</span>@else
    <p class="login-box-msg">Fill your details</p> @endif
    <h1>Login form</h2>
        <form action="/" method="post">
            @csrf
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit">Login</button>
        </form>
        <h1>Register form</h2>
            <form action="/register" method="post">
                @csrf
                <input type="text" name="names" placeholder="names"><br>
                <input type="text" name="phone" placeholder="Your telephone number"><br>
                <input type="text" name="address" placeholder="Address"><br>
                <input type="email" name="email" placeholder="Email"><br>
                <input type="password" name="password" placeholder="Password"><br>
                <input type="password" name="confirmPassword" placeholder="Confirm Password"><br>
                <button type="submit">Login</button>
            </form>
</body>

</html>