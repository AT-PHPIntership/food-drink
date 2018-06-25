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
          <!-- list category -->
          <div class="layered-content">
            <div id="js-build-category" class="category-collaps">
      
            </div>
          </div>
        </div>
        <div class="size-area">
          <h2 class="saider-bar-title">{{__('sidebar.rate')}} (<i class="fa fa-star"></i>)</h2>
          <ul>
            <li>
              <input type="radio" name="rate" class="filter-rate" value="1">
              <i class="fa fa-star"></i>
            </li>
            <li>
              <input type="radio" name="rate" class="filter-rate" value="2">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </li>
            <li>
              <input type="radio" name="rate" class="filter-rate" value="3">
              <i class="fa fa-star blue-star"></i>
              <i class="fa fa-star blue-star"></i>
              <i class="fa fa-star blue-star"></i>
            </li>
            <li>
              <input type="radio" name="rate" class="filter-rate" value="4">
              <i class="fa fa-star blue-star"></i>
              <i class="fa fa-star blue-star"></i>
              <i class="fa fa-star blue-star"></i>
              <i class="fa fa-star blue-star"></i>
            </li>
            <li>
              <input type="radio" name="rate" class="filter-rate" value="5">
              <i class="fa fa-star blue-star"></i>
              <i class="fa fa-star blue-star"></i>
              <i class="fa fa-star blue-star"></i>
              <i class="fa fa-star blue-star"></i>
              <i class="fa fa-star blue-star"></i>
            </li>
          </ul>
        </div>
        <div class="size-area">
          <h2 class="saider-bar-title">{{__('sidebar.price')}} ({{__('sidebar.money')}})</h2>
          <div class="cart-plus-minus">
            <div class="numbers-row">
                <span class="value-price">Min Price</span>
                <select id="from" class="form-control filter-price">
                  <option value="1">1</option>
                  <option value="20">20</option>
                  <option value="40">40</option>
                  <option value="60">60</option>
                  <option value="80">80</option>
                </select>
                <span class="value-price">Max Price</span>
                <select id="to" class="form-control filter-price">
                  <option value="100">100</option>
                  <option value="120">120</option>
                  <option value="160">160</option>
                  <option value="180">180</option>
                  <option value="250">250</option>
                </select>
            </div>
          </div>
        </div>
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
