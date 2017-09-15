<section class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right main-column">                        
	<div id="content">
		<div class="col-xs-12">
			<div class="category-products list_news">
				<div class="products-block" id="products-grid">

					<h1 class="title_border_bottom">Danh Sách Tin Tức</h1>
					<!-- gegin -->
					@foreach($data as $item)
					<div class="row list_item_news">
						<div class="blog-entry">
							<div class="col-xs-3">

								<figure style="width: 100%;height: 0px;padding-bottom: calc(100%/6*4);overflow: hidden;">
									<img style="width: 90%;" class="img-responsive" src="{{$item->image}}" width="200" height="" alt="">
								</figure>
							</div>
							<div class="col-xs-9">
								<div class="content">
									<p id="title_dot" class="dotdotdot"><a class="title_bold" href="{{URL::to('/')}}/{{$item->slug}}">{{$item->title}}</a></p>
									<div class="subtitle created_at" style="    font-size: 12px;">Created {{$item->created_at}}
									</div>
									<div id="description" class="dotdotdot">{{$item->description}}</div>

								</div>
							</div>
						</div>
					</div>
					@endforeach

					<div class="row">
						<div class="col-xs-12">
							<?php echo $data->links(); ?>
						</div>
					</div>
					<!-- end -->

				</div>
			</div>
		</div>
	</div>
</section>