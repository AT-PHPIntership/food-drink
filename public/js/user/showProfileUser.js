// show user info
$( document ).ready(function() {
  $.ajax({
    type: 'GET',
    url: '/api/user',
    headers: { 'authorization': 'Bearer '+ localStorage.getItem('access_token') },
    success: function (response){
      document.getElementById("user-avatar").src = response.data.user.user_info.avatar_url;
      document.getElementById("user-name").innerHTML = response.data.user.name;
      document.getElementById("user-address").innerHTML = response.data.user.user_info.address;
      document.getElementById("user-phone").innerHTML = response.data.user.user_info.phone;
      document.getElementById("user-email").innerHTML = response.data.user.email;
    }
  });
});
