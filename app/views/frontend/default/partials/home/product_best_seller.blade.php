<div class="sidebar-widget wow fadeInUp outer-bottom-vs border_image" id="product_best_seller">
 <h3 class="section-title">Sản phẩm nổi bật</h3>
 <div class="row best_seller_button">

   <div class="button_all">
    <div class="prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
    <div class="next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
  </div>
</div>
<div class="sidebar-widget-body outer-top-xs">
  <div class="">
   <?php
   $featuredPosts =  Page::where('type',2)
   ->where('subtype','product')
   ->where('featured',1)
   ->take(12)
   ->orderBy('created_at','DESC')
   ->get();
   ?>
   <div class="slick_best_seller">
    <?php
    foreach ($featuredPosts as $key => $product){
      if ($key > 12)
        break;
      ?>
      <div class="product">
        <div class="product-micro">
          <div class="product-micro-row row">
            <div class="col-xs-5">
              <div class="product-image">
                <div class="image">
                  <a href="{{$product->link()}}" data-title="Nunc ullamcors">
                    <img data-echo="{{$product->image}}" src="{{$product->image}}" alt="" width="130px" height="130px">
                    <div class=""></div>
                  </a>
                </div><!-- /.image -->
                
              </div><!-- /.product-image -->
            </div><!-- /.col -->
            <div class="col-xs-7">
              <div class="product-info">
                <h3 class="name dotdotdot"><a href="{{$product->link()}}">{{$product->title}}</a></h3>
                <div class="rating rateit-small"></div>
                <div class="product-price dotdotdot">
                  <span class="price">
                   {{number_format($product->getProperty('price'))}} VNĐ 
                 </span>
               </div><!-- /.product-price -->
               <div class="action"><a href="{{$product->link()}}" class="lnk btn btn-primary btn-xs">Mua Hàng</a></div>
             </div>
           </div><!-- /.col -->
         </div><!-- /.product-micro-row -->
       </div><!-- /.product-micro -->
     </div>
     <?php } ?>
   </div>

   <div class="slick_best_seller_mobile" style="display:none;">
    <?php
    foreach ($featuredPosts as $key => $product){
      if ($key > 12)
        break;
      ?>
      <div class="product">
        <div class="product-micro">
          <div class="product-micro-row row">
            <div class="col-xs-5">
              <div class="product-image">
                <div class="image">
                  <a href="{{$product->link()}}" data-lightbox="image-1" data-title="Nunc ullamcors">
                    <img data-echo="{{$product->image}}" src="{{$product->image}}" alt="" width="130px" height="130px">
                    <div class="zoom-overlay"></div>
                  </a>
                </div><!-- /.image -->
                
              </div><!-- /.product-image -->
            </div><!-- /.col -->
            <div class="col-xs-7">
              <div class="product-info">
                <h3 class="name dotdotdot"><a href="#">{{$product->title}}</a></h3>
                <div class="rating rateit-small"></div>
                <div class="product-price dotdotdot">
                  <span class="price">
                    $650.99 </span>
                  </div><!-- /.product-price -->
                  <div class="action"><a href="#" class="lnk btn btn-primary btn-xs">Mua Hàng</a></div>
                </div>
              </div><!-- /.col -->
            </div><!-- /.product-micro-row -->
          </div><!-- /.product-micro -->
        </div>
        <?php } ?>
      </div>

    </div>
  </div><!-- /.sidebar-widget-body -->
                                                    </div><!-- /.sidebar-widget -->