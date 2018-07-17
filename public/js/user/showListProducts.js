var url = '/api/products';
function appendHtml(response) {
  let html = '';
  response.data.data.forEach(element => {
    var stars = '';
    var rate = 0;
    img_url = 'https://image.ibb.co/dqd4QJ/default_product.jpg';
    img = Lang.get('product.image_product_default');
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
    html += '<li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">\
            <div class="product-item">\
              <div class="item-inner">\
                <div class="product-thumbnail">\
                  <div class="pr-img-area">\
                    <a title="Ipsums Dolors Untra" href="products/'+ element.id +'">\
                      <figure>\
                        <img class="first-img" src="'+ img_url +'" alt="">\
                        <img class="hover-img" src="'+ img_url +'" alt="">\
                      </figure>\
                    </a>\
                    <button type="button" class="add-to-cart-mt" onclick="addCart('+ element.id +', \''+element.name +'\', \''+element.price +'\', '+element.quantity +', \''+ img_url +'\',\''+ img +'\')">\
                      <i class="fa fa-shopping-cart"></i>\
                      <span>'+Lang.get('home.user.main.add_to_cart')+'</span>\
                    </button>\
                    </div>\
                  </div>\
                  <div class="item-info">\
                    <div class="info-inner">\
                      <div class="item-title"> <a title="Ipsums Dolors Untra" href="products/'+ element.id +'">'+element.name+'</a> </div>\
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
    $('#products').html(html);
}
function processAjax(url){
  $.get(url, function(response) {
    if (response.data['next_page_url'] != null) {
      $('#next').show();
      $('#next').attr('href', response.data['next_page_url']);
    } else {
      $('#next').hide();
    }
    if (response.data['prev_page_url'] != null) {
      $('#prev').show();
      $('#prev').attr('href', response.data['prev_page_url']);
    } else {
      $('#prev').hide();
    }
    appendHtml(response);
  })
  .fail(function(response) {
    if (response.responseJSON.message) {
      window.alert(response.responseJSON.message);
    }
    else {
      window.alert(response.responseJSON);
    }
  })
}

$(document).ready(function () {
  $(".filter-price").on("click", function () {
    from = $('#from').val();  
    to = $('#to').val();
    var url_price = 'min_price='+ from + '&max_price='+ to;
    if(url.indexOf('?') > 0) {
      url += '&'+ url_price;
    } else {
      url += '?'+ url_price;
    }    
    processAjax(url);
  });
  $(".filter-rate").on("click", function (){
    rate = $(this).val();
    var url_rate = 'rate='+ rate;
    if(url.indexOf('?') > 0) {
      url += '&'+ url_rate;
    } else {
      url += '?'+ url_rate;
    }
    processAjax(url); 
  });
  // filter by category
  $(document).on('click', '.filter-category', function() {
    var id = $(this).val();
    if(url.indexOf('?') > 0) {
      url += '&category='+ id;
    } else {
      url += '?category='+ id;
    }
    processAjax(url);
  });
  // filter name product
  $('#filter-name').submit(function () {
    event.preventDefault();
    name = $('#name').val();
    if(url.indexOf('?') > 0) {
      url += '&name='+ name;
    } else {
      url += '?name='+ name;
    }
    processAjax(url);
  });
  //refresh filter
  $('.block-subtitle').on('click', function() {
    location.reload();
  });
  processAjax(url);
  //next
  $('#next').click(function (event) {
    event.preventDefault();
    url_next = $('#next').attr('href');
    processAjax(url_next);
  });
  //prev
  $('#prev').click(function (event) {
    event.preventDefault();
    url_prev = $('#prev').attr('href');
    processAjax(url_prev);
  });
});
