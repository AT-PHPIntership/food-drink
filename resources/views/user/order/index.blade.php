@extends('user.layout.master')
@section('title', __('order.user.index.title'))
@section('content')
<section class="main-container col1-layout">
  <div class="main container">
    <div class="col-main">
      <div class="cart">
        <div class="page-content page-order"><div class="page-title">
          <h2>{{ __('order.user.index.show_order') }}</h2>
        </div>
          <div class="order-detail-content">
            <div class="table-responsive">
              <table class="table table-bordered cart_summary">
                <thead>
                  <tr>
                    <th class="cart_product">{{ __('order.user.index.no') }}</th>
                    <th>{{ __('order.user.index.date') }}</th>
                    <th>{{ __('order.user.index.total_price') }}</th>
                    <th>{{ __('order.user.index.status') }}</th>
                    <th>{{ __('order.user.index.function') }}</th>
                  </tr>
                </thead>
                <tbody id="show-orders">
                  
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
  <script src="{{ asset('js/user/showHistoryOrders.js') }}"></script>
@endsection
