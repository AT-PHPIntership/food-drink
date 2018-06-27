$(document).ready(function() {
  var pathName = document.location.pathname;
  const TYPE_REVIEW = 2;
  const TYPE_COMMENT = 1;
  $('#add-comment').click(function(event) {
    event.preventDefault();
    submitPost(pathName, TYPE_COMMENT);
  });
  $('#add-review').click(function(event) {
    event.preventDefault();
    submitPost(pathName, TYPE_REVIEW);
  });
});

function submitPost(pathName, TYPE) {
  $('.reviews-content-right .alert-danger').html('');
  $.ajax({
    url: '/api' + pathName + '/posts',
    type: 'POST',
    headers: {
      'Accept': 'application/json',
      'Authorization': 'Bearer ' + localStorage.getItem('access_token'),
    },
    data: {
      type: TYPE,
      rate: $('.reviews-table [name="rate"]:radio:checked').val(),
      content: $('#content-post' + TYPE).val(),
    },
    success: function(response) {
      $('.alert-post'+ TYPE).show();
    },
    error: function(response) {
      errorMessage = response.responseJSON.message + '<br/>';
      if (response.responseJSON.errors) {
        errors = Object.keys(response.responseJSON.errors);
        errors.forEach(error => {
          errorMessage += response.responseJSON.errors[error] + '<br/>';
        });
      }
      if (response.responseJSON.code == 405) {
        errorMessage = Lang.get('product.user.detail.purchase');
      }
      if (response.responseJSON.code == 401) {
        errorMessage = Lang.get('product.user.detail.need_login');
      }
      $('.reviews-content-right .danger'+ TYPE).html(errorMessage);
      $('.reviews-content-right .danger'+ TYPE).show();
    }
  });
}
