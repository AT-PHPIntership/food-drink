@extends('user.layout.master')
@section('title', __('order.user.show.title'))
@section('content')
<section class="main-container col1-layout">
  <div class="main container">
    <div class="col-main">
      <div class="cart">
        <div class="page-content page-order"><div class="page-title">
          <h2>{{ __('order.user.show.order_detail') }}</h2>
        </div>
          <div class="order-detail-content">
            <div class="table-responsive">
              <table class="table table-bordered cart_summary">
                <thead>
                  <tr>
                    <th class="qty">{{ __('order.user.index.no') }}</th>
                    <th class="cart_product">{{ __('cart.product') }}</th>
                    <th>{{ __('cart.name') }}</th>
                    <th>{{ __('cart.price') }}</th>
                    <th>{{ __('cart.qty') }}</th>
                    <th>{{ __('cart.total') }}</th>
                    <th>{{ __('order.user.show.description') }}</th>
                  </tr>
                </thead>
                <tbody id="show-order-detail">
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('scripts')
  <script src="{{ asset('js/user/showOrderDetails.js') }}"></script>
@endsection
