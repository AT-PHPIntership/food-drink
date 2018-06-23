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
  $.ajax({
		url: '/api' + pathName + '/posts',
		type: 'POST',
		headers: {
			'Accept': 'application/json',
			'Authorization': 'Bearer ' + localStorage.getItem('access_token'),
		},
		data: {
			type: TYPE,
		//   rate: $('#content-comment').val(),
			content: $('#content-comment').val(),
		},
		success: function(response) {
			$('.alert-post').show();
		},
		error: function(response) {
			errorMessage = response.responseJSON.message + '<br/>';
			if (response.responseJSON.errors) {
				errors = Object.keys(response.responseJSON.errors);
				errors.forEach(error => {
					errorMessage += response.responseJSON.errors[error] + '<br/>';
				});
			}
			$('.reviews-content-right .alert-danger').html(errorMessage);
			$('.reviews-content-right .alert-danger').show();
		}
  });
}
