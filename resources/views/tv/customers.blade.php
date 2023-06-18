<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers</title>
</head>

<body>
    <h1>All customers list</h1>
    <table border="2px">
        <tr>
            <td>N</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Address</td>
        </tr>
        @if ($data->isEmpty())
        <tr>
            <td colspan="5">No data in table</td>
        </tr>
        @endif
        @foreach ($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->address}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>