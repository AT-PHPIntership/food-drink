var idCategoryFood = 1;
var idCategoryDrink = 2;
var limit = 8;
var rate = 0;

$(document).ready(function () {
  //Top 8 New Product
  $.get('api/products?sort=created_at&order=desc&limit=' + limit, function(response){
    appendHtml('new-product', response);
  });
  //Top 8 Rate Product
  $.get('api/products?sort=avg_rate&order=desc&limit=' + limit, function(response){
    appendHtml('rate-product', response);
  });
  //show product by category food
  $.get('/api/products?category=' + idCategoryFood, function(response){
    appendHtml('food-product', response);
  });
  //show product by category drink
  $.get('/api/products?category=' + idCategoryDrink, function(response){
    appendHtml('drink-product', response);
  });
});

//append Html
function appendHtml(id, response) {
  response.data.data.forEach(element => {
    var stars = '';
    img_url = 'https://image.ibb.co/dqd4QJ/default_product.jpg';
    if (typeof element.images[0] !== 'undefined') {
      img_url = element.images[0].image_url;
    }
    rate = Math.round(element.avg_rate);
    for (i = 1; i <= 5 ; i++) {
      if (i <= rate) {
        stars += '<i class="fa fa-star"></i>';
      } else {
        stars += '<i class="fa fa-star-o"></i>';
      }
    }
    $('#'+id).append(
      '<li class="item col-lg-3 col-md-3 col-sm-6 col-xs-6 ">\
        <div class="product-item">\
          <div class="item-inner">\
            <div class="product-thumbnail">\
              <div class="pr-img-area"> <a title="'+ element.name +'" href="">\
                <figure> <img class="first-img" src="'+ img_url +'" alt=""> <img class="hover-img" src="'+ img_url +'" alt=""></figure>\
                </a>\
                <button type="button" class="add-to-cart-mt"  onclick="addCart('+ element.id +', \''+element.name +'\', \''+element.price +'\', '+element.quantity +', \''+ img_url +'\')"> <i class="fa fa-shopping-cart"></i><span>'+ Lang.get('home.user.main.add_to_cart') +'</span> </button>\
              </div>\
            </div>\
            <div class="item-info">\
              <div class="info-inner">\
                <div class="item-title"> <a title="'+ element.name +'" href="single_product.html">'+ element.name +' </a> </div>\
                <div class="item-content">\
                <div class="rating">' 
                + stars +
                '<span>('+ element.avg_rate +')</span>\
                </div>\
                  <div class="item-price">\
                    <div class="price-box"> <span class="regular-price"> <span class="price">'+ Lang.get('home.user.main.money') + element.price +'</span> </span> </div>\
                  </div>\
                </div>\
              </div>\
            </div>\
          </div>\
        </div>\
      </li>'
    );
  });
}
