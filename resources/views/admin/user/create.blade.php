@extends('admin.layout.master')
@section('title', __('user.admin.create.title'))
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{__('user.admin.create.form_title')}}
        <small>{{__('user.admin.create.user')}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{__('user.admin.create.create')}}</a></li>
        <li><a href="#">{{__('user.admin.create.form')}}</a></li>
        <li class="active">{{__('user.admin.create.user')}}</li>
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
              <h3 class="box-title">Create</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="InputName">{{__('user.admin.create.name')}}</label>
                  <input type="text" class="form-control" id="InputName" name="name" placeholder="{{__('user.admin.create.enter_name')}}">
                </div>
                <div class="form-group">
                  <label for="InputEmail">{{__('user.admin.create.email')}}</label>
                  <input type="text" class="form-control" id="InputEmail" name="email" placeholder="{{__('user.admin.create.enter_email')}}">
                </div>
                <div class="form-group">
                  <label for="InputPassword">{{__('user.admin.create.password')}}</label>
                  <input type="password" class="form-control" id="InputPassword" name="password" placeholder="{{__('user.admin.create.enter_password')}}">
                </div>
                <div class="form-group">
                  <label for="InputAddress">{{__('user.admin.create.address')}}</label>
                  <input type="text" class="form-control" id="InputAddress" name="address" placeholder="{{__('user.admin.create.enter_address')}}">
                </div>
                <div class="form-group">
                  <label for="InputPhone">{{__('user.admin.create.phone')}}</label>
                  <input type="text" class="form-control" id="InputPhone" name="phone" placeholder="{{__('user.admin.create.enter_phone')}}">
                </div>
                <div class="form-group">
                  <label for="InputAvatar">{{__('user.admin.create.avatar')}}</label>
                  <input type="file" class="form-control" id="InputAvatar" name="avatar" placeholder="{{__('user.admin.create.enter_avatar')}}">
                </div>
                <!-- <div class="form-group">name
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div> -->               
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">{{__('user.admin.create.submit')}}</button>
                @if(count($errors))
                  <div class="form-group">
                    <div class="alert alert-danger">
                      <ul>
                        @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                @endif
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
