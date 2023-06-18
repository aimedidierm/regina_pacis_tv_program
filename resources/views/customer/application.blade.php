<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Fill below form to start application</h1>
    <form action="/customer/application" method="post">
        <select name="category">
            <option value="sapmle"> Category 1</option>
            <option value="sapmle"> Category 2</option>
        </select>
        <select name="subCategory">
            <option value="sapmle"> Sub category 1</option>
            <option value="sapmle"> Sub category 2</option>
        </select>
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="description" placeholder="Description">
        <input type="file" name="video">
        <button type="submit">Send</button>
    </form>

    <br>
    <table border="2px">
        <tr>
            <td>N</td>
            <td>Category</td>
            <td>Sub category</td>
            <td>Title</td>
            <td>Description</td>
            <td>Price</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
        @if ($data->isEmpty())
        <tr>
            <td colspan="8">No data in table</td>
        </tr>
        @endif
    </table>
</body>

</html>