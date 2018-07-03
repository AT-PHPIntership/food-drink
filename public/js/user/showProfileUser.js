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
      $("#user-avatar").attr('src', response.data.user.user_info.avatar_url);
      $("#user-name").html(response.data.user.name);
      $("#user-address").html(response.data.user.user_info.address);
      $("#user-phone").html(response.data.user.user_info.phone);
      $("#user-email").html(response.data.user.email);
    }
  });
});
