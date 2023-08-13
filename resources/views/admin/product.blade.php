@extends('admin.layout')
<script src="{{ asset('asset/js/Product.js') }}"></script>
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
    <a href="/createProduct" class="btn btn-success mb-3">Add Product</a>
    <div class="table-responsive">
        <div id="successMessage" style="display: none; color: green; font-weight: bold;">
            Product deleted successfully!
        </div>
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
            <tbody class="list-container1">

            </tbody>
        </table>
    </div>
</main>

<style>
    .table {
        width: 100%;
    }

    .table th,
    .table td {
        border: 1px solid #dee2e6;
        text-align: left;
    }

    .grid-cell {
        display: grid;
        place-items: center;
        padding: 0.5rem;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .image-container {
        display: grid;
        place-items: center;
        max-width: 100px;
        max-height: 100px;
        overflow: hidden;
    }

    .image-container img {
        max-width: 100%;
        max-height: 100%;
    }
</style>


@endsection
