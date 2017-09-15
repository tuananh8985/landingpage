 <div class="wide-banners wow fadeInUp outer-bottom-vs">
 	<div class="row">
 		<div class="col-md-12">
 			<div class="wide-banner cnt-strip">
 				<div class="image">
 					@if($banners)
 					<a href="{{$banners->link}}">
 						<img class="img-responsive" data-echo="{{asset($banners->image)}}" src="{{asset($banners->image)}}" alt="">
 					</a>
 					@else
 					<a href="{{$banners->link}}">
 						<img class="img-responsive" data-echo="{{asset('images/home/banner_spmoi.jpg')}}" src="{{asset('images/home/banner_spmoi.jpg')}}" alt="">
 					</a>
 					@endif
 				</div>
 				
 			</div><!-- /.col -->
 		</div><!-- /.row -->
                                                </div><!-- /.wide-banners -->