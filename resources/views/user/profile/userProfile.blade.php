@extends('user.layout.master')
@section('title', __('home.user.title'))
@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Sheena Shrestha</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
            <div class=" col-md-9 col-lg-9 "> 
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>Department:</td>
                    <td>Programming</td>
                  </tr>
                  <tr>
                    <td>Hire date:</td>
                    <td>06/23/2013</td>
                  </tr>
                  <tr>
                    <td>Date of Birth</td>
                    <td>01/24/1988</td>
                  </tr>
                  <tr>
                    <tr>
                      <td>Gender</td>
                      <td>Female</td>
                    </tr>
                    <tr>
                      <td>Home Address</td>
                      <td>Kathmandu,Nepal</td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><a href="mailto:info@support.com">info@support.com</a></td>
                    </tr>
                    <tr>
                      <td>Phone Number</td>
                      <td>
                        <p>123-4567-890(Landline)</p>
                        <p>555-4567-890(Mobile)</p>
                      </td>
                    </tr>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="well well-sm">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <img class="img-rounded img-responsive" id="user-avatar"/>
          </div>
          <div class="col-sm-6 col-md-8">
            <h4 id="user-name"></h4>
            <small><cite  id="user-address" > <i class="glyphicon glyphicon-map-marker"></i></cite></small>
            <p>
              <i class="glyphicon glyphicon-envelope" id="user-email"></i> 
              <br />
              <i class="glyphicon glyphicon-phone" id="user-phone"> </i>
              <br />
              <i class="glyphicon glyphicon-lock"></i>*******
              <br />
            <div class="btn-group">
              <a href="{{ route('profile.edit') }}" class="btn btn-primary" >{{ __('profile.user.update.edit') }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
  <script type="text/javascript" src="{{ asset('js/user/showProfileUser.js') }}"></script> -->
@endsection
