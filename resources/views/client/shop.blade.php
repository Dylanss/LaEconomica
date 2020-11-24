@extends('layouts.app')

@section('title')
    Shop
@endsection

@section('content')
    

    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('/frontend/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Products <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Products</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="row mb-4">
							<div class="col-md-12 d-flex justify-content-between align-items-center">
								<h4 class="product-select">Categorías</h4>

							<a href="{{URL::to('/shop')}}" class="{{(request()->is('shop')?'active':'')}}">
								<select class="selectpicker" multiple></a>
									@foreach ($categories as $category)
									<option>{{$category->category_name}}</option>
									@endforeach  
								  </select>
								  
							</div>
						</div>
						<div class="row">

							@foreach ($products as $product)
								{{-- @foreach ($categories as $category) --}}
								<div class="col-md-4 d-flex">
									<div class="product ftco-animate">
										<div class="img d-flex align-items-center justify-content-center" style="background-image: url(/storage/product_images/{{$product->product_image}});">
											<div class="desc">
												<p class="meta-prod d-flex">
													<a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
													<a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
													<a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
												</p>
											</div>
										</div>
										<div class="text text-center">
											<span class="sale">Sale</span>
											<span class="category">{{-- {{$category->category_name}} --}}</span>
											<h2>{{$product->product_name}}</h2>
											<p class="mb-0"><span class="price">S/{{$product->product_price}}</span></p>
										</div>
									</div>
								</div>
								{{-- @endforeach   --}}
							@endforeach
						
						</div>
						<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
					</div>

					<div class="col-md-3">
						<div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Categorias</h3>
                <ul class="p-0">
					@foreach ($categories as $category)

				<li><a href="/view_by_cat/{{$category->category_name}}">{{$category->category_name}}<span class="fa fa-chevron-right"></span></a></li> 
					@endforeach 
                	
	                 
                </ul>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Recent Blog</h3>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(frontend/images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="fa fa-calendar"></span> Apr. 18, 2020</a></div>
                    <div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(frontend/images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="fa fa-calendar"></span> Apr. 18, 2020</a></div>
                    <div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(frontend/images/image_3.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="fa fa-calendar"></span> Apr. 18, 2020</a></div>
                    <div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
					</div>
				</div>
			</div>
		</section>

  

@endsection

  