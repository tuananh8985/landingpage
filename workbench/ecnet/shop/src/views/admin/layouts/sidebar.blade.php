<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone">
                </div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="sidebar-search-wrapper">

            </li>
            <?php 
            $sidebar_menus = Menu::wherePack(3)->whereparent(0)->orderBy('order')->get();
            $menuCount = $sidebar_menus->count();
            $i = 1;
            ?>

            @foreach($sidebar_menus as $menu)
            <li
            class="
            @if($i==1)
            start
            @endif
            @if($menu->id == Menu::currentActive())
            active
            @endif

            "
            >
            <a href="{{$menu->link()}}">
                <i class="fa {{$menu->icon}}"></i>
                <span class="title">
                 {{$menu->title}}
             </span>
             @if($menu->child()->count())
             <span class="arrow">
             </span>
             @endif
             @if($menu->id == Menu::currentActive())
             <span class="selected"></span>
             @endif
         </a>
         @if($menu->child()->count())
         <ul class="sub-menu">
            @foreach($menu->child()->orderBy('order')->get() as $menu)
            <li
            @if($menu->link() == URL::current())
            class="active"
            @endif
            >
                <a href="{{$menu->link()}}">
                    <i class="{{$menu->icon}}"></i>
                    {{$menu->title}}
                </a>
            </li>
            @endforeach    
        </ul>
        @endif
    </li>
    <?php 
    $i++ 
    ?>
    @endforeach
</ul>
<!-- END SIDEBAR MENU -->
</div>
</div>