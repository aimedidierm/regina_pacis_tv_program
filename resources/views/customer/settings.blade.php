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
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Settings</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Profile</h6>
            </nav>
        </div>
    </nav>

    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask  bg-gradient-info  opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="/assets/img/user.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{Auth::guard('customer')->user()->name}}
                        </h5>
                        <p class="mb-0 font-weight-normal text-sm">
                            Customer Account
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <form action="/customer/settings" method="post">
                        @if($errors->any())
                        <span style="color: red;">{{$errors->first()}}</span><br>
                        @endif
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="names">Names:</label>
                            <input type="text" class="form-control" value="{{$data->name}}" placeholder="Enter email"
                                id="names" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" value="{{$data->email}}" placeholder="Enter email"
                                id="email" disabled>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" value="{{$data->phone}}" name="phone"
                                placeholder="Enter phone number" id="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" value="{{$data->address}}" name="address"
                                placeholder="Enter your adress" id="address" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password"
                                id="pwd" required>
                        </div>
                        <div class="form-group">
                            <label for="cpwd">Confirm password:</label>
                            <input type="password" class="form-control" name="confirmPassword"
                                placeholder="Enter password" id="cpwd" required>
                        </div>
                        <button type="submit" class="btn btn-primary" style="box-shadow: none">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
@stop
<br>