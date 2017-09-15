<section class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right main-column">                        
	<div id="content">
		<div class="category-products">
			<div class="products-block" id="products-grid">
				<div class="row">
					<!-- gegin -->
			<!-- 		<div class="col-xs-12">
						<h1>
							Sản Phẩm
						</h1>
					</div> -->
					@if(count($product_all) != 0)
					<div class="col-xs-12">
						<h1 class="title_border_bottom">Tìm thấy tất cả {{count($product_all)}} sản phẩm</h1>
					</div>
					@foreach($product as $item)

					<div class="col-xs-12 col-lg-4 col-sm-4 col-4">
						<div class="product-block">
							<div class="image swap">
								<a href="{{$item->link()}}" title="Framed-Sleeve Tops" class="product-image">
									<figure style="width: 100%;height: 0px;padding-bottom: calc(100%/6*4);overflow: hidden;">
										<img style="width: 100%;" class="img-responsive" src="{{$item->image}}" width="270" height="203" alt="{{$item->title}}">
									</figure>
								</a>
								<div class="product-colorbox">
									<a class="ves-colorbox ves-quickview cboxElement" href="{{URL::to('/')}}/{{$item->slug}}"><i class="fa fa-eye"></i></a>
								</div>
							</div>

							<div class="product-info">
								<h2 class="product-name title_product">
									<a class="dotdotdot" href="{{URL::to('/')}}/{{$item->slug}}" title="Framed-Sleeve Mid">{{$item->title}}</a>
								</h2>
								<div class="rating">
									<div class="ratings">
										<div class="rating-box">
											<div class="rating" style="width:80%"></div>
										</div>
									</div>
								</div>
								<div class="price">
									<div class="price-box">
										<span class="regular-price" id="product-price-200_clone">
											<span class="price">
												{{$item->getProperty('price')}} VNĐ
											</span>           
										</span>
									</div>
								</div>
								<div class="actions">
									<button type="button" title="Add to Cart" class="button btn-cart" onclick="addToCart('http://demo4coder.com/magento1/superstore/index.php/featured/framed-sleeve-mid.html')"><span><span>Mua Hàng</span></span></button>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					@else 
					<div class="col-xs-12">
						<h1 class="title_border_bottom">Không tìm thấy sản phẩm nào</h1>
					</div>
					@endif
					<div class="col-xs-12 paginate">
						{{$product->appends(array('category_id' => $category_id,'keyword' => $input_search))->links();}}
					</div>

					<!-- end -->
				</div>
			</div>
		</div>
	</div>
</section>