const PENDING = 1;
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
    var content = '';
    no = '<td class="cart_product">'+ (index + 1) +'</td>';
    time = '<td class="cart_description">'+ order.created_at +'</td>';
    total = '<td class="price">'+ Lang.get('product.user.money') + order.total +'</td>';
    if (order.note) {
      content = order.note.content;
    }
    note = '<td class=cart_description">'+ content +'</td>';
    status = '<td class="qty">'+ order.status +'</td>';
    address = '<td>'+ order.address +'</td>'
    if (order.status == "pending") {
      action = '<td class="qty function">\
                  <a href="/orderUser/'+ order.id +'">'+ Lang.get('order.user.index.detail') +'</a>\
                  <a href="">'+ Lang.get('order.user.index.edit') +'</a>\
                  <a href="">'+ Lang.get('order.user.index.cancel') +'</a>\
                </td>';
    } else {
      action = '<td class="qty function"><a href="/orderUser/'+ order.id +'">'+ Lang.get('order.user.index.detail') +'</a></td>';
    }
    html += '<tr>'+ no + time + total + note + status + address + action +'</tr>';
  });
  $('#show-orders').append(html);
}
