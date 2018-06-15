<aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
  <div class="block shop-by-side">
    <div class="sidebar-bar-title">
      <h3>{{__('sidebar.shop_by')}}</h3>
    </div>
    <div class="block-content">
      <p class="block-subtitle">{{__('sidebar.shop_option')}}</p>
      <form action="">
        <div class="layered-Category">
          <h2 class="saider-bar-title">{{__('sidebar.categories')}}</h2>
          <div class="mega-container visible-lg visible-md visible-sm">
              <div class="mega-menu-title">
                <h3>Shop by category</h3>
              </div>
              <div class="mega-menu-category">
                <ul class="nav">
                  <li> <a href="#">Vegetables</a>
                    <div class="wrap-popup parent_nav">
                      <div class="popup">
                        <div class="row">
                          <div class="col-md-3">
                            <ul class="nav">
                              <li> <a href="#">Vegetables</a>
                                <div class="wrap-popup child_nav">
                                  <div class="popup">
                                    <div class="row">
                                      <div class="col-md-4">
                                        <ul class="nav">
                                          <li><a href="shop_grid.html"><span>Nikon</span></a></li>
                                          <li><a href="shop_grid.html"><span>Olympus</span> </a></li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                              <li><a href="shop_grid.html"><span>Nikon</span></a></li>
                              <li><a href="shop_grid.html"><span>Olympus</span> </a></li>
                              <li><a href="shop_grid.html"><span>ALPA</span> </a></li>
                              <li> <a href="shop_grid.html"><span>Bolex</span></a></li>
                              <li><a href="shop_grid.html"><span>Samsung </span></a></li>
                              <li><a href="shop_grid.html"><span>Panasonic</span></a></li>
                              <li><a href="shop_grid.html"><span>Thomson </span></a></li>
                              <li><a href="shop_grid.html"><span>Bell & Howell</span></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
          </div>
        </div>
        <div class="size-area">
          <h2 class="saider-bar-title">{{__('sidebar.rate')}} (<i class="fa fa-star"></i>)</h2>
          <div class="slider-range">
            <ul class="rating"> 
              <li>
                <i class="fa fa-star"></i> 
                <i class="fa fa-star"></i> 
                <i class="fa fa-star"></i> 
                <i class="fa fa-star"></i> 
                <i class="fa fa-star"></i>
              </li>
              <li>
                <i class="fa fa-star"></i> 
                <i class="fa fa-star"></i> 
                <i class="fa fa-star"></i> 
                <i class="fa fa-star"></i> 
                <i class="fa fa-star-o"></i>
                <span>{{__('sidebar.up')}}</span>
              </li> 
              <li>
                <i class="fa fa-star"></i> 
                <i class="fa fa-star"></i> 
                <i class="fa fa-star"></i> 
                <i class="fa fa-star-o"></i> 
                <i class="fa fa-star-o"></i>
                <span>{{__('sidebar.up')}}</span>
              </li> 
              <li>
                <i class="fa fa-star"></i> 
                <i class="fa fa-star"></i> 
                <i class="fa fa-star-o"></i> 
                <i class="fa fa-star-o"></i> 
                <i class="fa fa-star-o"></i>
                <span>{{__('sidebar.up')}}</span>
              </li>
              <li>
                <i class="fa fa-star"></i> 
                <i class="fa fa-star-o"></i> 
                <i class="fa fa-star-o"></i> 
                <i class="fa fa-star-o"></i> 
                <i class="fa fa-star-o"></i>
                <span>{{__('sidebar.up')}}</span>
              </li> 
            </ul>
          </div>
        </div>
        <div class="size-area">
          <h2 class="saider-bar-title">{{__('sidebar.price')}} ({{__('sidebar.money')}})</h2>
          <div class="cart-plus-minus">
            <div class="numbers-row">
            <input type="number" class="form-control" placeholder="Price" name="price">
            </div>
          </div>
        </div>
        <button class="button button-filter"><span>{{__('sidebar.search')}}</span></button>
      </form>
    </div>
  </div>
  <div class="block sidebar-cart">
    <div class="sidebar-bar-title">
      <h3>{{__('sidebar.my_cart')}}</h3>
    </div>
    <div class="block-content">
      <p class="amount">{{__('sidebar.there_are')}} <a href="shopping_cart.html">2 {{__('sidebar.items')}}</a> {{__('sidebar.in_your_cart')}}</p>
      <ul>
        <li class="item"> 
          <a href="shopping_cart.html" title="Sample Product" class="product-image">
            <img src="{{ asset('images/products/default-product.jpg')}}" alt="Sample Product ">
          </a>
          <div class="product-details">
            <div class="access"> 
              <a href="#" title="Remove This Item" class="remove-cart">
                <i class="icon-close"></i>
              </a>
            </div>
            <p class="product-name"> <a href="shopping_cart.html">Lorem ipsum dolor sit amet Consectetur</a> </p>
            <strong>1</strong> x <span class="price">{{__('sidebar.money')}}19.99</span> </div>
        </li>
        <li class="item"> 
          <a href="shopping_cart.html" title="Sample Product" class="product-image">
            <img src="{{ asset('images/products/default-product.jpg')}}" alt="Sample Product ">
          </a>
          <div class="product-details">
            <div class="access"> 
              <a href="#" title="Remove This Item" class="remove-cart">
                <i class="icon-close"></i>
              </a>
            </div>
            <p class="product-name"> <a href="shopping_cart.html">Lorem ipsum dolor sit amet Consectetur</a> </p>
            <strong>1</strong> x <span class="price">{{__('sidebar.money')}}19.99</span> </div>
        </li>
      </ul>
      <div class="summary">
        <p class="subtotal"> <span class="label">{{__('sidebar.cart_sub')}}</span> <span class="price">{{__('sidebar.money')}}27.99</span> </p>
      </div>
      <div class="cart-checkout">
        <button class="button button-checkout" title="Submit" type="submit"><i class="fa fa-check"></i> <span>{{__('sidebar.checkout')}}</span></button>
      </div>
    </div>
  </div>
</aside>
