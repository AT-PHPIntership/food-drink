var url = '/api'+ window.location.pathname;
var item = [];
var cartProduct = [];
var n = 0;

function appendHtml(response) {
  var rateStar = '';
  img_url = '../images/products/default-product.jpg';
  if (typeof response.data.images[0] !== 'undefined') {
    img_url = response.data.images[0].image_url;
  }
  var rate = Math.round(response.data.avg_rate);
  for (i = 1; i <= 5 ; i++) {
    if (i <= rate) {
      rateStar += '<i class="fa fa-star"></i>';
    } else {
      rateStar += '<i class="fa fa-star-o"></i>';
    }
  }
  var html = '<div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">\
                <div class="large-image">\
                    <img class="zoom-img" src="'+ img_url +'" alt="products"> \
                </div>\
              </div>\
              <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">\
                  <div class="product-name">\
                    <h1>'+response.data.name+'</h1>\
                  </div>\
                  <div class="price-box">\
                    <p class="special-price"><span class="price">'+Lang.get('product.user.money') + response.data.price+' </span> </p>\
                  </div>\
                  <div class="ratings">\
                    <div class="rating">\
                      '+rateStar+'\
                    </div>\
                    <p class="rating-links"> <span class="separator">'+ Lang.get('product.user.product.rate') +'</span> </p>\
                  </div>\
                  <div class="short-description">\
                    <h2>'+ Lang.get('product.user.product.quick_view') +'</h2>\
                    <p>'+response.data.preview+'</p>\
                  </div>\
                  <div class="product-variation">\
                    <form action="#" method="post">\
                      <div class="cart-plus-minus">\
                        <label for="qty">'+Lang.get('product.user.product.quantity')+'</label>\
                        <div class="numbers-row">\
                        <input type="number" class="qty" title="Qty" value="1" id="qty" name="qty" min="1" max="'+response.data.quantity+'">\
                      </div>\
                      <button class="button pro-add-to-cart" onclick="addCart('+ response.data.id +', \''+response.data.name +'\', \''+response.data.price +'\', '+response.data.quantity +', \''+ img_url +'\')" type="button">\
                        <span><i class="fa fa-shopping-cart"></i> '+ Lang.get('product.user.add_to_cart') +'</span>\
                      </button>\
                    </form>\
                  </div>\
              </div>';
  $('.product-view-area').html(html);
}
function appendDescription(response) {
  var html = '<div class="tab-pane fade in active" id="description">\
                <div class="std">\
                  <p>'+response.data.description+'</p>\
                </div>\
              </div>';
  $('#description').html(html);
}
$(document).ready(function () {
    $.get(url, function(response) {
        appendHtml(response);
        appendDescription(response);
    })
});
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
    count: $('#qty').val(),
  };
  if (localStorage.carts) {
    cartProduct = JSON.parse(localStorage.carts);      
    $.each(cartProduct, function(index, value) {
      if(value.id === item.id) {
        value.count = parseInt(value.count) + parseInt(item.count);
        exists = true;
        return false;
      }
    });
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
