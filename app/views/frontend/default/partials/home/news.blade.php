                 <section class="section outer-bottom-vs wow fadeInUp div_dot" id="new_hots">
                 	<h3 class="section-title">Tin Tức Nổi Bật</h3>
                 	<div class="blog-slider-container outer-top-xs">
                 		<div class="owl-carousel blog-slider custom-carousel">
                            @foreach($top_news as $item)
                            <div class="item">
                             <div class="blog-post">
                              <div class="blog-post-image">
                               <div class="image">
                                <a href="{{$item->link()}}">
                                    <img data-echo="{{$item->image}}" width="270" height="auto" src="{{$item->image}}" alt="">
                                </a>
                            </div>
                        </div><!-- /.blog-post-image -->
                        <div class="blog-post-info text-left">
                            <h3 class="name"><a class="dotdotdot" href="{{$item->link()}}">{{$item->title}}</a></h3>
                            <span class="info">{{$item->created_at}}</span>
                            <p class="text dotdotdot"> {{$item->description}}</p>
                            <a href="{{$item->link()}}"><button class="btn btn-primary btn-xs" type="button">Chi Tiết</button></a>
                        </div><!-- /.blog-post-info -->
                    </div><!-- /.blog-post -->
                </div><!-- /.item -->
                @endforeach
            </div><!-- /.owl-carousel -->
        </div><!-- /.blog-slider-container -->
                    </section><!-- /.section -->