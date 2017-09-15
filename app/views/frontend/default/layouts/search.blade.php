@include('frontend.default.partials.head')


<div class="global-wrap">

    @include('frontend.default.partials.header_content')
    <!-- SEARCH AREA -->
    @include('frontend.default.partials.search_form')
    <div class="gap"></div>

    <!-- END SEARCH AREA -->
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row row-wrap">
                    <?php
                    $products = $result;

                    ?>
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="product-thumb cat-product">
                                <header class="product-header">
                                    <a href="{{$product->link()}}"><img src="{{$product->getThumb(400,300)}}" alt="Hình ảnh {{$product->title}}"
                                                                        title="a turn"/></a>
                                </header>
                                <div class="product-inner">
                                    <h5 class="product-title"><a href="{{$product->link()}}" title="{{$product->title}}">{{$product->title}}</a></h5>

                                    <p class="product-desciption">{{Str::limit($product->description,100)}}</p>

                                    <div class="product-meta">
                                        <ul class="product-price-list">
                                            @if($product->getProperty('price'))
                                                <li>
                                                    <span class="product-price">{{$product->getProperty('price')}}</span>
                                                </li>
                                            @else
                                                <li>
                                                    <span class="product-price">Liên hệ</span>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$products->links()}}
                <div class="gap"></div>
            </div>
            <div class="col-md-3">
                @include('frontend.default.partials.sidebar')
            </div>

        </div>

        @include('frontend.default.partials.footer_content')
    </div>

@include('frontend.default.partials.footer')