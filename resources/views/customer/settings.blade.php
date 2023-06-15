<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Settings</title>
</head>

<body>
    <h1> You can update your details</h1>
    <form action="/customer/settings" method="post">
        @if($errors->any())
        <span style="color: red;">{{$errors->first()}}</span><br>
        @endif
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="text" value="{{$data->name}}" disabled><br>
        <input type="text" value="{{$data->email}}" disabled><br>
        <input type="text" name="phone" value="{{$data->phone}}" required><br>
        <input type="text" name="address" value="{{$data->address}}" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="confirmPassword" placeholder="Confirn password" required><br>
        <button type="submit">Update</button>
    </form>
    <br>
    <a href="/logout">Logout</a>
</body>

</html>