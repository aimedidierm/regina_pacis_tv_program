@extends('layout')

@section('content')
<x-customer-nav />
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
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
    </nav>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <button type="button" data-toggle="modal" style="box-shadow: none" class="btn btn-info"
                    data-target="#exampleModal">Submit application</button>
                @if($errors->any())<span style="color: red;"> {{$errors->first()}}</span>@endif
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create new application</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/customer/application" method="POST" enctype="multipart/form-data"
                                    id="videoForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="names">Title:</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter names"
                                            id="names" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Description:</label>
                                        <input type="text" class="form-control" name="description"
                                            placeholder="Enter description" id="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category:</label>
                                        <select name="category" class="form-control" id="category">
                                            <option value="0">Select a category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="subcategory">Subcategory:</label>
                                        <select name="subcategory" class="form-control" id="subcategory" disabled>
                                            <option value="0">Select a subcategory</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Prices:</label>
                                        <ul id="pricesList"></ul>
                                    </div>
                                    <div class="form-group">
                                        <label for="videoInput">Video:</label>
                                        <input type="file" name="video" id="videoInput" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" style="box-shadow: none"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" style="box-shadow: none">Submit</button>
                                </form>
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
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Status</th>
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
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <h6 class="mb-0 text-sm">{{$item->status}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <form method="POST" action="/customer/application/{{ $item->id }}">
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const videoInput = document.getElementById('videoInput');
    const categoryDropdown = document.getElementById("category");
    const subcategoryDropdown = document.getElementById("subcategory");
    const pricesList = document.getElementById("pricesList");
    let categoriesData = @json($categories);
    
    videoInput.addEventListener('change', function() {
    const videoFile = videoInput.files[0];
    const videoURL = URL.createObjectURL(videoFile);
    const videoElement = document.createElement('video');
    
    videoElement.addEventListener('loadedmetadata', function() {
    const duration = videoElement.duration;
    
    const durationInput = document.createElement('input');
    durationInput.setAttribute('type', 'hidden');
    durationInput.setAttribute('name', 'duration');
    durationInput.setAttribute('value', duration);
    document.getElementById('videoForm').appendChild(durationInput);
    
    updateTotalPrice(duration);
    URL.revokeObjectURL(videoURL);
    });
    
    videoElement.src = videoURL;
    });
    
    function populateSubcategories(selectedCategoryId) {
    subcategoryDropdown.innerHTML = '<option value="0">Select a subcategory</option>';
    if (selectedCategoryId === 0) {
    subcategoryDropdown.disabled = true;
    } else {
    const selectedCategory = categoriesData.find(category => category.id == selectedCategoryId);
    if (selectedCategory && selectedCategory.subcategories.length > 0) {
    subcategoryDropdown.disabled = false;
    selectedCategory.subcategories.forEach(subcategory => {
    const option = document.createElement("option");
    option.value = subcategory.id;
    option.textContent = subcategory.title;
    subcategoryDropdown.appendChild(option);
    });
    } else {
    subcategoryDropdown.disabled = true;
    }
    }
    }
    
    function populatePrices(subcategoryId) {
    pricesList.innerHTML = "";
    if (subcategoryId !== 0) {
    const selectedSubcategory = categoriesData.flatMap(category => category.subcategories)
    .find(subcategory => subcategory.id == subcategoryId);
    if (selectedSubcategory && selectedSubcategory.prices.length > 0) {
    selectedSubcategory.prices.forEach(price => {
    const listItem = document.createElement("li");
    listItem.textContent = `Up to ${price.time} seconds: ${price.price} Rwf`;
    pricesList.appendChild(listItem);
    });
    }
    }
    }
    
    function updateTotalPrice(duration) {
    const selectedSubcategoryId = parseInt(subcategoryDropdown.value);
    const selectedSubcategory = categoriesData.flatMap(category => category.subcategories)
    .find(subcategory => subcategory.id == selectedSubcategoryId);
    
    if (selectedSubcategory && selectedSubcategory.prices.length > 0) {
    const totalPrice = selectedSubcategory.prices.find(price => duration <= price.time).price;
        document.getElementById("totalPrice").textContent=`${totalPrice} Rwf`; } } categoryDropdown.addEventListener("change",
        ()=> {
        const selectedCategoryId = parseInt(categoryDropdown.value);
        populateSubcategories(selectedCategoryId);
        });
    
        subcategoryDropdown.addEventListener("change", () => {
        const selectedSubcategoryId = parseInt(subcategoryDropdown.value);
        populatePrices(selectedSubcategoryId);
        const duration = parseFloat(document.getElementById('duration').value);
        updateTotalPrice(duration);
        });
    
        console.log('Categories Data Loaded:', categoriesData);
        });
</script>
@stop
