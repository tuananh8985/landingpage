@extends('frontend.default.layouts.master_post_detail')
@section('content')
<?php
$Posts_related =  Page::where('type',2)
->where('subtype','post')
->where('id','<>',$page->id)
->where('parent',$page->parent)
->WhereNotIn('slug',array('lien-he','gioi-thieu','phuong-thuc-mua-hang'))
->orderBy('created_at','DESC')
->get();
?>
<section class="tz-sectionBreadcrumb">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="tz_breadcrumb_single_cat_title">
      
       </div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="tz-breadcrumb">
        <h4>
          <!-- Breadcrumb NavXT 5.7.1 -->
          <span typeof="v:Breadcrumb">
            <a rel="v:url" property="v:title" title="Go to Home." href="{{route('home')}}" class="home">Trang Chủ</a>
          </span>
          &nbsp;<span>/</span>&nbsp;
          <span typeof="v:Breadcrumb">
            @if($page->subtype == 'post' && $page->featured == 1)
            <a href="{{route('gioithieu')}}" class="">Giới Thiệu</a>
            @elseif($page->subtype == 'post' && $page->featured == 2)
            <a href="{{route('bandieuhanh')}}" class="">Ban Điều Hành</a>
            @elseif($page->subtype == 'post' && $page->featured == 3)
            <a href="{{route('tintuc')}}" class="">Tin Tức</a>
            @endif
          </span>
          &nbsp;<span>/</span>&nbsp;    
          <span typeof="v:Breadcrumb"><span property="v:title">{{$page->SoftTrim($page->title,50)}}</span></span>     
        </h4>
      </div>

    </div>
  </div>
</div><!--end class container-->
</section>
<section class="container tz-blogSingle">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="tz-blogSingleContent">

       <div class="tz-SingleContentBox">
        <div class="tz_SingleContentBox_general">
          <div class="tz-BlogImage">
            <img width="1280" height="853" src="{{URL::asset($page->image)}}" alt="" srcset="{{URL::asset($page->image)}}" sizes="(max-width: 1280px) 100vw, 1280px">                                    
            <div class="tz-ImageOverlay"></div>
          </div>
        </div>
        <h4 class="tzSingleBlog_title">
          {{$page->title}}                        
        </h4>
        <span class="tzinfomation">
          <small class="tzinfomation_time">
            {{$page->created_at}}                            
          </small>
          <a href="http://wordpress.templaza.net/wp-maniva/meetup/author/giang/">
            <i>|</i>
            Jeremy                            
          </a>
          <span class="tzcategory">
            <i>|</i>
            <a href="http://wordpress.templaza.net/wp-maniva/meetup/category/meetup/" rel="category tag">Meetup</a>                                </span>
          </span>
          <p style="font-weight:bold;">{{$page->description}}</p>
          <div class="single-content">
            <p class="ng-scope">{{$page->body}}</p>

          </div>
        </div>
      </div><!--end class blog-single-content-->
    </div>

    <div class="col-md-3 tz-sidebar" hidden>
      <aside id="categories-4" class="widget_categories widget"><h3 class="module-title"><span>Categories</span></h3>   <ul>
        <li class="cat-item cat-item-4"><a href="http://wordpress.templaza.net/wp-maniva/meetup/category/blog/">Blog</a>
        </li>
        <li class="cat-item cat-item-3"><a href="http://wordpress.templaza.net/wp-maniva/meetup/category/meetup/">Meetup</a>
          <ul class="children">
            <li class="cat-item cat-item-12"><a href="http://wordpress.templaza.net/wp-maniva/meetup/category/meetup/business/">Business</a>
            </li>
            <li class="cat-item cat-item-13"><a href="http://wordpress.templaza.net/wp-maniva/meetup/category/meetup/html-fundamentals/">Html Fundamentals</a>
            </li>
          </ul>
        </li>
        <li class="cat-item cat-item-1"><a href="http://wordpress.templaza.net/wp-maniva/meetup/category/uncategorized/">Uncategorized</a>
        </li>
      </ul>
    </aside>
    <aside id="tag_cloud-4" class="widget_tag_cloud widget"><h3 class="module-title"><span>Related Tags</span></h3><div class="tagcloud"><a href="http://wordpress.templaza.net/wp-maniva/meetup/tag/business/" class="tag-cloud-link tag-link-11 tag-link-position-1" style="font-size: 12.5818181818pt;" aria-label="business (2 items)">business</a>
      <a href="http://wordpress.templaza.net/wp-maniva/meetup/tag/customer/" class="tag-cloud-link tag-link-14 tag-link-position-2" style="font-size: 8pt;" aria-label="Customer (1 item)">Customer</a>
      <a href="http://wordpress.templaza.net/wp-maniva/meetup/tag/skills/" class="tag-cloud-link tag-link-10 tag-link-position-3" style="font-size: 8pt;" aria-label="Skills (1 item)">Skills</a>
      <a href="http://wordpress.templaza.net/wp-maniva/meetup/tag/wordpress/" class="tag-cloud-link tag-link-9 tag-link-position-4" style="font-size: 22pt;" aria-label="Wordpress (6 items)">Wordpress</a></div>
    </aside>    
  </div>
</div>
</section>
@stop