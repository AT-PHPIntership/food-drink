@extends('user.layout.master')
@section('title', __('product.user.filter.title'))
@section('content')
<div class="main-container col1-layout">
  <div class="container">
    <div class="row">
      <div class="product-overview-tab">
        <div class="container">
          <div class="row">
            <div class="col-xs-12"><div class="product-tab-inner"> 
              <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                <li class="active"> <a href="#description" data-toggle="tab"> Description </a> </li>
                 <li><a href="#product_tags" data-toggle="tab">Comment</a></li>
                <li> <a href="#reviews" data-toggle="tab">Reviews</a> </li>
              </ul>
              <div id="productTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <div class="std">
                    <p>Proin lectus ipsum, gravida et mattis vulputate, 
                      tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in 
                      faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend 
                      laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla
                      luctus malesuada tincidunt. Nunc facilisis sagittis ullamcorper. Proin 
                      lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et 
                      lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et 
                      ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus 
                      adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada 
                      tincidunt. Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, 
                      gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. 
                      Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                      cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl 
                      ut dolor dignissim semper. Nulla luctus malesuada tincidunt.</p>
                    <p> Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p>
                  </div>
                </div>
                <!-- comment -->
                <div id="product_tags" class="tab-pane fade">
                  <div class="col-sm-5 col-lg-5 col-md-5">
                    @include('user.post.postOfProduct')
                  </div>
                  <div class="col-sm-7 col-lg-7 col-md-7">
                    <div class="reviews-content-right">
                      <h2>Write Your Own Comment</h2>
                      <form>
                        <h4>How do you comment this product?<em>*</em></h4>
                        <div class="form-area">
                          <div class="form-element">
                            <label>Comment <em>*</em></label>
                            <textarea></textarea>
                          </div>
                          <div class="buttons-set">
                            <button class="button submit" title="Submit Comment" type="submit"><span><i class="fa fa-thumbs-up"></i> &nbsp;Comment</span></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- review -->
                <div id="reviews" class="tab-pane fade">
                  <div class="col-sm-5 col-lg-5 col-md-5">
                    @include('user.post.postOfProduct')
                  </div>
                  <div class="col-sm-7 col-lg-7 col-md-7">
                    <div class="reviews-content-right">
                      <h2>Write Your Own Review</h2>
                      <form>
                        <h4>How do you rate this product?<em>*</em></h4>
                        <div class="table-responsive reviews-table">
                          <table>
                            <tbody><tr>
                              <th>1 star</th>
                              <th>2 stars</th>
                              <th>3 stars</th>
                              <th>4 stars</th>
                              <th>5 stars</th>
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
                            <label>Review <em>*</em></label>
                            <textarea></textarea>
                          </div>
                          <div class="buttons-set">
                            <button class="button submit" title="Submit Review" type="submit"><span><i class="fa fa-thumbs-up"></i> &nbsp;Review</span></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
  <script src="{{ asset('js/user/showPostOfProduct.js') }}"></script>
@endsection
