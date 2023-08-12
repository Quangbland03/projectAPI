@extends('admin.layout')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
        <button class="btn btn-success mb-3" id="addProductButton">Add Product</button>
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
                            <select class="form-select" id="mySelect" name="productCategory">
                                <div class="list-container"></div>
                            </select>
                            {{-- <tr style="border:1.5px solid rgb(67, 187, 185); font-weight: bold;">
                                <td>${element.name}</td>
                                <td>${element.description}</td>
                                <td>${element.price}</td>
                                <td>${element.image}</td>
                                <td>${element.category_id}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-warning btn-sm font-weight-bold" >Edit</button>
                                    </div>
                                </td>
                                <td class="bg-light border text-center">
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-danger btn-sm font-weight-bold">Delete</button>
                                    </div>
                                </td>
                            </tr> --}}
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
    <script>
        function createStudent() {
            const name = document.getElementById('productName').value;
            const description = document.getElementById('productDescription').value;
            const price = document.getElementById('productPrice').value;
            const image = document.getElementById('productImage').value;

            const data = {
                name: name,
                grade: grade,
                // Thêm các trường dữ liệu khác nếu có
            };
            const url = 'http://127.0.0.1:8000/api/storeProduct';
            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        // Thêm các header cần thiết khác (nếu có)
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Lỗi kết nối mạng');
                    }
                    return response.json();
                })
                .then(data => {

                    showStudentInfo(data.id);
                })
                .catch(error => {
                    console.error('Lỗi khi tạo mới sinh viên:', error);
                });
        }
        //
        function showProducts() {
            const url = "http://127.0.0.1:8000/api/listCategory";

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then(data => {
                    let output = '';

                    data.forEach(element => {
                        output += `
                            <option value="${element.id}">${element.name}</option>
                        `;
                    });

                    const selectElement = document.getElementById('mySelect');
                    selectElement.innerHTML = output;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

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

        // ////show lên talbe

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
                    <td>${element.name}</td>
                    <td>${element.description}</td>
                    <td>${element.price}</td>
                    <td>${element.image}</td>
                    <td>${element.category_id}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-warning btn-sm font-weight-bold">Edit</button>
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
        // Gọi hàm khi trang được tải
        showProducts();
        showProducts1();
    </script>
@endsection
