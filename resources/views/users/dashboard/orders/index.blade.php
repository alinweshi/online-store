@extends('users.dashboard.layout.layout')
@section('content')
    <!--================Checkout Area =================-->
    @if($errors->any()
    )
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

<!-- Display error message if it exists -->
@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="returning_customer">
                <div class="check_title">
                    <h2>Returning Customer? <a href="#">Click here to login</a></h2>
                </div>
                <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new
                    customer, please proceed to the Billing & Shipping section.</p>
                <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="name" name="name">
                        <span class="placeholder" data-placeholder="Username or Email"></span>
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="password" class="form-control" id="password" name="password">
                        <span class="placeholder" data-placeholder="Password"></span>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="primary-btn">login</button>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option" name="selector">
                            <label for="f-option">Remember me</label>
                        </div>
                        <a class="lost_pass" href="#">Lost your password?</a>
                    </div>
                </form>
            </div>
            <div class="cupon_area">
                <div class="check_title">
                    <h2>Have a coupon? <a href="#">Click here to enter your code</a></h2>
                </div>
                <input type="text" placeholder="Enter coupon code">
                <a class="tp_btn" href="#">Apply Coupon</a>
            </div>
                <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <!-- Existing content ... -->
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="{{ route('PlaceOrder.store') }}" method="POST" novalidate="novalidate">
                            @csrf
                            @method('POST')
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="first" name="name">
                                <span class="placeholder" data-placeholder=" name"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="last" name="nickname">
                                <span class="placeholder" data-placeholder="nickname"></span>
                            </div>

                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="phone">
                                <span class="placeholder" data-placeholder="Phone number"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="email">
                                <span class="placeholder" data-placeholder="Email Address"></span>
                            </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="country_select">Country</label>
                                      <select class="country_select" id="country_select" name="country">
                                        <option value="1">Egypt</option>
                                        <option value="2">Libya</option>
                                        <option value="4">Sudan</option>
                                    </select>
                                </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add1" name="address">
                                <span class="placeholder" data-placeholder="Address "></span>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="country_city" name="country_city">
                                <span class="placeholder" data-placeholder="City"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="square" name="square">
                                <span class="placeholder" data-placeholder="square"></span>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>Shipping Details</h3>
                                    <input type="checkbox" id="f-option3" name="ship_to_different_address" value="1">
                                    <label for="f-option3">Ship to a different address?</label>
                                </div>
                                <textarea class="form-control" name="order_notes" id="order_notes" rows="1" placeholder="Order Notes"></textarea>
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" class="primary-btn">Place Order</button>
                            </div>
                        </form>
                            {{--  <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP">
                            </div>  --}}
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector">
                                    <label for="f-option2">Create an account?</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>Shipping Details</h3>
                                    <input type="checkbox" id="f-option3" name="selector">
                                    <label for="f-option3">Ship to a different address?</label>
                                </div>
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><a href="#">Product <span>Total</span></a></li>
                            @foreach ($cartItems as $row )
                                <li><a href="#">{{ $row->name }} <span class="middle">{{ $row->quantity}}</span> <span class="last">{{ $row->price }}</span></a></li>
                            @endforeach
                            </ul>

                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="selector">
                                    <label for="f-option5">Check payments</label>
                                    <div class="check"></div>
                                </div>
                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                    Store Postcode.</p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector">
                                    <label for="f-option6">Paypal </label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                    account.</p>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector">
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                            </div>
                            <a class="primary-btn" href="#">Proceed to Paypal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@stop