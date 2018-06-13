var idCateogryFood = '1';
var idCategoryDrink = '2';
$.ajax({
    url: "/api/products?category=" + idCategoryDrink,
    type: "GET",
    data: {
    },
    success: function(data) {
        let html = '';
        data.data.forEach(element => {
            html += '<div class="product-item">\
                <div class="item-inner">\
                <div class="product-thumbnail">\
                    <div class="pr-img-area"> <a title="'+element.name+'" href="single_product.html">\
                    <figure> <img class="first-img" src="http://192.168.33.10/images/products/'+ element.images[0].image +'" alt=""> <img class="hover-img" src="images/products/default-product.jpg" alt=""></figure>\
                    </a>\
                    <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span>ad</span> </button>\
                    </div>\
                </div>\
                <div class="item-info">\
                    <div class="info-inner">\
                    <div class="item-title"> <a title="'+ element.name +'" href="single_product.html">'+ element.name +'</a> </div>\
                    <div class="item-content">\
                        <div class="rating">\
                        <i class="fa fa-star"></i>\
                        <i class="fa fa-star"></i>\
                        <i class="fa fa-star-o"></i>\
                        <i class="fa fa-star-o"></i>\
                        <i class="fa fa-star-o"></i>\
                        <span>('+ element.avg_rate +')</span>\
                        </div>\
                        <div class="item-price">\
                        <div class="price-box"> <span class="regular-price"> <span class="price">'+  element. price +'</span> </span> </div>\
                        </div>\
                    </div>\
                    </div>\
                </div>\
                </div>\
            </div>';
        });
        document.getElementsByClassName('food-product')[0].innerHTML += html;
    }
 });
