@extends('admin.layout')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
    <button class="btn btn-success mb-3" id="addProductButton">Add Product</button>
    <div class="table-responsive">
        <h4 id="products">Manager products</h4>
        <table class="table table-bordered border-6" style="border:2px solid rgb(67, 187, 185); font-weight: bold;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- Product data rows here -->
                <tr style="border:1.5px solid rgb(67, 187, 185); font-weight: bold;">
                    <td style="border:1.5px solid rgb(67, 187, 185); font-weight: bold;"  class="">Product Description</td>
                    <td style="border:1.5px solid rgb(67, 187, 185); font-weight: bold;"  class="">Description/td>
                    <td class="border">$100</td>
                    <td style="border:1.5px solid rgb(67, 187, 185); font-weight: bold;"  class="">Price</td>
                    <td style="border:1.5px solid rgb(67, 187, 185); font-weight: bold;"  class="">Image</td>
                    <td style="border:1.5px solid rgb(67, 187, 185); font-weight: bold;"  class="">Category</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-warning btn-sm font-weight-bold">Edit</button>
                        </div>
                    </td>
                    <td class="bg-light border text-center">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-danger btn-sm font-weight-bold">Delete</button>
                        </div>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</main>




    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="productName">
                        </div>
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Description</label>
                            <input type="text" class="form-control" id="productDescription" name="productDescription">
                        </div>

                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Product Price</label>
                            <input type="number" class="form-control" id="productPrice" name="productPrice">
                        </div>
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="productImage" name="productImage">
                        </div>
                        <div class="mb-3">
                            <label for="productCategory" class="form-label">Product Category</label>
                            <select class="form-select" id="productCategory" name="productCategory">
                                <option value="category1">Category 1</option>
                                <option value="category2">Category 2</option>
                                <option value="category3">Category 3</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>
    </div>
    </div>
@endsection
