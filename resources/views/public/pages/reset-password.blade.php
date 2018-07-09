@extends('user.layout.master')
@section('title', __('home.user.title') )
@section('content')
<section class="main-container col1-layout">
  <div class="main container">
    <div class="page-content">
      <div class="account-login">
        <div class="box-authentication">
          <h4>{{__('forgot-password.forgot_password')}}</h4>
          <p class="before-login-text">{{__('forgot-password.message')}}</p>
          <form class="login-form" accept-charset="UTF-8">
            <label for="email">{{__('forgot-password.your_email')}}</label>
            <input class="form-control" type="email" name="" id="mail" />
            <span class="help-block" id="error-email" hidden>
              <strong class="text-danger"></strong>
            </span>
            <input type="submit" name="commit" value="{{__('forgot-password.send')}}" class="button"/>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('scripts')
<script src="{{ asset('js/user/forgotPassword.js') }}"></script>
@endsection