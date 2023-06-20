@extends('layout')

@section('content')
<x-admin-nav />
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">TV accounts managemnts</h6>
            </nav>
        </div>
    </nav>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <button type="button" data-toggle="modal" style="box-shadow: none" class="btn btn-primary"
                    data-target="#exampleModal">Add</button>
                @if($errors->any())<span style="color: red;"> {{$errors->first()}}</span>
                @endif
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create new TV account</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/admin/tv" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="names">Names:</label>
                                        <input type="text" class="form-control" name="names" placeholder="Enter names"
                                            id="names" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address:</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter email"
                                            id="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Password:</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Enter password" id="pwd" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cpwd">Confirm Password:</label>
                                        <input type="password" class="form-control"
                                            placeholder="Enter password confirmation" name="confirmPassword" id="cpwd"
                                            required>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" style="box-shadow: none"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" style="box-shadow: none">Save
                                </button></form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Tv account management table</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Owner</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Function</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data->isEmpty())
                                    <tr>
                                        <td colspan="3">No data in table</td>
                                    </tr>
                                    @endif
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="/assets/img/user.jpg"
                                                        class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$item->names}}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{$item->email}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <form method="POST" action="/admin/tv/{{ $item->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    style="border-radius: 8px;border: none;background-color: #f44336;color: white;padding: 10px 20px;">Delete</button>
                                            </form>
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
@stop