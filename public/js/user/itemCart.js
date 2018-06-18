var arrCart = [];
var total = 0;
var lengthCart;
function itemCart() {
  if (localStorage.count) {
    document.getElementById('number-item').innerHTML = localStorage.count;
  }
  if (localStorage.carts === 'undefined') {
    lengthCart = 0;
  } else {
    arrCart = JSON.parse(localStorage.getItem('carts'));
    lengthCart = parseInt(arrCart.length);
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
