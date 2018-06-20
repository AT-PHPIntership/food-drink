// the function is Login user 
$( document ).ready(function() {
    $('#login-form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/api/login',
            data: ({
                email: $('#session_email').val(),
                password: $('#session_password').val()
            }),
            success: function (data){
                window.localStorage.setItem('access_token', data.data.token);
                window.location.href = 'http://' + window.location.hostname + '/';
            },
            error: function (data) {
                document.getElementById("login-error").innerHTML = data.responseJSON.error;
            }
        });
    });
});
