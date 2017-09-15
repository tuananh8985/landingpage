@extends('frontend.default.layouts.master_gio_hang')
@section('content')
<div id="content-block" class="huong_dan_mua_hang">

	<div class="container">

		<div class="content-push">
			<div class="information-blocks" >

				<div class="content-push">
					<div class="col-xs-12">
						<h2 class="title_border_bottom">
							<a href="{{route('home')}}">Trang chủ</a> > Hướng Dẫn Mua Hàng
						</h2>
					</div>
					<div class="col-xs-12">
						{{$data->body}}
					</div>
				</div>
			</div>
			<!-- FOOTER -->
		</div>
	</div>
</div>
<div class="clear"></div>

</div>
@stop