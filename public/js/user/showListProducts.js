var url = '/api/products';
function appendHtml(response) {
  let html = '';
  response.data.data.forEach(element => {
    var stars = '';
    var rate = 0;
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
    html += '<li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">\
            <div class="product-item">\
              <div class="item-inner">\
                <div class="product-thumbnail">\
                  <div class="pr-img-area">\
                    <a title="Ipsums Dolors Untra" href="single_product.html">\
                      <figure>\
                        <img class="first-img" src="'+ img_url +'" alt="">\
                        <img class="hover-img" src="'+ img_url +'" alt="">\
                      </figure>\
                    </a>\
                    <button type="button" class="add-to-cart-mt">\
                      <i class="fa fa-shopping-cart"></i>\
                      <span>'+Lang.get('home.user.main.add_to_cart')+'</span>\
                    </button>\
                    </div>\
                  </div>\
                  <div class="item-info">\
                    <div class="info-inner">\
                      <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">'+element.name+'</a> </div>\
                        <div class="item-content">\
                          <div class="rating">'+ stars +'<span>('+ element.avg_rate +')</span></div>\
                        <div class="item-price">\
                          <div class="price-box"> <span class="regular-price"> <span class="price">'+element.price+'</span> </span> </div>\
                        </div>\
                      </div>\
                    </div>\
                  </div>\
                </div>\
              </div>\
            </li>';
          });
  return $('#products').html(html);
}
$(document).ready(function () {
  $.get(url, function(response) {
    appendHtml(response);
  });
  $(".filter-price").on("click", function () {
    from = $('#from').val();  
    to = $('#to').val();
    if(url.indexOf('?') > 0) {
      url += '&min_price='+ from + '&max_price='+ to;
    } else {
      url += '?min_price='+ from + '&max_price='+ to;
    } 
    $.get(url, function(response) {
      appendHtml(response);
    });
  });
  $(".filter-rate").on("click", function (){
    rate = $(this).val();
    if(url.indexOf('?') > 0) {
      url += '&rate='+ rate;
    } else {
      url += '?rate='+ rate;
    }
    $.get(url, function(response) {
      appendHtml(response);
    });  
  });
});
