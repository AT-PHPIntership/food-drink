@extends('admin.layout.master')
@section('title', __('product.admin.index.title') )
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
              <a href="{{route('product.create')}}" class="add-users">{{__('product.admin.index.new_product')}}</a>
              <div class="box-tools">
                <form class="input-group input-group-sm" style="width: 150px;" action="{!! route('product.index') !!}" method="GET">
                  <input type="text" name="product_name" class="form-control pull-right" placeholder="{{__('product.admin.index.search')}}">
                  <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </form>
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
                @foreach($product as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->price }} &dollar;</td>
                  @foreach($item->images as $itemImage)
                    @if ($loop->first)
                      <td><img src="{{$itemImage->image_url}}" alt="" class="avatar"></td>
                    @endif    
                  @endforeach
                  <td>{{ $item->quantity }}</td>
                  <td>{{ $item->category->name }}</td>
                  <td>{{ $item->avg_rate }}</td>
                  <td>
                    <a href=""><i class="fa fa-edit"></i></a> |
                    <a href=""><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
                </tr>
              </table>
              {{ $product->links() }}
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
