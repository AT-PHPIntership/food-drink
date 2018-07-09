@extends('user.layout.master')
@section('title', __('order.user.edit.title'))
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
                <div class="col-sm-12">
                  <p><i class="fa fa-check-circle text-primary"></i>{{ __('order.user.create.your_name') }}<span id="name-user">Prof. Ulices Ryan II</span></p>
                  <p><i class="fa fa-check-circle text-primary"></i>{{ __('order.user.create.your_email') }}<span id="email-user">muller.adelia@west.com</span></p>
                  <p><i class="fa fa-check-circle text-primary"></i>{{ __('order.user.create.your_address') }}<span id="address-user">1929 McKenzie Corners Suite 909
Leuschkemouth, WV 81943-9640</span></p>
                  <p><i class="fa fa-check-circle text-primary"></i>{{ __('order.user.create.your_phone') }}<span id="phone-user">328-307-1501 x51435</span></p>
                  <form>
                    <label>{{ __('order.user.create.place_delivery') }}</label>
                    <input type="text" class="form-control input" id="address">
                    <button class="button" id="edit-order"><i class="fa fa-angle-double-right"></i>&nbsp; <span>{{ __('order.user.create.complete') }}</span></button>
                  </form>  
                </div>
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
                  <th class="action"><i class="fa fa-trash-o"></i></th>
                </tr>
              </thead>
              <tbody id="order-detail">
              
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="2" rowspan="1"></td>
                  <td colspan="2">{{ __('cart.sub_total') }}</td>
                  <td colspan="2">{{ __('product.user.money') }}<span id="subTotal" class="sub-total"></span> </td>
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
  <script type="text/javascript" src="{{ asset('js/user/editOrder.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/user/showProfileUser.js') }}"></script>
@endsection
