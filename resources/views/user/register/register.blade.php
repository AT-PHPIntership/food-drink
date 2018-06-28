@extends('user.layout.master')
@section('title', __('home.user.title'))
@section('content')
<section class="main-container col1-layout">
  <div class="main container">
  <div class="page-content">
    <div class="account-register">
      <div class="box-authentication">
        <h4>{{ __('user.admin.register.register') }}</h4>
        <p>{{ __('user.admin.register.label_register') }}</p>
        <form method="POST" action="" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="box-body">
            <div class="form-group">
							<label for="InputName">{{ __('user.admin.create.name') }}</label>
							<input type="text" class="form-control" id="InputName" name="name" placeholder="{{__('user.admin.create.enter_name')}}">
            </div>
            <div class="form-group">
							<label for="InputEmail">{{ __('user.admin.create.email') }}</label>
							<input type="text" class="form-control" id="InputEmail" name="email" placeholder="{{__('user.admin.create.enter_email')}}">
            </div>
            <div class="form-group">
							<label for="InputPassword">{{ __('user.admin.create.password') }}</label>
							<input type="password" class="form-control" id="InputPassword" name="password" placeholder="{{__('user.admin.create.enter_password')}}">
            </div>
            <div class="form-group">
							<label for="InputAddress">{{ __('user.admin.create.address') }}</label> <br>
							<span>{{ __('user.admin.register.ship') }}</span>
							<input type="text" class="form-control" id="InputAddress" name="address" placeholder="{{__('user.admin.create.enter_address')}}">
            </div>
            <div class="form-group">
							<label for="InputPhone">{{ __('user.admin.create.phone') }}</label>
							<input type="text" class="form-control" id="InputPhone" name="phone" placeholder="{{__('user.admin.create.enter_phone')}}">
            </div>
            <div class="form-group">
							<label for="InputAvatar">{{ __('user.admin.create.avatar') }}</label> <br>
							<span>{{ __('user.admin.register.ship') }}</span>
							<input type="file" class="form-control" id="InputAvatar" name="avatar" placeholder="{{__('user.admin.create.enter_avatar')}}">
            </div>       
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="submit">{{ __('user.admin.create.submit') }}</button>
          </div>
        </form>
       </div>
    </div>
  </div>
  </div>
</section>
@endsection
