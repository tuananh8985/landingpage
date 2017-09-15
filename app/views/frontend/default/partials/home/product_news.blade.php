        <section class="section featured-product wow fadeInUp border_image div_dot_price" id="product_news">
        	<h3 class="section-title">Sản Phẩm Mới Nhất</h3>
        	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            <?php
            $Posts_news = Page::products()->orderBy('created_at', 'DESC')
            ->whereSubtype('product')
            ->whereType(2)
            ->take(12)
            ->get();
            ?>
            <?php
            foreach ($Posts_news as $key => $product) {
              if ($key > 2)
                break;
              ?>
              <div class="item item-carousel">
               <div class="products">
                <div class="product">
                 <div class="product-image">
                  <div class="image">
                    <a href="{{$product->link()}}" title="{{$product->title}}" class="product-image">
                      <img style="" class="img-responsive" src="{{$product->image}}" width="" height="" alt="{{$product->title}}">
                    </a>
                  </div><!-- /.image -->
                </div><!-- /.product-image -->
                <div class="product-info text-left">
                  <h3 class="name"><a class="dotdotdot" href="{{$product->link()}}">{{$product->title}}</a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="description"></div>
                  <div class="product-price dotdotdot">
                   <span class="price">
                     {{number_format($product->getProperty('price'))}} VNĐ 
                   </span>
                   <span class="price-before-discount">
                     @if($product->properties[1])
                     @if($product->properties[1]->value === '')
                     {{0}}
                     @else
                     {{number_format($product->properties[1]->value)}} VNĐ
                     @endif
                     @endif
                   </span>
                 </div><!-- /.product-price -->
               </div><!-- /.product-info -->
               <div class="cart clearfix animate-effect">
                 <div class="action">
                  <ul class="list-unstyled">
                   <li class="add-cart-button btn-group">
                    <button class="btn btn-primary icon btn-xs" data-toggle="dropdown" type="button">
                     <i class="fa fa-shopping-cart"></i>
                   </button>
                   <a href="{{$product->link()}}"><button class="btn btn-primary btn-xs" type="button">Mua Hàng</button></a>
                 </li>

               </ul>
             </div><!-- /.action -->
           </div><!-- /.cart -->
         </div><!-- /.product -->
       </div><!-- /.products -->
     </div><!-- /.item -->
     <?php } ?>
     <!-- list2 -->
     <?php
     foreach ($Posts_news as $key => $product) {
      if ($key < 3 || $key > 5)
        continue;
      ?>
      <div class="item item-carousel">
       <div class="products">
        <div class="product">
         <div class="product-image">
          <div class="image">
            <a href="{{$product->link()}}" title="{{$product->title}}" class="product-image">
              <img style="" class="img-responsive" src="{{$product->image}}" width="" height="" alt="{{$product->title}}">
            </a>
          </div><!-- /.image -->
        </div><!-- /.product-image -->
        <div class="product-info text-left">
          <h3 class="name"><a class="dotdotdot" href="{{$product->link()}}">{{$product->title}}</a></h3>
          <div class="rating rateit-small"></div>
          <div class="description"></div>
          <div class="product-price dotdotdot">
           <span class="price">
             {{number_format($product->getProperty('price'))}} VNĐ </span>
             <span class="price-before-discount">
               @if($product->properties[1])
               @if($product->properties[1]->value === '')
               {{0}}
               @else
               {{number_format($product->properties[1]->value)}} VNĐ
               @endif
               @endif
             </span>
           </div><!-- /.product-price -->
         </div><!-- /.product-info -->
         <div class="cart clearfix animate-effect">
           <div class="action">
            <ul class="list-unstyled">
             <li class="add-cart-button btn-group">
              <button class="btn btn-primary icon btn-xs" data-toggle="dropdown" type="button">
               <i class="fa fa-shopping-cart"></i>
             </button>
             <a href="{{$product->link()}}"><button class="btn btn-primary btn-xs" type="button">Mua Hàng</button></a>
           </li>

         </ul>
       </div><!-- /.action -->
     </div><!-- /.cart -->
   </div><!-- /.product -->
 </div><!-- /.products -->
</div><!-- /.item -->
<?php } ?>
<!-- list2 -->
<!-- list3 -->
<?php
foreach ($Posts_news as $key => $product) {
 if ($key < 6 || $key > 9)
  continue;
?>
<div class="item item-carousel">
 <div class="products">
  <div class="product">
   <div class="product-image">
    <div class="image">
      <a href="{{$product->link()}}" title="{{$product->title}}" class="product-image">
        <img style="" class="img-responsive" src="{{$product->image}}" width="" height="" alt="{{$product->title}}">
      </a>
    </div><!-- /.image -->
  </div><!-- /.product-image -->
  <div class="product-info text-left">
    <h3 class="name"><a class="dotdotdot" href="{{$product->link()}}">{{$product->title}}</a></h3>
    <div class="rating rateit-small"></div>
    <div class="description"></div>
    <div class="product-price dotdotdot">
     <span class="price">
       {{number_format($product->getProperty('price'))}} VNĐ </span>
       <span class="price-before-discount">
         @if($product->properties[1])
         @if($product->properties[1]->value === '')
         {{0}}
         @else
         {{number_format($product->properties[1]->value)}} VNĐ
         @endif
         @endif
       </span>
     </div><!-- /.product-price -->
   </div><!-- /.product-info -->
   <div class="cart clearfix animate-effect">
     <div class="action">
      <ul class="list-unstyled">
       <li class="add-cart-button btn-group">
        <button class="btn btn-primary icon btn-xs" data-toggle="dropdown" type="button">
         <i class="fa fa-shopping-cart"></i>
       </button>
       <a href="{{$product->link()}}"><button class="btn btn-primary btn-xs" type="button">Mua Hàng</button></a>
     </li>
   </ul>
 </div><!-- /.action -->
</div><!-- /.cart -->
</div><!-- /.product -->
</div><!-- /.products -->
</div><!-- /.item -->
<?php } ?>
<!-- list3 -->
<!-- list4 -->
<?php
foreach ($Posts_news as $key => $product) {
  if ($key < 9 || $key > 12)
    continue;
  ?>
  <div class="item item-carousel">
   <div class="products">
    <div class="product">
     <div class="product-image">
      <div class="image">
        <a href="{{$product->link()}}" title="{{$product->title}}" class="product-image">
          <img style="" class="img-responsive" src="{{$product->image}}" width="" height="" alt="{{$product->title}}">
        </a>
      </div><!-- /.image -->
    </div><!-- /.product-image -->
    <div class="product-info text-left">
      <h3 class="name"><a class="dotdotdot" href="{{$product->link()}}">{{$product->title}}</a></h3>
      <div class="rating rateit-small"></div>
      <div class="description"></div>
      <div class="product-price dotdotdot">
       <span class="price">
         {{number_format($product->getProperty('price'))}} VNĐ </span>
         <span class="price-before-discount"> 
           @if($product->properties[1])
           @if($product->properties[1]->value === '')
           {{0}}
           @else
           {{number_format($product->properties[1]->value)}} VNĐ
           @endif
           @endif
         </span>
       </div><!-- /.product-price -->
     </div><!-- /.product-info -->
     <div class="cart clearfix animate-effect">
       <div class="action">
        <ul class="list-unstyled">
         <li class="add-cart-button btn-group">
          <button class="btn btn-primary icon btn-xs" data-toggle="dropdown" type="button">
           <i class="fa fa-shopping-cart"></i>
         </button>
         <a href="{{$product->link()}}"><button class="btn btn-primary btn-xs" type="button">Mua Hàng</button></a>
       </li>
     </ul>
   </div><!-- /.action -->
 </div><!-- /.cart -->
</div><!-- /.product -->
</div><!-- /.products -->
</div><!-- /.item -->
<?php } ?>
<!-- list4 -->
</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->