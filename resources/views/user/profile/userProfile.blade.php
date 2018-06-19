@extends('user.layout.master')
@section('title', __('home.user.title'))
@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="well well-sm">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <img src="" alt="" class="img-rounded img-responsive" id="user-avatar"/>
          </div>
          <div class="col-sm-6 col-md-8">
            <h4 id="user-name"></h4>
            <small><cite title="" id="user-address" > <i class="glyphicon glyphicon-map-marker"></i></cite></small>
            <p>
              <i class="glyphicon glyphicon-envelope" id="user-email"></i> 
              <br />
              <i class="glyphicon glyphicon-phone" id="user-phone"> </i>
              <br />
              <i class="glyphicon glyphicon-lock"></i>*******
              <br />
            <div class="btn-group">
              <p class="btn btn-primary">User</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
