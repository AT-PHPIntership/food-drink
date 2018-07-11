var dataUser = JSON.parse(localStorage.getItem('data'));
var order;
var arrPathName = location.pathname.split("/");
var id = arrPathName[2];
function showUser() {
  var html = '';
  $('#name-user').text(dataUser.name);
  $('#email-user').text(dataUser.email);
  $('#address-user').text(dataUser.user_info.address);
  $('#phone-user').text(dataUser.user_info.phone);
  //show validation address
  html = '<span id="address_error" class="help-block" hidden>\
            <strong class="text-danger"></strong>\
          </span>';
  $('#validation-address').html(html);
}

function getDetailOrder() {
  var total = 0;
  var subTotal = 0;
  var show = '';
  $.ajax({
    type: 'GET',
    url: '/api/orders/'+ id,
    headers: { 'Authorization': 'Bearer '+ localStorage.getItem('access_token') },
    success: function (response){
      var html;
      order = response.data.order_details.data;
      if (response.data.order.status_order != 'pending') {
        window.location.href = '/';
      }
      $('#address').val(response.data.order.address);
      $.each(order, function (index, orderDetail) {
        total = orderDetail.price * orderDetail.quantity;
        subTotal = subTotal + total;
        html += '<tr id="del-item'+ orderDetail.id +'">\
                  <td class="cart_product"><img src="'+ orderDetail.image_url +'" alt="Product"></td>\
                  <td class="qty">'+ orderDetail.name_product +'</td>\
                  <td class="price">'+ Lang.get('product.user.money')+ orderDetail.price +'</td>\
                  <td class="qty"><input id="quantity'+ orderDetail.id +'" class="form-control input-sm" type="number" min="1" value="'+ orderDetail.quantity +'" onchange="changeQuantity()"></td>\
                  <td class="total">'+ Lang.get('product.user.money')+'<span id="total-item'+ orderDetail.id +'">'+ total +'</span></td>\
                  <td class="action del-item-cart" data-id="'+ orderDetail.id +'"><i class="fa fa-times-circle"></i></td>\
                </tr>';
      });
      $('#order-detail').html(html);
      $('.sub-total').html(subTotal);
      $.each(order, function (index, orderDetail) {
        changeQuantity(orderDetail.id, orderDetail.price);
        //show validation product
        show += '<span id="'+ index +'_error" class="help-block" hidden>\
                  <strong class="text-danger"></strong>\
                </span>';
        index++;
        $('#form-validation').append(show);
      });
    },
  });
}

function changeQuantity(id, price) {
  $(document).on('change', '#quantity'+ id, function() {
    var totalOld = $('#total-item'+ id).text();
    var subTotalOld = $('#subTotal').text();
    var subTotalNew = subTotalOld - totalOld;
    var qty = $('#quantity'+ id).val();
    var totalNew = parseInt(qty) * price;
    $('#total-item'+ id).text(totalNew)
    subTotalNew = subTotalNew + totalNew;
    $('#subTotal').text(subTotalNew);
  });
}

$(document).ready(function() {
  showUser();
  getDetailOrder();
  $(document).on('click', '.del-item-cart', function(event) {
    event.preventDefault();
    var id = $(this).data("id");
    var to = $('#total-item'+ id).text();
    var sub = $('#subTotal').text();
    subT = parseInt(sub) - parseInt(to);
    $('.sub-total').html(subT);
    $('#del-item'+ id).remove();
  });
  $(document).on('click', '#edit-order', function(event) {
    event.preventDefault();
    var data = [];
    var orderDetailData;
    order.forEach(order => {
      orderDetailData = {};
      var quantity = $('#quantity'+ order.id).val();
      if (quantity > 0) {
        orderDetailData.id = order.product_id;
        orderDetailData.quantity = parseInt(quantity);
        data.push(orderDetailData);
      }
    });
    $.ajax({
      type: 'PUT',
      url: '/api/orders/'+ id,
      headers: {
        Accept: 'application/json',
        Authorization: 'Bearer ' + localStorage.getItem('access_token')
      },
      data: {
        address: $('#address').val(),
        product: data
      },
      success: function (response){
        window.location.href = '/';
      },
      error: function (response) {
        errors = Object.keys(response.responseJSON.errors);
        errors.forEach(error => {
          errorCheck = error.split('.');
          if (errorCheck[0] == 'product') {
            $('#'+ errorCheck[1] + '_error strong').html(response.responseJSON.errors[error]) ;
            $('#'+ errorCheck[1] + '_error' ).show();  
          } else {
            $('#'+ error + '_error strong').html(response.responseJSON.errors[error]) ;
            $('#'+ error + '_error' ).show();
          }
        });
      }
    });
  });
});
