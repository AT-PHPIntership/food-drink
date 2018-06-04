@extends('admin.layout.master')
@section('title', __('category.admin.edit.title'))
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{__('category.admin.edit.form_title')}}
        <small>{{__('category.admin.edit.category')}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{__('admin.dashboard')}}</a></li>
        <li><a href="#">{{__('category.admin.create.manage_category')}}</a></li>
        <li class="active">{{__('category.admin.edit.form_title')}}</li>
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
              <h3 class="box-title">{{__('category.admin.edit.edit')}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('category.store') }}">
              @csrf
              @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label>{{__('category.admin.edit.name')}}</label>
                  <input type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="{{__('category.admin.edit.name')}}">
                  @if($errors->first('name')) 
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
                @if($idCategory !== App\Category::DEFAULT_CATEGORY_FOOD && $idCategory !== App\Category::DEFAULT_CATEGORY_DRINK)
                  <div class="form-group">
                      <label>{{__('category.admin.edit.parent')}}</label>
                      <select class="form-control" name="parent_id">
                          <option value="{{ App\Category::DEFAULT_VALUE }}" class="form-control"></option>
                          @foreach($categories as $parentCategory)
                              <option value="{{ $parentCategory->id }}" class="form-control"{{ $parentCategory->id == $category->parent_id ? 'selected' : '' }}>{{ $parentCategory->name }}</option>
                          @endforeach
                      </select>
                      @if($errors->first('parent_id')) 
                          <span class="help-block">
                          <strong class="text-danger">{{ $errors->first('parent_id') }}</strong>
                          </span>
                      @endif
                  </div>
                @endif            
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">{{__('category.admin.edit.submit')}}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
