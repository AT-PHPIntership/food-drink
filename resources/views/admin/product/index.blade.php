@extends('admin.layout.master')
@section('title', __('product.admin.index.title') )
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('product.admin.index.list_product')}}</h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> {{__('admin.dashboard')}}</a></li>
        <li class="active">{{__('admin.manage_product')}}</li>
      </ol>
    </section>

    @include('admin.layout.message')
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
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>@sortablelink('id', __('product.admin.index.id'))</th>
                  <th>@sortablelink('name', __('product.admin.index.name'))</th>
                  <th>@sortablelink('category.name', __('product.admin.index.category'))</th>
                  <th>@sortablelink('price', __('product.admin.index.price'))</th>
                  <th>@sortablelink('quantity', __('product.admin.index.quantity'))</th>
                  <th>@sortablelink('avg_rate', __('product.admin.index.rate_avg'))</th>
                  <th>{{__('product.admin.index.image')}}</th>
                  <th>{{__('product.admin.index.action')}}</th>
                </tr>
                @foreach($product as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->category->name }}</td>
                  <td>{{ $item->price }} &dollar;</td>
                  <td>{{ $item->quantity }}</td>
                  <td>{{ $item->avg_rate }}</td>
                  @if ($item->images->first())
                    <td><img src="{{ asset('images/products/'.$item->images->first()['image']) }}" alt="{{ $item->name }}" class="avatar"/></td>
                  @else
                    <td><img src="{{ asset('images/products/default-product.jpg') }}" alt="{{ $item->name }}" class="avatar"/></td>
                  @endif
                  <td>
                    <a href="{{route('product.edit', ['product' => $item->id])}}"><i class="fa fa-edit"></i></a> |
                    <a href="{{ route('product.show', ['product' => $item->id]) }}"><i class="fa fa-info"></i></i></a> |
                    <form method="POST" action="{{route('product.destroy', ['product' => $item->id])}}" class="form-trash" onsubmit="return confirmDelete()">
                      @csrf
                      {{ method_field('DELETE') }}
                      <button type="submit" class="but-trash"><i class="fa fa-trash"></i></button>
                    </form>
                    
                  </td>
                </tr>
                @endforeach
                </tr>
              </table>
              {{ $product->appends(\Request::except('page'))->render() }}
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
