<aside class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-left offcanvas-sidebar" id="ves-columns-left">
	<div id="columns-left" class="sidebar">
		<div class=" block block-productcarousel" id="module14638907491495528511">
			<div class="block-title">
				<strong><span>Sản Phẩm Nổi Bật</span></strong>
				<div class="pretext"></div>
			</div>
			<div class="block-content">
				<div class="box-products carousel slide" id="productcarousel14638907491495528511">
					<div class="carousel-inner mini-products-list">		
						
						<div class="item first active product-grid no-margin">
							<!--  -->
							@foreach($featured_products as $item)
							<div class="row products-row odd">

								<div class="col-xs-12 col-lg-12 col-sm-12 col-12">
									<div class="product">									
										<a class="product-image" href="{{URL::to('/')}}/{{$item->slug}}" title="Crossed Shirt - Belugas">
											<img class="img-responsive" src="{{$item->image}}" alt="{{$item->title}}" width="80" height="auto">
										</a>

										<div class="product-details">
											<p class="product-name title_product">
												<a class="dotdotdot" href="{{URL::to('/')}}/{{$item->slug}}" title="{{$item->title}}">{{$item->title}}</a>
											</p>
											<div class="review"></div>
											<div class="price-box">
												<span class="regular-price" id="product-price-169">
													<span class="price">
														{{number_format($item->getProperty('price'))}} VNĐ
													</span>                                    
												</span>
											</div>
											<div class="productcarousel-action">
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							<!--  -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</aside>