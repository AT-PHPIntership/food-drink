var arrCart = [];
var total = 0;
var lengthCart;
var item = [];
var cartProduct = [];
var n = 0;

function numberItem() {
  if (localStorage.count) {
    document.getElementById('number-item').innerHTML = localStorage.count;
  }
}
numberItem();

function itemCart() {
  if (localStorage.carts) {
    arrCart = JSON.parse(localStorage.getItem('carts'));
    lengthCart = parseInt(arrCart.length);
  } else {
    lengthCart = 0;
  }
  for (let i = 0; i < lengthCart; i++) {
    var name, price, img_url, count;
    name = arrCart[i].name;
    price = arrCart[i].price;
    img_url = arrCart[i].img_url;
    count = arrCart[i].count;
    total = total + count*price;
    $('#cart-sidebar').append(
      '<li class="item odd">\
        <a href="" title="'+ name +'" class="product-image">\
          <img src="'+ img_url +'" alt="'+ name +'" width="65">\
        </a>\
        <div class="product-details">\
          <p class="product-name">\
            <a href="">'+ name +'</a>\
          </p>\
          <strong>'+ count +'</strong> x <span class="price">'+ Lang.get('home.user.main.money') + price +'</span> \
        </div>\
      </li>'
    );
  }
  document.getElementById('total-cart').innerHTML = total;
}
itemCart();

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
  numberItem();
  itemCart();
  if (typeof(Storage) !== 'undefined') {
    if (localStorage.carts) {
      cartProduct = JSON.parse(localStorage.carts);
      numberItem();
      itemCart();
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
    getcarts = JSON.parse(localStorage.carts);
    n = getcarts.length;
    localStorage.setItem('count', n);
  }
  localStorage.setItem('carts', JSON.stringify(cartProduct));
}
