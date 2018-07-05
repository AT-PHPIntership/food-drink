var data_user = JSON.parse(localStorage.getItem('data'));
function infoUser() {
    $('#name').val(data_user.name);
    $('#address').val(data_user.user_info.address);
    $('#phone').val(data_user.user_info.phone);
    $('.avatar-edit').attr('src',data_user.user_info.avatar_url);
}
function editUser() {
    $('#form-update-user').submit(function(event) {
        event.preventDefault();
        formData = new FormData($('#form-update-user')[0]);
        formData.append('_method', 'put')
        $.ajax({
            type: 'post',
            url: '/api/profile',
            contentType: false,
            processData: false,
            headers: {
                Accept: 'application/json',
                Authorization: 'Bearer ' +localStorage.getItem('access_token'),
            },
            data: formData,
            success: function(data) {
                localStorage.setItem('data', JSON.stringify(data.data))
                window.location.href='/';
            },
            error: function(data) {
                errors = Object.keys(data.responseJSON.errors);
                errors.forEach(error => {
                    $('#'+error + '_error strong').html(data.responseJSON.errors[error]) ;
                    $('#'+error + '_error' ).show();
                });
            }
        })
    })
}
$(document).ready(function () {
    infoUser();
    editUser();
});
