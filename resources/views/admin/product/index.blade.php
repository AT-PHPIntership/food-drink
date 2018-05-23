@extends('admin.layout.master')
@section('title', __('user.admin.index.title') )
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('product.admin.index.list_product')}}</h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> {{__('admin.dashboard')}}</a></li>
        <li class="active">{{__('product.admin.index.product')}}</li>
      </ol>
    </section>

    @include('admin.layout.message');
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{__('product.admin.index.show_product')}}</h3>
              <a href="" class="add-users">{{__('product.admin.index.new_product')}}</a>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="{{__('product.admin.index.search')}}">

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
                  <th>{{__('product.admin.index.id')}}</th>
                  <th>{{__('product.admin.index.name')}}</th>
                  <th>{{__('product.admin.index.price')}}</th>
                  <th>{{__('product.admin.index.image')}}</th>
                  <th>{{__('product.admin.index.quantity')}}</th>
                  <th>{{__('product.admin.index.category')}}</th>
                  <th>{{__('product.admin.index.rate_avg')}}</th>
                  <th>{{__('product.admin.index.action')}}</th>
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td><img src="{{asset('images/products/default-product.jpg')}}" alt="" class="avatar"></td>
                  <td>John Doe</td>
                  <td>Bacon</td>
                  <td>11-7-2014</td>
                  <td>
                    <a href=""><i class="fa fa-edit"></i></a> |
                    <a href=""><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td><img src="{{asset('images/products/default-product.jpg')}}" alt="" class="avatar"></td>
                  <td>John Doe</td>
                  <td>Bacon</td>
                  <td>11-7-2014</td>
                  <td>
                    <a href=""><i class="fa fa-edit"></i></a> |
                    <a href=""><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td><img src="{{asset('images/products/default-product.jpg')}}" alt="" class="avatar"></td>
                  <td>John Doe</td>
                  <td>Bacon</td>
                  <td>11-7-2014</td>
                  <td>
                    <a href=""><i class="fa fa-edit"></i></a> |
                    <a href=""><i class="fa fa-trash"></i></a>
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
