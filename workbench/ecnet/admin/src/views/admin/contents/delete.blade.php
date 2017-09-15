<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thông báo!</title>
    <link href="{{URL::to('/')}}/packages/ecnet/admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

</head>
<body>
    <div class="container">
        <h4>Bạn chắn muốn xóa nội dung: {{$content->title}}</h4>
        <p>
            {{$content->body}}
        </p>
        <p><a class="btn btn-danger" href="/admin/contents/{{$content->id}}/delete-process">Chấp nhận</a></p>
    </div>
</body>
</html>