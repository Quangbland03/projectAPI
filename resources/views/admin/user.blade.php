@extends('admin.layout')
<script src="{{ asset('asset/js/Product.js') }}"></script>
@section('content')
<h1>Hello</h1>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
    <a href="/createProduct" class="btn btn-success mb-3">Add Product</a>
    <div class="table-responsive">
        <div id="successMessage" style="display: none; color: green; font-weight: bold;">
            Product deleted successfully!
        </div>
        <h4 id="products">Manager products</h4>
        <div class="table-body">
            <table class="table table-bordered border-6" style="border:2px solid rgb(67, 187, 185); font-weight: bold;">
                <thead >
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
    <style>
    .table {
        width: 100%;
    }

    .table th,
    .table td {
        border: 1px solid #dee2e6;
        text-align: left;
        padding: 8px; /* Thêm padding để tạo khoảng cách giữa nội dung và viền */
    }

    .table td {
        max-width: 150px; /* Đặt kích thước cố định cho ô (vd: 150px) */
        word-wrap: break-word; /* Cho phép chữ dài tự động xuống dòng */
    }

    .table-body {
        max-height: 400px;
        r overflow-y: scroll;
    }

</style>
<script>
function deleteProduct(productId) {
    const url = 'http://127.0.0.1:8000/api/deleteProduct';
    fetch(url + '/' + productId, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const deletedProductRow = document.getElementById(`productRow_${productId}`);
            if (deletedProductRow) {
                deletedProductRow.remove();
                const successMessage = document.getElementById('successMessage');
                successMessage.style.display = 'block';

                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 2000);
            }
        })
        .catch(error => {
            console.error('Error deleting product:', error);
        });
}

function showProducts1() {
    const url = "http://127.0.0.1:8000/api/list";

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then(data => {
            const listContainer = document.querySelector('.list-container1');
            let output = '';

            data.forEach(element => {
                output += `
                <tr id="productRow_${element.id}" style="border:1.5px solid rgb(67, 187, 185); font-weight: bold;">
                <td style="width: 14%;">${element.name}</td>
                <td>${element.description}</td>
                <td>${element.price}</td>
                <td>
                <div class="image-container" style = ""width:182px>
                    <img src="http://127.0.0.1:8000/asset/img/${element.image}" class="img-fluid" alt="" style="width: 100%;">
                </div>
            </td>

                <td>${element.name1}</td>
                <td class="text-center">
                    <div class="d-flex justify-content-center">
                        <a href="/updateProduct/${element.id}" class="btn btn-warning btn-sm font-weight-bold">Edit</a>
                    </div>
                </td>
                <td class="bg-light border text-center">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-danger btn-sm font-weight-bold" onclick="deleteProduct(${element.id})">Delete</button>
                    </div>
                </td>
            </tr>`;
            });
            listContainer.innerHTML = output;
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}
showProducts1();
</script>
@endsection
