var idCateogryFood = 1;
var idCategoryDrink = 2;
var limit = 8;

//Top 4 New Product
$('document').ready(function () {
  $.get('api/products?sort=created_at&order=desc&limit=' + limit, function(data){
    data.data.data.forEach(element => {
      if(typeof element.images[0] === 'undefined') {
        element.images[0] = {
          'image_url': 'https://image.ibb.co/dqd4QJ/default_product.jpg'
        };
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
      $('#new-product').append(
        '<li class="item col-lg-3 col-md-3 col-sm-6 col-xs-6 ">\
          <div class="product-item">\
            <div class="item-inner">\
              <div class="product-thumbnail">\
                <div class="pr-img-area"> <a title="'+ element.name +'" href="single_product.html">\
                  <figure> <img class="first-img" src="'+ element.images[0].image_url +'" alt=""> <img class="hover-img" src="'+ element.images[0].image_url +'" alt=""></figure>\
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
  });
});

//Top 4 Rate Product
$('document').ready(function () {
  $.get('api/products?sort=avg_rate&order=desc&limit=' + limit, function(data){
    data.data.data.forEach(element => {
      if(typeof element.images[0] === 'undefined') {
        element.images[0] = {
          'image_url': 'https://image.ibb.co/dqd4QJ/default_product.jpg'
        };
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
      $('#rate-product').append(
        '<li class="item col-lg-3 col-md-3 col-sm-6 col-xs-6 ">\
          <div class="product-item">\
            <div class="item-inner">\
              <div class="product-thumbnail">\
                <div class="pr-img-area"> <a title="'+ element.name +'" href="single_product.html">\
                  <figure> <img class="first-img" src="'+ element.images[0].image_url +'" alt=""> <img class="hover-img" src="'+ element.images[0].image_url +'" alt=""></figure>\
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
  });
});

//show product by category food
$('document').ready(function () {
  $.get('/api/products?category=' + idCateogryFood, function(data){
    data.data.data.forEach(element => {
      if(typeof element.images[0] === 'undefined') {
        element.images[0] = {
          'image_url': 'https://image.ibb.co/dqd4QJ/default_product.jpg'
        };
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
      $('#food-product').append(
        '<li class="item col-lg-3 col-md-3 col-sm-6 col-xs-6 ">\
          <div class="product-item">\
            <div class="item-inner">\
              <div class="product-thumbnail">\
                <div class="pr-img-area"> <a title="'+ element.name +'" href="single_product.html">\
                  <figure> <img class="first-img" src="'+ element.images[0].image_url +'" alt=""> <img class="hover-img" src="'+ element.images[0].image_url +'" alt=""></figure>\
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
  });
});

//show product by category drink
$('document').ready(function () {
  $.get('/api/products?category=' + idCategoryDrink, function(data){
    data.data.data.forEach(element => {
      if(typeof element.images[0] === 'undefined') {
        element.images[0] = {
          'image_url': 'https://image.ibb.co/dqd4QJ/default_product.jpg'
        };
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
      $('#drink-product').append(
        '<li class="item col-lg-3 col-md-3 col-sm-6 col-xs-6 ">\
          <div class="product-item">\
            <div class="item-inner">\
              <div class="product-thumbnail">\
                <div class="pr-img-area"> <a title="'+ element.name +'" href="single_product.html">\
                  <figure> <img class="first-img" src="'+ element.images[0].image_url +'" alt=""> <img class="hover-img" src="'+ element.images[0].image_url +'" alt=""></figure>\
                  </a>\
                  <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span>'+ Lang.get('home.user.main.add_to_cart') +'</span> </button>\
                </div>\
              </div>\
              <div class="item-info">\
                <div class="info-inner">\
                  <div class="item-title"> <a title="'+ element.name +'" href="">'+ element.name +' </a> </div>\
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
  });
});
