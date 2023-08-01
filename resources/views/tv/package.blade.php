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
                </ol>
                <h6 class="font-weight-bolder mb-0">Package</h6>
            </nav>
        </div>
    </nav>
    <h3 class="font-weight-bolder mb-0">Create new: </h3>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#categoryModal">Category</button>
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#subcategoryModal">Subcategory</button>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#priceModal">Price</button>
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Add new category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/tv/categories" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter category title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea type="text" name="descrption" class="form-control"
                                placeholder="Enter category descrption"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="subcategoryModal" tabindex="-1" role="dialog" aria-labelledby="subcategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="subcategoryModalLabel">Add new subcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/tv/subcategories" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Category:</label>
                            <select name="category" class="form-control">
                                @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter category title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea type="text" name="descrption" class="form-control"
                                placeholder="Enter category descrption"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="priceModal" tabindex="-1" role="dialog" aria-labelledby="priceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="priceModalLabel">Add new price</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/tv/prices" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Subcategory:</label>
                            <select name="subcategory" class="form-control">
                                @foreach ($subcategories as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter category title">
                        </div>
                        <div class="form-group">
                            <label>Time: (Seconds)</label>
                            <input type="number" name="time" class="form-control" placeholder="Enter limit time">
                        </div>
                        <div class="form-group">
                            <label>Price: (Rwf)</label>
                            <input type="number" name="price" class="form-control" placeholder="Enter price">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea type="text" name="descrption" class="form-control"
                                placeholder="Enter category descrption"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <h2>Package Table</h2>
        <input type="text" id="searchInput" placeholder="Search for categories...">
        <table class="table table-bordered table-hover mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody id="tableBody">
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const jsonData = {!! json_encode($jsonData) !!};
        function populateTable() {
          const tableBody = document.getElementById("tableBody");
          tableBody.innerHTML = "";
    
          const searchInput = document.getElementById("searchInput").value.toLowerCase();
    
          jsonData.forEach(category => {
            if (category.title.toLowerCase().includes(searchInput)) {
              const categoryRow = `
                <tr>
                  <td>${category.id}</td>
                  <td>${category.title}</td>
                  <td>${category.description || ""}</td>
                </tr>
              `;
              tableBody.insertAdjacentHTML("beforeend", categoryRow);
              if (category.subcategories.length > 0) {
                const subcategoryTable = `
                  <tr>
                    <td colspan="3">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Time</th>
                            <th>Price</th>
                          </tr>
                        </thead>
                        <tbody>
                          ${category.subcategories[0].prices.map(price => {
                            return `
                              <tr>
                                <td>${price.title}</td>
                                <td>${price.price} Rwf</td>
                              </tr>
                            `;
                          }).join('')}
                        </tbody>
                      </table>
                    </td>
                  </tr>
                `;
    
                tableBody.insertAdjacentHTML("beforeend", subcategoryTable);
              }
            }
          });
        }
        populateTable();
        document.getElementById("searchInput").addEventListener("input", populateTable);
    </script>
    @stop