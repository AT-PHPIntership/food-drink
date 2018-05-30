@extends('admin.layout.master')
@section('title', __('category.admin.create.title'))
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{__('category.admin.create.form_title')}}
        <small>{{__('category.admin.create.category')}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{__('admin.dashboard')}}</a></li>
        <li><a href="#">{{__('category.admin.create.manage_category')}}</a></li>
        <li class="active">{{__('category.admin.create.form_title')}}</li>
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
              <h3 class="box-title">{{__('category.admin.create.create')}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('category.store') }}">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label>{{__('category.admin.create.name')}}</label>
                  <input type="text" class="form-control" name="name" placeholder="{{__('category.admin.create.name')}}">
                  @if($errors->first('name')) 
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                    <label>{{__('category.admin.create.parent')}}</label>
                    <select class="form-control" name="parent_id">
                        <option value="0" class="form-control"></option>
                        @foreach ( $nameCategories as $category )
                            <option value="{{ $category->id }}" class="form-control">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->first('parent_id')) 
                        <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('parent_id') }}</strong>
                        </span>
                    @endif
                </div>            
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">{{__('category.admin.create.submit')}}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
