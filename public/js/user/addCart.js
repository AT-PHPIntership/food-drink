var itemCart = [];
var item = [];
var cartProduct = [];
var n = 0;
function addCart(idProduct, nameProduct, priceProduct, imgProduct) {
  item = {
    id: idProduct,
    name: nameProduct,
    price: priceProduct,
    img_url: imgProduct,
    count: 1
  };
  var exists = false;
  if (typeof(Storage) !== 'undefined') {
    if (localStorage.count) {
      document.getElementById('number-item').innerHTML = localStorage.count;
    }
    if (localStorage.carts) {
      cartProduct = JSON.parse(localStorage.carts);
      if (cartProduct.length > 0) {
        $.each(cartProduct, function(index, value) {
          itemCart = {
            id: value.id,
            name: value.name,
            price: value.price,
            img_url: value.img_url,
            count: value.count
          }
          if(value.id === item.id) {
            value.count++;
            exists = true;
            return false;
          }
        });
      }
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
