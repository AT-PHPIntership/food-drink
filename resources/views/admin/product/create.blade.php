@extends('admin.layout.master')
@section('title', __('product.admin.create.form_title'))
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
            <form method="POST" action="" enctype="multipart/form-data">
            {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="InputName">Name</label>
                  <input type="text" class="form-control" id="InputName" name="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="InputEmail">Price</label>
                  <input type="text" class="form-control" id="InputEmail" name="price" placeholder="Enter price">
                </div>
                <div class="form-group">
                  <label for="InputQuantity">Quantity</label>
                  <input type="text" class="form-control" id="InputPassword" name="quantity" placeholder="Enter quantity">
								</div>
								<div class="form-group">
                  <label>Category</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Preview</label>
                  <textarea class="form-control" rows="3" placeholder="Enter preview"></textarea>
								</div>
								<div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="3" placeholder="Enter description"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile" multiple>
                </div>               
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
