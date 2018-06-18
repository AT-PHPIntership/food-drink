// show user info
$( document ).ready(function() {
  $.ajax({
    type: 'GET',
    url: '/api/show',
    headers: { 'authorization': 'Bearer '+ localStorage.getItem('access_token') },
    success: function (response){
      $('#user-profile').append(
      '<div class="row">\
        <div class="col-xs-12 col-sm-6 col-md-6">\
          <div class="well well-sm">\
            <div class="row">\
              <div class="col-sm-6 col-md-4">\
                <img src="'+ response.data.user.user_info.avatar_url +'" alt="" class="img-rounded img-responsive" />\
              </div>\
              <div class="col-sm-6 col-md-8">\
                <h4>'+ response.data.user.name +'</h4>\
                <small><cite title="'+ response.data.user.user_info.address +'">'+ response.data.user.user_info.address +'<i class="glyphicon glyphicon-map-marker"></i></cite></small>\
                <p>\
                <i class="glyphicon glyphicon-envelope"></i>'+ response.data.user.email +'\
                <br />\
                <i class="glyphicon glyphicon-phone"></i>'+ response.data.user.user_info.phone +'\
                <br />\
                <i class="glyphicon glyphicon-lock"></i>*******\
                <br />\
                <div class="btn-group">\
                <p class="btn btn-primary">User</p>\
                </div>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>');
    }
  });
});
