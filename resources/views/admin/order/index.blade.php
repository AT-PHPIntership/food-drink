@extends('admin.layout.master')
@section('title', __('order.admin.index.title') )
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('order.admin.index.list_order')}}</h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> {{__('admin.dashboard')}}</a></li>
        <li class="active">{{__('admin.manage_order')}}</li>
      </ol>
    </section>

    @include('admin.layout.message');
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{__('order.admin.index.show_order')}}</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="{{__('order.admin.index.search')}}">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>{{__('order.admin.index.id')}}</th>
                  <th>{{__('order.admin.index.name_user')}}</th>
                  <th>{{__('order.admin.index.email_user')}}</th>
                  <th>{{__('order.admin.index.total')}}</th>
                  <th>{{__('order.admin.index.date')}}</th>
                  <th>{{__('order.admin.index.status')}}</th>
                  <th>{{__('order.admin.index.action')}}</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td>John Doe</td>
                  <td>jonh@gmail.com</td>
                  <td>50.25 &dollar;</td>
                  <td>Accept</td>
                  <td>11-7-2014</td>
                  <td>
                    <a href=""><i class="fa fa-check-circle"></i></a> |
                    <a href=""><i class="fa fa-ban"></i></a> |
                    <a href=""><i class="fa fa-info"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>John Doe</td>
                  <td>jonh@gmail.com</td>
                  <td>50.25 &dollar;</td>
                  <td>Accept</td>
                  <td>11-7-2014</td>
                  <td>
                    <a href=""><i class="fa fa-check-circle"></i></a> |
                    <a href=""><i class="fa fa-ban"></i></a> |
                    <a href=""><i class="fa fa-info"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>John Doe</td>
                  <td>jonh@gmail.com</td>
                  <td>50.25 &dollar;</td>
                  <td>Accept</td>
                  <td>11-7-2014</td>
                  <td>
                    <a href=""><i class="fa fa-check-circle"></i></a> |
                    <a href=""><i class="fa fa-ban"></i></a> |
                    <a href=""><i class="fa fa-info"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>John Doe</td>
                  <td>jonh@gmail.com</td>
                  <td>50.25 &dollar;</td>
                  <td>Accept</td>
                  <td>11-7-2014</td>
                  <td>
                    <a href=""><i class="fa fa-check-circle"></i></a> |
                    <a href=""><i class="fa fa-ban"></i></a> |
                    <a href=""><i class="fa fa-info"></i></a>
                  </td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection