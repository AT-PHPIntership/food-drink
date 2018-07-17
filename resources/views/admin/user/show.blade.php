@extends('admin.layout.master')
@section('title', __('user.admin.show.title'))
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      {{ __('user.admin.show.form_title') }}
        <small>{{ __('user.admin.edit.user') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> {{ __('admin.dashboard') }}</a></li>
        <li><a href="{{ route('user.index') }}">{{ __('admin.manage_user') }}</a></li>
        <li class="active">{{ __('user.admin.show.title') }}</li>
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
            <form method="" action="">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName">{{ __('user.admin.edit.name') }}</label>
                  <input type="text" class="form-control" disabled name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail">{{ __('user.admin.edit.email') }}</label>
                  <input type="email" class="form-control" disabled name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputRole">{{ __('user.admin.edit.address') }}</label>
                  <input type="text" class="form-control" disabled name="address" value="{{ $user->userInfo->address }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputRole">{{ __('user.admin.show.address_shipping') }}</label>
                  @foreach ($user->shippings as $shipping)
                    <input type="text" class="form-control" disabled name="address" value="{{ $shipping->address }}">
                  @endforeach
                </div>
                <div class="form-group">
                  <label for="exampleInputRole">{{ __('user.admin.edit.phone') }}</label>
                  <input type="text" class="form-control" disabled name="phone" value="{{ $user->userInfo->phone }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">{{ __('user.admin.edit.avatar') }}</label>
                  <img src="{{ $user->userInfo->avatar_url }}" alt="{{ $user->name }}" class="avatar-edit">
                </div>               
              </div>
              <div class="box-footer">
                <a href="{{ route('user.index') }}" class="btn btn-primary">{{ __('product.admin.show.back') }}</a>
                <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-primary">{{ __('user.admin.show.edit_user') }}</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
