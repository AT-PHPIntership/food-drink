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
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i>{{__('admin.dashboard')}}</a></li>
        <li><a href="{{ route('product.index') }}">{{__('product.admin.create.manage_product')}}</a></li>
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
                  @if($errors->first('name')) 
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <label>{{__('product.admin.create.price')}}</label>
                  <input type="number" step="any" class="form-control" name="price" placeholder="{{__('product.admin.create.enter_price')}}">
                  @if($errors->first('price')) 
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('price') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <label>{{__('product.admin.create.quantity')}}</label>
                  <input type="number" class="form-control" name="quantity" placeholder="{{__('product.admin.create.enter_quantity')}}">
                  @if($errors->first('quantity')) 
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('quantity') }}</strong>
                    </span>
                  @endif
                </div>
								<div class="form-group">
                  <label>{{__('product.admin.create.category')}}</label>
                  <select class="form-control" name="category_id">
                    @include('admin.product.createCategory')
                  </select>
                  @if($errors->first('category_id')) 
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('category_id') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <label>{{__('product.admin.create.preview')}}</label>
                  <textarea class="form-control" name="preview" rows="3" placeholder="{{__('product.admin.create.preview')}}"></textarea>
                  @if($errors->first('preview')) 
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('preview') }}</strong>
                    </span>
                  @endif
                </div>
								<div class="form-group">
                  <label>{{__('product.admin.create.description')}}</label>
                  <textarea class="form-control ckeditor" name="description" rows="3" placeholder="{{__('product.admin.create.description')}}"></textarea>
                  @if($errors->first('description')) 
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('description') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <label>{{__('product.admin.create.image')}}</label>
                  <input type="file" multiple name="images[]">
                  @if($errors->first('images')) 
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('images') }}</strong>
                    </span>
                  @endif
                </div>               
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">{{__('product.admin.create.submit')}}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
