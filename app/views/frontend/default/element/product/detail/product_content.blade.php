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
                 <img class="img-responsive" width="" alt="" src="{{URL::asset($page->image)}}" data-echo="{{URL::asset($page->image)}}"/>
                 @foreach($page->images() as $item)
                 <img class="img-responsive" width="" alt="" src="{{URL::asset($item->link)}}" data-echo="{{URL::asset($item->link)}}"/>
                 @endforeach
               </div><!-- /#owl-single-product-thumbnails -->
             </div><!-- /.gallery-thumbs -->
           </div><!-- /.single-product-gallery -->
         </div><!-- /.gallery-holder -->

         <div class='col-xs-12 col-md-7 col-sm-6  product-info-block'>
          <div class="product-info">
            <h1 class="name">{{$page->title}}</h1>
            <div class="rating-reviews m-t-20">
              <div class="row">
                <div class="col-sm-3">
                  <div class="rating rateit-small"></div>
                </div>
                <div class="col-sm-8">
                  <div class="reviews">
                    <a href="#" class="lnk"></a>
                  </div>
                </div>
              </div><!-- /.row -->
            </div><!-- /.rating-reviews -->

            <div class="description-container m-t-20">
              {{$page->description}}
            </div><!-- /.description-container -->
            <div class="price-container info-container m-t-20 div_dot_price_detail">
              <div class="row">
                <div class="col-sm-6">
                  <div class="price-box dotdotdot">
                    <span class="price">
                      @if($page->properties[0])
                      @if($page->properties[0]->value === '')
                      {{0}}
                      @else
                      {{number_format($page->properties[0]->value)}} VNĐ
                      @endif
                      @endif
                    </span>
                    <span class="price-strike">
                      @if($page->properties[1])
                      @if($page->properties[1]->value === '')
                      {{0}}
                      @else
                      {{number_format($page->properties[1]->value)}} VNĐ
                      @endif
                      @endif
                    </span>
                  </div>
                </div>
            
              </div><!-- /.row -->
            </div><!-- /.price-container -->
            <form action="{{route('giohang')}}" method="post">


              <div class="quantity-container info-container">
                <div class="row">
                  <div class="col-sm-4">
                    <span class="label">Số lượng :</span>
                  </div>
                  <div class="col-sm-2">
                    <div class="cart-quantity">
                      <div class="quant-input">
                        <input type="number" name="quantity" min="1" value="1" class="form-control quality">
                        <input type="hidden" name="id" value="{{$page->id}}" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-7">
                   <!--  <a href="{{route('giohang', $page->id)}}" class="btn btn-primary"></a> -->
                   <button type="submit" class="btn btn-primary btn-xs">
                     <i class="fa fa-shopping-cart inner-right-vs"></i> Giỏ hàng
                   </button>
                 </div>
               </div><!-- /.row -->
             </div><!-- /.quantity-container -->
           </form>
           <!-- chia se face bỏ -->
           <!-- chia se face bỏ-->
         </div><!-- /.product-info -->
       </div><!-- /.col-sm-7 -->
      </div><!-- /.row -->