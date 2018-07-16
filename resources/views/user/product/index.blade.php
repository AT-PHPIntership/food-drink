@extends('user.layout.master')
@section('title', __('product.user.product.list_product'))
@section('content')
  <!-- Main Container -->
  <div class="main-container col2-left-layout">
    <div class="container">
      <div class="row">
        <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
          <div class="shop-inner">
            <div class="page-title">
              <h2>{{__('product.user.filter.list_product')}}</h2>
            </div>
            <div class="product-grid-area">
              <ul class="products-grid" id="products">
   
              </ul>
            </div>
            <div class="pagination-area">
              <a id="next"><span>{{ __('product.user.next') }} <i class="fa fa-forward"></i></span></a>
              <a id="prev"><span> <i class="fa fa-backward"></i> {{ __('product.user.prev') }}</span></a>
            </div>
          </div>
        </div>
        @include('user.layout.sidebar')
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script src="{{ asset('js/user/showListProducts.js') }}"></script>
@endsection
