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
      <td class="price">'+ Lang.get('product.user.money') +''+value.price+'</td>\
      <td class="qty">'+value.count+'</td>\
      <td class="price">'+ Lang.get('product.user.money') +''+total+'</td>\
    </tr>';
  })
  $('#show-cart').html(html);
  $('.sub-total').html(subTotal);
  htmlUser += '<div class="col-sm-12">\
    <p><i class="fa fa-check-circle text-primary"></i>'+Lang.get('order.user.create.your_name')+'<span>'+data_user.name+'</span></p>\
    <p><i class="fa fa-check-circle text-primary"></i>'+Lang.get('order.user.create.your_email')+'<span>'+data_user.email+'</span></p>\
    <p><i class="fa fa-check-circle text-primary"></i>'+Lang.get('order.user.create.your_address')+'<span>'+data_user.user_info.address+'</span></p>\
    <p><i class="fa fa-check-circle text-primary"></i>'+Lang.get('order.user.create.your_phone')+'<span>'+data_user.user_info.phone+'</span></p>\
    <form action="">\
    <label>'+Lang.get('order.user.create.your_address')+'</label>\
    <input type="text" class="form-control input">\
    <button class="button"><i class="fa fa-angle-double-right"></i>&nbsp; <span>'+Lang.get('order.user.create.complete')+'</span></button>\
  </form>  </div>';
  $('.user-profile').html(htmlUser);
}
$(document).ready(function() {
  if (typeof(Storage) !== 'undefined') {
    if (localStorage.carts) {
      cartProduct = JSON.parse(localStorage.carts);
      itemCart(cartProduct);
    }
  }
})
