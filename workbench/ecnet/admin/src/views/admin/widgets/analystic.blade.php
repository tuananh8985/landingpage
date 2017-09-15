{{Form::open(array('url'=>URL::to('ec_analytic/pageviews'),'id'=>'analytic'))}}
<input type="hidden" name="id" value="{{$_SERVER['REMOTE_ADDR']}}">
<input type="hidden" name="page" value="{{isset($page)?$page->id:'0'}}">
<input type="hidden" name="time" value="{{time()}}">
{{Form::close()}}
<script>
    jQuery(document).ready(function($) {
        $('#analytic').ajaxForm();
        $('#analytic').ajaxSubmit();
    });

</script>