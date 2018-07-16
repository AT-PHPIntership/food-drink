$( document ).ready(function() {
  accessToken = localStorage.getItem('access_token');
  if (accessToken) {
    $('.links .login').hide();
    $('.links .register').hide();
    $('.please-login').hide();
    $('.actions .login').hide();
  } else {
    $('.language-currency-wrapper .myaccount').hide();
    $('.cart_navigation .checkout-btn').hide();
    $('.actions .add-order').hide();
    window.location.host;
  }
  //translate
  if (window.sessionStorage.getItem('locale')) {
    Lang.setLocale(window.sessionStorage.getItem('locale'));
  }

  $('.locale').on('click', function (event) {
    event.preventDefault();
    url = $(this).attr('href');
    $.ajax({
      url: url,
      type: 'GET',
      success: function(response) {
        window.sessionStorage.setItem('locale', response.locale);
        window.location.reload();
      }
    });
  });

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
          localStorage.removeItem('data');
          window.location.href = 'http://' + window.location.hostname + '/';
        }
      });
    }
  });
});
