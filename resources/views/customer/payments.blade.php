@extends('layout')

@section('content')
<x-customer-nav />
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">application</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Apply</h6>
            </nav>
        </div>
        @if($errors->any())<span style="color: red;"> {{$errors->first()}}</span>
        @endif
    </nav>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Make payment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/customer/payments" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="application" id="application">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price:</label>
                                        <input type="number" class="form-control" id="price" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category:</label>
                                        <input type="text" class="form-control" id="category" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">BIlling number:</label>
                                        <input type="number" class="form-control" name="number" id="number" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" style="box-shadow: none"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" style="box-shadow: none">Pay
                                </button></form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Your applications</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Title</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Category</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Price</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Video</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data->isEmpty())
                                    <tr>
                                        <td colspan="5">No data in table</td>
                                    </tr>
                                    @endif
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <h6 class="mb-0 text-sm">{{$item->title}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <h6 class="mb-0 text-sm">{{$item->categories->title}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <h6 class="mb-0 text-sm">{{$item->price}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <a href="{{$item->video}}">Open video</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" data-toggle="modal" style="box-shadow: none"
                                                class="btn btn-info" data-target="#exampleModal"
                                                onclick="pay({{$item}})"> Pay</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<script>
    function pay(item) {
        var application = document.getElementById('application');
        application.value = item.id;
        var name = document.getElementById('name');
        name.value = item.title;
        var price = document.getElementById('price');
        price.value = item.price;
        var category = document.getElementById('category');
        category.value = item.categories.title;
    }
</script>
@stop