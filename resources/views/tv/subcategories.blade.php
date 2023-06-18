<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Manage subcategories</h1>
    <table border="2px">
        <tr>
            <td>N</td>
            <td>Title</td>
            <td>Category</td>
            <td>Descrition</td>
            <td>Action</td>
        </tr>
        @if ($data->isEmpty())
        <tr>
            <td colspan="5">No data in table</td>
        </tr>
        @endif
        @foreach ($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->categories->title}}</td>
            <td>{{$item->description}}</td>
            <td>
                <form method="POST" action="/tv/subcategories/{{ $item->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <h1>Add new subcategory</h1>

    <form action="/tv/subcategories" method="post">
        @csrf
        <select name="category" id="">
            @foreach ($categories as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
            @endforeach
        </select>
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="description" placeholder="Descrption">
        <button type="submit">Add</button>
    </form>

</body>

</html>