@extends('users.Layoutuser')
@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="" alt="" id="myimage">
                    </div>

                    <div class="product-preview">
                        <img src="" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2 col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="" alt="" id="">
                    </div>
                    <div class="product-preview">
                        <img src="" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name" id="product-name"></h2>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <a class="review-link" href="#">10 Review(s) | Add your review</a>
                    </div>
                    <div>
                        <h3 id="product-price"></h3>
                        <span class="product-available">In Stock</span>
                    </div>
                    <p id="descriptionDetail"></p>

                    <div class="product-options">
                        <label>
                            Size
                            <select class="input-select">
                                <option value="0">X</option>
                            </select>
                        </label>
                        <label>
                            Color
                            <select class="input-select">
                                <option value="0">Red</option>
                            </select>
                        </label>
                    </div>

                    <div class="add-to-cart">
                        <div class="qty-label">
                            Qty
                            <div class="input-number">
                                <input type="number" value="1" id="number_vip">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                        <button class="add-to-cart-btn" onclick="createProduct() "><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>

                    <ul class="product-links">
                        <li>Category:</li>
                        <li><a href="#">Headphones</a></li>
                        <li><a href="#">Accessories</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- /Product details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<script>
    function getIDFromURL() {
        const url = window.location.href;
        const segments = url.split('/');
        return segments[segments.length - 1];
    }

    // Get the ID from the URL
    const myid = getIDFromURL();

    function showProducts() {
        const url = "http://127.0.0.1:8000/api/listok";

        fetch(url + "/" + getIDFromURL())
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(data => {
                const nameInput = document.getElementById('product-name');
                const nameInput4 = document.getElementById('myimage');
                const nameInput1 = document.getElementById('product-price');
                const nameInput2 = document.getElementById('descriptionDetail');

                const imgElement = document.getElementById("myimage");
                imgElement.src = "{{ asset('asset/img') }}/" + data.image;

                // Update input values with student information fetched from the API
                nameInput.textContent = data.name;
                nameInput1.textContent = data.price;
                nameInput2.textContent = data.descriptionDetail;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }
    function extractFileNameFromURL(url) {
            const segments = url.split('/');
            return segments[segments.length - 1];
        }

        function createProduct() {

            const quantity = document.getElementById('number_vip').value;

            const data = {

                quantity: quantity,
                product_id: myid,
            };
            const url = 'http://127.0.0.1:8000/api/saveCart';
            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    alert('Add to card success');
                    window.location.href = '/cart';
                })
                .catch(error => {
                    console.error('Error creating product:', error);
                });

        }

    // Call the function when the page is loaded
    showProducts();
</script>
@endsection
