var item = [];
var cartProduct = [];
var n = 0;

function numberItem() {
  if (localStorage.count) {
    document.getElementById('number-item').innerHTML = localStorage.count;
  }
}
numberItem();

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
}
