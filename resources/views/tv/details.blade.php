@extends('layout')

@section('content')
<x-tv-nav />
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                            href="javascript:;">Applications</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">All</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Details</h6>
            </nav>
        </div>
    </nav>
    <div class="card my-4">
        <table border="1px">
            <tr>
                <td>
                    <h4 style="color:aqua">Customer</h4>
                </td>
                <td>
                    <h4 style="color:aqua">Category</h4>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>Name: </h6>{{$data->customers->name}}
                    <h6>Email: </h6>{{$data->customers->email}}
                    <h6>Phone: </h6>{{$data->customers->phone}}
                    <h6>Address: </h6>{{$data->customers->address}}
                </td>
                <td>
                    <h6>Category name: </h6>{{$data->categories->title}}
                    <h6>Category description: </h6>{{$data->categories->description}}
                    <h6>Subategory name: </h6>{{$data->subcategories->title}}
                    <h6>Subcategory description: </h6>{{$data->subcategories->description}}
                </td>
                <td>
                    <div class="embed-responsive embed-responsive-16by9">
                        <video class="embed-responsive-item" controls>
                            <source src="/mikasi.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <h6>{{$data->title}}</h6>
                    <p>{{$data->descrption}}</p>
                    <h6>Price: </h6>{{$data->price}} Rwf
                </td>
            </tr>
        </table>
    </div>
    <a type="submit"
        style="border-radius: 8px;border: none;background-color: #44eb44;color: white;padding: 5px 10px;">Approve</a>
    <hr>
    <form method="POST" action="/tv/applications/{{$data->id}}">
        @csrf
        @method('DELETE')
        <button type="submit"
            style="border-radius: 8px;border: none;background-color: #f44336;color: white;padding: 5px 10px;">Reject</button>
    </form>
</main>
@stop