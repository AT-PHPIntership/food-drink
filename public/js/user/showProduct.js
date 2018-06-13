var idCateogryFood = '1';
var idCategoryDrink = '2';
// $.ajax({
//     url: "/api/products?category=" + idCategoryDrink,
//     type: "GET",
//     data: {
//     },
//     success: function(data) {
//         let html = '';
//         console.log(data);
//         data.data.data.forEach(function(products) {
//             html += '<div class="product-item">\
//                 <div class="item-inner">\
//                 <div class="product-thumbnail">\
//                     <div class="pr-img-area"> <a title="'+data.name+'" href="single_product.html">\
//                     <figure> <img class="first-img" src="http://192.168.33.10/images/products/'+ data.images[0].image +'" alt=""> <img class="hover-img" src="images/products/default-product.jpg" alt=""></figure>\
//                     </a>\
//                     <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span>ad</span> </button>\
//                     </div>\
//                 </div>\
//                 <div class="item-info">\
//                     <div class="info-inner">\
//                     <div class="item-title"> <a title="'+ data.name +'" href="single_product.html">'+ data.name +'</a> </div>\
//                     <div class="item-content">\
//                         <div class="rating">\
//                         <i class="fa fa-star"></i>\
//                         <i class="fa fa-star"></i>\
//                         <i class="fa fa-star-o"></i>\
//                         <i class="fa fa-star-o"></i>\
//                         <i class="fa fa-star-o"></i>\
//                         <span>('+ data.avg_rate +')</span>\
//                         </div>\
//                         <div class="item-price">\
//                         <div class="price-box"> <span class="regular-price"> <span class="price">'+  data.price +'</span> </span> </div>\
//                         </div>\
//                     </div>\
//                     </div>\
//                 </div>\
//                 </div>\
//             </div>';
//         });
//         document.getElementsByClassName('food-product')[0].innerHTML += html;
//     }
//  });

//show product by category food
$('document').ready(function () {
	$.get('/api/products?category=1', function (data) {
		data.data.data.forEach(element => {
			if(typeof element.images[0] === 'undefined') {
				element.images[0] = {
					'image_url': 'http://192.168.33.10/images/products/default-product.jpg'
				};
			}
			$('#food-product').append(
				'<div class="product-item">\
        <div class="item-inner">\
          <div class="product-thumbnail">\
            <div class="pr-img-area"> <a title="'+ element.name +'" href="single_product.html">\
              <figure> <img class="first-img" src='+ element.images[0].image_url +' alt=""> <img class="hover-img" src='+ element.images[0].image_url +' alt=""></figure>\
              </a>\
              <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span>Add to Cart</span> </button>\
            </div>\
          </div>\
          <div class="item-info">\
            <div class="info-inner">\
              <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">'+ element.name +' </a> </div>\
              <div class="item-content">\
                <div class="rating">\
                  <i class="fa fa-star"></i>\
                  <i class="fa fa-star"></i>\
                  <i class="fa fa-star-o"></i>\
                  <i class="fa fa-star-o"></i>\
                  <i class="fa fa-star-o"></i>\
                  <span>(2.6)</span>\
                </div>\
                <div class="item-price">\
                  <div class="price-box"> <span class="regular-price"> <span class="price">$ 125.00</span> </span> </div>\
                </div>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>'
			);
		});
	});
});

//show product by category drink
$('document').ready(function () {
  $.get('/api/products?category=1', function(data){
		// console.log(data.data.data.images[0].image_url);
		data.data.data.forEach(element => {
			// console.log(element.images[0]);
			// console.log(element.name);
			
			// console.log(element.images[0].image_url);
			if(typeof element.images[0] === 'undefined') {
				element.images[0] = {
					'image_url': 'http://192.168.33.10/images/products/default-product.jpg'
				};
			}
			$('#drink-product').append(
				'<li class="item col-lg-3 col-md-4 col-sm-6 col-xs-6 ">\
					<div class="product-item">\
						<div class="item-inner">\
							<div class="product-thumbnail">\
								<div class="pr-img-area"> <a title="'+ element.name +'" href="single_product.html">\
									<figure> <img class="first-img" src="'+ element.images[0].image_url +'" alt=""> <img class="hover-img" src="'+ element.images[0].image_url +'" alt=""></figure>\
									</a>\
									<button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span>Add to Cart</span> </button>\
								</div>\
							</div>\
							<div class="item-info">\
								<div class="info-inner">\
									<div class="item-title"> <a title="'+ element.name +'" href="single_product.html">'+ element.name +' </a> </div>\
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
											<div class="price-box"> <span class="regular-price"> <span class="price">$ '+ element.price +'</span> </span> </div>\
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
