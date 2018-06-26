@extends('user.layout.master')
@section('title', __('product.user.filter.title'))
@section('content')
<div class="main-container col1-layout">
  <div class="container">
    <div class="row">
      <div class="col-main">
        <div class="product-view-area">
          <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
            <div class="large-image"> 
              <a href="images/products/img03.jpg" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> 
                <img class="zoom-img" src="{{ asset('images/products/default-product.jpg') }}" alt="products"> 
              </a> 
            </div>     
          </div>
          <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
              <div class="product-name">
                <h1>Lorem Ipsum is simply</h1>
              </div>
              <div class="price-box">
                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $329.99 </span> </p>
              </div>
              <div class="ratings">
                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                <p class="rating-links"> <span class="separator">Rate</span> </p>
              </div>
              <div class="short-description">
                <h2>Quick Overview</h2>
                <p>Accusamus repellat quo commodi earum quia quos. Qui recusandae porro incidunt aspernatur repellat eveniet recusandae odio. Dolor esse consequuntur nobis laudantium qui et.</p>
              </div>
              <div class="product-variation">
                <form action="#" method="post">
                  <div class="cart-plus-minus">
                    <label for="qty">Quantity:</label>
                    <div class="numbers-row">
                      <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="dec qtybutton"><i class="fa fa-minus">&nbsp;</i></div>
                      <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                      <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="inc qtybutton"><i class="fa fa-plus">&nbsp;</i></div>
                    </div>
                  </div>
                  <button class="button pro-add-to-cart" title="Add to Cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                </form>
              </div>
          </div>
        </div>
      </div>
      <div class="product-overview-tab">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div class="product-tab-inner"> 
                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                  <li class="active"> <a href="#description" data-toggle="tab"> {{ __('product.user.detail.description') }} </a> </li>
                  <li> <a href="#reviews" data-toggle="tab">{{ __('product.user.detail.review.reviews') }}</a> </li>
                  <li><a href="#product_tags" data-toggle="tab">{{ __('product.user.detail.comment.comments') }}</a></li>
                </ul>
                <div id="productTabContent" class="tab-content">
                  <div class="tab-pane fade in active" id="description">
                    <div class="std">
                      <p></p>
                    </div>
                  </div>
                  <!-- review -->
                  <div id="reviews" class="tab-pane fade">
                    <div class="col-sm-5 col-lg-5 col-md-5">
                      @include('user.post.postOfProduct')
                    </div>
                    <div class="col-sm-7 col-lg-7 col-md-7">
                      <div class="reviews-content-right">
                        <h2>{{ __('product.user.detail.review.write_your_review') }}</h2>
                        <form>
                          <div class="table-responsive reviews-table">
                            <table>
                              <tbody><tr>
                                <th>1 {{ __('product.user.detail.review.star') }}</th>
                                <th>2 {{ __('product.user.detail.review.stars') }}</th>
                                <th>3 {{ __('product.user.detail.review.stars') }}</th>
                                <th>4 {{ __('product.user.detail.review.stars') }}</th>
                                <th>5 {{ __('product.user.detail.review.stars') }}</th>
                              </tr>
                              <tr>
                                <td><input name="rate" value="1" type="radio"></td>
                                <td><input name="rate" value="2" type="radio"></td>
                                <td><input name="rate" value="3" type="radio"></td>
                                <td><input name="rate" value="4" type="radio"></td>
                                <td><input name="rate" value="5" type="radio"></td>
                              </tr>
                            </tbody></table>
                          </div>
                          <div class="form-area">
                            <div class="form-element">
                              <label>{{ __('product.user.detail.review.review') }} <em>*</em></label>
                              <textarea></textarea>
                            </div>
                            <div class="buttons-set">
                              <button class="button submit" title="Submit Review" type="submit"><span><i class="fa fa-thumbs-up"></i> &nbsp;{{ __('product.user.detail.review.review') }}</span></button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- comment -->
                  <div id="product_tags" class="tab-pane fade">
                    <div class="col-sm-5 col-lg-5 col-md-5">
                      @include('user.post.postOfProduct')
                    </div>
                    <div class="col-sm-7 col-lg-7 col-md-7">
                      <div class="reviews-content-right">
                        <h2>{{ __('product.user.detail.comment.write_your_comment') }}</h2>
                        <form>
                          <div class="form-area">
                            <div class="form-element">
                              <label>{{ __('product.user.detail.comment.comment') }} <em>*</em></label>
                              <textarea></textarea>
                            </div>
                            <div class="buttons-set">
                              <button class="button submit" title="Submit Comment" type="submit"><span><i class="fa fa-thumbs-up"></i> &nbsp;{{ __('product.user.detail.comment.comment') }}</span></button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
  <script src="{{ asset('js/user/showPostOfProduct.js') }}"></script>
@endsection
