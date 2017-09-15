        <?php
        $product_related = Page::where('parent',$page->parent)->get();
        ?>
        <section class="section featured-product wow fadeInUp title_product_related" id="detail_product_related">
          <h3 class="section-title">Sản phẩm liên quan</h3>
          <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

           @foreach($product_related as $item)
           <div class="item item-carousel">
            <div class="products">
              <div class="product">
                <div class="product-image">
                  <div class="image">
                    <a href="indexbd17.html?page=detail">

                      <figure style="" class="image_calc">
                        <img style="width: 90%;" class="img-responsive" src="{{URL::asset($item->image)}}" width="270px" height="auto" alt="{{$item->title}}">
                      </figure>
                    </a>
                  </div><!-- /.image -->

                </div><!-- /.product-image -->
                <div class="product-info text-left">
                  <h3 class="name "><a class="dotdotdot" href="{{$item->link()}}">{{$item->title}}</a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="description"></div>
                  <div class="div_dot_price_detail">
                    <div class="product-price dotdotdot">
                      <span class="price">
                       @if($item->properties[0])
                       @if($item->properties[0]->value === '')
                       {{0}}
                       @else
                       {{number_format($item->properties[0]->value)}} VNĐ
                       @endif
                       @endif
                     </span>
                     <span class="price-before-discount">
                      @if($item->properties[1])
                      @if($item->properties[1]->value === '')
                      {{0}}
                      @else
                      {{number_format($item->properties[1]->value)}} VNĐ
                      @endif
                      @endif
                    </span>
                  </div><!-- /.product-price -->
                </div>
              </div><!-- /.product-info -->
              <div class="cart clearfix animate-effect">
                <div class="action">
                  <ul class="list-unstyled">
                    <li class="add-cart-button btn-group">
                      <button class="btn btn-primary icon btn-xs" data-toggle="dropdown" type="button">
                        <i class="fa fa-shopping-cart"></i>
                      </button>
                      <a href="{{$item->link()}}"><button class="btn btn-primary btn-xs" type="button">Giỏ hàng</button></a>
                    </li>
                 
                  </ul>
                </div><!-- /.action -->
              </div><!-- /.cart -->
            </div><!-- /.product -->
          </div><!-- /.products -->
        </div><!-- /.item -->

        @endforeach
      </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->