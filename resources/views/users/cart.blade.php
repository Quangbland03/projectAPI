@extends('users.Layoutuser')
@section('content')
<div class="h-100 h-custom" style="">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                    <h6 class="mb-0 text-muted">3 items</h6>
                  </div>
                  <hr class="my-4">
                  <div class="container mt-5">
                    <h2>Your Shopping Cart</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr >
                                    <th scope="col">ID</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số Lượng</th>
                                    <th scope="col">Hành Động</th>
                                </tr>
                            </thead>
                           <tbody class="list-container">

                           </tbody>
                        </table>
                    </div>
                </div>




                  <div class="pt-5">
                    <h6 class="mb-0"><a href="/" class="text-body"><i class="fa fa-long-arrow-alt-left me-2"></i>Back
                        to shop</a></h6>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

  function showProducts() {
            const url = "http://127.0.0.1:8000/api/listCart";

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
                        <tbody>
                        <tr id="productRow_${element.id}">
                            <th scope="row">${element.cart_id}</th>
                            <td><img src="{{ asset('asset/img/${element.image}') }}" alt="Product Image" style="width:200px" ></td>
                            <td>${element.name}</td>
                            <td>${element.price}</td>
                            <td>
                                ${element.quantity}
                            </td>
                            <td><button class="btn btn-danger btn-sm">Xóa</button></td>
                        </tr>
                    </tbody>
                `;
                           });

                    const listContainer = document.querySelector('.list-container');
                    listContainer.innerHTML = output;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }
        function deleteProduct(productId) {
    const url = 'http://127.0.0.1:8000/api/deleteCart';
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

            }
        })
        .catch(error => {
            console.error('Error deleting product:', error);
        });
}
        showProducts();
</script>
@endsection


