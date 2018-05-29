@extends('admin.layout.master')
@section('title', __('product.admin.create.title'))
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{__('product.admin.create.form_title')}}
        <small>{{__('product.admin.create.product')}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{__('admin.dashboard')}}</a></li>
        <li><a href="#">{{__('product.admin.create.manage_product')}}</a></li>
        <li class="active">{{__('product.admin.create.form_title')}}</li>
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
              <h3 class="box-title">{{__('product.admin.create.create')}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label>{{__('product.admin.create.name')}}</label>
                  <input type="text" class="form-control" name="name" placeholder="{{__('product.admin.create.enter_name')}}">
                </div>
                <div class="form-group">
                  <label>{{__('product.admin.create.price')}}</label>
                  <input type="number" step="any" class="form-control" name="price" placeholder="{{__('product.admin.create.enter_price')}}">
                </div>
                <div class="form-group">
                  <label>{{__('product.admin.create.quantity')}}</label>
                  <input type="number" class="form-control" name="quantity" placeholder="{{__('product.admin.create.enter_quantity')}}">
								</div>
								<div class="form-group">
                  <label>{{__('product.admin.create.category')}}</label>
                  <select class="form-control" name="category_id">
                    @include('admin.product.createCategory')
                  </select>
                </div>
                <div class="form-group">
                  <label>{{__('product.admin.create.preview')}}</label>
                  <textarea class="form-control" name="preview" rows="3" placeholder="{{__('product.admin.create.preview')}}"></textarea>
								</div>
								<div class="form-group">
                  <label>{{__('product.admin.create.description')}}</label>
                  <textarea class="form-control" name="description" rows="3" placeholder="{{__('product.admin.create.description')}}"></textarea>
                </div>
                <div class="form-group">
                  <label>{{__('product.admin.create.image')}}</label>
                  <input type="file" multiple name="images[]">
                </div>               
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">{{__('product.admin.create.submit')}}</button>
                @include('admin.errors.error_validation')
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
