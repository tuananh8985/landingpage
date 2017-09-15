<div class="vc_row wpb_row vc_row-fluid tzSpace_default vc_custom_1469091598391 vc_row-has-fill">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner vc_custom_1450067549377">
            <div class="wpb_wrapper">
                <div class="tz_maniva_meetup_title tz_maniva_meetup_title_type3">
                    <h3 >

                        <span  class="tz_title_line_left"></span>

                        Thành Viên Ban Điều Hành
                        <span  class="tz_title_line_right"></span>

                    </h3>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="vc_row wpb_row vc_row-fluid tzSpace_default vc_custom_1469091609000 vc_row-o-equal-height vc_row-flex">
    @foreach($manager as $item)
    <div class="wpb_column vc_column_container vc_col-sm-3">
        <div class="vc_column-inner vc_custom_1450062525555">
            <div class="wpb_wrapper">
                <div class="speaker_box tz_md_modal_show">
                    <div class="tz_meetup_our_team_thumbnail md-trigger tz_md_effect_16" data-modal="modal-16">
                        <img width="479" height="355" src="{{asset($item->image)}}" class="attachment-full size-full" alt="" srcset="{{asset($item->image)}}" sizes="(max-width: 479px) 100vw, 479px" />            <div class="tz_member_meetup">
                        <div class="ds-table">
                            <div class="ds-table-cell">
                                <h4 class="tz_meetup_employment">
                                    {{$item->title}}   
                                </h4>
                                <h3 class="tz_meetup_name">
                                    {{$item->SoftTrim($item->description,50)}}                  
                                </h3>


                                
                                <a href="{{$item->link()}} ">
                                    <span class="tz_text_hover_speaker" data-modal="modal-16" >
                                        Xem Chi Tiết                          
                                    </span>
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md-overlay"></div><!-- the overlay element -->
            </div>
        </div>  
    </div>
</div> 
@endforeach       
</div>