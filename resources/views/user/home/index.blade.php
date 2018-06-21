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
            <img src="/frontend/images/banner_food.jpg" alt="">
            <div class="box-hover">
              <div class="banner-title">{{ __('home.user.main.food') }}</div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-sm-6 col-sms-12">
        <a href="#">
          <div class="banner-box banner-box1"> 
            <img src="/frontend/images/banner_drink.jpg" alt="">
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
<div class="main-container col2-left-layout">
  <div class="container">
    <div class="row">
      <div class="col-main col-sm-12 col-xs-12 home-inline">
        <div class="shop-inner ">
          <div class="page-title">
            <h2>{{ __('home.user.main.new_product') }}</h2>
          </div>
          <div class="product-grid-area">
            @include('user.home.topNewProduct')
          </div>
          <div class="home-inline"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- top rate product -->
<div class="main-container col2-left-layout">
  <div class="container">
    <div class="row">
      <div class="col-main col-sm-12 col-xs-12 ">
        <div class="shop-inner">
          <div class="page-title">
            <h2>{{ __('home.user.main.rate_product') }}</h2>
          </div>
          <div class="product-grid-area">
            @include('user.home.topRateProduct')
          </div>
          <div class="home-inline"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- food -->
<div class="main-container col2-left-layout">
  <div class="container">
    <div class="row">
      <div class="col-main col-sm-12 col-xs-12">
        <div class="shop-inner">
          <div class="page-title">
            <h2><a href="">{{ __('home.user.main.food') }}</a></h2>
          </div>
          <div class="product-grid-area">
            @include('user.home.listFood')
          </div>
          <div class="home-inline"></div>
          <a id="view-more-food">{{ __('home.user.main.view_more_food') }}</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- drink -->
<div class="main-container col2-left-layout">
  <div class="container">
    <div class="row">
      <div class="col-main col-sm-12 col-xs-12">
        <div class="shop-inner">
          <div class="page-title">
            <h2><a href="">{{ __('home.user.main.drink') }}</a></h2>
          </div>
          <div class="product-grid-area">
            @include('user.home.listDrink')
          </div>
          <div class="home-inline"></div>
          <a id="view-more-drink">{{ __('home.user.main.view_more_food') }}</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
  <script src="{{ asset('js/user/showProductHomePage.js') }}"></script>
@endsection
