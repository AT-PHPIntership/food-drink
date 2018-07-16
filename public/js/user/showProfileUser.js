// show user info
if (!localStorage.getItem('access_token')) {
  window.location.href = 'http://' + window.location.hostname + '/';  
}
$( document ).ready(function() {
  $.ajax({
    type: 'GET',
    url: '/api/profile',
    headers: { 'authorization': 'Bearer '+ localStorage.getItem('access_token') },
    success: function (response){
      var shippings = response.data.user.shippings;
      var html = '';
      $("#user-avatar").attr('src', response.data.user.user_info.avatar_url);
      $("#user-name").html(response.data.user.name);
      $("#user-address").html(response.data.user.user_info.address);
      $("#user-phone").html(response.data.user.user_info.phone);
      $("#user-email").html(response.data.user.email);
      shippings.forEach(shipping => {
        html += '<p>'+ shipping.address +'</p>\
                <button class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></button>\
                <button class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></button>\
                <hr>'
      });
      $('#user-address-shipping').html(html);
    }
  });
});
