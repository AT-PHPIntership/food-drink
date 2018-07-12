@extends('user.layout.master')
@section('title', __('home.user.title_forgot'))
@section('content')
<section class="main-container col1-layout">
  <div class="main container">
    <div class="page-content">
      <div class="account-login">
        <div class="box-authentication">
          <h4>{{ __('forgot-password.account_recovery') }}</h4>
          <form class="recover-form" accept-charset="UTF-8">
            <input id="reset_token" type="hidden" name="token" value="{{ $token }}">
            <span class="help-block" id="error-token" hidden>
              <strong class="text-danger"></strong>
            </span>
            <label for="email">{{ __('forgot-password.your_email') }}</label>
            <input class="form-control" type="text" name="email" id="email" />
            <span class="help-block" id="error-email" hidden>
              <strong class="text-danger"></strong>
            </span>
            <label for="password">{{ __('forgot-password.new_password') }}</label>
            <input class="form-control" type="password" name="password" id="password" />
            <span class="help-block" id="error-password" hidden>
              <strong class="text-danger"></strong>
            </span>
            <label for="confirm-password">{{ __('forgot-password.confirm_password') }}</label>
            <input class="form-control" type="password" name="password-confirmation" id="confirm-password" />
            <span class="help-block" id="error-confirm-password" hidden>
              <strong class="text-danger"></strong>
            </span>
            <input type="submit" name="commit" value="{{ __('forgot-password.recover_account') }}" class="button"/>
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
