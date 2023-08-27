<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Approved Customers Report</title>
</head>

<body>
    <div style="text-align: center; margin-bottom: 20px;">
        <h2 style="font-size: 24px; font-weight: bold;">List of all approved customers</h2>
    </div>
    <table style="width: 100%; border-collapse: collapse;">
        <tr style="background-color: #f2f2f2;">
            <th style="border: 1px solid #dddddd; padding: 8px;">Customer names</th>
            <th style="border: 1px solid #dddddd; padding: 8px;">Email</th>
            <th style="border: 1px solid #dddddd; padding: 8px;">Category</th>
            <th style="border: 1px solid #dddddd; padding: 8px;">Title</th>
            <th style="border: 1px solid #dddddd; padding: 8px;">Price</th>
        </tr>
        @if ($data->isEmpty())
        <tr>
            <td colspan="5" style="border: 1px solid #dddddd; padding: 8px;">No approved customers found</td>
        </tr>
        @else
        @foreach ($data as $item)
        <tr>
            <td style="border: 1px solid #dddddd; padding: 8px;">{{$item->customers->name}}</td>
            <td style="border: 1px solid #dddddd; padding: 8px;">{{$item->customers->email}}</td>
            <td style="border: 1px solid #dddddd; padding: 8px;">{{$item->categories->title}}</td>
            <td style="border: 1px solid #dddddd; padding: 8px;">{{$item->title}}</td>
            <td style="border: 1px solid #dddddd; padding: 8px;">{{$item->price}}</td>
        </tr>
        @endforeach
        @endif
    </table>
</body>

</html>