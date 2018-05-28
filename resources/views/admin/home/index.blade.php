@extends('admin.layout.master')
@section('title', __('admin.manage') )
@section('content')
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-product-hunt"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">{{__('home.total_product')}}</span>
            <span class="info-box-number">{{ $totalProduct }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-cart-arrow-down"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">{{__('home.total_product_orderd')}}</span>
            <span class="info-box-number">{{ $totalProductOrderd }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">{{__('home.total_orderd')}}</span>
            <span class="info-box-number">{{ $totalOrder }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-credit-card"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">{{__('home.total_revenue')}}</span>
            <span class="info-box-number">{{ $totalRevenue }} &dollar;</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>

    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <div class="col-md-8">
        <!-- MAP & BOX PANE -->
        
        <!-- /.row -->

        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">{{__('home.latest_order')}}</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table no-margin">
                <thead>
                <tr>
                  <th>{{__('home.order_id')}}</th>
                  <th>{{__('home.email')}}</th>
                  <th>{{__('home.status')}}</th>
                  <th>{{__('home.time')}}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td><a href="pages/examples/invoice.html">12</a></td>
                  <td>sam@gmail.com</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>17/05/2018</td>
                </tr>
                <tr>
                  <td><a href="pages/examples/invoice.html">12</a></td>
                  <td>sam@gmail.com</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>17/05/2018</td>
                </tr>
                <tr>
                  <td><a href="pages/examples/invoice.html">12</a></td>
                  <td>sam@gmail.com</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>17/05/2018</td>
                </tr>
                <tr>
                  <td><a href="pages/examples/invoice.html">12</a></td>
                  <td>sam@gmail.com</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>17/05/2018</td>
                </tr>
                <tr>
                  <td><a href="pages/examples/invoice.html">12</a></td>
                  <td>sam@gmail.com</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>17/05/2018</td>
                </tr>
                <tr>
                  <td><a href="pages/examples/invoice.html">12</a></td>
                  <td>sam@gmail.com</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>17/05/2018</td>
                </tr>
                <tr>
                  <td><a href="pages/examples/invoice.html">12</a></td>
                  <td>sam@gmail.com</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>17/05/2018</td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix">
            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">{{__('home.view_all_order')}}</a>
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <!-- Info Boxes Style 2 -->
        <div class="info-box bg-yellow">
          <span class="info-box-icon"><i class="fa fa-product-hunt"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">{{__('home.total_product')}}</span>
            <span class="info-box-number">52</span>
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description">{{__('home.in_week')}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box bg-green">
          <span class="info-box-icon"><i class="fa fa-money"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">{{__('home.total_orderd')}}</span>
            <span class="info-box-number">52</span>
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description">{{__('home.in_week')}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box bg-red">
          <span class="info-box-icon"><i class="fa fa-product-hunt"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">{{__('home.total_product')}}</span>
            <span class="info-box-number">52</span>
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description">{{__('home.in_month')}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box bg-aqua">
          <span class="info-box-icon"><i class="fa fa-money"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">{{__('home.total_orderd')}}</span>
            <span class="info-box-number">52</span>
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description">{{__('home.in_month')}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endsection
