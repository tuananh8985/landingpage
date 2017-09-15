<div id="gallery" class="vc_row wpb_row vc_row-fluid tzSpace_default vc_custom_1469091643361 vc_row-has-fill"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner vc_custom_1450067801548"><div class="wpb_wrapper">
    <div class="tz_maniva_meetup_title  tz_text_align_center">


        <h3 class="tz_meetup_title_raleway tz_title_meetup_medium" style="color:#ffffff">
           Thư Viện Ảnh           
        </h3>



        <div class="tz_image_title_meetup">
            <img width="70" height="5" src="http://wordpress.templaza.net/wp-maniva/meetup/wp-content/uploads/2015/09/line-white-red.png" class="attachment-full size-full" alt="" srcset="http://wordpress.templaza.net/wp-maniva/meetup/wp-content/uploads/2015/09/line-white-red.png 70w, http://wordpress.templaza.net/wp-maniva/meetup/wp-content/uploads/2015/09/line-white-red-65x5.png 65w" sizes="(max-width: 70px) 100vw, 70px">            </div>



            <div class="tz_meetup_title_content">
                <p><span style="color: #95979d;">The Muscular Dystrophy Association and University of Florida Child Health Research Institute invite</span></p>
                <p><span style="color: #95979d;">you to attend the Becker Muscular Dystrophy Conference. Check our</span> <span style="color: #e45914;"><a style="color: #e45914;" href="https://www.facebook.com/templaza" target="_blank" rel="noopener noreferrer">Fanpage.</a></span></p>
            </div>



        </div>




        <div class="wpb_text_column wpb_content_element  vc_custom_1478572437380">
            <div class="wpb_wrapper">

                <style type="text/css">
                    body  #pgzoomview.plusgallery2 a:hover,
                    body #plusgallery2 .pgalbumlink:hover,
                    body #plusgallery2 .pgalbumlink:hover .pgplus,
                    #plusgallery2 #pgthumbcrumbs li#pgthumbhome:hover{
                        background-color:#38BEEA;
                    }
                    #plusgallery2 .back{
                        background:#38BEEA;
                    }
                    .pgthumb .back a:hover{
                        color:#38BEEA;
                    }
                    li.simple{
                        height:300px;
                        padding:;
                    }
                    body #plusgallery2 .pgthumb, body #plusgallery2 .pgalbumthumb{
                        width:20%;
                        margin:0;
                        max-width:none;
                    }

                    body #plusgallery2 .pgalbumthumb{
                        padding:;
                    }

                </style>





                <div class="row">
                    @foreach($sliders as $item)
                    <div class="col-md-3">
                        <a data-fancybox="gallery" href="{{asset($item->image)}}">
                           <img class="img_gallery" src="{{asset($item->image)}}" style="">
                       </a>
                   </div>
                   @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
</div>
</div>

<style type="text/css">
    .img_gallery{
        width: 450px;
    }
</style>