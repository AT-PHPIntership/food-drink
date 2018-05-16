@extends('admin.layout.master')
@section('title', __('user.admin.edit.title') )
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      {{__('user.admin.edit.form_title')}}
        <small>{{__('user.admin.edit.user')}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{__('admin.dashboard')}}</a></li>
        <li><a href="#">{{__('admin.manage_user')}}</a></li>
        <li class="active">{{__('user.admin.edit.title')}}</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            @foreach($result as $k => $item)
            {{dd($item)}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName">{{__('user.admin.edit.name')}}</label>
                  <input type="text" class="form-control" name="name" value="{{$item->name}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail">{{__('user.admin.edit.email')}}</label>
                  <input type="email" class="form-control" name="email" value="{{$item->email}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">{{__('user.admin.edit.password')}}</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                  <label for="exampleInputRole">{{__('user.admin.edit.address')}}</label>
                  <input type="text" class="form-control" name="address" value="{{$item->address}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputRole">{{__('user.admin.edit.phone')}}</label>
                  <input type="text" class="form-control" name="phone" value="Phone">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">{{__('user.admin.edit.avatar')}}</label>
                  <input type="file">
                </div>               
              </div>
            @endforeach
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">{{__('user.admin.edit.submit')}}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
