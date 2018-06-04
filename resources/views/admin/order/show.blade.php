@extends('admin.layout.master')
@section('title', __('order.admin.show.title'))
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{__('order.admin.show.form_title')}}
        <small>{{__('order.admin.show.order')}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>{{__('admin.dashboard')}}</a></li>
        <li><a href="{{route('order.index')}}">{{__('admin.manage_order')}}</a></li>
        <li class="active">{{__('order.admin.show.form_title')}}</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{__('order.admin.show.user_info')}}</h3>
            </div>
            <!-- /.box-header -->
            <form method="POST" action="" enctype="">
            <!-- {{method_field('PUT')}} -->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName">{{__('order.admin.show.name')}}</label>
                  <input type="text" class="form-control" disabled name="name" value="{{ $order->user->name }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail">{{__('order.admin.show.email')}}</label>
                  <input type="email" class="form-control" disabled name="email" value="{{ $order->user->email }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputRole">{{__('order.admin.show.address')}}</label>
                  <input type="text" class="form-control" disabled name="address" value="{{ $order->orderDetails->first()->address }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputRole">{{__('order.admin.show.phone')}}</label>
                  <input type="text" class="form-control" disabled name="phone" value="{{ $order->user->userInfo->phone }}">
                </div>    
              </div>
            </form>
            <!-- form start -->
            <div class="box-header with-border list-product">
              <h3 class="box-title">{{__('order.admin.show.list_product')}}</h3>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>{{__('order.admin.show.name_product')}}</th>
                  <th>{{__('order.admin.show.quantity')}}</th>
                  <th>{{__('order.admin.show.total')}}</th>
                  <th>{{__('order.admin.show.image')}}</th>
                  <th>{{__('order.admin.show.preview')}}</th>
                  <th>{{__('order.admin.show.date')}}</th>
                </tr>
                  @foreach ($order->orderDetails as $orderDetail)
                  <tr>
                    <td>{{ $orderDetail->name_product }}</td>
                    <td>{{ $orderDetail->quantity }}</td>
                    <td>{{ $orderDetail->price }} &dollar;</td>
                    <td><img src="{{ $orderDetail->image_url }}" alt="{{ $orderDetail->name_product }}"></td>
                    <td>{{ $orderDetail->preview }}</td>
                    <td>{{ $orderDetail->updated_at }}</td>
                  </tr>
                  @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
