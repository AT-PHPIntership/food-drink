var item = [];
var cartProduct = [];
var n = 0;

$(document).ready(function () {
  numberItem();
  viewCart();
});

function numberItem() {
  if (localStorage.count) {
    document.getElementById('number-item').innerHTML = localStorage.count;
  }
}

function viewCart() {
  if (typeof(Storage) !== 'undefined') {
    if (localStorage.carts) {
      cartProduct = JSON.parse(localStorage.carts);
      var html = '';
      var subTotal = 0;
      var total = 0;
      $.each(cartProduct, function(index, value) {
        total = value.count*value.price;
        subTotal = subTotal + total;
        html += '<li class="item">\
                  <a href="products/'+ value.id +'" title="'+ value.name +'" class="product-image"><img src="'+ value.img_url +'" alt="'+ value.name +'" width="65"></a>\
                  <div class="product-details">\
                    <p class="product-name"><a href="products/'+ value.id +'">'+ value.name +'</a> </p>\
                    <strong>'+ value.count +'</strong> x <span class="price">'+ Lang.get('product.user.money')+ value.price +'</span>\
                  </div>\
                </li>';
      });
      $('#cart-sidebar').html(html);
      $('.top-subtotal .sub-total').text(subTotal);
    }
  }
}

function addCart(idProduct, nameProduct, priceProduct, quantityProduct, imgProduct) {
  var exists = false;
  item = {
    id: idProduct,
    name: nameProduct,
    price: priceProduct,
    quantity: quantityProduct,
    img_url: imgProduct,
    count: 1
  };
  if (typeof(Storage) !== 'undefined') {
    if (localStorage.carts) {
      cartProduct = JSON.parse(localStorage.carts);
      $.each(cartProduct, function(index, value) {
        if(value.id === item.id) {
          value.count++;
          exists = true;
          return false;
        }
      });
    }
  }
  if(!exists) {
    cartProduct.push(item);
    localStorage.setItem('carts', JSON.stringify(cartProduct));
    n = cartProduct.length;
    localStorage.setItem('count', n);
  }
  numberItem();
  localStorage.setItem('carts', JSON.stringify(cartProduct));
  viewCart();
}
