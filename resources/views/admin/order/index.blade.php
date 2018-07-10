@extends('admin.layout.master')
@section('title', __('order.admin.index.title') )
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{ __('order.admin.index.list_order') }}</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> {{ __('admin.dashboard') }}</a></li>
        <li class="active">{{ __('admin.manage_order') }}</li>
      </ol>
    </section>

    @include('admin.layout.message')
    <!-- Main content -->
    <section class="content">
      <div class="alert-danger" hidden></div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ __('order.admin.index.show_order') }}</h3>
              <div class="box-tools">
                <form class="input-group input-group-sm" style="width: 150px;" action="{{ route('order.index') }}" method="GET">
                  <input type="text" name="search" class="form-control pull-right" placeholder="{{ __('order.admin.index.search') }}">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>@sortablelink('id', __('order.admin.index.id'))</th>
                  <th>@sortablelink('user.name', __('order.admin.index.name_user'))</th>
                  <th>@sortablelink('user.email', __('order.admin.index.email_user'))</th>
                  <th>@sortablelink('total', __('order.admin.index.total'))</th>
                  <th>{{ __('order.admin.index.status') }}</th>
                  <th>@sortablelink('updated_at', __('order.admin.index.date'))</th>
                  <th>{{ __('order.admin.index.action') }}</th>
                </tr>
                  @foreach ($orders as $order)
                  <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->user->email }}</td>
                    <td>{{ $order->total }} {{ __('order.admin.index.money') }}</td>
                    <td>
                      <select class="form-control status" name="status" data-id="{{ $order->id }}">
                        <option value="{{ App\Order::PENDING }}" {{ $order->status == App\Order::PENDING ? 'selected="selected"' : '' }}>{{ __('order.admin.index.pending') }}</option>
                        <option value="{{ App\Order::ACCEPTED }}" {{ $order->status == App\Order::ACCEPTED ? 'selected="selected"' : '' }}>{{ __('order.admin.index.accepted') }}</option>
                        <option value="{{ App\Order::REJECTED }}" {{ $order->status == App\Order::REJECTED ? 'selected="selected"' : '' }}>{{ __('order.admin.index.rejected') }}</option>
                      </select>
                    </td>
                    <td>{{ $order->updated_at }}</td>
                    <td>
                      <a href="{{ route('order.show', ['order' => $order->id] )}}"><i class="fa fa-info"></i></a>
                    </td>
                  </tr>
                  @endforeach
              </table>
              {{ $orders->appends(\Request::except('page'))->render() }}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <div class="modal fade" id="note-change-order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" hidden>
        <div class="modal-dialog note-cancel-order" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4>{{ __('order.admin.index.write_reason') }}</h4>
            </div>
            <div class="modal-body">
              <form id="demo-form2" class="form-horizontal form-label-left">
                <div class="form-group">
                  <div class="col-md-12 col-sm-6 col-xs-12">
                    <textarea rows="5" id="note" name="note" class="form-control col-md-7 col-xs-12"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                    <button type="submit" id="note-change-order-submit" class="btn btn-success">{{ __('order.admin.index.submit') }}</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
