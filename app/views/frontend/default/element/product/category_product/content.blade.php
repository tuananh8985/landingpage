<section class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right main-column">                        
	<div id="content">
		<div class="category-products">
			<div class="products-block" id="products-grid">
				<div class="row">
					<!-- gegin -->
					<?php

					$list_product_cate = Page::where('parent',$page->id)->paginate(9);

					$product_parent_title = Page::where('id',$page->id)->select('title')->first();
					?>
					<div class="col-xs-12">
						<h1 class="title_border_bottom">
							@if($product_parent_title)
							{{$product_parent_title->title}}
							@endif
						</h1>
					</div>

					@foreach($list_product_cate as $item)
					<div class="col-xs-12 col-lg-4 col-sm-4 col-4">
						<div class="product-block">
							<div class="image swap">
								<a href="{{$item->link()}}" title="Framed-Sleeve Tops" class="product-image">
									<figure style="width: 100%;height: 0px;padding-bottom: calc(100%/6*4);overflow: hidden;">
										<img style="width: 90%;" class="img-responsive" src="{{$item->image}}" width="" height="" alt="Farlap Shirt - Ruby Wine">
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
												{{number_format($item->getProperty('price'))}} VNĐ
											</span>           
										</span>
									</div>
								</div>
								<div class="actions">
									<button type="button" title="Add to Cart" class="button btn-cart btn-xs"><span><span>Mua Hàng</span></span></button>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					<!-- end -->

					<div class="col-xs-12">
						{{$list_product_cate->links()}}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>