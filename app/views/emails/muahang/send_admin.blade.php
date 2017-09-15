<!DOCTYPE html>
<html lang=&quot;en-US&quot;>
<head>
	<meta charset=&quot;utf-8&quot;>
</head>
<body>
	<h3>Thông tin đăng ký mua sản phẩm :
	<?php foreach ($cart as $keys => $values): ?>
		<?php if (is_array($values)): ?>
			<?php
			$i= 1;
			?>
			<?php foreach ($values as $key => $value): ?>
				<?php
				$a= $i++;
				?>
				<span>Sản phâm {{$a}}: {{$value['name']}} ,</span>
			<?php endforeach ?>
		<?php endif ?>
	<?php endforeach ?>
	</h3>
	<div>
		<div class="header">
			<p>Chào admin!</p>
			<p>Khách hàng có thông tin dưới đây đã hoàn thành đăng ký mua sản phẩm. Hãy liên lạc với khách hàng càng nhanh càng tốt.</p>
		</div>
		<div class="main">
			<div class="info">
				<p>1. Họ tên : {{$input['last_name']}}</p>
				<p>2. Số điện thoại : {{$input['phone_number']}}</p> 
				<p>3. Địa chỉ : {{$input['address']}}</p> 
				<p>4. Email : {{$input['email']}}</p>
			</div>
			<div class="shop_cart">
				<p>Thông tin đơn hàng:</p>
				<?php foreach ($cart as $keys => $values): ?>
					<?php if (is_array($values)): ?>
						<?php
						$i= 1;
						?>
						<?php foreach ($values as $key => $value): ?>
							<?php
							$a= $i++;
							?>
							<p>Sản phẩm {{$a}}:</p>
							<p>1. Tên Sản phẩm :{{$value['name']}}</p>
							<p>2. Số lượng sản phẩm :{{$value['quality']}}</p> 
							<p>3. Giá sản phẩm:{{number_format($value['price'])}} VNĐ</p>
						<?php endforeach ?>
					<?php endif ?>
				<?php endforeach ?> 
				<p>Tổng số tiền: {{number_format($cart['total'])}} VNĐ</p>
			</div>
			<p>Vui lòng đăng nhập theo đường dẫn  {{URL::route('admin.shopcart')}} để biết thông tin chi tiết.</p>
		</div>
	</body>
	</html>