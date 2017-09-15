@extends('frontend.default.layouts.master')
@section('content')
    <div id="content-block">

        <div class="content-center fixed-header-margin">
            <!-- HEADER -->
            @include('frontend.default.partials.header_content')

            <div class="content-push">
                <div class="information-blocks" style="padding-bottom: 80px;">
                    <div class="row">
                        <div class="col-md-3">
                            @include('frontend.default.partials.sidebar')
                            <div>
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
                            <div>
                            <h3 class="block-title inline-product-column-title">Bài viết mới nhất </h3>
                            
                            @foreach($top_news as $post)
                                <div class="inline-product-entry">
                                    <a class="image" href="{{$post->link()}}"><img src="{{$post->getThumb(70,70)}}" alt=""></a>
                                    <div class="content">
                                        <div class="cell-view">
                                            <a class="title" href="{{$post->link()}}">{{$post->title}}</a>
                                            <div class="description">Posted {{$post->created_at->format('F d, Y')}}</div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            @endforeach
                            </div>

                        </div>
                        <div class="col-md-9">

                            <div class="swiper-tabs tabs-switch" style="padding-top: 0px;" >
                                <div class="list">
                                    <a class="block-title tab-switcher active" style="    margin-top: 0px;  padding-top: 0px; padding-bottom: 30px;">Sản phẩm   <span style="color: #d35400; font-size: 16px; ">  >> {{$hang}}</span></a>
                                    <div class="clear"></div>
                                </div>
                            </div>

                            <div class="row">


                                <div class="row shop-grid grid-view">


                                    @foreach($products as $product)
                                        <div class="col-md-3 col-sm-4 shop-grid-item">
                                            <div class="product-slide-entry shift-image" style="min-height: 1000px;">
                                                <div class="product-image">
                                                    <img src="{{$product->getThumb(200,230)}}" alt="" />
                                                    <img src="{{$product->getThumb(200,230)}}" alt="" />

                                                </div>
                                                <a class="title" href="{{$product->link()}}" style="font: 9pt Verdana, Geneva, Arial, Helvetica, sans-serif;  font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; font-size: 9pt;font-weight: bold;" >{{$product->title}}</a>
                                                <div class="price">

                                                    <div class="current">{{$product->getProperty('price')}}</div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                    @endforeach
                                </div>



                            </div>
                            @include('frontend.default.partials.seach_brain')
                        </div>



                    </div>
                </div>
            </div>

        </div>
        <div class="clear"></div>

    </div>
    @include('frontend.default.partials.footer_content')
@stop