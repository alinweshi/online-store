	@extends('users.dashboard.layout.layout')
    @section("styles")
    <style>
    /* CSS */
.add-to-cart-btn {
    padding: 10px 20px; /* Adjust the padding as needed to change the button size */
    font-size: 14px; /* Change the font size as needed */
    /* Add other styles like background color, border, etc. as per your design */
}

    </style>
    @stop
    @section('content')
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif

    <section class="owl-carousel active-product-area section_gap">
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Latest Products</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore
								magna aliqua.</p>
						</div>
					</div>
				</div>
				<div class="row">
                @foreach($products as $product)
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<a href='{{ route('product.show',$product->id) }}'><img class="img-fluid" src="{{ asset('assets/user-dashboard/img/product/p1.jpg') }}" alt=""></a>
							<div class="product-details">
								<h6>{{$product->name}}</h6>
								<div class="price">
									<h6>{{$product->price}}</h6>
									<h6 class="l-through">{{$product->price-$product->discount_price}}</h6>
								</div>
                                    <form action="{{ route('cart.store',$product->id)}}" method="POST" enctype="multipart/form-data" id='addToCartForm'>
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                        <input type="hidden" value="{{ $product->name }}" name="name">
                                        <input type="hidden" value="{{ $product->price }}" name="price">
                                        <input type="hidden" value="{{ $product->image }}" name="image">
                                        <input type="hidden" value="1" name="quantity">
                                        <div class="prd-bottom">
                                            <a href='' class="social-info" >
                                                <span class="ti-bag"></span>
                                                <p class="hover-text"><button class="add-to-cart-btn" type="submit">AddtoCart</button></p>
                                            </a>
                                    </form>

                                                <a href="#" class="social-info">
                                                    <span class="lnr lnr-heart"></span>
                                                    <p class="hover-text">Wishlist</p>
                                                </a>
                                                <a href="#" class="social-info">
                                                    <span class="lnr lnr-sync"></span>
                                                    <p class="hover-text">Compare</p>
                                                </a>
                                                <a href="{{ route('product.show', $product->id) }}" class="social-info">
                                                    <span class="lnr lnr-move"></span>
                                                    <p class="hover-text">View More</p>
                                                </a>
                                            </div>
							</div>
						</div>
					</div>
					<!-- single product -->
                @endforeach
                </div>
            </div>
        </div>
    @stop
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var addToCartLink = document.getElementById('addToCartLink');
        addToCartLink.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior

            var addToCartForm = document.getElementById('addToCartForm');
            addToCartForm.submit(); // Trigger the form submission
        });
    });
</script>
@stop