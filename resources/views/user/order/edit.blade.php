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
                  <p><i class="fa fa-check-circle text-primary"></i>{{ __('order.user.create.your_name') }}<span id="name-user"></span></p>
                  <p><i class="fa fa-check-circle text-primary"></i>{{ __('order.user.create.your_email') }}<span id="email-user"></span></p>
                  <p><i class="fa fa-check-circle text-primary"></i>{{ __('order.user.create.your_address') }}<span id="address-user"></span></p>
                  <p><i class="fa fa-check-circle text-primary"></i>{{ __('order.user.create.your_phone') }}<span id="phone-user"></span></p>
                  <form>
                    <label>{{ __('order.user.create.place_delivery') }}</label>
                    <input type="text" class="form-control input" id="address">
                    <div id="validation-address">

                    </div>
                    <a class="button cancel-edit-order" onclick="window.history.go(-1);"><i class="fa fa-arrow-left"> </i> &nbsp; {{ __('order.user.edit.cancel_edit') }}</a>
                    <button class="button complete" id="edit-order"><i class="fa fa-angle-double-right"></i>&nbsp; <span>{{ __('order.user.create.complete') }}</span></button>
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
            <div id="form-validation">

            </div>
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
