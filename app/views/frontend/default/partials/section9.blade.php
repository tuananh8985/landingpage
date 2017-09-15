      <div class="vc_row wpb_row vc_row-fluid tzSpace_default tz_meetup_custom_color vc_custom_1469091651299 vc_row-has-fill">
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner vc_custom_1450062588633">
                <div class="wpb_wrapper">
                    <div class="tz_meetup_btn text-center  " >
                        <h4 class="tz_meetup_title_btn" >
                            MDA’s Quickest Way To Make You More Successful!        
                        </h4>
                        <a class="tz_meetup_btn_white"   >
                            LEARN MORE
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tzRow_ArrowType4" ></div>                  
    </div>
    <div id="speaker" class="vc_row wpb_row vc_row-fluid tzSpace_default vc_custom_1469091660444 vc_row-has-fill">
        <div class="container">
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                        <div class="tz_maniva_meetup_title  tz_text_align_center">
                            <h3 style="color:#ffffff">
                                Danh Sách Nhà Tài Trợ           
                            </h3>
                            <div class="tz_image_title_meetup">
                                <img width="70" height="5" src="../wp-content/uploads/2015/09/line-white-red.png" class="attachment-full size-full" alt="" srcset="http://wordpress.templaza.net/wp-maniva/meetup/wp-content/uploads/2015/09/line-white-red.png 70w, http://wordpress.templaza.net/wp-maniva/meetup/wp-content/uploads/2015/09/line-white-red-65x5.png 65w" sizes="(max-width: 70px) 100vw, 70px" />            
                            </div>
                        </div>
                        <div class="vc_empty_space"   style="height: 60px" ><span class="vc_empty_space_inner"></span></div>
                        <div class="tz-partner">
                            <div class="partner-slider owl-carousel owl-theme" data-option-column="5" data-auto="1" data-loop="1" data-rtl="0">
                             @foreach($banners as $item)
                             <div class="tz-partner-item">
                                <img width="162" height="102" src="{{asset($item->image)}}" class="attachment-full size-full" alt="" />                    
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="vc_empty_space"   style="height: 100px" ><span class="vc_empty_space_inner"></span></div>

                    <div class="tz-partner">
                        <div class="partner-slider owl-carousel owl-theme row" data-option-column="5" data-auto="1" data-loop="1" data-rtl="1">
                         @foreach($banners as $item)
                         <div class="tz-partner-item">
                            <img width="140" height="105" src="{{asset($item->image)}}" class="attachment-full size-full" alt="" />                    
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="vc_empty_space"   style="height: 96px" ><span class="vc_empty_space_inner"></span></div>

                <div class="tz_meetup_btn text-center  " >



                    <a class="tz_meetup_bnt_orange_bk"   >
                       Tham Gia Tài Trợ
                    </a>


                </div>

            </div>
        </div>
    </div>
</div>
</div>


<style type="text/css">
    .vc_custom_1469091660444 {
        padding-top: 110px !important;
        padding-bottom: 120px !important;
        background-image: url(http://wordpress.templaza.net/wp-maniva/meetup/wp-content/uploads/2015/09/bk-101.png?id=935) !important;
        background-position: 0 0 !important;
        background-repeat: no-repeat !important;
    }
</style>