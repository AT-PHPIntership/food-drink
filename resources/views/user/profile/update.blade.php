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
            <form>
              <label for="name">{{ __('profile.user.update.name') }}</label>
              <input id="name" type="text" name="name" class="form-control">
              <label for="email">{{ __('profile.user.update.email') }}</label>
              <input id="email" type="text" name="email" class="form-control">
              <label for="address">{{ __('profile.user.update.address') }}</label>
              <input id="address" type="text" name="address" class="form-control">
              <label for="phone">{{ __('profile.user.update.phone') }}</label>
              <input id="phone" type="text" name="phone" class="form-control">
              <label for="avatar">{{ __('profile.user.update.avatar') }}</label>
              <input type="file" name="avatar">
              <button class="button"><i class="fa fa-user"></i>&nbsp; <span>{{ __('profile.user.update.submit') }}</span></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
