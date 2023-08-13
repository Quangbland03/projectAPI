@extends('admin.layout')
<script src="{{ asset('asset/js/updateProduct.js') }}"></script>
@section('content')
    <nav class="col-md-9">
        <div class="main-content" style="margin-top: 20px;">
            <h2>Create Product</h2>
            <form id="updateProductForm">
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="productName">
                    <div id="errorName" class="error-message" style="color: red"></div>
                </div>
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Description</label>
                    <input type="text" class="form-control" id="productDescription" name="productDescription">
                    <div id="errorDescription" class="error-message" style="color: red"></div>
                </div>
                <div class="mb-3">
                    <label for="productImage" class="form-label">Product Image</label>
                    <input type="text" class="form-control" id="productImage" name="productImage">
                    <div id="errorImage" class="error-message" style="color: red"></div>
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Product Price</label>
                    <input type="number" class="form-control" id="productPrice" name="productPrice">
                    <div id="errorPrice" class="error-message" style="color: red"></div>
                </div>
                <div class="mb-3">
                    <label for="productCategory" class="form-label">Product Category</label>
                    <select class="form-select" id="mySelect" name="productCategory"></select>
                </div>
                <button type="button" class="btn btn-primary" onclick="updateProduct()">Create Product</button>
            </form>
        </div>
    </nav>

@endsection
