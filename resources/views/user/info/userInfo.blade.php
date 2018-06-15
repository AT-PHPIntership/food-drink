@extends('user.layout.master')
@section('title', __('home.user.title') )
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>Bhaumik Patel</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker"></i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i> email@example.com
                            <br />
                            <i class="glyphicon glyphicon-phone"></i>+016823476525
                            <br />
                            <i class="glyphicon glyphicon-lock"></i>*******
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988
                        </p>
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
