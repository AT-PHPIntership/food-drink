const PENDING = 1;
const ACCEPTED = 2
const REJECTED = 3;
const RECEIVED = 5;
$(document).ready(function () {
  $.ajax({
    type: 'GET',
    url: '/api/orders',
    headers: { 'authorization': 'Bearer '+ localStorage.getItem('access_token') },
    success: function (response){
      getListOrder(response);
    }
  });
});

function getListOrder(response) {
  var html;
  $.each(response.data.data, function (index, order) {
    switch (order.status) {
      case PENDING :
        statusOrder = Lang.get('order.user.index.pending');
        break;
      case ACCEPTED :
        statusOrder = Lang.get('order.user.index.accepted');
        break;
      case REJECTED :
        statusOrder = Lang.get('order.user.index.rejected');
        break;
      case RECEIVED :
        statusOrder = Lang.get('order.user.index.received');
        break;
      default:
        statusOrder = '';
        break;
    }
    no = '<td class="cart_product">'+ (index + 1) +'</td>';
    time = '<td class="cart_description">'+ order.created_at +'</td>';
    total = '<td class="price">'+ Lang.get('product.user.money') + order.total +'</td>';
    note = '<td class=cart_description">No</td>';
    status = '<td class="qty">'+ statusOrder +'</td>';
    if (order.status == PENDING) {
      action = '<td class="qty function">\
                  <a href="">'+ Lang.get('order.user.index.detail') +'</a>\
                  <a href="">'+ Lang.get('order.user.index.cancel') +'</a>\
                </td>';
    } else {
      action = '<td class="qty function"><a href="">'+ Lang.get('order.user.index.detail') +'</a></td>';
    }
    html += '<tr>'+ no + time + total + note + status + action +'</tr>';
  });
  $('#show-orders').append(html);
}