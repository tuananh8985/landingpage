@extends('frontend.default.layouts.master')
@section('content')
<?php
$Posts_news = Page::products()->orderBy('created_at','DESC')
->whereSubtype('product')
->whereType(2)
->paginate(9)
?>
<div class="search-result-container" id="list_category_product">
    <div id="myTabContent" class="tab-content">

        <!-- begin -->
        <div class="tab-pane active " id="grid-container">
            <div class="category-product  inner-top-vs">
                <h2 class="title_border_bottom">
                    <a href="{{route('home')}}">Trang chủ</a> > Sản Phẩm
                </h2>
                <div class="row">

                    @foreach($Posts_news as $item)
                    <div class="col-sm-6 col-md-4 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">

                     <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image">
                                    <a href="{{$item->link()}}">
                                        <figure style="width: 100%;height: 0px;padding-bottom: calc(100%/6*4);overflow: hidden;">
                                            <img style="width: 100%;" class="img-responsive" src="{{$item->image}}" width="" height="" alt="Farlap Shirt - Ruby Wine">
                                        </figure>
                                    </a>
                                </div><!-- /.image -->
                               
                            </div><!-- /.product-image -->
                            <div class="product-info text-left">
                                <h3 class="name dotdotdot"><a href="{{$item->link()}}">{{$item->title}}</a></h3>

                                <div class="description"></div>
                                <div class="product-price dotdotdot">
                                    <span class="price">
                                        {{number_format($item->getProperty('price'))}} VNĐ
                                    </span>
                                    <span class="price-before-discount">
                                       @if($item->properties[1])
                                       @if($item->properties[1]->value === '')
                                       {{0}}
                                       @else
                                       {{number_format($item->properties[1]->value)}} VNĐ
                                       @endif
                                       @endif
                                   </span>
                               </div><!-- /.product-price -->
                           </div><!-- /.product-info -->
                           <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon btn-xs" data-toggle="dropdown" type="button">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                        <a href="{{$item->link()}}">
                                            <button  type="button" title="" class="btn btn-primary btn-xs"><span><span>Mua Hàng</span></span>
                                            </button>
                                        </a>
                                    </li>
                                  
                                </ul>
                            </div><!-- /.action -->
                        </div><!-- /.cart -->
                    </div><!-- /.product -->
                </div><!-- /.products -->
            </div><!-- /.item -->
            @endforeach
        </div><!-- /.row -->
    </div><!-- /.category-product -->
</div><!-- /.tab-pane -->

<!-- end -->
</div><!-- /.tab-content -->


<div class="clearfix filters-container">
    <div class="text-right">
        <div class="col-xs-12">
            {{$Posts_news->links()}}
        </div>
    </div><!-- /.filters-container -->
</div>
@endsection