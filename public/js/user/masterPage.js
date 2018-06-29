$( document ).ready(function() {
  accessToken = localStorage.getItem('access_token');
  if (accessToken) {
    $('.links .login').hide();
  } else {
    $('.links .myaccount').hide();
    $('.links .logout').hide();
    window.location.host;
  }
  
  $('#logout').on('click', function (event) {
    event.preventDefault();
    if (accessToken) {
      $.ajax({
        url: '/api/logout',
        headers: {
          'Accept': 'application/json',
          'Authorization': 'Bearer ' + accessToken
        },
        type: 'POST',
        success: function (response) {
          localStorage.removeItem('access_token');
          window.location.href = 'http://' + window.location.hostname + '/';
        }
      });
    }
  });
});
