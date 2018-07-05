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
  $(document).on('click', '#show-orders tr a[orderId]' ,function (event){ 
    event.preventDefault();
    if (confirm(Lang.get('order.user.cancel.are_your_sure'))) {
      $('#note-cancel-order-submit').attr('order-id', $(this).attr('orderId'));
      $('#note-cancel-order .modal-body .form-group textarea').attr('id', 'note'+ $(this).attr('orderId'));
      $('#note-cancel-order').modal('show');
    }
  });

  $(document).on('click', '#note-cancel-order .modal-body button[id="note-cancel-order-submit"][order-id]', function(event) {
    event.preventDefault();
    cancelOrder($(this).attr('order-id'));
    $('#note-cancel-order').modal('hide');
  });
});

function cancelOrder(orderId) {
  var note = '';
  if ($('#note'+ orderId).val()) {
    note = $('#note'+ orderId).val();
  }
  $.ajax({
    url: '/api/orders/'+ orderId +'/cancel',
    type: "put",
    headers: {
      'Accept': 'application/json',
      'Authorization': 'Bearer ' + localStorage.getItem('access_token')
    },
    data: {
      content: note,
    },
    success: function(response) {
      getListOrder(url)
      $('.table-responsive .alert-info').show();
    },
    error: function(response) {
      errorMessage = Lang.get('order.user.cancel.not_successfully') +'<br/>'+ response.responseJSON.message +'<br/>';
      if (response.responseJSON.errors) {
        errors = Object.keys(response.responseJSON.errors);
        errors.forEach(error => {
          errorMessage += response.responseJSON.errors[error] + '<br/>';
        });
      }
      $('.order-detail-content .alert-danger').html(errorMessage);
      $('.order-detail-content .alert-danger').show();
    }
  });
}

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
    no = '<td class="cart_product">'+ (parseInt(index) + number + 1) +'</td>';
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
                  <a orderId="'+ order.id +'" class="cancel-order">'+ Lang.get('order.user.index.cancel') +'</a>\
                </td>';
    } else {
      action = '<td class="qty function"><a href="/orders/'+ order.id +'">'+ Lang.get('order.user.index.detail') +'</a></td>';
    }
    html += '<tr>'+ no + time + total + note + status + address + action +'</tr>';
  });
  $('#show-orders').html(html);
}
