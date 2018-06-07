@extends('user.layout.master')
@section('title', __('home.user.title') )
@section('content')
<!-- Home Slider Start -->
<!-- top banner -->
<div class="banner-static">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sms-12">
				<a href="#">
					<div class="banner-box banner-box1"> 
						<img src="images/banner_food.jpg" alt="">
						<div class="box-hover">
							<div class="banner-title">{{ __('home.user.main.food') }}</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-6 col-sms-12">
				<a href="#">
					<div class="banner-box banner-box1"> 
						<img src="images/banner_drink.jpg" alt="">
						<div class="box-hover">
							<div class="banner-title">{{ __('home.user.main.drink') }}</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
<!-- main container -->
<!-- top new product -->
<div class="container">
	<div class="special-products">
		<div class="page-header">
			<h2>{{ __('home.user.main.new_product') }}</h2>
		</div>
		<div class="special-products-pro">
			@include('user.home.newProduct')
		</div>
	</div>
</div>
<!-- top rate product -->
<div class="container">
	<div class="special-products">
		<div class="page-header">
			<h2>{{ __('home.user.main.rate_product') }}</h2>
		</div>
		<div class="special-products-pro">
			@include('user.home.rateProduct')
		</div>
	</div>
</div>
<!-- end main container --> 
<!-- food -->
<div class="container">
	<div class="special-products">
		<div class="page-header">
		<h2>
				<a href="">{{ __('home.user.main.food') }}</a>
			</h2>
		</div>
		<div class="special-products-pro">
			@include('user.home.listFood')
		</div>
	</div>
</div>
<!-- drink -->
<div class="container">
	<div class="special-products">
		<div class="page-header">
			<h2>
				<a href="">{{ __('home.user.main.drink') }}</a>
			</h2>
		</div>
		<div class="special-products-pro">
			@include('user.home.listDrink')
		</div>
	</div>
</div>
@endsection
