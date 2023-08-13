@extends('admin.layout')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
    <div class="table-responsive">
        <h2 id="products">Products</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- Product data rows here -->
            </tbody>
        </table>
    </div>

    <!-- Other tables go here -->

</main>

@endsection
