var idCategoryFood = 1;
var idCategoryDrink = 2;
var limit = 8;
var id = '';

//Top 8 New Product
$('document').ready(function () {
  $.get('api/products?sort=created_at&order=desc&limit=' + limit, function(response){
    id = 'new-product';
    appendHtml(id, response);
  });
});

//Top 8 Rate Product
$('document').ready(function () {
  $.get('api/products?sort=avg_rate&order=desc&limit=' + limit, function(response){
    id = 'rate-product';
    appendHtml(id, response);
  });
});

//show product by category food
$('document').ready(function () {
  $.get('/api/products?category=' + idCategoryFood, function(response){
    id = 'food-product';
    appendHtml(id, response);
  });
});

//show product by category drink
$('document').ready(function () {
  $.get('/api/products?category=' + idCategoryDrink, function(response){
    id = 'drink-product';
    appendHtml(id, response);
  });
});

//append Html
function appendHtml(id, response) {
  response.data.data.forEach(element => {
    img_url = 'https://image.ibb.co/dqd4QJ/default_product.jpg';
    if (typeof element.images[0] !== 'undefined') {
      img_url = element.images[0].image_url;
    }
    let stars = '';
    let rate = Math.round(element.avg_rate);
    for (i = 1; i <= 5 ; i++) {
      if (i <= rate) {
        stars += '<i class="fa fa-star"></i>';
      } else {
        stars += '<i class="fa fa-star-o"></i>'
      }
    }
    $('#'+id+'').append(
      '<li class="item col-lg-3 col-md-3 col-sm-6 col-xs-6 ">\
        <div class="product-item">\
          <div class="item-inner">\
            <div class="product-thumbnail">\
              <div class="pr-img-area"> <a title="'+ element.name +'" href="single_product.html">\
                <figure> <img class="first-img" src="'+ img_url +'" alt=""> <img class="hover-img" src="'+ img_url +'" alt=""></figure>\
                </a>\
                <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span>'+ Lang.get('home.user.main.add_to_cart') +'</span> </button>\
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