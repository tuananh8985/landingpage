<section class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right main-column">                        
	<div id="content">
		<div class="category-products">
			<div class="products-block" id="products-grid">
				<div class="row">
					<!-- gegin -->
					<?php
					$Posts_news = Page::products()->orderBy('created_at','DESC')
					->whereSubtype('product')
					->whereType(2)
					->paginate(9)
					?>
					<div class="col-xs-12">
						<h1 class="title_border_bottom">
							Danh Sách Sản Phẩm
						</h1>
					</div>
					<div class="col-xs-12">
						@foreach($Posts_news as $item)
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="product-block">
								<div class="image swap">
									<a href="{{$item->link()}}" title="Framed-Sleeve Tops" class="product-image">
										<figure style="width: 100%;height: 0px;padding-bottom: calc(100%/6*4);overflow: hidden;">
											<img style="width: 100%;" class="img-responsive" src="{{$item->image}}" width="270" height="203" alt="Farlap Shirt - Ruby Wine">
										</figure>
									</a>
									<div class="product-colorbox">
										<a class="ves-colorbox ves-quickview cboxElement" href="{{URL::to('/')}}/{{$item->slug}}"><i class="fa fa-eye"></i></a>
									</div>
								</div>

								<div class="product-info">
									<h2 class="product-name title_product">
										<a class="dotdotdot" href="{{URL::to('/')}}/{{$item->slug}}" title="{{$item->title}}">{{$item->title}}</a>
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
										<a href="{{$item->link()}}">
											<button  type="button" title="" class="button btn-cart button_cart btn-xs"><span><span>Mua Hàng</span></span>
											</button>
										</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="col-xs-12">
						{{ $Posts_news->links() }}
					</div>

					<!-- end -->
				</div>
			</div>
		</div>
	</div>
</section>