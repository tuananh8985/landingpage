@extends('frontend.default.layouts.master_gio_hang')
@section('content')

<section id="columns" class="offcanvas-siderbars" id="shopping_cart_list">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
					<div class="table-responsive">
						<form action="{{route('giohang_update')}}" method="post">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="cart-romove item">Xóa</th>
										<th class="cart-description item">Ảnh</th>
										<th class="cart-product-name item">Tên Sản Phẩm</th>
										<th class="cart-qty item">Số lượng</th>
										<th class="cart-sub-total item">Giá</th>
										<th class="cart-total last-item">Tổng</th>
									</tr>
								</thead><!-- /thead -->
								<tfoot>
									<tr>
										<td colspan="7">
											<div class="shopping-cart-btn shopping-cart-muahang">
												<span class="">
													<a href="{{route('sanpham')}}" class="btn btn-upper btn-primary outer-left-xs">Tiếp Tục Mua Hàng</a>
													<a href="{{route('register')}}" class="btn btn-upper btn-primary pull-right outer-right-xs muahang">Mua Ngay</a>
													<button type="submit" class="btn btn-primary" >
														CẬP NHẬT GIỎ HÀNG
													</button>
													<a href="{{route('removeSesstion')}}" class="btn btn-upper btn-primary pull-right outer-right-xs">Hủy Giỏ Hàng</a>
												</span>
											</div><!-- /.shopping-cart-btn -->
										</td>
									</tr>
								</tfoot>
								<tbody>
									<?php $cart = Session::get('cart');?>
									@if($cart)
									
									<?php foreach ($cart['product'] as $key => $item): ?>
										

										<tr>
											<input type="hidden" name="id[{{$key}}]" value="{{$item['id']}}" class="id">
											<td class="romove-item"><a href="{{route('removeItem', $item['id'])}}" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
											<td class="cart-image">
												<a class="entry-thumbnail" href="{{URL::to('/')}}/{{$item['slug']}}">
													<img src="{{asset($item['image'])}}" alt="" width="100px" height="auto">
												</a>
											</td>
											<td class="cart-product-name-info">
												<h4 class="cart-product-description dotdotdot"><a href="{{URL::to('/')}}/{{$item['slug']}}">{{$item['name']}}</a></h4>
											</td>

											<td class="cart-product-quantity">
												<div class="quant-input">
													<span class="price">
														<input type="number" min="1" name="quality[{{$key}}]" value="{{$item['quality']}}" class="quality">
													</span> 
												</div>
											</td>
											<td class="cart-product-sub-total"><span class="cart-sub-total-price">{{number_format($item['price'])}}</span></td>
											<td class="cart-product-grand-total"><span class="cart-grand-total-price">
											{{number_format($item['quality']*$item['price'])}} VNĐ

											</span></td>
										</tr>
									<?php endforeach ?>


									<table id="shopping-cart-totals-table">
										<tr style="clear:both;">
											@endif
											@if($cart != null)
											<label style="font-size: 20px;">Tổng Giá:</label>
											<span style="font-size: 20px;">{{number_format($cart['total'])}} VND</span>
											@else
											<p>Bạn chưa có sản phẩm nào trong giỏ hàng</p>
											@endif
										</tr>

									</table>
								</tbody><!-- /tbody -->
							</table><!-- /table -->
						</form>
					</div>
				</div><!-- /.shopping-cart-table -->	<div class="col-md-4 col-sm-12 estimate-ship-tax">
			</div><!-- /.estimate-ship-tax -->
		</div>
	</div>
</section>

@endsection