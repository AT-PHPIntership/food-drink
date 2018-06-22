$( document ).ready(function() {
  accessToken = localStorage.getItem('access_token');
  if (accessToken) {
    checkLogin();
  } else {
    $('.links .myaccount').hide();
    $('.links .logout').hide();
    window.location.host;
  }

  $('#logout').on('click', function (event) {
    event.preventDefault();
    if (accessToken) {
      $.ajax({
        url: "/api/logout",
        headers: {
          'Accept': 'application/json',
          'Authorization': 'Bearer ' + accessToken
        },
        type: "post",
        success: function (response) {
          localStorage.removeItem('login-token');
          window.location.href = 'http://' + window.location.hostname + '/';
        }
      });
    }
  })
});

function checkLogin() {
  $.ajax({
    type: 'GET',
    url: '/api/checkAccessToken',
    headers: ({
      Accept: 'application/json',
      Authorization: 'Bearer ' + accessToken,
    }),
    success: function (response){
      $('.links .login').hide();
    },
    error: function () {
      window.localStorage.removeItem('access_token');
      $('.links .myaccount').hide();
      $('.links .logout').hide();
    }
  });
}
