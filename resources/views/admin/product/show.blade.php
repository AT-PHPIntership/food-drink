@extends('admin.layout.master')
@section('title', __('product.admin.show.title'))
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{__('product.admin.show.form_title')}}
        <small>{{__('product.admin.show.product')}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>{{__('admin.dashboard')}}</a></li>
        <li><a href="{{route('product.index')}}">{{__('admin.manage_product')}}</a></li>
        <li class="active">{{__('product.admin.show.form_title')}}</li>
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
              <h3 class="box-title">{{__('product.admin.show.product')}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="InputName">{{__('product.admin.create.name')}}</label>
                  <input type="text" class="form-control" id="InputName" name="name" disabled placeholder="{{ $product->name }}">
                </div>
                <div class="form-group">
                  <label for="InputEmail">{{__('product.admin.create.price')}}</label>
                  <input type="text" class="form-control" id="InputEmail" name="price" disabled placeholder="{{ $product->price }}">
                </div>
                <div class="form-group">
                  <label for="InputQuantity">{{__('product.admin.create.quantity')}}</label>
                  <input type="text" class="form-control" id="InputPassword" name="quantity" disabled placeholder="{{ $product->quantity }}">
                </div>
                <div class="form-group">
                  <label>{{__('product.admin.create.category')}}</label>
                  <input type="text" class="form-control" id="InputPassword" name="quantity" disabled placeholder="{{ $product->category->name }}">
                </div>
                <div class="form-group">
                  <label>{{__('product.admin.create.preview')}}</label>
                  <textarea class="form-control" name="preview" rows="3" disabled placeholder="{{ $product->preview }}"></textarea>
                </div>
                <div class="form-group">
                  <label>{{__('product.admin.create.description')}}</label>
                  <textarea class="ckeditor form-control" name="description" rows="3" disabled placeholder="{{ $product->description }}">{!! $product->description !!}</textarea>
                </div>
                <div class="form-group">
                <label for="exampleInputFile" class="label-inline">{{__('product.admin.create.image')}}</label>
                  @foreach($product->images as $itemImage)
                    <img src="{{$itemImage->image_url}}" alt="{{ $product->name }}" class="avatar-edit">
                  @endforeach
                </div>               
              </div>
              <div class="box-footer">
                <input action="action" class="btn btn-primary" onclick="window.history.go(-1);" type="button" value="{{__('product.admin.show.back')}}" />
                <a href="{{route('product.edit', ['product' => $product->id])}}" class="btn btn-primary">{{__('product.admin.show.edit_product')}}</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
