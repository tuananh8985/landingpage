<div id="about" class="vc_row wpb_row vc_row-fluid tzSpace_default vc_custom_1469091544143">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">

            <div class="wpb_wrapper">
                <div class="tz_maniva_meetup_title  tz_text_align_center">


                    <h3 class="tz_meetup_title_raleway tz_title_meetup_normal" style="color:#242732">
                        Giới Thiệu           </h3>



                        <div class="tz_image_title_meetup">
                            <img width="70" height="5" src="{{asset('landing_meetup/wp-content/uploads/2015/09/line-black-red.png')}}" class="attachment-full size-full" alt="" srcset="http://wordpress.templaza.net/wp-maniva/meetup/wp-content/uploads/2015/09/line-black-red.png 70w, http://wordpress.templaza.net/wp-maniva/meetup/wp-content/uploads/2015/09/line-black-red-65x5.png 65w" sizes="(max-width: 70px) 100vw, 70px" />            </div>



                            <div class="tz_meetup_title_content">
                                <p>MDA EarthSat periodically provides business conferences for both Energy and Agricultural clients</p>
                                <p>ranging from day conferences to week-long conferences. Our goal is to make each conference an</p>
                                <p>informative and valuable event for you, your company, and for our industry.</p>
                            </div>



                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="vc_row wpb_row vc_row-fluid tzSpace_default vc_custom_1469091551623">
            <div class="container">

                @foreach($intro as $item)
                <div class="wpb_column vc_column_container vc_col-sm-4">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="tz_maniva_about_meetup">
                                <div class="tz_meetup_thumbnail">


                                    <a target=" _blank" href="http://www.templaza.com/" title="templaza">
                                        <img width="368" height="245" src="{{$item->image}}" class="attachment-full size-full" alt="" srcset="{{$item->image}}" sizes="(max-width: 368px) 100vw, 368px" />                </a>


                                    </div>
                                    <h4 >

                                        <a href="{{$item->link()}}" title="templaza">
                                            {{$item->title}}   
                                        </a>

                                    </h4>
                                    <div class="tz_meetup_about_content">

                                        <p>
                                            {{$item->SoftTrim($item->description,200)}}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    
      <!--   <div class="wpb_column vc_column_container vc_col-sm-4">
            <div class="vc_column-inner "><div class="wpb_wrapper">
                    <div class="tz_maniva_about_meetup">
                        <div class="tz_meetup_thumbnail">


                            <a target=" _blank" href="http://www.templaza.com/" title="templaza">
                                <img width="375" height="250" src="../wp-content/uploads/2015/09/about-2.jpg" class="attachment-full size-full" alt="" srcset="http://wordpress.templaza.net/wp-maniva/meetup/wp-content/uploads/2015/09/about-2.jpg 375w, http://wordpress.templaza.net/wp-maniva/meetup/wp-content/uploads/2015/09/about-2-300x200.jpg 300w" sizes="(max-width: 375px) 100vw, 375px" />                </a>


                        </div>
                        <h4 >

                            <a  target=" _blank" href="http://www.templaza.com/" title="templaza">
                                WHAT WE DO?                </a>

                        </h4>
                        <div class="tz_meetup_about_content">
                            <p>We fund worldwide research, provide comprehensive health care services and support to MDA families nationwide; and rally communities to fight back through advocacy, fundraising and local engagement.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="wpb_column vc_column_container vc_col-sm-4">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div class="tz_maniva_about_meetup">
                        <div class="tz_meetup_thumbnail">


                            <a target=" _blank" href="http://www.templaza.com/" title="templaza">
                                <img width="377" height="252" src="../wp-content/uploads/2015/09/about-3.jpg" class="attachment-full size-full" alt="" srcset="http://wordpress.templaza.net/wp-maniva/meetup/wp-content/uploads/2015/09/about-3.jpg 377w, http://wordpress.templaza.net/wp-maniva/meetup/wp-content/uploads/2015/09/about-3-300x201.jpg 300w" sizes="(max-width: 377px) 100vw, 377px" />                </a>


                        </div>
                        <h4 >

                            <a  target=" _blank" href="http://www.templaza.com/" title="templaza">
                                WHY US?                </a>

                        </h4>
                        <div class="tz_meetup_about_content">
                            <p>Joining with us, you are allowed to learn about research news, health care information and helpful daily living strategies through print and online resources, including magazines, brochures and booklets.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div> -->
    </div>
</div>
<div class="tz_meetup_btn_post">
    <a href="{{route('gioithieu')}}" title="post">
       Xem Tất Cả         
   </a>
</div>

<style type="text/css">
    .tz_meetup_btn_post a {
        border: 2px solid #000000 !important;
        border-radius: 25px !important;
        color: #242732 !important;
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 500 !important;
        letter-spacing: 3px !important;
        padding: 13px 35px !important;
        text-decoration: none !important;
        text-transform: uppercase !important;
        transition: all 0.2s linear 0s !important;
        -moz-transition: all 0.2s linear 0s !important;
        -webkit-transition: all 0.2s linear 0s !important;
        -ms-transition: all 0.2s linear 0s !important;
        -o-transition: all 0.2s linear 0s !important;
    }
    .tz_meetup_btn_post {
        text-align: center !important;
        margin-top: 0px !important;
    }
</style>