function sendMail() {
    $('.login-form').submit(function(event) {
        alert(Lang.get('forgot-password.please_wait'));
        $('.button').attr('disabled', true);
        $('#mail').attr('disabled', true);
        event.preventDefault();
        url = '/api/password/email';
        html = '';
        $.ajax({
            url: url,
            type: 'POST',
            headers: {
                'Accept': 'application/json',
            },
            data: {
                email: $('#mail').val(),
            },
            success: function(response) {
                html += '<div class="box-authentication" style="background-color:#96CA7C; width:500px; height:100px; border:2px solid green";>\
                    <p style="text-align:center; font-size:15px; margin:10px 0 10px;"> '+response.data.message+' </p>\
                    <p style="text-align:center; font-size:15px; margin:10px 0 10px;"> '+Lang.get('forgot-password.please_check_mail')+' </p>\
                    </div>';
                $('.account-login').html(html);
            },
            error: function(response) {
                errorMessage = '';
                if (response.responseJSON.error) {
                    errorMessage += response.responseJSON.error.message;
                    $('.button').attr('disabled', false);
                    $('#mail').attr('disabled', false);
                }
                if (response.responseJSON.errors) {
                    errors = Object.keys(response.responseJSON.errors);
                    errors.forEach(error => {
                        errorMessage += response.responseJSON.errors[error];
                        $('.button').attr('disabled', false);
                        $('#mail').attr('disabled', false);
                    });
                }
                $('#error-email strong').html(errorMessage);
                $('#error-email').show();
            }
        })
    });
}
function resetMail() {
    
}
$(document).ready(function() {
    sendMail();
})