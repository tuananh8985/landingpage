<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div id='preview'>
</div>
<form id="imageform" method="post" enctype="multipart/form-data" action='/test-upload' style="clear:both">
    Upload image:
    <div id='imageloadstatus' style='display:none'><img src="loader.gif" alt="Uploading...."/></div>
    <div id='imageloadbutton'>
        <input type="file" name="photos[]" id="photoimg" multiple="true" />
    </div>
</form>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="/assets/js/wallform.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function()
    {

        $('#photoimg').on('change', function()
        {
            var A=$("#imageloadstatus");
            var B=$("#imageloadbutton");

            $("#imageform").ajaxForm({target: '#preview',
                beforeSubmit:function(){
                    A.show();
                    B.hide();
                },
                success:function(){
                    A.hide();
                    B.show();
                },
                error:function(){
                    A.hide();
                    B.show();
                } }).submit();
        });

    });
</script>
</body>
</html>