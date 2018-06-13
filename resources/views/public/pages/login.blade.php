@extends('user.layout.master')
@section('title', __('home.user.title') )
@section('content')
<section class="main-container col1-layout">
  <div class="main container">
    <div class="page-content">
      <div class="account-login">
        <div class="box-authentication">
          <h4>{{__('login.user.login')}}</h4>
          <p class="before-login-text">{{__('login.user.welcome')}}</p>
          <form action="#" accept-charset="UTF-8" method="post">
            <label for="session_email">{{__('login.user.email')}}</label>
            <input class="form-control" type="email" name="" id="session_email" />
            <label for="session_password">{{__('login.user.password')}}</label>
            <input class="form-control" type="password" name="" id="session_password" />
            <label class=" inline" for="session_remember_me">
              <input name="" type="hidden" value="0" /><input type="checkbox" value="1" name="" id="session_remember_me" />
              <span>{{__('login.user.remember_me')}}</span>
            </label>
            <input type="submit" name="commit" value="Log in" class="button" data-disable-with="Log in" />
            <p class="forgot-pass">
              <a href="#">{{__('login.user.register')}}</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
