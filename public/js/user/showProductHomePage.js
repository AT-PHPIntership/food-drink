var idCategoryFood = 1;
var idCategoryDrink = 2;
var limitTop = 8;
var limitCategory = 4;
var rate = 0;

$(document).ready(function () {
  //Top 8 New Product
  $.get('api/products?sort=created_at&order=desc&limit=' + limitTop, function(response){
    appendHtml('new-product', response);
  });

  //Top 8 Rate Product
  $.get('api/products?sort=avg_rate&order=desc&limit=' + limitTop, function(response){
    appendHtml('rate-product', response);
  });
  //show product by category food
  $.get('/api/products?category='+ idCategoryFood +'&limit='+ limitCategory, function(response){
    getProductList('food-product', 'view-more-food', response);
  });
  viewMore('view-more-food', 'food-product');
  
  //show product by category drink
  $.get('/api/products?category='+ idCategoryDrink +'&limit='+ limitCategory, function(response){
    getProductList('drink-product', 'view-more-drink', response);
  });
  viewMore('view-more-drink', 'drink-product');
});

// next
function viewMore(idNext, id) {
  $('#'+idNext).click(function (event) {
    event.preventDefault();
    url_next = $('#'+idNext).attr('href');
    $.get(url_next, function(response){
      getProductList(id, idNext, response);
    });
  })
}

// get list product
function getProductList(id, idNext, response) {
  if (response.data['next_page_url'] != null) {
    $('#'+idNext).show();
    $('#'+idNext).attr('href', response.data['next_page_url']);
  }
  else {
    $('#'+idNext).hide();
  }
  appendHtml(id, response);
}

//append Html
function appendHtml(id, response) {
  var html = '';
  response.data.data.forEach(element => {
    var stars = '';
    img = 'default_product.jpg';
    img_url = 'https://image.ibb.co/dqd4QJ/default_product.jpg';
    if (typeof element.images[0] !== 'undefined') {
      img = element.images[0].image;
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
    html +=  '<li class="item col-lg-3 col-md-3 col-sm-6 col-xs-6 ">\
              <div class="product-item">\
                <div class="item-inner">\
                  <div class="product-thumbnail">\
                    <div class="pr-img-area"> <a title="'+ element.name +'" href="/products/'+ element.id +'">\
                      <figure> <img class="first-img" src="'+ img_url +'" alt=""> <img class="hover-img" src="'+ img_url +'" alt=""></figure>\
                      </a>\
                      <button type="button" class="add-to-cart-mt"  onclick="addCart('+ element.id +', \''+element.name +'\', \''+element.price +'\', '+element.quantity +', \''+ img_url +'\',\''+ img +'\')"> <i class="fa fa-shopping-cart"></i><span>'+ Lang.get('home.user.main.add_to_cart') +'</span> </button>\
                    </div>\
                  </div>\
                  <div class="item-info">\
                    <div class="info-inner">\
                      <div class="item-title"> <a title="'+ element.name +'" href="/products/'+ element.id +'">'+ element.name +' </a> </div>\
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
            </li>';
  });
  $('#'+ id).html(html);
}
