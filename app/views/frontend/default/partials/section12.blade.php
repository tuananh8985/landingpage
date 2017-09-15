<div id="blog" class="vc_row wpb_row vc_row-fluid tzSpace_default tz_custom_meetup_padding_2 vc_custom_1469091705709">
    <div class="container">
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div class="tz_maniva_meetup_title  tz_text_align_center">
                        <h3 class="tz_meetup_title_raleway tz_title_meetup_semi_bold" style="color:#242732">
                            Tin Tức           
                        </h3>
                        <div class="tz_image_title_meetup">
                            <img width="70" height="5" src="../wp-content/uploads/2015/09/line-black-red.png" class="attachment-full size-full" alt="" srcset="http://wordpress.templaza.net/wp-maniva/meetup/wp-content/uploads/2015/09/line-black-red.png 70w, http://wordpress.templaza.net/wp-maniva/meetup/wp-content/uploads/2015/09/line-black-red-65x5.png 65w" sizes="(max-width: 70px) 100vw, 70px" />          
                        </div>
                    </div>
                    <div class="vc_empty_space  tz_custom_height_empty"   style="height: 60px" ><span class="vc_empty_space_inner"></span></div>
                    <div class="tz_recent_blog_meetup">
                        <button class="tz_recent_blog_pev_meetup">
                            <i class="fa fa-angle-left"></i>
                        </button>
                        <button class="tz_recent_blog_next_meetup">
                            <i class="fa fa-angle-right"></i>
                        </button>
                        <div class=" tz_meetup_slider_blog owl-carousel owl-theme" data-item-dk="3" data-auto-blog="0" data-loop-blog="0" data-rtl-blog="0">
                            @foreach($news as $item)
                            <div id="tz_recent_blog_meetup_340" class="tz_recent_blog_meetup_content">
                                <div class="tz_image_recent_blog_meetup">
                                    <div class="tz_meetup_post_img">
                                        <img width="900" height="599" src="{{asset($item->image)}}" class="attachment-large size-large wp-post-image" alt="" srcset="{{asset($item->image)}}" sizes="(max-width: 900px) 100vw, 900px" />
                                        <div class="tz_viev_link_blog">
                                            <span class="view_img_slider_blog btn_slider_view_link">
                                                <a href="../wp-content/uploads/2015/09/Meeting-2.jpg" data-rel="latestPhoto[worksGallery]">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </span>
                                            <span class="link_post_blog btn_slider_view_link">
                                                <a href="http://wordpress.templaza.net/wp-maniva/meetup/more-secure-devices/">
                                                    <i class="fa fa-external-link"></i>
                                                </a>
                                            </span>
                                        </div>

                                    </div>
                                  <!--   <div class="tz_recent_blog_meetup_date">
                                        <span class="tz_date_latest">
                                            {{$item->created_at}}                                      
                                        </span>
                                    </div> -->
                                </div>
                                <div class="tz_recent_blog_meetup_detail">
                                    <h4>
                                        <a href="{{$item->link()}}">
                                            {{$item->SoftTrim($item->title,50)}}           
                                        </a>
                                    </h4>
                                    <div class="tz_meetup_description_latest">
                                        <p>{{$item->SoftTrim($item->description,100)}}    </p>
                                    </div>
                                    <span class="tz_meetup_infomation">
                                     <!--    <a href="http://wordpress.templaza.net/wp-maniva/meetup/author/admin/">
                                            by Mary Doe                                 
                                        </a> -->
                                        <small>
                                        <i class="fa fa-calendar"></i>{{$item->created_at}}                                           </small>
                                        </span>
                                    </div>
                                </div>   
                                @endforeach
                            </div>
                            <div class="tz_meetup_btn_post">
                                <a href="{{route('tintuc')}}" title="post">
                                  Xem Tất Cả            </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>