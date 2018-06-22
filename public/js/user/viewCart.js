$(document).ready(function() {
  if (typeof(Storage) !== 'undefined') {
    if (localStorage.carts) {
      cartProduct = JSON.parse(localStorage.carts);
      itemCart(cartProduct);
      $('.del-item-cart').click(function() {
        var index = $(this).data("index");
        if (confirm(msg = Lang.get('cart.are_you_sure'))) {
          cartProduct = JSON.parse(localStorage.carts);
          cartProduct.splice(index, 1);
          localStorage.setItem('carts', JSON.stringify(cartProduct));
          n = cartProduct.length;
          localStorage.setItem('count', n);
        }
        location.reload();
      });
    }
  }
});

function itemCart(cartProduct) {
  var total = 0;
  var subTotal = 0;
  $.each(cartProduct, function(index, value) {
    total = value.count*value.price;
    subTotal = subTotal + total;
    $('#show-cart tr').clone().attr({'style':'display:', 'id':value.id}).insertAfter('#show-cart');
    $('#'+value.id+' .cart_product img').attr('src', value.img_url);
    $('#'+value.id+' .cart_description p a').text(value.name);
    $('#'+value.id+' .price .price-product').text(value.price);
    $('#'+value.id+' .price .total-product').text(total);
    $('#'+value.id+' .qty input').attr('value', value.count);
    $('#'+value.id+' .qty input').attr('max', value.quantity);
    // addd index into button delete item cart
    $('#'+value.id+' .del-item-cart').attr('data-index', index);
    // add class change quantity
    $('#'+value.id+' .qty input').attr('id', 'change-qty'+value.id);
    if (value.quantity >= value.count) {
      $('#'+value.id+' .current').attr({'style':'display:none'});
      $('#'+value.id+' .availability').addClass('in-stock');
      $('#'+value.id+' .availability .label').text('In stock');
    } else {
      $('#'+value.id+' .current-product').text(value.quantity);
      $('#'+value.id+' .availability').addClass('out-of-stock');
      $('#'+value.id+' .availability .label').text('No stock');
    }
    changeQuantity(value.id, value.quantity, index);
  });
  $('.sub-total').text(subTotal);
}

function changeQuantity(id, quantity, index) {
  $(document).on('change', '#change-qty'+id, function(){
    qty = $('#change-qty'+id).val();
    if (quantity >= qty) {
      if (typeof(Storage) !== 'undefined') {
        if (localStorage.carts) {
          cartProduct = JSON.parse(localStorage.carts);
          if (qty > 0) {
            cartProduct[index]['count'] = parseInt(qty);
            console.log(cartProduct[index]);
            localStorage.setItem('carts', JSON.stringify(cartProduct));
            itemCart(cartProduct);
          } else {
            alert(Lang.get('cart.quantity_greater'));
          }
        }
      }
    } else {
      var greater = Lang.get('cart.not_exceed') + qty + Lang.get('cart.close')
      alert(greater);
    }
    location.reload();
  });
}
