@extends('users.Layoutuser')
@section('content')
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Checkout</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Billing address</h3>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="last-name" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <input class="input" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input class="input" type="tel" name="tel" placeholder="Telephone">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="Address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <div class="input-checkbox">
                            <input type="checkbox" id="create-account">
                            <label for="create-account">
                                <span></span>
                                Create Account?
                            </label>
                            <div class="caption">
                                <input class="input" type="password" name="password" placeholder="Enter Your Password">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Billing Details -->

                <!-- Shiping Details -->
                <div class="shiping-details">
                    <div class="section-title">
                        <h3 class="title">Shiping address</h3>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="shiping-address">
                        <label for="shiping-address">
                            <span></span>
                            Ship to a diffrent address?
                        </label>
                        <div class="caption">
                            <div class="form-group">
                                {{-- <input idclass="input" type="text" name="last-name" placeholder="Full Name" id="fullname"> --}}
                                <input type="text" id="fullname">
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email" id="email">
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="tel" placeholder="Telephone" id="phonenumber">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="Address" placeholder="Address" id="address">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Shiping Details -->

                <!-- Order notes -->
                <div class="order-notes">
                    <textarea class="input" placeholder="Order Notes"></textarea>
                </div>
                <!-- /Order notes -->
            </div>

            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Your Order</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>PRODUCT</strong></div>
                        <div><strong>TOTAL</strong></div>
                    </div>
                    <div class="order-products">
                        <div class="list-container"></div>
                    </div>
                    <div class="order-col">
                        <div>Shiping</div>
                        <div><strong>FREE</strong></div>
                    </div>
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div class="list-total"></div>
                    </div>
                </div>
                <div class="payment-method">
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-1">
                        <label for="payment-1">
                            <span></span>
                            Direct Bank Transfer
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-2">
                        <label for="payment-2">
                            <span></span>
                            Cheque Payment
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-3">
                        <label for="payment-3">
                            <span></span>
                            Paypal System
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
                <div class="input-checkbox">
                    <input type="checkbox" id="terms">
                    <label for="terms">
                        <span></span>
                        I've read and accept the <a href="#">terms & conditions</a>
                    </label>
                </div>
                <button class="primary-btn order-submit" onclick=" testInput()">Place order</button>
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- NEWSLETTER -->
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Enter Your Email">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->
<script>
    function showProducts() {
        const url = "http://127.0.0.1:8000/api/saveOrder";

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(data => {
                let output = '';
                let outputTotal = '';
                let totalPrice = 0;

                data.forEach(element => {
                    let price = element.price * element.quantity;
                    totalPrice += price;

                    output += `
                    <div class="order-products">
                        <div class="order-col">
                            <div>${element.quantity}x</div>
                            <div>${element.name}</div>
                            <div>${price}</div>
                        </div>
                    </div>
                    `;
                }); 4

                outputTotal += `
                <div class="order-col" id="number_total">
                    <strong class="order-total">${totalPrice}</strong>
                </div>
                `;

                const listContainer = document.querySelector('.list-container');
                const listTotal = document.querySelector('.list-total');
                listContainer.innerHTML = output;
                listTotal.innerHTML = outputTotal;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

//     function createProduct() {

//         const total = document.getElementById('number_total').value;

//         const data = {

//             total: total,
//             customer_id: myid,
//         };
//         const url = 'http://127.0.0.1:8000/api/saveCheckout';
//         fetch(url, {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json'
//             },
//             body: JSON.stringify(data)
//         })
//         .then(response => response.json())
//         .then(data => {
//             alert('Add to order success');
//             window.location.href = '/admin/order';
//         })
//         .catch(error => {
//             console.error('Error creating product:', error);
//     });

// } 
// function testInput(){
//     const fullnameElement = document.getElementById('fullname');
//     fullnameElement1 = fullnameElement.value;
//     alert(fullnameElement1);
// }
function createProduct() {

const fullnameElement = document.getElementById('fullname');
const emailElement = document.getElementById('email');
const phoneElement = document.getElementById('phonenumber');
const addressElement = document.getElementById('address');


const emailValue = emailElement.value;

alert(emailValue);
// const data = {

//     fullname: fullname,
//     email: email,
//     phone: phone,
//     address: address,
// };
// const url = 'http://127.0.0.1:8000/api/saveCustomer';
// fetch(url, {
//     method: 'POST',
//     headers: {
//         'Content-Type': 'application/json'
//     },
//     body: JSON.stringify(data)
// })
// .then(response => response.json())
// .then(data => {
//     alert('Add to customer success');
 
// })
// .catch(error => {
//     console.error('Error creating product:', error);
// });

}

// Call the function when the page is loaded

    // Gọi hàm khi trang được tải
    showProducts();
</script>


@endsection
