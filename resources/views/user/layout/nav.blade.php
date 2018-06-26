<nav>
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-4">
        <div class="mega-container visible-lg visible-md visible-sm">
          <div class="navleft-container">
            <div class="mega-menu-title">
              <h3>{{ __('home.user.nav.shop_food_drink' )}}</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9 col-sm-8">
        <div class="mtmegamenu">
          <ul>
            <li class="mt-root">
              <a href="{{ route('products.index') }}">
                <div class="mt-root-item">
                  <div class="title title_font"><span class="title-text">{{ __('home.user.nav.all_product' )}}</span></div>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
