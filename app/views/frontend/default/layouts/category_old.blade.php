@extends('frontend.default.layouts.master')
@section('content')
<div id="content-block">

    <div class="content-center fixed-header-margin">
        <!-- HEADER -->
        @include('frontend.default.partials.header_content')

        <div class="content-push">
            <div class="information-blocks" style="padding-bottom: 80px;">
                <div class="row">

                    <div class="col-md-9">

                        <div class="swiper-tabs tabs-switch" style="padding-top: 0px;">
                            <div class="title">sản phẩm</div>
                            <div class="list">
                                <a class="block-title tab-switcher active">Tin tức</a>
                                <div class="clear"></div>
                            </div>
                        </div>

                        <div class="row">

                            <div class=" information-entry">
                                <div class="blog-landing-box type-3">
                                    <?php
                                    $top_news_footer = Page::whereType(2)
                                    ->whereSubtype('post')
                                    ->orderBy('created_at','DEST')
                                    ->whereNotIn('parent',[379])
                                    ->paginate(4);
                                    ?>
                                    @foreach($top_news_footer as $news)
                                    <div class="blog-entry">
                                        <a class="image hover-class-1" href="{{$news->link()}}"><img src="{{$news->getThumb(270,185)}}" alt="" /><span class="hover-label">Xem thêm</span></a>
                                        <div class="date">{{$news->created_at->format('d')}} <span>{{$news->created_at->format('F')}}</span></div>
                                        <div class="content">
                                            <a class="title" href="{{$news->link()}}">{{$news->title}}</a>
                                            <div class="subtitle"  style="    font-size: 12px;">Posted {{$news->created_at->format('d-m-y')}}  by <a href="#"><b>Admin</b></a>  /  Danh mục: <a href="/tintuc">Tin tức</a></div>
                                            <div class="description">{{$news->description}}</div>

                                            <a class="readmore" href="{{$news->link()}}">Xem thêm</a>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>

                            </div>


                            <div style="float: right; margin-bottom: 10px ;">{{$top_news_footer->links()}}</div>
                        </div>

                        @include('frontend.default.partials.seach_brain')

                    </div>
                    <div class="col-md-3">
                        @include('frontend.default.partials.sidebar')

                        <h3 class="block-title inline-product-column-title">Bài viết nổi bật</h3>
                        <?php
                        $top_post = Page::whereType(2)
                        ->whereSubtype('post')
                        ->orderBy('featured','DESC')
                        ->paginate(4);
                        ?>
                        @foreach($top_post as $post)
                        <div class="inline-product-entry">
                            <a class="image" href="#"><img src="{{$post->getThumb(70,70)}}" alt=""></a>
                            <div class="content">
                                <div class="cell-view">
                                    <a class="title" href="{{$post->link()}}">{{$post->title}}</a>
                                    <div class="description">Posted {{$post->created_at->format('F d, Y')}}</div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        @endforeach
                        <?php
                        $featuredPosts = Page::products()->orderBy('featured','DESC')
                        ->whereSubtype('product')
                        ->whereType(2)
                        ->take(3)
                        ->get();


                        ?>
                        <div class="information-blocks">
                            <div class="information-entry products-list">
                                <h3 class="block-title inline-product-column-title">Sản phẩm nổi bật</h3>
                                @foreach($featuredPosts as $product)
                                <div class="inline-product-entry">
                                    <a href="{{$product->link()}}" class="image"><img alt="" src="{{$product->getThumb(53,53)}}"></a>
                                    <div class="content">
                                        <div class="cell-view">
                                            <a href="{{$product->link()}}" class="title">{{$product->title}}</a>


                                            <div class="gia" >{{$product->getProperty('price')}}</div>

                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                @endforeach

                            </div>
                        </div>


                    </div>


                </div>
            </div>






        </div>

    </div>
    <div class="clear"></div>

</div>
@include('frontend.default.partials.footer_content')
@stop