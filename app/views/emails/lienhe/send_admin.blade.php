<!DOCTYPE html>
<html lang=&quot;en-US&quot;>
<head>
	<meta charset=&quot;utf-8&quot;>
</head>
<body>
	<h3>Thông tin liên hệ về {{$input['title']}}
	</h3>
	<div>
		<div class="header">
			<p>Chào admin!</p>
			<p>Có liên hệ về {{$input['title']}} như sau. Hãy liên lạc với khách hàng càng nhanh càng tốt.</p>
		</div>
		<div class="main">
			<div class="info">
				<p>Nội dung liên lạc : {{$input['title']}}</p>
				<p>Họ và tên : {{$input['name']}}</p> 
				<p>Số điện thoại : {{$input['tel']}}</p> 
				<p>Địa chỉ : {{$input['address']}}</p>
				<p>Email : {{$input['email']}}</p>
				<p>Nội dung : {{$input['message']}}</p>
			</div>
		</div>
	</body>
	</html>