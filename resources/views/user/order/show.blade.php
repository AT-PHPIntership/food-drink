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
                <tbody id="show-cart">
                  <tr>
                    <td class="qty">1</td>
                    <td class="cart_product"><img src="{{ asset('images/products/default-product.jpg') }}" alt="Product"></td>
                    <td class="cart_description">Ezra Heidenreich</td>
                    <td class="price">{{ __('product.user.money') }}51.00</td>
                    <td class="qty">10</td>
                    <td class="price">{{ __('product.user.money') }}510.00</td>
                    <td class="cart_description">Ezra Heidenreich</td>
                  </tr>
                  <tr>
                    <td class="qty">2</td>
                    <td class="cart_product"><img src="{{ asset('images/products/default-product.jpg') }}" alt="Product"></td>
                    <td class="cart_description">Ezra Heidenreich</td>
                    <td class="price">{{ __('product.user.money') }}51.00</td>
                    <td class="qty">10</td>
                    <td class="price">{{ __('product.user.money') }}510.00</td>
                    <td class="cart_description">Ezra Heidenreich</td>
                  </tr>
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
