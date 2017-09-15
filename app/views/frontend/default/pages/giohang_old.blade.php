@extends('frontend.default.layouts.master')
@section('content')

<section id="columns" class="offcanvas-siderbars">
	<div class="container">
		<div class="row">
			<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="cart">
					<div class="page-title title-buttons">		
						<h1>Giỏ hàng</h1>		
					</div>
					<form action="http://demo4coder.com/magento1/superstore/index.php/checkout/cart/updatePost/" method="post">
						<input name="form_key" type="hidden" value="oMWFWRN8LsPRAuNz">
						<fieldset>
							<table id="shopping-cart-table" class="table table-bordered table-responsive">
								<colgroup><col width="1">
								<col>
								<col width="1">
								<col width="1">
								<col width="1">
								<col width="1">
								<col width="1">

							</colgroup>
							<thead>
								<tr class="first last">
									<th rowspan="1">Ảnh</th>
									<th rowspan="1"><span class="nobr">Tên Sản Phẩm</span></th>
									<th class="a-center" colspan="1"><span class="nobr">Giá</span></th>
									<th rowspan="1" class="a-center">Số Lượng</th>
									<th class="a-center" colspan="1">Tổng</th>
									<th rowspan="1" class="a-center">Xóa</th>
								</tr>
							</thead>
							<tfoot>
								<tr class="first last">
									<td colspan="50" class="a-right last">
										<button type="button" name="update_cart_action" value="empty_cart" title="Clear Shopping Cart" class="button btn-empty" id="empty_cart_button" onclick="window.location.href='{{route('sanpham')}}'">
											<span><span>Tiếp tục mua hàng</span></span>
										</button>
										<button type="button" name="update_cart_action" value="empty_cart" title="Clear Shopping Cart" class="button btn-empty" id="empty_cart_button" onclick="window.location.href='{{route('removeSesstion')}}'">
											<span><span>Hủy Giỏ Hàng</span></span>
										</button>
										<button type="button" name="update_cart_action" value="empty_cart" title="Clear Shopping Cart" class="button btn-empty" id="empty_cart_button" onclick="window.location.href='{{route('register')}}'">
											<span><span>Mua ngay</span></span>
										</button>

									</td>
								</tr>
							</tfoot>
							<tbody>

								<?php $cart = Session::get('cart');?>
								@if($cart)
								@foreach($cart['product'] as $item)
								<tr class="first last odd">
									<td>
										<a href="http://demo4coder.com/magento1/superstore/index.php/farlap-shirt-ruby-wine.html" title="Farlap Shirt - Ruby Wine" class="product-image"><img src="/{{$item['image']}}" width="75" height="75" alt="{{$item['name']}}"></a>
									</td>
									<td>
										<h2 class="product-name">
											<a href="{{URL::to('/').'/'.$item['slug']}}">{{$item['name']}}</a>
										</h2>

									</td>
									<td class="a-right">
										<span class="cart-price">
											<span class="price">{{number_format($item['price'])}} VNĐ</span>                
										</span>


									</td>
									<td class="a-center qtybox">
										{{number_format($item['quality'])}}
									</td>
									<td class="a-right itemwisetotal">
										<span class="cart-price">

											<span class="price">{{number_format($item['total'])}} VND</span>                            
										</span>
									</td>
									<td class="a-center removeitem last"><a href="{{route('removeItem', $item['id'])}}">Xóa</a></td>
								</tr>
								@endforeach
								@endif
							</tbody>
						</table>
					</fieldset>
				</form>
				<div class="cart-collaterals row">

					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="totals">
							@if($cart != null)
							<table id="shopping-cart-totals-table">
								<tr>
									<td style="" class="a-right" colspan="1">
										<strong>Tổng Giá</strong>
									</td>
									<td style="" class="a-right">
										<strong><span class="price">{{$cart['total']}} VND</span></strong>
									</td>
								</tr>

							</table>
							@else
							 <p>Bạn chưa có sản phẩm nào trong giỏ hàng</p>
							@endif

						</div>
					</div>

				</div>
			</div>
		</section>
	</div>
</div>
</section>

@endsection