@extends('layouts.app')

@section('title')
    Checkout
@endsection

@section('content')
    

    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('frontend/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Checkout <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Checkout</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
		  {!!Form::open(['action' => 'ClientController@postcheckout', 'method' => 'POST', 'class' => 'billing-form', 'id' => 'checkout-form'])!!}
			{{csrf_field()}}
				<h3 class="mb-4 billing-heading">Billing Details</h3>
				@if(Session::has('error'))
				<div class="alert alert-danger">
					{{Session::get('error')}}
					{{Session::put('error', null)}}
				</div>
				@endif
	          	<div class="row align-items-end">
	          	<div class="col-md-12">
	                <div class="form-group">
	                	<label for="fullname">Full Name</label>
	                  <input type="text" class="form-control" name="name" placeholder="">
	                </div>
	            </div>
                <div class="w-100"></div>
				<div class="col-md-12">
	                <div class="form-group">
	                	<label for="address">Address</label>
	                  <input type="text" class="form-control" name="address" placeholder="">
	                </div>
	            </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="namecard">Name on Card</label>
	                  <input type="text" class="form-control" id="card-name"  name="card-name" placeholder="">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="number">Number</label>
	                  <input type="number" min="1" class="form-control" id="card-number" placeholder="">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="expmonth">Expiration Month</label>
	                  <input type="number" class="form-control" id="card-expiry-month" placeholder="">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="expyear">Expiration Year</label>
	                  <input type="number" class="form-control" id="card-expiry-year" placeholder="">
	                </div>
                </div>
                <div class="w-100"></div>
				<div class="col-md-12">
	                <div class="form-group">
	                	<label for="cvc">CVC</label>
	                  <input type="number" class="form-control" id="card-cvc" placeholder="">
	                </div>
                </div>
				<div class="col-md-12">
	                <div class="form-group">
						<p><button type="submit" href="#"class="btn btn-primary py-3 px-4">Buy now</button></p>
	                </div>
                </div>
	            </div>
				{!!Form::close()!!}<!-- END -->
				</div>
				
				<div class="col-xl-5">
	          <div class="row mt-5 pt-3 d-flex">
	          	<div class="col-md-12 d-flex">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>$20.60</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery</span>
		    						<span>$0.00</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span>$3.00</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>S/{{Session::get('cart')->totalPrice}}</span>
		    					</p>
								</div>
	          	</div>

	          </div>
          </div> <!-- .col-md-8 -->
        </div>
    	</div>
    </section>

@endsection

@section('scripts')
<script src="https://js.stripe.com/v2/"></script>
<script src="src/js/checkout.js"></script>
@endsection

  

    