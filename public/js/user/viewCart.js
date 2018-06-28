$(document).ready(function() {
  if (typeof(Storage) !== 'undefined') {
    if (localStorage.carts) {
      cartProduct = JSON.parse(localStorage.carts);
      itemCart(cartProduct);
      $(document).on('click', '.del-item-cart', function() {
        var index = $(this).data("index");
        if (confirm(msg = Lang.get('cart.are_you_sure'))) {
          cartProduct = JSON.parse(localStorage.carts);
          cartProduct.splice(index, 1);
          localStorage.setItem('carts', JSON.stringify(cartProduct));
          n = cartProduct.length;
          localStorage.setItem('count', n);
        }
        itemCart(cartProduct);
        location.reload();
      }); 
    }
  }
});

function itemCart(cartProduct) {
  var total = 0;
  var subTotal = 0;
  var html = '';
  $.each(cartProduct, function(index, value) {
    total = value.count*value.price;
    subTotal = subTotal + total;
    html += '<tr id="item-cart'+ value.id +'">\
              <td class="cart_product"><a href="products/'+ value.id +'"><img src="'+ value.img_url +'" alt="Product"></a></td>\
              <td class="cart_description"><p class="product-name"><a href="products/'+ value.id +'"> '+ value.name +'</a></p>\
              <td class="availability">\
                <span class="label"></span>\
                <p id="stock'+ value.id +'" class="current">'+ Lang.get('cart.number_product') +' <span class="current-product"></span>'+ Lang.get('cart.close') +'</p>\
              </td>\
              <td class="price"><span>'+ Lang.get('product.user.money') +'<span class="price-product"></span>'+ value.price +'</span></td>\
              <td class="qty"><input id="change-qty'+ value.id +'" class="form-control input-sm" value="'+ value.count +'" type="number" min="1" max="'+ value.quantity +'" onchange="changeQuantity()"></td>\
              <td class="price"><span>'+ Lang.get('product.user.money') +'<span class="total-product"></span>'+ total +'</span></td>\
              <td class="action del-item-cart" data-index="'+ index +'"><i class="fa fa-times-circle"></i></td>\
            </tr>';
  });
  $('#show-cart').html(html);
  $.each(cartProduct, function(index, value) {
    if (value.quantity >= value.count) {
      $('#stock'+ value.id).hide();
      $('#item-cart'+ value.id +' .availability').addClass('in-stock');
      $('#item-cart'+ value.id +' .availability .label').text('In stock');
    } else {
      $('#item-cart'+ value.id +' .current-product').text(value.quantity);
      $('#item-cart'+ value.id +' .availability').addClass('out-of-stock');
      $('#item-cart'+ value.id +' .availability .label').text('No stock');
    }
    changeQuantity(value.id, value.quantity, index);
  });
  $('.sub-total').text(subTotal);
}

function changeQuantity(id, quantity, index) {
  $(document).on('change', '#change-qty'+id, function(){
    var qty = $('#change-qty'+id).val();
    if (quantity >= qty) {
      if (typeof(Storage) !== 'undefined') {
        if (localStorage.carts) {
          cartProduct = JSON.parse(localStorage.carts);
          if (qty > 0) {
            cartProduct[index]['count'] = parseInt(qty);
            localStorage.setItem('carts', JSON.stringify(cartProduct));
            itemCart(cartProduct);
          } else {
            alert(Lang.get('cart.quantity_greater'));
          }
        }
      }
    } else {
      var greater = Lang.get('cart.not_exceed') + quantity + Lang.get('cart.close')
      alert(greater);
      location.reload();
    }
  });
}
