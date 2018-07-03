var url = '/api'+ window.location.pathname;
$(document).ready(function () {
  $.ajax({
    type: 'GET',
    url: url,
    headers: { 'Authorization': 'Bearer '+ localStorage.getItem('access_token') },
    success: function (response){
      getListOrderDetail(response);
    },
  });
});

function getListOrderDetail(response) {
  var html;
  $.each(response.data.data, function (index, orderDetail) {
    html += '<tr>\
              <td class="qty">'+ (index + 1) +'</td>\
              <td class="cart_product"><img src="'+ orderDetail.image_url +'" alt="Product"></td>\
              <td class="cart_description">'+ orderDetail.name_product +'</td>\
              <td class="price">'+ Lang.get('product.user.money')+ orderDetail.price +'</td>\
              <td class="qty">'+ orderDetail.quantity +'</td>\
              <td class="cart_description">'+ orderDetail.preview +'</td>\
            </tr>';
  });
  $('#show-order-detail').append(html);
}
