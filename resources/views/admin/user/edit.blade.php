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
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> {{__('admin.dashboard')}}</a></li>
        <li><a href="{{route('user.index')}}">{{__('admin.manage_user')}}</a></li>
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
            <form method="POST" action="{{route('user.update', $user->id)}}" enctype="multipart/form-data">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName">{{__('user.admin.edit.name')}}</label>
                  <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail">{{__('user.admin.edit.email')}}</label>
                  <input type="email" class="form-control" disabled name="email" placeholder="{{$user->email}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputRole">{{__('user.admin.edit.address')}}</label>
                  <input type="text" class="form-control" name="address" placeholder="{{$user->userInfo->address}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputRole">{{__('user.admin.edit.phone')}}</label>
                  <input type="text" class="form-control" name="phone" value="{{$user->userInfo->phone}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">{{__('user.admin.edit.avatar')}}</label>
                  <img src="{{$user->userInfo->avatar_url}}" alt="{{$user->userInfo->phone}}" class="avatar-edit">
                  <input type="file">
                </div>               
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">{{__('user.admin.edit.submit')}}</button>
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
