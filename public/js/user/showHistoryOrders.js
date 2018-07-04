const PENDING = 1;
const limit = 5;
var url = '/api/orders?limit=' + limit;
$(document).ready(function () {
  getListOrder(url);
  //next
  $('#next-order').click(function (event) {
    event.preventDefault();
    url_next = $('#next-order').attr('href');
    getListOrder(url_next);
  });
  //prev
  $('#prev-order').click(function (event) {
    event.preventDefault();
    url_prev = $('#prev-order').attr('href');
    getListOrder(url_prev);
  });
});

function getListOrder(url) {
  $.ajax({
    type: 'GET',
    url: url,
    headers: { 'authorization': 'Bearer '+ localStorage.getItem('access_token') },
    success: function (response){
      if (response.data['next_page_url'] != null) {
        $('#next-order').show();
        $('#next-order').attr('href', response.data['next_page_url']);
      } else {
        $('#next-order').hide();
      }
      if (response.data['prev_page_url'] != null) {
        $('#prev-order').show();
        $('#prev-order').attr('href', response.data['prev_page_url']);
      } else {
        $('#prev-order').hide();
      }
      appendOrder(response);
    }
  });
}

function appendOrder(response) {
  var html;
  $.each(response.data.data, function (index, order) {
    var content = '';
    var number = limit * (response.data.current_page - 1);
    no = '<td class="cart_product">'+ (index + number + 1) +'</td>';
    time = '<td class="cart_description">'+ order.created_at +'</td>';
    total = '<td class="price">'+ Lang.get('product.user.money') + order.total +'</td>';
    if (order.note) {
      content = order.note.content;
    }
    note = '<td class=cart_description">'+ content +'</td>';
    status = '<td class="qty">'+ order.status_order +'</td>';
    address = '<td>'+ order.address +'</td>'
    if (order.status_order == "pending") {
      action = '<td class="qty function">\
                  <a href="/orders/'+ order.id +'">'+ Lang.get('order.user.index.detail') +'</a>\
                  <a href="">'+ Lang.get('order.user.index.edit') +'</a>\
                  <a href="">'+ Lang.get('order.user.index.cancel') +'</a>\
                </td>';
    } else {
      action = '<td class="qty function"><a href="/orders/'+ order.id +'">'+ Lang.get('order.user.index.detail') +'</a></td>';
    }
    html += '<tr>'+ no + time + total + note + status + address + action +'</tr>';
  });
  $('#show-orders').html(html);
}
