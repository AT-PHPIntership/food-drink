const LIMIT = 5;
var url = '/api'+ window.location.pathname +'?unit='+ LIMIT;
$(document).ready(function () {
  getListOrderDetail(url);
  //next
  $('#next-order-detail').click(function (event) {
    event.preventDefault();
    url_next = $('#next-order-detail').attr('href');
    getListOrderDetail(url_next);
  });
  //prev
  $('#prev-order-detail').click(function (event) {
    event.preventDefault();
    url_prev = $('#prev-order-detail').attr('href');
    getListOrderDetail(url_prev);
  });
});

function getListOrderDetail(url) {
  $.ajax({
    type: 'GET',
    url: url,
    headers: { 'Authorization': 'Bearer '+ localStorage.getItem('access_token') },
    success: function (response){
      if (response.data['next_page_url'] != null) {
        $('#next-order-detail').show();
        $('#next-order-detail').attr('href', response.data['next_page_url']);
      } else {
        $('#next-order-detail').hide();
      }
      if (response.data['prev_page_url'] != null) {
        $('#prev-order-detail').show();
        $('#prev-order-detail').attr('href', response.data['prev_page_url']);
      } else {
        $('#prev-order-detail').hide();
      }
      appendOrderDetail(response);
    },
  });
}

function appendOrderDetail(response) {
  var html;
  $.each(response.data.data, function (index, orderDetail) {
    html += '<tr>\
              <td class="qty">'+ (parseInt(index) + 1) +'</td>\
              <td class="cart_product"><img src="'+ orderDetail.image_url +'" alt="Product"></td>\
              <td class="cart_description">'+ orderDetail.name_product +'</td>\
              <td class="price">'+ Lang.get('product.user.money')+ orderDetail.price +'</td>\
              <td class="qty">'+ orderDetail.quantity +'</td>\
            </tr>';
  });
  $('#show-order-detail').html(html);
}
