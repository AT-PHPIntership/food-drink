@extends('user.layout.master')
@section('title', __('product.user.product.compare'))
@section('content')
<!-- Main Container --> 
<section class="main-container col1-layout">
  <div class="main container">
    <div class="col-main">
      <div class="compare-list">
        <div class="page-title">
          <h2>{{ __('product.user.product.compare_product') }}</h2>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-compare">
            <tr>
              <td class="compare-label">{{ __('product.user.product.product_image') }}</td>
              <td><a href="#"><img src="images/products/img08.jpg" alt="Product" width="230"></a></td>
              <td><a href="#"><img src="images/products/img09.jpg" alt="Product" width="230"></a></td>
            </tr>
            <tr>
              <td class="compare-label">{{ __('product.user.product.name') }}</td>
              <td><a href="#">Donec Ac Tempus</a></td>
              <td><a href="#">Ipsums Dolors Untra </a></td>
            </tr>
            <tr>
              <td class="compare-label">{{ __('product.user.product.rating') }}</td>
              <td>
                <div class="rating"> 
                  <i class="fa fa-star"></i> 
                  <i class="fa fa-star"></i> 
                  <i class="fa fa-star-o"></i> 
                  <i class="fa fa-star-o"></i> 
                  <i class="fa fa-star-o"></i>&nbsp; 
                  <span>(2 Reviews)</span>
                </div>
              </td>
              <td>
                <div class="rating">
                  <i class="fa fa-star"></i> 
                  <i class="fa fa-star"></i> 
                  <i class="fa fa-star"></i> 
                  <i class="fa fa-star-o"></i> 
                  <i class="fa fa-star-o"></i>&nbsp; 
                  <span>(3 Reviews)</span>
                </div>
              </td>
            </tr>
            <tr>
              <td class="compare-label">{{ __('product.user.product.price') }}</td>
              <td class="price">$49.99</td>
              <td class="price">$99.00</td>
            </tr>
            <tr>
              <td class="compare-label">{{ __('product.user.product.description') }}</td>
              <td>Lorem Ipsum Dolor Sit Amet, Consectetuer Adipiscing Elit, Sed Diam Nonummy Nibh Euismod.</td>
              <td>Tincidunt Ut Laoreet Dolore Magna Aliquam Erat Volutpat. Ut Wisi Enim Ad Minim Veniam, Quis Nostrud Exerci Tation Ullamcorper.</td>
            </tr>
            <tr>
              <td class="compare-label">{{ __('product.user.product.availability') }}</td>
              <td class="instock">Instock (25 items)</td>
              <td class="outofstock">Out of stock</td>
            </tr>
            <tr>
              <td class="compare-label">{{ __('product.user.product.action') }}</td>
              <td class="action">
                <button class="add-cart button button-sm"><i class="fa fa-shopping-cart"></i></button>
              </td>
              <td class="action">
                <button class="add-cart button button-sm"><i class="fa fa-shopping-cart"></i></button>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
