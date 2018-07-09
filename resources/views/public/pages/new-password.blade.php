@extends('user.layout.master')
@section('title', __('home.user.title') )
@section('content')
<section class="main-container col1-layout">
  <div class="main container">
    <div class="page-content">
      <div class="account-login">
        <div class="box-authentication">
          <h4>{{__('forgot-password.account_recovery')}}</h4>
          <p class="before-login-text">{{__('forgot-password.recover_account_for')}}</p>
          <form class="login-form" accept-charset="UTF-8">
            <label for="password">{{__('forgot-password.new_password')}}</label>
            <input class="form-control" type="password" name="" id="password" />
            <label for="confirm_password">{{__('forgot-password.confirm_password')}}</label>
            <input class="form-control" type="password" name="" id="confirm_password" />
            <span class="help-block">
              <strong class="text-danger"></strong>
            </span>
            <input type="submit" name="commit" value="{{__('forgot-password.recover_account')}}" class="button"/>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
