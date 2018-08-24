var data_user = JSON.parse(localStorage.getItem('data'));
function infoUser() {
  $.ajax({
    type: 'GET',
    url: '/api/profile',
    headers: { 'authorization': 'Bearer '+ localStorage.getItem('access_token') },
    success: function (response) {
      var shippingAddresses = response.data.user.shipping_addresses;
      var html = '';
      $('#name').val(response.data.user.name);
      $('#address').val(response.data.user.user_info.address);
      $('#phone').val(response.data.user.user_info.phone);
      $('.avatar-edit').attr('src',response.data.user.user_info.avatar_url);
      shippingAddresses.forEach(shipping => {
        html += '<option>'+ shipping.address +'</option>'
      });
      $('#address-shipping').html(html);
    }
  });
}
function editUser() {
  $('#form-update-user').submit(function(event) {
    event.preventDefault();
    formData = new FormData($('#form-update-user')[0]);
    if ($('#password').val() == ''){
      formData.delete('password');
    }
    formData.append('_method', 'put');
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
