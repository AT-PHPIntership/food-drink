cartProduct = JSON.parse(localStorage.carts);
var products = JSON.parse(localStorage.getItem('carts'));
  var order = [];
  products.forEach(function (product) {
    product_data = {};
    product_data.id = product.id;
    product_data.name_product = product.name;
    product_data.image = product.image;
    product_data.quantity = product.count;
    product_data.price = product.price;
    order.push(product_data);
  });
function itemCart(cartProduct) {
  var total = 0;
  var subTotal = 0;
  var html = '';
  var htmlSubtotal = '';
  var htmlUser = '';
  var data_user = JSON.parse(localStorage.getItem('data'));
  $.each(cartProduct, function(index, value) {
    total = value.count * value.price;
    subTotal += total;
    html += '<tr>\
      <td class="cart_product"><img src="'+value.img_url+'" alt="Product"></td>\
      <td class="cart_description">'+value.name+'</td>\
      <td class="price" value="22">'+ Lang.get('product.user.money') +''+value.price+'</td>\
      <td class="qty">'+value.count+'</td>\
      <td class="total" value="'+total+'">'+ Lang.get('product.user.money') +''+total+'</td>\
    </tr>';
  })
  $('#show-cart').html(html);
  $('.sub-total').attr('value',subTotal);
  $('.sub-total').html(subTotal);
  htmlUser += '<div class="col-sm-12">\
    <p><i class="fa fa-check-circle text-primary"></i>'+Lang.get('order.user.create.your_name')+'<span>'+data_user.name+'</span></p>\
    <p><i class="fa fa-check-circle text-primary"></i>'+Lang.get('order.user.create.your_email')+'<span>'+data_user.email+'</span></p>\
    <p><i class="fa fa-check-circle text-primary"></i>'+Lang.get('order.user.create.your_address')+'<span>'+data_user.user_info.address+'</span></p>\
    <p><i class="fa fa-check-circle text-primary"></i>'+Lang.get('order.user.create.your_phone')+'<span>'+data_user.user_info.phone+'</span></p>\
    <form>\
    <label>'+Lang.get('order.user.create.your_address')+'</label>\
    <input type="text" class="form-control input" id="address">\
    <button class="button" id="add-order"><i class="fa fa-angle-double-right"></i>&nbsp; <span>'+Lang.get('order.user.create.complete')+'</span></button>\
  </form>  </div>';
  $('.user-profile').html(htmlUser);
}
function addOrder() {
  $(document).on('click', '#add-order', function (event) {
    event.preventDefault();
    $.ajax({
      type: 'POST',
      url: '/api/orders',
      headers: {
        Accept: 'application/json',
        Authorization: 'Bearer ' +localStorage.getItem('access_token'),
      },
      data: {
        total: $('.sub-total').attr('value'),
        address: $('#address').val(),
        product: order,
      },
      success: function() {
        localStorage.removeItem('carts');
        localStorage.removeItem('count');
        window.location.href='/';
      },
      error: function(data) {
        alert(data.responseJSON.message);
      }
    })
  })
}
$(document).ready(function() {
  itemCart(cartProduct);
  addOrder();
})
