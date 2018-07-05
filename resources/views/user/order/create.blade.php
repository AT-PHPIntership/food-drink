@extends('user.layout.master')
@section('title', __('order.user.create.title'))
@section('content')
<section class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-4 col-xs-12">
        <div class="page-content checkout-page">
          <div class="page-title">
            <h2>{{ __('order.user.create.checkout') }}</h2>
          </div>
          <div class="box-border">
            <div class="row">
              <div class="col-sm-12 user-profile">
              
              </div>
            </div>
          </div>
        </div>
      </div>
      <aside class="right sidebar col-sm-8 col-xs-12">
        <div class="sidebar-checkout block">
        <div class="sidebar-bar-title">
          <h3>{{ __('order.user.create.your_checkout') }}</h3>
        </div>
        <div class="block-content">
          <div class="table-responsive">
            <table class="table table-bordered cart_summary">
              <thead>
                <tr>
                  <th class="cart_product">{{ __('cart.product') }}</th>
                  <th>{{ __('cart.name') }}</th>
                  <th>{{ __('cart.price') }}</th>
                  <th>{{ __('cart.qty') }}</th>
                  <th>{{ __('cart.total') }}</th>
                </tr>
              </thead>
              <tbody id="show-cart">
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="2" rowspan="1"></td>
                  <td colspan="2">{{ __('cart.sub_total') }}</td>
                  <td colspan="2">{{ __('product.user.money') }}<span class="sub-total">0</span> </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        </div>
      </aside>
    </div>
  </div>
</section>
@endsection
@section('scripts')
  <script type="text/javascript" src="{{ asset('js/user/viewCartOrder.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/user/showProfileUser.js') }}"></script>
@endsection
