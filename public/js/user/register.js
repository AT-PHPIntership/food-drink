// the function is register user 
$(document).ready(function() {
    $('#register-form-data').submit(function(event) {
        formData = new FormData($('#register-form-data')[0]);
        event.preventDefault();
        $.ajax({
            url: "/api/register",
            type: "POST",
            contentType: false,
            processData: false,
            data: formData,
            success: function(response) {
                window.localStorage.setItem('access_token', response.data.token);
                window.location.href = 'http://' + window.location.hostname + '/';
            },
            error: function (response) {
                errors = Object.keys(response.responseJSON.errors);
                errors.forEach(error => {
                    $('#register-form-data #'+ error + '_error strong' ).html(response.responseJSON.errors[error]) ;
                    $('#register-form-data #'+ error + '_error' ).show();
                });
            }
        });
    });
});
