var dataUser = JSON.parse(localStorage.getItem('data'));
var getOrder;
var arrPathName = location.pathname.split("/");
var id = arrPathName[2];
function getUser() {
  $('#name-user').text(dataUser.name);
  $('#email-user').text(dataUser.email);
  $('#address-user').text(dataUser.user_info.address);
  $('#phone-user').text(dataUser.user_info.phone);
}

function getListOrderDetail() {
  var total = 0;
  var subTotal = 0;
  $.ajax({
    type: 'GET',
    url: '/api/orders/'+ id,
    headers: { 'Authorization': 'Bearer '+ localStorage.getItem('access_token') },
    success: function (response){
      var html;
      getOrder = response.data.data;
      localStorage.setItem('orderDetails', JSON.stringify(getOrder));
      orderDetails = JSON.parse(localStorage.orderDetails);
      $.each(orderDetails, function (index, orderDetail) {
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
      $.each(orderDetails, function (index, orderDetail) {
        changeQuantity(orderDetail.id, index);
      });
      $('.sub-total').html(subTotal);
    },
  });
}

function changeQuantity(id,) {
  $(document).on('change', '#quantity'+id, function() {
    var qty = $('#quantity'+id).val();
    console.log(qty);
    
    // if (qty > 0) {
    //   orderDetails[index]['quantity'] = parseInt(orderDetails);
    //   localStorage.setItem('orderDetails', JSON.stringify(orderDetails));
    //   getListOrderDetail();
    // }
  });
}

$(document).ready(function() {
  getUser();
  getListOrderDetail();
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
    orderDetails.forEach(order => {
      orderDetailData = {};
      var quantity = $('#quantity'+ order.id).val();
      if (quantity) {
        orderDetailData.id = order.id;
        orderDetailData.quantity = parseInt(quantity);
        data.push(orderDetailData);
      }
    });

    // console.log(data);
    // $.ajax({
    //   type: 'PUT',
    //   url: '/api/orders/'+ id,
    //   headers: { 'authorization': 'Bearer '+ localStorage.getItem('access_token') },
    //   data: {
    //     address:  $('#address').val(),
    //     product: data
    //   },
    //   success: function (response){
        
    //   }
    // });
  });
});
