var itemCart = [];
var item = [];
var cartProduct = [];
var n = 0;
function addCart(idProduct, nameProduct, imgProduct) {
  item = {
    id: idProduct,
    name: nameProduct,
    img_url: imgProduct,
    count: 1
  };
  var exists = false;
  
  if (typeof(Storage) !== 'undefined') {
    // if(localStorage.count != null) {
    //   n = localStorage.count;
    //   document.getElementById('number-item').innerHTML = localStorage.count;
    // }
    if(localStorage.carts) {
      cartProduct = JSON.parse(localStorage.carts);
      if(cartProduct.length > 0) {
        // document.getElementById('number-item').innerHTML=cartProduct.length;
        $.each(cartProduct, function(index, value) {
          itemCart = {
            id: value.id,
            name: value.name,
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
  }
  // localStorage.setItem('count', n);
  localStorage.setItem('carts', JSON.stringify(cartProduct));
}
