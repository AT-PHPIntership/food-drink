<aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
  <div class="block shop-by-side">
    <div class="sidebar-bar-title">
      <h3>{{__('sidebar.shop_by')}}</h3>
    </div>
    <div class="block-content">
      <span class="block-subtitle"><i class="glyphicon glyphicon-refresh"></i> {{__('sidebar.refresh_filter')}}</span>
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
            <input type="radio" name="rate" class="filter-rate change-type" value="1">
            <i class="fa fa-star"></i>
          </li>
          <li>
            <input type="radio" name="rate" class="filter-rate change-type" value="2">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </li>
          <li>
            <input type="radio" name="rate" class="filter-rate change-type" value="3">
            <i class="fa fa-star blue-star"></i>
            <i class="fa fa-star blue-star"></i>
            <i class="fa fa-star blue-star"></i>
          </li>
          <li>
            <input type="radio" name="rate" class="filter-rate change-type" value="4">
            <i class="fa fa-star blue-star"></i>
            <i class="fa fa-star blue-star"></i>
            <i class="fa fa-star blue-star"></i>
            <i class="fa fa-star blue-star"></i>
          </li>
          <li>
            <input type="radio" name="rate" class="filter-rate change-type" value="5">
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
      <div class="size-area">
        <h2 class="saider-bar-title">{{__('sidebar.name_product')}}</h2>
        <div class="cart-plus-minus">
          <div class="numbers-row">
            <form method="post" id="filter-name">
              <input type="text" id="name" class="form-control" placeholder="{{ __('sidebar.name_product') }}" name="search">
              <button class="btn-search submit-filter" type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</aside>
