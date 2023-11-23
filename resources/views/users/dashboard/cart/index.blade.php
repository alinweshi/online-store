@extends('users.dashboard.layout.layout')
@section('userstyles')
<style>
/* Adjust the styles as needed */

/* Styling for the quantity update form */
td .update-quantity-form {
    display: flex;
    align-items: center;
}

/* Styling for the quantity input field */
td .update-quantity-form input[type="number"] {
    width: 60px; /* Adjust the width as needed */
    text-align: center;
    margin: 0 5px; /* Adjust the margin as needed */
}

/* Styling for the plus and minus buttons */
td .update-quantity-form button {
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    font-size: 1rem;
}

/* Styling for the submit button */
td .update-quantity-form button[type="submit"] {
    background-color: #28a745;
}

/* Optional: Add hover and active styles for buttons */
td .update-quantity-form button:hover {
    background-color: #0056b3;
}

td .update-quantity-form button:active {
    background-color: #0056b3;
}


</style>
@stop
@section('content')
    <!--================Cart Area =================-->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error1') }}
    </div>
    @endif

    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">remove</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($cartItems as $index=>$item)
                    <tr>
                        <td>
                            <div class="media-body">
                                <p>{{ $item->name }}</p>
                            </div>
                        </td>
                        <td>
                            <h5>{{ $item->price }}</h5>
                        </td>
                            <td>
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="update-quantity-form">
                                    @csrf
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        <input id="form1" min="0" name="quantity" value="{{ $item->quantity }}" type="number" class="form-control form-control-sm" />
                                        <button type="submit" class="px-4 mt-1 py-1.5 text-sm rounded rounded shadow text-violet-100 bg-violet-500">Update</button>
                                    </div>
                                </form>
                            </td>
                        <td >
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <button class="px-4 py-2 text-red bg-red-600 shadow rounded-full">x</button>
                            </form>
                        </td>

                        <td>
                            <h5 id="total{{ $index }}">{{$item->getPriceSum() }}</h5>
                        </td>
                    </tr>
                    @endforeach
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                        <input type="text" placeholder="Coupon Code">
                                        <a class="primary-btn" href="#">Apply</a>
                                        <a class="gray_btn" href="#">Close Coupon</a>
                                    </div>
                                </td>


                                <td>
                                    <form action="{{ route('cart.clear') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-4 mt-1 py-1.5 text-sm rounded rounded shadow text-violet-100 bg-violet-500">clear the cart</button>
                                    </form>
                                </td>
                                <td>
                                <a href="{{ route('products') }}"><button>Continue Shopping</button></a>
                                </td>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>${{Cart::getTotal()}}</h5>
                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <ul class="list">
                                            <li><a href="#">Flat Rate: $5.00</a></li>
                                            <li><a href="#">Free Shipping</a></li>
                                            <li><a href="#">Flat Rate: $10.00</a></li>
                                            <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                        </ul>
                                        <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                        <select class="shipping_select">
                                            <option value="1">Bangladesh</option>
                                            <option value="2">India</option>
                                            <option value="4">Pakistan</option>
                                        </select>
                                        <select class="shipping_select">
                                            <option value="1">Select a State</option>
                                            <option value="2">Select a State</option>
                                            <option value="4">Select a State</option>
                                        </select>
                                        <input type="text" placeholder="Postcode/Zipcode">
                                        <a class="gray_btn" href="#">Update Details</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="#">Continue Shopping</a>
                                        <a class="primary-btn" href="#">Proceed to checkout</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@stop
<!-- Add this script section at the end of your HTML content, just before the closing </body> tag -->
<!-- Add this script section at the end of your HTML content, just before the closing </body> tag -->
@section('userscripts')

<script>
    // JavaScript function to increase the quantity


    // JavaScript function to update all totals

   // JavaScript function to update all totals

</script>
@stop


