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
              <p class="alert-info" hidden>{{ __('order.user.cancel.successfully') }}</p>
              <table class="table table-bordered cart_summary">
                <thead>
                  <tr>
                    <th class="cart_product">{{ __('order.user.index.no') }}</th>
                    <th>{{ __('order.user.index.date') }}</th>
                    <th>{{ __('order.user.index.total_price') }}</th>
                    <th>{{ __('order.user.index.note') }}</th>
                    <th>{{ __('order.user.index.status') }}</th>
                    <th>{{ __('order.user.index.address') }}</th>
                    <th>{{ __('order.user.index.function') }}</th>
                  </tr>
                </thead>
                <tbody id="show-orders">
                  
                </tbody>
              </table>
              <div class="alert-danger" hidden></div>
              <div class="pagination-area">
                <a id="next-order"><span>{{ __('product.user.next') }} <i class="fa fa-forward"></i></span></a>
                <a id="prev-order"><span> <i class="fa fa-backward"></i> {{ __('product.user.prev') }}</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="note-cancel-order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" hidden>
    <div class="modal-dialog note-cancel-order" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4>{{ __('order.user.cancel.write_reason') }}</h4>
        </div>
        <div class="modal-body">
          <form id="demo-form2" class="form-horizontal form-label-left">
            <div class="form-group">
              <div class="col-md-12 col-sm-6 col-xs-12">
                <textarea rows="5" name="note" class="form-control col-md-7 col-xs-12"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                <button type="submit" id="note-cancel-order-submit" class="btn btn-success">{{ __('order.user.cancel.send') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('scripts')
  <script src="{{ asset('js/user/showHistoryOrders.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/user/showProfileUser.js') }}"></script>
@endsection
