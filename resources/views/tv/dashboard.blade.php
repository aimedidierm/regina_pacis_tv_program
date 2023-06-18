<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>

<body>
    <a href="/tv">Home</a><br>
    <a href="/tv/settings">Settings</a><br>
    <a href="/tv/customers">Customers</a><br>
    <a href="/tv/applications">All application</a><br>
    <a href="/tv/categories">Categories</a>
    <a href="/tv/subcategories">Subcategories</a>
    <a href="/tv/prices">Prices</a><br>
    <a href="/logout">Logout</a><br>
    <h1>{{$customers}} Total customers</h1>
    <h1>{{$activeCustomers}} Active customers</h1>
    <h1>{{$waitingPayment}} Waiting for payment</h1>
    <h1>{{$income}} Rwf Total income</h1>
</body>

</html>