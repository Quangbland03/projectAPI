@extends('users.Layoutuser')
@section('content')
    <div class="col-md-12">
        <div class="section-title">
            <h3 class="title">New Products</h3>
            <div class="section-nav">
                <ul class="section-tab-nav tab-nav">
                    <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                    <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                    <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                    <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container ">

        <div class="row list-container">



        </div>

    </div>
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Days</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Hours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Mins</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Secs</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <script>
        function showProducts() {
            const url = "http://127.0.0.1:8000/api/list";

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
                        <div class="col-md-3">

         <a href="/productDetail/${element.id}">
<div class="product">
    <div class="product-img">
        <img src="{{ asset('asset/img/${element.image}') }}" alt="">
        <div class="product-label">
            <span class="new">NEW</span>
        </div>
    </div>
    <div class="product-body">
        <p class="product-category">${element.name1}</p>
        <h3 class="product-name"><a href="#">${element.name}</a></h3>
        <h4 class="product-price">${element.price}</h4>
        <div class="product-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
        <div class="product-btns">
            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to
                    wishlist</span></button>
            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to
                    compare</span></button>
            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                    view</span></button>
        </div>
    </div>
    <div class="add-to-cart">
        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
            cart</button>
    </div>
</div>

</a>
</div>
                `;
                    });

                    const listContainer = document.querySelector('.list-container');
                    listContainer.innerHTML = output;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }
        showProducts();
    </script>
@endsection
