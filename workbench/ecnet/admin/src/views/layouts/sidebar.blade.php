<?php 
$active_menu_id = Menu::active_menu();

?>

<div class="page-sidebar nav-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->
	<ul>
		<li>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<div class="sidebar-toggler hidden-phone"></div>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
		</li>
		<li>
			<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
			<!-- 					<form class="sidebar-search">
			<div class="input-box">
				<a href="javascript:;" class="remove"></a>
				<input type="text" placeholder="Search..." />
				<input type="button" class="submit" value=" " />
			</div>
		</form>
	-->
	<!-- END RESPONSIVE QUICK SEARCH FORM -->
</li>
<?php foreach (Menu::wherepack(1)->whereparent(0)->orderBy('order')->get() as $key => $menu): 
	if($key == 0) continue;
	?>
<li 
class="
@if($menu->
childs()->count() >0)
has-sub
@endif
@if($menu->id == $active_menu_id)
active
@endif
"
>
<a href="{{URL::to($menu->
	link)}}" title="{{$menu->title}}">{{$menu->icon}}
	<span class="title">{{$menu->title}}</span>
	@if($menu->id ==$active_menu_id)
	<span class="selected"></span>
	@endif
	@if($menu->childs()->count()>0)
	@if($menu->id ==$active_menu_id)
	<span class="arrow open"></span>
	@else
	<span class="arrow"></span>
	@endif

</a>
<ul class="sub">

	<?php foreach ($menu->childs()->get() as $key => $menu): 
	// if($key == 1) continue;

	?>
		<li>
			<a href="{{URL::to($menu->link)}}" title="{{$menu->title}}">{{$menu->title}}</a>
		</li>
	<?php endforeach ?>
	

</ul>
@else
</a>
@endif
</li>
<?php endforeach ?>
<li class="">
	
	<a href="{{route('admin.shopcart')}}" title="">
		<i class="icon-home"></i>
		<span class="title">
			Quản lý đơn hàng
		</span>
	</a>
	
</li>
<li class="">
	
	<a href="{{route('admin.mail.index')}}" title="">
		<i class="icon-tags"></i>
		<span class="title">
			Quản lý Email
		</span>
	</a>
	
</li>
</ul>
<!-- END SIDEBAR MENU -->
</div>