@extends('user.layout.master')
@section('title', __('user.user.profile.title'))
@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad" >
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">{{ __('user.user.profile.profile') }}</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-3 col-lg-3 " align="center"> <img id="user-avatar" alt="User Pic" src="{{ asset('images/products/default-product.jpg') }}" class="img-circle img-responsive"> </div>
            <div class=" col-md-9 col-lg-9 "> 
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>{{ __('user.user.profile.name') }}</td>
                    <td id="user-name"></td>
                  </tr>
                  <tr>
                    <td>{{ __('user.user.profile.email') }}</td>
                    <td id="user-email"></td>
                  </tr>
                  <tr>
                    <td>{{ __('user.user.profile.phone') }}</td>
                    <td id="user-phone"></td>
                  </tr>
                  <tr>
                    <td>{{ __('user.user.profile.home_address') }}</td>
                    <td id="user-address"></td>
                  </tr>
                  </tr>
                  <tr>
                    <td>{{ __('user.user.profile.shipping_address') }}</td>
                    <td id="user-address-shipping">

                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <span class="pull-right">
            <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
          </span>
          <div class="clear-fix"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
  <script type="text/javascript" src="{{ asset('js/user/showProfileUser.js') }}"></script> 
@endsection
