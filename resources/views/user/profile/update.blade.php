@extends('user.layout.master')
@section('title', __('home.user.title_edit_user'))
@section('content')
<section class="main-container col1-layout">
    <div class="main container">
      <div class="page-content">
        <div class="account-login">
          <div class="box-authentication">
            <h4>{{ __('profile.user.update.update_user') }}</h4>
            <p class="before-login-text">{{ __('profile.user.update.please_fill') }}</p>
            <form id="form-update-user" method="POST" action="" enctype="multipart/form-data">
            @method('PUT')
            @csrf
              <label for="name">{{ __('profile.user.update.name') }}</label>
              <input id="name" type="text" name="name" class="form-control">
              <span id="name_error" class="help-block" hidden>
                <strong class="text-danger"></strong>
              </span>
              <label for="address">{{ __('profile.user.update.address') }}</label>
              <input id="address" type="text" name="address" class="form-control">
              <span id="address_error" class="help-block" hidden>
                <strong class="text-danger"></strong>
              </span>
              <label for="phone">{{ __('profile.user.update.phone') }}</label>
              <input id="phone" type="text" name="phone" class="form-control">
              <span id="phone_error" class="help-block" hidden>
                <strong class="text-danger"></strong>
              </span>
              <label for="avatar">{{ __('profile.user.update.avatar') }}</label>
              <img src="" class="avatar-edit">
              <input type="file" name="avatar" id="avatar">
              <span id="avatar_error" class="help-block" hidden>
                <strong class="text-danger"></strong>
              </span>
              <button type="submit" class="button" id="edit-user" name="submit"><i class="fa fa-user"></i>&nbsp; <span>{{ __('profile.user.update.submit') }}</span></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('scripts')
<script src="{{ asset('js/user/editUser.js') }}"></script>
@endsection
