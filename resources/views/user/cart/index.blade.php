@extends('user.layout.master')
@section('title', __('cart.title'))
@section('content')
<section class="main-container col1-layout">
  <div class="main container">
    <div class="col-main">
      <div class="cart">
        <div class="page-content page-order"><div class="page-title">
          <h2>{{ __('cart.shopping_cart') }}</h2>
        </div>
          <div class="order-detail-content">
            <div class="table-responsive">
              <table class="table table-bordered cart_summary">
                <thead>
                  <tr>
                    <th class="cart_product">{{ __('cart.product') }}</th>
                    <th>{{ __('cart.name') }}</th>
                    <th>{{ __('cart.avail') }}</th>
                    <th>{{ __('cart.price') }}</th>
                    <th>{{ __('cart.qty') }}</th>
                    <th>{{ __('cart.total') }}</th>
                    <th class="action"><i class="fa fa-trash-o"></i></th>
                  </tr>
                </thead>
                <tbody id="show-cart">
                  <tr style="display:none">
                    <td class="cart_product"><a href=""><img src="" alt="Product"></a></td>
                    <td class="cart_description"><p class="product-name"><a href=""> </a></p>
                    <td class="availability">
                      <span class="label"></span>
                      <p class="current">(Number of products currently in stock: <span class="current-product"></span>)</p>
                    </td>
                    <td class="price"><span>{{ __('product.user.money')}}<span class="price-product"></span></span></td>
                    <td class="qty"><input class="form-control input-sm" type="number" min="1" onchange="changeQuantity()"></td>
                    <td class="price"><span>{{ __('product.user.money')}}<span class="total-product"></span></span></td>
                    <td class="action del-item-cart"><i class="fa fa-times-circle"></i></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2" rowspan="2"></td>
                    <td colspan="3">{{ __('cart.sub_total') }}</td>
                    <td colspan="2">{{ __('product.user.money') }}<span class="sub-total">0</span> </td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="cart_navigation"> 
              <a class="continue-btn" onclick="window.history.go(-1);"><i class="fa fa-arrow-left"> </i>&nbsp; {{ __('cart.continue') }}</a> 
              <a class="checkout-btn" href="#"><i class="fa fa-check"></i> {{ __('cart.checkout') }}</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('scripts')
  <script src="{{ asset('js/user/viewCart.js') }}"></script>
@endsection