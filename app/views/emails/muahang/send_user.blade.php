<!DOCTYPE html>
<html lang=&quot;en-US&quot;>
<head>
	<meta charset=&quot;utf-8&quot;>
</head>
<body>
	<h3>Thông tin đơn hàng mua :
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
			<p>Xin kính chào quý khách <span style="font-weight:bold;">{{$input['last_name']}}</span> </p>
			<p>Cảm ơn quý khách đã đặt mua hàng. Hệ thống của chúng tôi đã nhận được yêu cầu mua hàng của quý khách như dưới đây.</p>
		</div>
		<div class="main">
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
							<p>1. Tên Sản phẩm:{{$value['name']}}</p>
							<p>2. Số lượng sản phẩm :{{$value['quality']}}</p> 
							<p>3. Giá sản phẩm:{{number_format($value['price'])}} VNĐ</p>
						<?php endforeach ?>
					<?php endif ?>
				<?php endforeach ?> 
				<p>Tổng số tiền: {{number_format($cart['total'])}} VNĐ</p>
			</div>
			<p>Hê thống chúng tôi đang xử lý và bộ phận phụ trách sẽ liên hệ với quý khách trong thời gian nhanh nhất có thể.</p>
			<p>Một lần nữa, xin chân thành sự cảm ơn của quý khách.</p>
			<p>Nếu có bất cứ câu hỏi, hay thắc mắc, phản hồi về sản phẩm, hình thức thanh toán, hãy liên hệ ngay với chúng tôi.</p>
		</div>
	</body>
	</html>