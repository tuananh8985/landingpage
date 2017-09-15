<!DOCTYPE html>
<html lang=&quot;en-US&quot;>
<head>
	<meta charset=&quot;utf-8&quot;>
</head>
<body>
	<h3>Xin kính chào quý khách  :{{$input['name']}}
	</h3>
	<div>
		<div class="header">
			<p>Cảm ơn quý khách đã liên hệ với chúng tôi. Rikagaku đang xử lý yêu cầu của bạn và sẽ liên hệ với bạn sớm nhất có thể.</p>
		</div>
		<div class="main">
			<div class="info">
				<p>Nội dung liên lạc : {{$input['title']}}</p>
				<p>Họ và tên : {{$input['name']}}</p> 
				<p>Số điện thoại : {{$input['tel']}}</p> 
				<p>Địa chỉ : {{$input['address']}}</p>
				<p>Email : {{$input['email']}}</p>
				<p>Nội dung : {{$input['message']}}</p>
				<p>Một lần nữa, xin chân thành sự cảm ơn của quý khách.</p>
			</div>
		</div>
	</body>
	</html>