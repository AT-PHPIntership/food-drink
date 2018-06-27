var url = '/api'+ window.location.pathname;
function appendHtml(response) {
  var rateStar = '';
  img_url = 'https://image.ibb.co/dqd4QJ/default_product.jpg';
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
                  <a href="images/products/img03.jpg" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> \
                    <img class="zoom-img" src="'+ img_url +'" alt="products"> \
                  </a>\
                </div>\
              </div>\
              <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">\
                  <div class="product-name">\
                    <h1>'+response.data.name+'</h1>\
                  </div>\
                  <div class="price-box">\
                    <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $'+response.data.price+' </span> </p>\
                  </div>\
                  <div class="ratings">\
                    <div class="rating">\
                      '+rateStar+'\
                    </div>\
                    <p class="rating-links"> <span class="separator">Rate</span> </p>\
                  </div>\
                  <div class="short-description">\
                    <h2>Quick Overview</h2>\
                    <p>'+response.data.preview+'</p>\
                  </div>\
                  <div class="product-variation">\
                    <form action="#" method="post">\
                      <div class="cart-plus-minus">\
                        <label for="qty">'+Lang.get('product.user.product.quantity')+'</label>\
                        <div class="numbers-row">\
                        <div class="dec qtybutton"><i class="fa fa-minus">&nbsp;</i></div>\
                        <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">\
                        <div class="inc qtybutton"><i class="fa fa-plus">&nbsp;</i></div>\
                      </div>\
                      <button class="button pro-add-to-cart" title="Add to Cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>\
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
