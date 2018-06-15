@extends('user.layout.master')
@section('title', __('product.user.filter.title'))
@section('content')
  <!-- Main Container -->
  <div class="main-container col2-left-layout">
    <div class="container">
      <div class="row">
        <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
          <div class="shop-inner">
            <div class="page-title">
              <h2>{{__('product.user.filter.list_product')}}</h2>
            </div>
            <div class="product-grid-area">
              <ul class="products-grid">
                <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumbnail">
                        <div class="pr-img-area"> 
                          <a title="Ipsums Dolors Untra" href="single_product.html">
                            <figure> 
                              <img class="first-img" src="{{ asset('images/products/default-product.jpg')}}" alt=""> 
                              <img class="hover-img" src="{{ asset('images/products/default-product.jpg') }}" alt="">
                            </figure>
                          </a>
                          <button type="button" class="add-to-cart-mt"> 
                            <i class="fa fa-shopping-cart"></i>
                            <span>{{__('product.user.add_to_cart')}}</span> 
                          </button>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                          <div class="item-content">
                            <div class="rating"> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star-o"></i> 
                              <i class="fa fa-star-o"></i> 
                              <span>(2.6)</span>
                            </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">{{__('product.user.money')}}125.00</span> </span> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumbnail">
                        <div class="pr-img-area"> 
                          <a title="Ipsums Dolors Untra" href="single_product.html">
                            <figure> 
                              <img class="first-img" src="{{ asset('images/products/default-product.jpg')}}" alt=""> 
                              <img class="hover-img" src="{{ asset('images/products/default-product.jpg') }}" alt="">
                            </figure>
                          </a>
                          <button type="button" class="add-to-cart-mt"> 
                            <i class="fa fa-shopping-cart"></i>
                            <span>{{__('product.user.add_to_cart')}}</span> 
                          </button>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                          <div class="item-content">
                            <div class="rating"> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star-o"></i> 
                              <i class="fa fa-star-o"></i> 
                              <span>(2.6)</span>
                            </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">{{__('product.user.money')}}125.00</span> </span> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumbnail">
                        <div class="pr-img-area"> 
                          <a title="Ipsums Dolors Untra" href="single_product.html">
                            <figure> 
                              <img class="first-img" src="{{ asset('images/products/default-product.jpg')}}" alt=""> 
                              <img class="hover-img" src="{{ asset('images/products/default-product.jpg') }}" alt="">
                            </figure>
                          </a>
                          <button type="button" class="add-to-cart-mt"> 
                            <i class="fa fa-shopping-cart"></i>
                            <span>{{__('product.user.add_to_cart')}}</span> 
                          </button>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                          <div class="item-content">
                            <div class="rating"> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star-o"></i> 
                              <i class="fa fa-star-o"></i> 
                              <span>(2.6)</span>
                            </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">{{__('product.user.money')}}125.00</span> </span> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumbnail">
                        <div class="pr-img-area"> 
                          <a title="Ipsums Dolors Untra" href="single_product.html">
                            <figure> 
                              <img class="first-img" src="{{ asset('images/products/default-product.jpg')}}" alt=""> 
                              <img class="hover-img" src="{{ asset('images/products/default-product.jpg') }}" alt="">
                            </figure>
                          </a>
                          <button type="button" class="add-to-cart-mt"> 
                            <i class="fa fa-shopping-cart"></i>
                            <span>{{__('product.user.add_to_cart')}}</span> 
                          </button>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                          <div class="item-content">
                            <div class="rating"> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star-o"></i> 
                              <i class="fa fa-star-o"></i> 
                              <span>(2.6)</span>
                            </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">{{__('product.user.money')}}125.00</span> </span> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumbnail">
                        <div class="pr-img-area"> 
                          <a title="Ipsums Dolors Untra" href="single_product.html">
                            <figure> 
                              <img class="first-img" src="{{ asset('images/products/default-product.jpg')}}" alt=""> 
                              <img class="hover-img" src="{{ asset('images/products/default-product.jpg') }}" alt="">
                            </figure>
                          </a>
                          <button type="button" class="add-to-cart-mt"> 
                            <i class="fa fa-shopping-cart"></i>
                            <span>{{__('product.user.add_to_cart')}}</span> 
                          </button>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                          <div class="item-content">
                            <div class="rating"> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star-o"></i> 
                              <i class="fa fa-star-o"></i> 
                              <span>(2.6)</span>
                            </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">{{__('product.user.money')}}125.00</span> </span> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumbnail">
                        <div class="pr-img-area"> 
                          <a title="Ipsums Dolors Untra" href="single_product.html">
                            <figure> 
                              <img class="first-img" src="{{ asset('images/products/default-product.jpg')}}" alt=""> 
                              <img class="hover-img" src="{{ asset('images/products/default-product.jpg') }}" alt="">
                            </figure>
                          </a>
                          <button type="button" class="add-to-cart-mt"> 
                            <i class="fa fa-shopping-cart"></i>
                            <span>{{__('product.user.add_to_cart')}}</span> 
                          </button>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                          <div class="item-content">
                            <div class="rating"> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star"></i> 
                              <i class="fa fa-star-o"></i> 
                              <i class="fa fa-star-o"></i> 
                              <span>(2.6)</span>
                            </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">{{__('product.user.money')}}125.00</span> </span> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="pagination-area ">
              <ul>
                <li><a class="active" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        @include('user.layout.sidebar')
      </div>
    </div>
  </div>
@endsection
