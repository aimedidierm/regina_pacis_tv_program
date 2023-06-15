<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tv accounts management</title>
</head>

<body>
    <a href="/admin/settings">
        <h4>Update your profile</h4>
    </a>
    <h1>Tv accounts management</h1>
    <table border="2px">
        <tr>
            <td>N</td>
            <td>Name</td>
            <td>Email</td>
            <td>Action</td>
        </tr>
        @if ($data->isEmpty())
        <tr>
            <td colspan="4">No data in table</td>
        </tr>
        @endif
        @foreach ($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->names}}</td>
            <td>{{$item->email}}</td>
            <td>
                <form method="POST" action="/admin/tv/{{ $item->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <h1>Add new tv account</h1>
    <form action="/admin/tv" method="post">
        @csrf
        <input type="text" placeholder="Enter names" name="names"><br>
        <input type="email" placeholder="Enter email" name="email"><br>
        <input type="password" placeholder="Enter password" name="password"><br>
        <input type="password" placeholder="Confirm password" name="confirmPassword"><br>
        <button type="submit">Add</button>
    </form>
    <br>
    <a href="/logout">Logout</a>
</body>

</html>