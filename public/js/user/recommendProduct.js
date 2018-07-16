function getListRecommendProducts(keyRecommend) {
    var products = '';
    var urlRecommend = '/api/products?category='+ keyRecommend[0].category + '&rate='+ keyRecommend[0].rate +'&limit=4';
    $.ajax({
        type: 'GET',
        url: urlRecommend,
        success: function(data) {
            data.data.data.forEach(element => {
              var stars = '';
              var rate = 0;
              rate = Math.round(element.avg_rate);
              for (i = 1; i <= 5 ; i++) {
                if (i <= rate) {
                  stars += '<i class="fa fa-star"></i>';
                } else {
                  stars += '<i class="fa fa-star-o"></i>';
                }
              }
                img_url = 'https://image.ibb.co/dqd4QJ/default_product.jpg';
                if(typeof element.images[0] !== 'undefined') {
                    img_url = element.images[0].image_url;
                }                
                products += '<li class="item col-lg-3 col-md-3 col-sm-6 col-xs-6">\
                <div class="product-item">\
                  <div class="item-inner">\
                    <div class="product-thumbnail">\
                      <div class="pr-img-area">\
                        <a title="" href="/products/'+element.id+'">\
                          <figure> \
                            <img class="first-img" src="'+img_url+'" alt="">\
                            <img class="hover-img" src="'+img_url+'" alt="">\
                          </figure>\
                        </a>\
                      </div>\
                    </div>\
                    <div class="item-info">\
                      <div class="info-inner">\
                        <div class="item-title"><a title="" href="/products/'+element.id+'">'+element.name+'</a> </div>\
                          <div class="item-content">\
                            <div class="rating">'+ stars +'\
                              <span>' +element.avg_rate+ '</span>\
                            </div>\
                          <div class="item-price">\
                            <div class="price-box"><span class="regular-price"> <span class="price">'+ Lang.get('home.user.main.money') + element.price+'</span> </span> </div>\
                          </div>\
                        </div>\
                      </div>\
                    </div>\
                  </div>\
                </div>\
              </li>'
            });
            $('#list-recommend').html(products);
        }
    })
}
$(document).ready(function() {
  setTimeout(function(){
    var keyRecommend = JSON.parse(localStorage.getItem('recommend'));
    getListRecommendProducts(keyRecommend);
  }, 600);
});
