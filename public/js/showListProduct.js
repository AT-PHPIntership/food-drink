var url = "/api/product?"
$document.ready(function (){
    
});
function getListProducts()
{
    $.get(url)
    .done(function (data){
        contentProduct(data);
    })
    .fail(function (data){
        if (data.responseJSON.message) {
            window.alert(data.responseJSON.message);
        }
        else {
            window.alert(data.responseJSON);
        }
    });
}
function contentProduct() {
    var products = '';
    $.each(data.data, function (key, value) {
        if(typeof value.image_books[0] === 'undefined') {
            value.image_books[0] = {
                'image': 'http://via.placeholder.com/150x150'
            };
        }
        products += '<li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">\
                        <div class="product-item">\
                            <div class="item-inner">\
                                <div class="product-thumbnail">\
                                    <div class="pr-img-area">\
                                        <a title="Ipsums Dolors Untra" href="single_product.html">\
                                            <figure>\
                                                <img class="first-img" src="'+value.image_books+'" alt="">\
                                                <img class="hover-img" src="" alt="">\
                                            </figure>\
                                        </a>\
                                        <button type="button" class="add-to-cart-mt">\
                                            <i class="fa fa-shopping-cart"></i>\
                                            <span></span>\
                                        </button>\
                                        </div>\
                                    </div>\
                                    <div class="item-info">\
                                        <div class="info-inner">\
                                            <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>\
                                                <div class="item-content">\
                                                    <div class="rating">\
                                                        <i class="fa fa-star"></i>\
                                                        <i class="fa fa-star"></i>\
                                                        <i class="fa fa-star"></i>\
                                                        <i class="fa fa-star-o"></i>\
                                                        <i class="fa fa-star-o"></i>\
                                                        <span>(2.6)</span>\
                                                    </div>\
                                                <div class="item-price">\
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">125.00</span> </span> </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>';               
        $('#products').html(products);          
    });
}
$('.number-of-page').on('click', function filterNumberPage() {
    from = $('#from').val();
    to = $('to').val();
    url += '&price_min=' + from + '&price_max=' + to;
    getListProducts(url);
});