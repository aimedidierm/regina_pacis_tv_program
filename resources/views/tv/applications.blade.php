@extends('layout')

@section('content')
<x-tv-nav />
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Application</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">All</h6>
            </nav>
        </div>
    </nav>
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">All customers list</h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Owner</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Category</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Adv</th>
                            <th></th>
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
                                        <img src="/assets/img/user.jpg" class="avatar avatar-sm me-3 border-radius-lg"
                                            alt="user1">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{$item->customers->name}}</h6>
                                        <p class="text-xs text-secondary mb-0">{{$item->customers->email}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{$item->categories->title}}</h6>
                                    <p class="mb-0 text-sm">{{$item->subcategories->title}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{$item->title}}</h6>
                                        <p class="mb-0 text-sm">{{$item->price}} Rwf</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <a href="/tv/applications/{{$item->id}}"
                                        style="border-radius: 8px;border: none;background-color: #36bef4;color: white;padding: 5px 10px;">Details</a>
                                    <a type="submit"
                                        style="border-radius: 8px;border: none;background-color: #44eb44;color: white;padding: 5px 10px;">Approve</a>
                                    <form method="POST" action="/admin/tv/{{ $item->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            style="border-radius: 8px;border: none;background-color: #f44336;color: white;padding: 5px 10px;">Reject</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@stop