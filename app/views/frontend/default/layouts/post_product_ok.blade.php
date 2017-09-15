@extends('frontend.default.layouts.master')
@section('content')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="#">Home</a></li>
        <li><a href="#">Woman</a></li>
        <li class='active'>Samsung Galaxy S4 32GB White</li>
      </ul>
    </div><!-- /.breadcrumb-inner -->
  </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row single-product outer-bottom-sm '>
      <div class='col-md-9'>
        <!-- 1.slide image gallery-->
        <div class="row  wow fadeInUp">
          <div class="col-xs-12  col-md-5 col-sm-6 gallery-holder">
            <div class="product-item-holder size-big single-product-gallery small-gallery">
              <div id="" class="slider-for">
                <img class="image_display" width=""  alt="" src="{{$page->image}}" data-echo="{{$page->image}}"/>
                @foreach($page->images() as $item)
                <img class="image_display" width=""  alt="" src="{{URL::asset($item->link)}}" data-echo="{{URL::asset($item->link)}}"/>
                @endforeach

              </div><!-- /.single-product-slider -->
              <div class="single-product-gallery-thumbs gallery-thumbs">
                <div id="" class="slider-nav">
                 <img class="img-responsive" width="85" alt="" src="{{URL::asset($page->image)}}" data-echo="{{URL::asset($page->image)}}"/>
                 @foreach($page->images() as $item)
                 <img class="img-responsive" width="85" alt="" src="{{URL::asset($item->link)}}" data-echo="{{URL::asset($item->link)}}"/>
                 @endforeach
               </div><!-- /#owl-single-product-thumbnails -->
             </div><!-- /.gallery-thumbs -->
           </div><!-- /.single-product-gallery -->
         </div><!-- /.gallery-holder -->

         <div class='col-xs-12 col-md-7 col-sm-6  product-info-block'>
          <div class="product-info">
            <h1 class="name">Samsung Galaxy S4 32GB White</h1>
            <div class="rating-reviews m-t-20">
              <div class="row">
                <div class="col-sm-3">
                  <div class="rating rateit-small"></div>
                </div>
                <div class="col-sm-8">
                  <div class="reviews">
                    <a href="#" class="lnk">(06 Reviews)</a>
                  </div>
                </div>
              </div><!-- /.row -->
            </div><!-- /.rating-reviews -->
            <div class="stock-container info-container m-t-10">
              <div class="row">
                <div class="col-sm-3">
                  <div class="stock-box">
                    <span class="label">Availability :</span>
                  </div>
                </div>
                <div class="col-sm-9">
                  <div class="stock-box">
                    <span class="value">In Stock</span>
                  </div>
                </div>
              </div><!-- /.row -->
            </div><!-- /.stock-container -->
            <div class="description-container m-t-20">
              Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Susp endisse posuere arcu diam, id accumsan eros pharetra ac.
            </div><!-- /.description-container -->
            <div class="price-container info-container m-t-20">
              <div class="row">
                <div class="col-sm-6">
                  <div class="price-box">
                    <span class="price">$800.00</span>
                    <span class="price-strike">$900.00</span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="favorite-button m-t-10">
                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                      <i class="fa fa-heart"></i>
                    </a>
                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                      <i class="fa fa-retweet"></i>
                    </a>
                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                      <i class="fa fa-envelope"></i>
                    </a>
                  </div>
                </div>
              </div><!-- /.row -->
            </div><!-- /.price-container -->
            <div class="quantity-container info-container">
              <div class="row">
                <div class="col-sm-2">
                  <span class="label">Qty :</span>
                </div>
                <div class="col-sm-2">
                  <div class="cart-quantity">
                    <div class="quant-input">
                      <div class="arrows">
                        <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                        <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                      </div>
                      <input type="text" value="1">
                    </div>
                  </div>
                </div>
                <div class="col-sm-7">
                  <a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                </div>
              </div><!-- /.row -->
            </div><!-- /.quantity-container -->
            <div class="product-social-link m-t-20 text-right">
              <span class="social-label">Share :</span>
              <div class="social-icons">
                <ul class="list-inline">
                  <li><a class="fa fa-facebook" href="http://facebook.com/transvelo"></a></li>
                  <li><a class="fa fa-twitter" href="#"></a></li>
                  <li><a class="fa fa-linkedin" href="#"></a></li>
                  <li><a class="fa fa-rss" href="#"></a></li>
                  <li><a class="fa fa-pinterest" href="#"></a></li>
                </ul><!-- /.social-icons -->
              </div>
            </div>
          </div><!-- /.product-info -->
        </div><!-- /.col-sm-7 -->
      </div><!-- /.row -->
      <!-- /1.slide image gallery-->
      <!-- 2.DESCRIPTION -->
      <div class="product-tabs inner-bottom-xs  wow fadeInUp">
        <div class="row">
          <div class="col-sm-3">
            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
              <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
              <li><a data-toggle="tab" href="#review">REVIEW</a></li>
              <li><a data-toggle="tab" href="#tags">TAGS</a></li>
            </ul><!-- /.nav-tabs #product-tabs -->
          </div>
          <div class="col-sm-9">
            <div class="tab-content">
              <div id="description" class="tab-pane in active">
                <div class="product-tab">
                  <p class="text">Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Susp endisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibe ndum gravida eget, lacinia id purus. Susp endisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus.<p><p class="text"> Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Susp endisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibe ndum gravida eget, lacinia id purus. Susp endisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus.</p>
                </div>
              </div><!-- /.tab-pane -->
              <div id="review" class="tab-pane">
                <div class="product-tab">
                  <div class="product-reviews">
                    <h4 class="title">Customer Reviews</h4>
                    <div class="reviews">
                      <div class="review">
                        <div class="review-title"><span class="summary">Best Product For me :)</span><span class="date"><i class="fa fa-calendar"></i><span>20 minutes ago</span></span></div>
                        <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit nisl in adipiscin"</div>
                        <div class="author m-t-15"><i class="fa fa-pencil-square-o"></i> <span class="name">Michael Lee</span></div>  </div>
                      </div><!-- /.reviews -->
                    </div><!-- /.product-reviews -->
                    <div class="product-add-review">
                      <h4 class="title">Write your own review</h4>
                      <div class="review-table">
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th class="cell-label">&nbsp;</th>
                                <th>1 star</th>
                                <th>2 stars</th>
                                <th>3 stars</th>
                                <th>4 stars</th>
                                <th>5 stars</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="cell-label">Quality</td>
                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                              </tr>
                              <tr>
                                <td class="cell-label">Price</td>
                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                              </tr>
                              <tr>
                                <td class="cell-label">Value</td>
                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                              </tr>
                            </tbody>
                          </table><!-- /.table .table-bordered -->
                        </div><!-- /.table-responsive -->
                      </div><!-- /.review-table -->
                      <div class="review-form">
                        <div class="form-container">
                          <form role="form" class="cnt-form">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                  <input type="text" class="form-control txt" id="exampleInputName" placeholder="">
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                  <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                  <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
                                </div><!-- /.form-group -->
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                  <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                </div><!-- /.form-group -->
                              </div>
                            </div><!-- /.row -->
                            <div class="action text-right">
                              <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                            </div><!-- /.action -->
                          </form><!-- /.cnt-form -->
                        </div><!-- /.form-container -->
                      </div><!-- /.review-form -->
                    </div><!-- /.product-add-review -->
                  </div><!-- /.product-tab -->
                </div><!-- /.tab-pane -->
                <div id="tags" class="tab-pane">
                  <div class="product-tag">
                    <h4 class="title">Product Tags</h4>
                    <form role="form" class="form-inline form-cnt">
                      <div class="form-container">
                        <div class="form-group">
                          <label for="exampleInputTag">Add Your Tags: </label>
                          <input type="email" id="exampleInputTag" class="form-control txt">
                        </div>
                        <button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
                      </div><!-- /.form-container -->
                    </form><!-- /.form-cnt -->
                    <form role="form" class="form-inline form-cnt">
                      <div class="form-group">
                        <label>&nbsp;</label>
                        <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                      </div>
                    </form><!-- /.form-cnt -->
                  </div><!-- /.product-tab -->
                </div><!-- /.tab-pane -->
              </div><!-- /.tab-content -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.product-tabs -->
        <!-- /2.DESCRIPTION -->
        <!-- ============================================== UPSELL PRODUCTS ============================================== -->
        <!-- 3.Sản phẩm liên quan -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">upsell products</h3>
          <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image">
                      <a href="indexbd17.html?page=detail"><img src="assets/images/blank.gif.pagespeed.ce.2JdGiI2i2V.gif" data-echo="assets/images/products/4.jpg" alt=""></a>
                    </div><!-- /.image -->
                    <div class="tag sale"><span>sale</span></div>
                  </div><!-- /.product-image -->
                  <div class="product-info text-left">
                    <h3 class="name"><a href="indexbd17.html?page=detail">LG Smart Phone LP68</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price">
                      <span class="price">
                        $650.99 </span>
                        <span class="price-before-discount">$ 800</span>
                      </div><!-- /.product-price -->
                    </div><!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                              <i class="fa fa-shopping-cart"></i>
                            </button>
                            <button class="btn btn-primary" type="button">Add to cart</button>
                          </li>
                          <li class="lnk wishlist">
                            <a class="add-to-cart" href="indexbd17.html?page=detail" title="Wishlist">
                              <i class="icon fa fa-heart"></i>
                            </a>
                          </li>
                          <li class="lnk">
                            <a class="add-to-cart" href="indexbd17.html?page=detail" title="Compare">
                              <i class="fa fa-retweet"></i>
                            </a>
                          </li>
                        </ul>
                      </div><!-- /.action -->
                    </div><!-- /.cart -->
                  </div><!-- /.product -->
                </div><!-- /.products -->
              </div><!-- /.item -->
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image">
                        <a href="indexbd17.html?page=detail"><img src="assets/images/blank.gif.pagespeed.ce.2JdGiI2i2V.gif" data-echo="assets/images/products/6.jpg" alt=""></a>
                      </div><!-- /.image -->
                      <div class="tag new"><span>new</span></div>
                    </div><!-- /.product-image -->
                    <div class="product-info text-left">
                      <h3 class="name"><a href="indexbd17.html?page=detail">Nokia Lumia 520</a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="description"></div>
                      <div class="product-price">
                        <span class="price">
                          $650.99 </span>
                          <span class="price-before-discount">$ 800</span>
                        </div><!-- /.product-price -->
                      </div><!-- /.product-info -->
                      <div class="cart clearfix animate-effect">
                        <div class="action">
                          <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                              <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i>
                              </button>
                              <button class="btn btn-primary" type="button">Add to cart</button>
                            </li>
                            <li class="lnk wishlist">
                              <a class="add-to-cart" href="indexbd17.html?page=detail" title="Wishlist">
                                <i class="icon fa fa-heart"></i>
                              </a>
                            </li>
                            <li class="lnk">
                              <a class="add-to-cart" href="indexbd17.html?page=detail" title="Compare">
                                <i class="fa fa-retweet"></i>
                              </a>
                            </li>
                          </ul>
                        </div><!-- /.action -->
                      </div><!-- /.cart -->
                    </div><!-- /.product -->
                  </div><!-- /.products -->
                </div><!-- /.item -->
                <div class="item item-carousel">
                  <div class="products">
                    <div class="product">
                      <div class="product-image">
                        <div class="image">
                          <a href="indexbd17.html?page=detail"><img src="assets/images/blank.gif.pagespeed.ce.2JdGiI2i2V.gif" data-echo="assets/images/products/1.jpg" alt=""></a>
                        </div><!-- /.image -->
                        <div class="tag hot"><span>hot</span></div>
                      </div><!-- /.product-image -->
                      <div class="product-info text-left">
                        <h3 class="name"><a href="indexbd17.html?page=detail">Sony Ericson Vaga</a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="description"></div>
                        <div class="product-price">
                          <span class="price">
                            $650.99 </span>
                            <span class="price-before-discount">$ 800</span>
                          </div><!-- /.product-price -->
                        </div><!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                  <i class="fa fa-shopping-cart"></i>
                                </button>
                                <button class="btn btn-primary" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist">
                                <a class="add-to-cart" href="indexbd17.html?page=detail" title="Wishlist">
                                  <i class="icon fa fa-heart"></i>
                                </a>
                              </li>
                              <li class="lnk">
                                <a class="add-to-cart" href="indexbd17.html?page=detail" title="Compare">
                                  <i class="fa fa-retweet"></i>
                                </a>
                              </li>
                            </ul>
                          </div><!-- /.action -->
                        </div><!-- /.cart -->
                      </div><!-- /.product -->
                    </div><!-- /.products -->
                  </div><!-- /.item -->
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image">
                            <a href="indexbd17.html?page=detail"><img src="assets/images/blank.gif.pagespeed.ce.2JdGiI2i2V.gif" data-echo="assets/images/products/2.jpg" alt=""></a>
                          </div><!-- /.image -->
                          <div class="tag new"><span>new</span></div>
                        </div><!-- /.product-image -->
                        <div class="product-info text-left">
                          <h3 class="name"><a href="indexbd17.html?page=detail">Samsung Galaxy S4</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price">
                            <span class="price">
                              $650.99 </span>
                              <span class="price-before-discount">$ 800</span>
                            </div><!-- /.product-price -->
                          </div><!-- /.product-info -->
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                  <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                    <i class="fa fa-shopping-cart"></i>
                                  </button>
                                  <button class="btn btn-primary" type="button">Add to cart</button>
                                </li>
                                <li class="lnk wishlist">
                                  <a class="add-to-cart" href="indexbd17.html?page=detail" title="Wishlist">
                                    <i class="icon fa fa-heart"></i>
                                  </a>
                                </li>
                                <li class="lnk">
                                  <a class="add-to-cart" href="indexbd17.html?page=detail" title="Compare">
                                    <i class="fa fa-retweet"></i>
                                  </a>
                                </li>
                              </ul>
                            </div><!-- /.action -->
                          </div><!-- /.cart -->
                        </div><!-- /.product -->
                      </div><!-- /.products -->
                    </div><!-- /.item -->
                    <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image">
                              <a href="indexbd17.html?page=detail"><img src="assets/images/blank.gif.pagespeed.ce.2JdGiI2i2V.gif" data-echo="assets/images/products/2.jpg" alt=""></a>
                            </div><!-- /.image -->
                            <div class="tag hot"><span>hot</span></div>
                          </div><!-- /.product-image -->
                          <div class="product-info text-left">
                            <h3 class="name"><a href="indexbd17.html?page=detail">Samsung Galaxy S4</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>
                            <div class="product-price">
                              <span class="price">
                                $650.99 </span>
                                <span class="price-before-discount">$ 800</span>
                              </div><!-- /.product-price -->
                            </div><!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                      <i class="fa fa-shopping-cart"></i>
                                    </button>
                                    <button class="btn btn-primary" type="button">Add to cart</button>
                                  </li>
                                  <li class="lnk wishlist">
                                    <a class="add-to-cart" href="indexbd17.html?page=detail" title="Wishlist">
                                      <i class="icon fa fa-heart"></i>
                                    </a>
                                  </li>
                                  <li class="lnk">
                                    <a class="add-to-cart" href="indexbd17.html?page=detail" title="Compare">
                                      <i class="fa fa-retweet"></i>
                                    </a>
                                  </li>
                                </ul>
                              </div><!-- /.action -->
                            </div><!-- /.cart -->
                          </div><!-- /.product -->
                        </div><!-- /.products -->
                      </div><!-- /.item -->
                      <div class="item item-carousel">
                        <div class="products">
                          <div class="product">
                            <div class="product-image">
                              <div class="image">
                                <a href="indexbd17.html?page=detail"><img src="assets/images/blank.gif.pagespeed.ce.2JdGiI2i2V.gif" data-echo="assets/images/products/3.jpg" alt=""></a>
                              </div><!-- /.image -->
                              <div class="tag sale"><span>sale</span></div>
                            </div><!-- /.product-image -->
                            <div class="product-info text-left">
                              <h3 class="name"><a href="indexbd17.html?page=detail">Apple Iphone 5s 32GB</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              <div class="product-price">
                                <span class="price">
                                  $650.99 </span>
                                  <span class="price-before-discount">$ 800</span>
                                </div><!-- /.product-price -->
                              </div><!-- /.product-info -->
                              <div class="cart clearfix animate-effect">
                                <div class="action">
                                  <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                        <i class="fa fa-shopping-cart"></i>
                                      </button>
                                      <button class="btn btn-primary" type="button">Add to cart</button>
                                    </li>
                                    <li class="lnk wishlist">
                                      <a class="add-to-cart" href="indexbd17.html?page=detail" title="Wishlist">
                                        <i class="icon fa fa-heart"></i>
                                      </a>
                                    </li>
                                    <li class="lnk">
                                      <a class="add-to-cart" href="indexbd17.html?page=detail" title="Compare">
                                        <i class="fa fa-retweet"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div><!-- /.action -->
                              </div><!-- /.cart -->
                            </div><!-- /.product -->
                          </div><!-- /.products -->
                        </div><!-- /.item -->
                      </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- /3.Sản phẩm liên quan -->
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
                  </div><!-- /.col -->
                  <div class="clearfix"></div>
                </div><!-- /.row -->
              </div><!-- /.container -->
            </div><!-- /.body-content -->



            <script type="text/javascript">



            </script>
            @endsection