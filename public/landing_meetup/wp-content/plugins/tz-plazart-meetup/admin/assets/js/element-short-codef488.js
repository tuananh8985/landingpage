/**
 * Element Short Code js v1.1.0
 * Copyright 2017-2020
 * Licensed under  ()
 */

"use strict";

jQuery(document).ready(function () {

    /* Start jQuery animate */
    var tz_skill_graphics_value_bk  =   jQuery( '.tz_skill_graphics_value_bk' );

    if ( tz_skill_graphics_value_bk.length ) {

        new WOW(
            { offset: 300 }
        ).init();

    }
    /* End jQuery animate */

    /* Start slider home */
    var $tz_home_slider_meetup = jQuery('.tz_home_slider_meetup');

    if( $tz_home_slider_meetup.length > 0 ) {

        var header_social = jQuery('.tz_content_slider_meetup');
        var range = 380;
        jQuery(window).on('scroll', function () {
            var st = jQuery(this).scrollTop();
            header_social.each(function () {
                var offset = jQuery(this).offset().top;
                var height = jQuery(this).outerHeight();
                offset = offset + height / 2;
                jQuery(this).css({ 'opacity': 1 - (st - offset + range) / range });
            });
        });

        var $tz_superslides     =   jQuery('#slides'),
            $type_slider        =   $tz_home_slider_meetup.data('type-slider');

        if ( $type_slider !== undefined ) {

            var $slide_auto         =   $tz_home_slider_meetup.data('auto-slider'),
                $tz_slide_auto      =   '',
                $slide_modem        =   $tz_home_slider_meetup.data('slider-modem'),
                $slide_speed        =   parseInt($tz_home_slider_meetup.data('slider-speed')),
                $speed_slide        =   parseInt($tz_home_slider_meetup.data('speed-slider')),
                $slider_pager       =   $tz_home_slider_meetup.data('pager'),
                $tz_slider_pager    =   '';

            if ( $slide_auto === 0 ) {
                $tz_slide_auto = false;
            }else if ( $slide_auto === 1 )  {
                $tz_slide_auto = $slide_speed;
            }

            if ( $slider_pager === 0 ) {
                $tz_slider_pager = false;
            }else if ( $slider_pager === 1 )  {
                $tz_slider_pager = true;
            }

            $tz_superslides.superslides({
                play: $tz_slide_auto,
                animation_speed: $speed_slide,
                slide_easing: 'easeInOutCubic',
                animation_easing: 'swing',
                animation: $slide_modem,
                pagination: $tz_slider_pager,
                scrollable: true
            });



        }else if ( $type_slider === undefined ) {

            $tz_superslides.superslides({
                play: false,
                animation: 'slide',
                slide_easing: 'easeInOutCubic',
                pagination: false,
                scrollable: true
            });

            var current_slider_home_fist    =   $tz_superslides.superslides('current'),
                play_video_mobile_slider  =   jQuery( ' .tz_btn_play_video_mobile ' );

            if ( play_video_mobile_slider.length ) {

                play_video_mobile_slider.click( function () {

                    var video_slider_home_mobile    =   jQuery(this).parents( '.tz_home_slider_meetup' ).find( '.videoID' );

                    if ( video_slider_home_mobile.get(0).paused ) {
                        video_slider_home_mobile.get(0).play();
                        jQuery(this).addClass( 'tz_btn_play_video_mobile_active' );
                    } else {
                        video_slider_home_mobile.get(0).pause();
                        jQuery(this).removeClass( 'tz_btn_play_video_mobile_active' );
                    }

                } );

            }

            if ( current_slider_home_fist === -1 || current_slider_home_fist === 0 ) {

                var currentSlide_home_fist        = jQuery('.slides-container > .tz_video_slider')[current_slider_home_fist + 1],
                    currentVid_home_fist          = jQuery(currentSlide_home_fist).find("video")[0];

                if (jQuery(currentVid_home_fist).length) {
                    jQuery(currentVid_home_fist)[0].oncanplaythrough = jQuery(currentVid_home_fist)[0].play();
                }

            }

        }

        /* countdown slider home */
        var $tz_meetup_countdown = jQuery('.tz_meetup_countdown');
        if ( $tz_meetup_countdown.length > 0 ) {

            var $data_countdown     =   $tz_meetup_countdown.data('countdown'),
                $data_text_hide     =   $tz_meetup_countdown.data('hide-ended'),
                $data_text_ended    =   $tz_meetup_countdown.data('text-ended'),
                $data_text_day      =   $tz_meetup_countdown.data('text-day'),
                $data_text_hours    =   $tz_meetup_countdown.data('text-hour'),
                $data_text_min      =   $tz_meetup_countdown.data('text-min'),
                $data_text_sec      =   $tz_meetup_countdown.data('text-sec');

            if ( $data_text_hide === 'show' ) {
                jQuery('#clock').countdown($data_countdown)
                    .on('update.countdown', function(event) {
                        var $this = jQuery(this).html(event.strftime(''
                            + '<div class="tz_meetup_countdown_time"><span>%D</span><b>'+ $data_text_day +'</b></div> '
                            + '<div class="tz_meetup_countdown_time"><span>%H</span><b>'+ $data_text_hours +'</b></div> '
                            + '<div class="tz_meetup_countdown_time"><span >%M</span><b>'+ $data_text_min +'</b></div> '
                            + '<div class="tz_meetup_countdown_time"><span>%S</span><b>'+ $data_text_sec +'</b></div> '
                        ));
                    })
                    .on('finish.countdown', function(event) {
                        jQuery(this).html('<span class="tz_meetup_countdown_over">'+ $data_text_ended +'</span>')
                            .parent().addClass('disabled');

                    });
            }else {

                jQuery('#clock').countdown($data_countdown, function(event) {
                    var $this = jQuery(this).html(event.strftime(''
                        + '<div class="tz_meetup_countdown_time"><span>%D</span><b>'+ $data_text_day +'</b></div> '
                        + '<div class="tz_meetup_countdown_time"><span>%H</span><b>'+ $data_text_hours +'</b></div> '
                        + '<div class="tz_meetup_countdown_time"><span >%M</span><b>'+ $data_text_min +'</b></div> '
                        + '<div class="tz_meetup_countdown_time"><span>%S</span><b>'+ $data_text_sec +'</b></div> '
                    ));
                });
            }

        }

    }
    /* End slider home */

    /* Start slider home multi countdown */
    var $tz_slider_multi_countdown = jQuery('.tz_slider_multi_countdown');

    if ( $tz_slider_multi_countdown.length ) {

        var $tz_overlay_slider                  =   parseInt($tz_slider_multi_countdown.data('overlay_slider')),
            $tz_bk_slider                       =   $tz_slider_multi_countdown.data('bk-slider'),
            $slide_auto_multi_countdown         =   $tz_slider_multi_countdown.data('auto-slider'),
            $tz_slide_auto_multi_countdown      =   '',
            $slide_modem_multi_countdown        =   $tz_slider_multi_countdown.data('slider-modem'),
            $slide_speed_multi_countdown        =   parseInt($tz_slider_multi_countdown.data('slider-speed')),
            $speed_slide_multi_countdown        =   parseInt($tz_slider_multi_countdown.data('speed-slider')),
            $slider_pager_multi_countdown       =   $tz_slider_multi_countdown.data('pager'),
            $tz_slider_pager_multi_countdown    =   '',
            $tz_color_address                   =   $tz_slider_multi_countdown.data('color-address'),
            $tz_color_title_event               =   $tz_slider_multi_countdown.data('color-title-event'),
            $tz_color_event_time                =   $tz_slider_multi_countdown.data('color-event-time'),
            $tz_color_countdown                 =   $tz_slider_multi_countdown.data('color-countdown'),
            $tz_super_slides_multi_countdown    =   jQuery('#slides'),
            $tz_event_countdown                 =   jQuery('.tz_event_countdown'),
            $tz_text_multi_countdown            =   jQuery('.tz_slider_multi_countdown .slides-container'),
            $data_text_day_multi_countdown      =   $tz_text_multi_countdown.data('text-day'),
            $data_text_hours_multi_countdown    =   $tz_text_multi_countdown.data('text-hour'),
            $data_text_min_multi_countdown      =   $tz_text_multi_countdown.data('text-min'),
            $data_text_min_sec_countdown        =   $tz_text_multi_countdown.data('text-sec'),
            $tz_color_border_btn                =   $tz_text_multi_countdown.data('color-border-btn'),
            $tz_color_text_btn                  =   $tz_text_multi_countdown.data('color-text-btn'),
            $tz_color_hover_text_btn            =   $tz_text_multi_countdown.data('color-hover-text-btn'),
            $tz_btn_ticket                      =   jQuery( '.tz_btn_ticket a');

        if ( $slide_auto_multi_countdown === 0 ) {
            $tz_slide_auto_multi_countdown = false;
        }else if ( $slide_auto_multi_countdown === 1 )  {
            $tz_slide_auto_multi_countdown = $slide_speed_multi_countdown;
        }

        if ( $slider_pager_multi_countdown === 0 ) {
            $tz_slider_pager_multi_countdown = false;
        }else if ( $slider_pager_multi_countdown === 1 )  {
            $tz_slider_pager_multi_countdown = true;
        }

        $tz_super_slides_multi_countdown.superslides({

            play: $tz_slide_auto_multi_countdown,
            animation_speed: $speed_slide_multi_countdown,
            animation: $slide_modem_multi_countdown,
            animation_easing: 'swing',
            slide_easing: 'easeInOutCubic',
            pagination: $tz_slider_pager_multi_countdown,
            scrollable: true

        });

        if ( $tz_overlay_slider === 0 ) {
            jQuery( '.bk_multi_countdown').css("display","none");
        }

        if ( $tz_bk_slider !== undefined ) {
            jQuery( '.bk_multi_countdown').css("background-color",$tz_bk_slider);
        }

        if ( $tz_color_address !== undefined ) {
            jQuery( '.tz_address_event').css("color",$tz_color_address);
        }

        if ( $tz_color_title_event !== undefined ) {
            jQuery( '.tz_box_event_content h2').css("color",$tz_color_title_event);
        }

        if ( $tz_color_event_time !== undefined ) {
            jQuery( '.tz_event_time').css("color",$tz_color_event_time);
        }

        if ( $tz_color_countdown !== undefined ) {
            $tz_event_countdown.css("color",$tz_color_countdown);
        }

        if ( $tz_color_border_btn !== undefined ) {

            $tz_btn_ticket.css("border-color",$tz_color_border_btn);

            $tz_btn_ticket.hover(function(){
                jQuery(this).css("background-color", $tz_color_border_btn);
            }, function(){
                jQuery(this).css("background-color", "transparent");
            });

        }

        if ( $tz_color_hover_text_btn === undefined && $tz_color_text_btn !== undefined ) {

            $tz_btn_ticket.css("color",$tz_color_text_btn);

            $tz_btn_ticket.hover(function(){
                jQuery(this).css("color", "#ffffff");
            }, function(){
                jQuery(this).css("color", $tz_color_text_btn);
            });
        }

        if ( $tz_color_hover_text_btn !== undefined && $tz_color_text_btn !== undefined ) {

            $tz_btn_ticket.css("color",$tz_color_text_btn);

            $tz_btn_ticket.hover(function(){
                jQuery(this).css("color", $tz_color_hover_text_btn);
            }, function(){
                jQuery(this).css("color", $tz_color_text_btn);
            });

        }

        var current_fist                    =   $tz_super_slides_multi_countdown.superslides('current'),
            play_video_mobile_slider_multi  =   jQuery( ' .tz_btn_play_video_mobile ' );

        if ( play_video_mobile_slider_multi.length ) {

            play_video_mobile_slider_multi.click( function () {

                var video_multi_countdown_mobile    =   jQuery(this).parents( '.tz_slider_item_multi_countdown' ).find( '.video_multi_countdown' );

                if ( video_multi_countdown_mobile.get(0).paused ) {
                    video_multi_countdown_mobile.get(0).play();
                    jQuery(this).addClass( 'tz_btn_play_video_mobile_active' );
                } else {
                    video_multi_countdown_mobile.get(0).pause();
                    jQuery(this).removeClass( 'tz_btn_play_video_mobile_active' );
                }

            } );

        }

        if ( current_fist === 0 ) {

            var currentSlide_fist        = jQuery( '.slides-container > .tz_slider_item_multi_countdown' )[current_fist],
                currentVid_fist          = jQuery( currentSlide_fist ).find("video")[0];

            if ( jQuery( currentVid_fist ).length ) {

                jQuery(currentVid_fist)[0].oncanplaythrough = jQuery(currentVid_fist)[0].play();

            }

        }

        $tz_super_slides_multi_countdown.on('animated.slides || init.slides', function() {

            // get current slide using superslides API current
            var currentSlideIndex   = jQuery(this).superslides('current'),
                currentSlide        = jQuery('.slides-container > .tz_slider_item_multi_countdown')[currentSlideIndex],
                currentVid          = jQuery(currentSlide).find("video")[0];


            // pause all videos
            jQuery(".video_multi_countdown").each(function () {
                this.pause();
            });

            if ( jQuery(currentVid).length ) {

                jQuery(currentVid)[0].oncanplaythrough = jQuery(currentVid)[0].play();

            }

        });

        $tz_event_countdown.each(function() {
            var $this = jQuery(this), finalDate = jQuery(this).data('countdown');
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime(''
                    + '<div class="tz_event_countdown_time"><span>%D</span><b>'+ $data_text_day_multi_countdown +'</b></div> '
                    + '<div class="tz_event_countdown_time"><span>%H</span><b>'+ $data_text_hours_multi_countdown +'</b></div> '
                    + '<div class="tz_event_countdown_time"><span >%M</span><b>'+ $data_text_min_multi_countdown +'</b></div> '
                    + '<div class="tz_event_countdown_time"><span>%S</span><b>'+ $data_text_min_sec_countdown +'</b></div> '));
            });
        });

    }
    /* End slider home multi countdown */

    /* Start Features Event*/
    var $tz_features_event =  jQuery('.tz_features_event');

    if ( $tz_features_event.length ) {

        var auto_features_event         =   $tz_features_event.data( 'auto' ),
            speed_features_event        =   $tz_features_event.data( 'speed' ),
            speed_next_features_event   =   $tz_features_event.data( 'speed-slider' ),
            auto_features_event_speed   =   '';

        if ( auto_features_event === 1 ) {
            auto_features_event_speed = speed_features_event
        }else {
            auto_features_event_speed   =   false;
        }


        $tz_features_event.superslides({
            play: auto_features_event_speed,
            animation_speed: speed_next_features_event,
            animation: 'fade',
            slide_easing: 'easeInOutCubic',
            pagination: false,
            scrollable: true
        });

        $tz_features_event.on('animated.slides || init.slides', function() {

            // get current slide using superslides API current
            var currentSlideIndex   = jQuery(this).superslides('current'),
                currentSlide        = jQuery('.slides-container > .tz_features_event_item')[currentSlideIndex],
                currentVid          = jQuery(currentSlide).find(".tz_features_event_detail");

            jQuery('.tz_features_event_item').each(function () {
                jQuery(this).find('.tz_features_event_detail').removeClass('tz_features_active');
            });

            if ( currentVid.length ) {
                jQuery(currentVid).addClass('tz_features_active');
            }

        });

        var $tz_features_event_countdown    =   jQuery( '.tz_features_event_countdown' );

        $tz_features_event_countdown.each(function() {
            var $this               =   jQuery(this),
                finalDate           =   jQuery(this).data('countdown'),
                $data_text_day      =   jQuery(this).data('text-day'),
                $data_text_hours    =   jQuery(this).data('text-hour'),
                $data_text_min      =   jQuery(this).data('text-min'),
                $data_text_sec      =   jQuery(this).data('text-sec');

            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime(''
                    + '<div class="tz_event_countdown_time"><span>%D</span><b>'+ $data_text_day +'</b></div> '
                    + '<div class="tz_event_countdown_time"><span>%H</span><b>'+ $data_text_hours +'</b></div> '
                    + '<div class="tz_event_countdown_time"><span >%M</span><b>'+ $data_text_min +'</b></div> '
                    + '<div class="tz_event_countdown_time"><span>%S</span><b>'+ $data_text_sec +'</b></div> '));
            });
        });

    }

    var $tz_features_event_item = jQuery( '.tz_features_event_item' );

    if ( $tz_features_event_item.length > 0 ) {
        $tz_features_event_item.each(function () {
            var $title_event = jQuery(this).find('.tz_features_event_box').data('title-event');

            jQuery(this).find('.tz_features_name_event').val($title_event);
        })
    }
    /* End Features Event*/

    /* Start Counter */
    var tz_counter  =   jQuery( '.tz-counter' );

    if ( tz_counter.length ) {

        jQuery(".stat-count").each(function() {
            var count_stop      =   jQuery(this).data('stop-count'),
                number_speed    =   parseInt( jQuery(this).data('number-speed') );

            jQuery(this).data('count', parseInt(jQuery(this).html(), 10));
            if ( count_stop === 0 ) {
                jQuery(this).html('0');
                count(jQuery(this),number_speed);
            }

        });

    }
    /* End Counter */

    /* Start height tz-counter-image */
    var $opject = jQuery('.tz-counter-image');

    if ( $opject.length ) {

        var $array_li = [];
        jQuery($opject).parent().parent().find('.tz-counter-image').each(function(){

            $array_li.push(jQuery(this).innerHeight());
        });
        var $max_height = Math.max.apply( Math, $array_li);

        jQuery($opject).css('height',$max_height+'px');

    }
    /* End height tz-counter-image */

    /* Start partner element */
    var $tz_partner =  jQuery(".partner-slider");

    if ( $tz_partner.length ) {

        /* Method for Partner slider */
        $tz_partner.each(function(){

            var $partner_column     =   jQuery(this).data('option-column'),
                $partner_auto       =   jQuery(this).data('auto'),
                $partner_loop       =   jQuery(this).data('loop'),
                $partner_rtl        =   jQuery(this).data('rtl'),
                $tz_partner_auto    =   '',
                $tz_partner_loop    =   '',
                $tz_partner_rtl     =   '';

            if ( $partner_auto === 0 ) {
                $tz_partner_auto = false;
            }else if ( $partner_auto === 1 )  {
                $tz_partner_auto = true;
            }

            if ( $partner_loop === 0 ) {
                $tz_partner_loop = false;
            }else if ( $partner_loop === 1 )  {
                $tz_partner_loop = true;
            }

            if ( $partner_rtl === 0 ) {
                $tz_partner_rtl = false;
            }else if ( $partner_rtl === 1 )  {
                $tz_partner_rtl = true;
            }

            jQuery(this).owlCarousel({
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:2
                    },
                    767:{
                        items:3
                    },
                    1199:{
                        items:4
                    },
                    1500:{
                        items:$partner_column
                    }
                },
                dots:false,
                rtl:$tz_partner_rtl,
                slideSpeed:1000,
                paginationSpeed:1000,
                smartSpeed: 1000,
                autoplay: $tz_partner_auto,
                autoplayTimeout: 5000,
                loop:$tz_partner_loop,
                nav:false
            });

            jQuery('.tz_partner_prevs').click(function(){
                jQuery(this).parents('.tz-partner').find('.partner-slider').trigger('prev.owl.carousel');
            });
            jQuery('.tz_partner_nexts').click(function(){
                jQuery(this).parents('.tz-partner').find('.partner-slider').trigger('next.owl.carousel');
            });

            jQuery('.tz_partner_prevs_type2').click(function(){
                jQuery(this).parents('.tz-partner').find('.partner-slider').trigger('prev.owl.carousel');
            });
            jQuery('.tz_partner_nexts_type2').click(function(){
                jQuery(this).parents('.tz-partner').find('.partner-slider').trigger('next.owl.carousel');
            });

        })

    }
    /* End partner element */

    /* Start New Partner element */
    var $tz_partner_new =  jQuery(".partner_slider_new");

    if ( $tz_partner_new.length ) {

        $tz_partner_new.each(function() {

            var $partner_column_new     =   jQuery(this).data('option-column'),
                $partner_auto_new       =   jQuery(this).data('auto'),
                $partner_loop_new       =   jQuery(this).data('loop'),
                $partner_rtl_new        =   jQuery(this).data('rtl'),
                $tz_partner_auto_new    =   '',
                $tz_partner_loop_new    =   '',
                $tz_partner_rtl_new     =   '';

            if ( $partner_auto_new === 0 ) {
                $tz_partner_auto_new = false;
            }else if ( $partner_auto_new === 1 )  {
                $tz_partner_auto_new = true;
            }

            if ( $partner_loop_new === 0 ) {
                $tz_partner_loop_new = false;
            }else if ( $partner_loop_new === 1 )  {
                $tz_partner_loop_new = true;
            }

            if ( $partner_rtl_new === 0 ) {
                $tz_partner_rtl_new = false;
            }else if ( $partner_rtl_new === 1 )  {
                $tz_partner_rtl_new = true;
            }

            jQuery(this).owlCarousel({
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:2
                    },
                    767:{
                        items:3
                    },
                    1199:{
                        items:4
                    },
                    1500:{
                        items:$partner_column_new
                    }
                },
                dots:false,
                rtl:$tz_partner_rtl_new,
                slideSpeed:1000,
                paginationSpeed:1000,
                smartSpeed: 1000,
                autoplay: $tz_partner_auto_new,
                autoplayTimeout: 5000,
                loop:$tz_partner_loop_new
            });

            jQuery('.tz_partner_prevs_new').click(function(){
                jQuery(this).parents('.tz_partner_new').find('.partner_slider_new').trigger('prev.owl.carousel');
            });
            jQuery('.tz_partner_nexts_new').click(function(){
                jQuery(this).parents('.tz_partner_new').find('.partner_slider_new').trigger('next.owl.carousel');
            });

        })

    }
    /* End New partner element */

    /* Start tzTwitter slider */
    if ( jQuery('.tzTwitter-slider-box').length ) {

        jQuery(".tzTwitter-slider").owlCarousel({

            items : 1,
            slideSpeed:1000,
            paginationSpeed:1000,
            smartSpeed: 1000,
            autoplay: false,
            autoplayTimeout: 5000,
            loop:true,
            nav:false

        });

        jQuery('.tz_meetup_twitter_prev').click(function(){
            jQuery('.tzTwitter-slider').trigger('owl.prev');
        });
        jQuery('.tz_meetup_twitter_next').click(function(){
            jQuery('.tzTwitter-slider').trigger('owl.next');
        });

    }
    /* End tzTwitter slider */

    /* Start slides_blog_item */
    var $tz_slides_blog_item   =    jQuery('.slides_blog_item');

    if ( $tz_slides_blog_item.length ) {

        $tz_slides_blog_item.each(function(){

            jQuery(this).owlCarousel({
                items:1,
                dots:false,
                nav: true,
                navText: [ '<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>' ],
                autoplay:false,
                loop:true,
                autoplaySpeed:800,
                autoHeight:true,
                smartSpeed:500
            });

        })

    }
    /* End slides_blog_item */

    /* End Blog slider */

    /* Start testimonials element */
    var $tz_testimonials_owl   =    jQuery('.tz_testimonials_owl');

    if ( $tz_testimonials_owl.length ) {

        $tz_testimonials_owl.each(function(){

            var $auto_testimonials      =   jQuery(this).data('auto'),
                $tz_auto_testimonials   =   '',
                $loop_testimonials      =   jQuery(this).data('loop'),
                $tz_loop_testimonials   =   '',
                $dot_testimonials       =   jQuery(this).data('dot'),
                $tz_dot_testimonials    =   '',
                $rtl_testimonials       =   jQuery(this).data('rtl'),
                $tz_rtl_testimonials    =   '',
                $tz_color_name          =   jQuery(this).data('color-name');

            if ( $tz_color_name !== undefined ) {
                jQuery( '.tz_testimonials_item_box h4' ).css('color',$tz_color_name);
            }

            if ( $auto_testimonials === 0 ) {
                $tz_auto_testimonials = false;
            }else if( $auto_testimonials === 1 ) {
                $tz_auto_testimonials = true;
            }

            if ( $loop_testimonials === 0 ) {
                $tz_loop_testimonials = false;
            }else if( $loop_testimonials === 1 ) {
                $tz_loop_testimonials = true;
            }

            if ( $dot_testimonials === 0 ) {
                $tz_dot_testimonials = false;
            }else if( $dot_testimonials === 1 ) {
                $tz_dot_testimonials = true;
            }

            if ( $rtl_testimonials === 0 ) {
                $tz_rtl_testimonials = false;
            }else if( $rtl_testimonials === 1 ) {
                $tz_rtl_testimonials = true;
            }

            jQuery(this).owlCarousel({
                items: 1,
                dots: $tz_dot_testimonials,
                autoplay: $tz_auto_testimonials,
                loop: $tz_loop_testimonials,
                rtl: $tz_rtl_testimonials,
                nav: false,
                autoplaySpeed: 1000,
                autoHeight: true,
                smartSpeed: 500
            });

        })

    }
    /* End testimonials element */

    /* Start top_dots_slider_meetup_full */
    jQuery('.tz_slider_meetup_full').each(function(){

        jQuery(this).parents('.wpb_column').first().addClass('tz-full-slider-meetup');

    });
    /* End top dots slider_meetup_full */

    /* Start slider meetup */
    var $tz_meetup_slider = jQuery('.tz_meetup_slider');

    if ( $tz_meetup_slider.length ) {

        var $tz_slider_meetup               =   jQuery('.tz_slider_meetup'),
            $slide_auto_meetup              =   $tz_slider_meetup.data('auto'),
            $slider_pagination              =   $tz_slider_meetup.data('pagina'),
            $slider_pagination_number       =   $tz_slider_meetup.data('number'),
            $tz_slide_auto_meetup           =   '',
            $tz_slider_pagination           =   '',
            $tz_slider_pagination_number    =   '';

        if ( $slide_auto_meetup === 0 ) {
            $tz_slide_auto_meetup = false;
        }else if ( $slide_auto_meetup === 1 )  {
            $tz_slide_auto_meetup = true;
        }

        if ( $slider_pagination === 1 ) {
            $tz_slider_pagination = true;
        }else if ( $slider_pagination === 0 )  {
            $tz_slider_pagination = false;
        }

        if ( $slider_pagination_number === 0 ) {
            $tz_slider_pagination_number = false;
        }else if ( $slider_pagination_number === 1 )  {
            $tz_slider_pagination_number = true;
        }

        $tz_meetup_slider.each(function(){

            jQuery(this).owlCarousel({
                items : 1,
                slideSpeed:800,
                paginationSpeed:800,
                smartSpeed: 700,
                dots:$tz_slider_pagination,
                autoplay: $tz_slide_auto_meetup,
                autoplayTimeout: 5000,
                loop: true,
                autoHeight:true
            });

        });

        $tz_meetup_slider.parents('.tzSpace_default').first().addClass('tzSpace_default_hide');

    }
    /* End slider meetup */

    /* Start width column */
    tz_width_column();
    /* End width column */

    resize_speakers_slider();

    /* Start prettyPhoto for portfolio */
    var $tz_latestPhoto =   jQuery("a[data-rel^='latestPhoto']");

    if( $tz_latestPhoto.length ){
        $tz_latestPhoto.prettyPhoto({
            social_tools: false,
            hook: 'data-rel'
        });
    }
    /* End prettyPhoto for portfolio */

    /* Start height TZGmap */
    var $tz_equal_height_gmap = jQuery(".tz_equal_height_gmap");
    if ( $tz_equal_height_gmap.length ){

        var $Tzmap_meetup = $tz_equal_height_gmap.parent().parent().height();
        $tz_equal_height_gmap.css("height", $Tzmap_meetup);

    }
    /* End height TZGmap */

    /* Start tz_register_meetup_pricing_item */
    if ( jQuery('.tz_register_meetup').length )  {

        jQuery( ".tz_register_meetup_pricing_item" ).on( "click", function() {
            jQuery(this).parent().find('.tz_register_meetup_pricing_item').removeClass('active');
            jQuery(this).addClass('active');

            var price_register = jQuery(this).data('price-pricing');
            jQuery('.tz_meetup_paypal_wpcf7-form input#amout_item').val(price_register);

        });
    }

    var $tz_pricing    =   jQuery( '.tz_pricing' );
    if ( $tz_pricing.length ) {

        var $tz_pricing_contact =  jQuery( '.tz_pricing_contact_overlay' ),
            $tz_pricing_column  =   $tz_pricing.data('columns'),
            $tz_pricing_btn     =   jQuery( '.tz_pricing_btn'),
            $tz_close_pricing   =   jQuery( '.tz_close_pricing' );

        if ( $tz_pricing_column === 4 ) {
            $tz_pricing.find('.tz_pricing_item_column').addClass( 'col-lg-3 col-md-3' );
            $tz_pricing.removeClass( 'tz_pricing_column_4' );
        }else if ( $tz_pricing_column === 3 ) {
            $tz_pricing.find('.tz_pricing_item_column').addClass( 'col-lg-4 col-md-4' );
            $tz_pricing.removeClass( 'tz_pricing_column_3' );
        }else if ( $tz_pricing_column === 2 ) {
            $tz_pricing.find('.tz_pricing_item_column').addClass( 'col-lg-6 col-md-6' );
            $tz_pricing.removeClass( 'tz_pricing_column_2' );
        }else {
            $tz_pricing.find('.tz_pricing_item_column').addClass( 'col-lg-12 col-md-12' );
        }


        $tz_pricing_btn.each(function(){
            jQuery(this).on( "click", function() {
                var tz_price_item   =   jQuery(this).parents( '.tz_pricing_item').data('price-item');
                jQuery(this).parents('.tz_pricing').find('.tz_pricing_contact').addClass('tz_pricing_contact_active');
                jQuery(this).parents('.tz_pricing').find('.tz_meetup_paypal_wpcf7-form input#amout_item').val(tz_price_item);
            } );

        });

        $tz_close_pricing.each(function(){
            jQuery(this).on( "click", function() {
                jQuery(this).parents('.tz_pricing_contact').removeClass('tz_pricing_contact_active');
            } );
        });

        $tz_pricing_contact.on( "click", function() {
            jQuery(this).parents('.tz_pricing_contact').removeClass('tz_pricing_contact_active');
        } );

    }
    /* End tz_register_meetup_pricing_item */

    /* Start Our speakers slider */
    var $speakers_slider_list = jQuery( '.speakers_slider_list' );

    if ( $speakers_slider_list.length ) {

        $speakers_slider_list.each(function() {

            var $data_auto_speakers     =   jQuery(this).data('auto'),
                $tz_data_auto_speakers  =   '',
                $data_mode              =   jQuery(this).data('mode');

            if ( $data_auto_speakers === 1 ) {
                $tz_data_auto_speakers = true;
            }else if ( $data_auto_speakers === 0 )  {
                $tz_data_auto_speakers = false;
            }

            jQuery(this).lightSlider({
                gallery:true,
                item:1,
                mode:$data_mode,
                speed: 800,
                loop:true,
                auto:$tz_data_auto_speakers,
                thumbItem:5,
                thumbMargin:0,
                slideMargin:0,
                enableDrag: false,
                responsive : [
                    {
                        breakpoint:480,
                        settings: {
                            thumbItem:3
                        }
                    }
                ],
                onSliderLoad: function () {

                    jQuery('.speakers_slider_list').removeClass('cs-hidden');
                },
                onAfterSlide: function (el) {

                    var $speakers_slider_item = jQuery( '.speakers_slider_item.active' ).data('number');

                    jQuery('.speakers_slider_detail_list').each(function () {

                        var data_number_text = jQuery(this).data('number-text');

                        if ( $speakers_slider_item === data_number_text ) {
                            jQuery(this).siblings().removeClass('slider_detail_list_active').addClass('slider_detail_list_active_disable');
                            jQuery(this).addClass('slider_detail_list_active').removeClass('slider_detail_list_active_disable');
                        }

                    })
                }
            });

        });

        jQuery('.speakers_slider_detail_list').each(function (index) {
            jQuery(this).data('number-text',index );
        });

    }
    /* End Our speakers slider */


});

jQuery(window).on( 'load', function () {

    /* Start height video meetup */
    height_video_meetup();
    /* End height video meetup */

    jQuery('.tz_features_event_item').first().find('.tz_features_event_detail').addClass('tz_features_active');

    jQuery('.tz_content_slider_meetup').css("opacity", "1");

    /* Start Slides Events */
    var $tz_slide_events = jQuery( '.tz_slide_events' );

    if ( $tz_slide_events.length ) {

        jQuery('.tz_slide_events_flex').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            smoothHeight: true,
            sync: ".tz_slide_events_carousel",
            start: function(slide){
                $tz_slide_events.css('height','auto');
            }
        });

        jQuery('.tz_slide_events_carousel').flexslider({
            animation: "slide",
            controlNav: true,
            animationLoop: false,
            slideshow: true,
            minItems: 1,
            maxItems: 3,
            itemWidth: 330,
            itemMargin: 23,
            prevText: "",
            nextText: "",
            asNavFor: '.tz_slide_events_flex'
        });
    }
    /* End Slides Events */

    /* Start Blog Slider Element */
    var $tz_meetup_slider_blog  =  jQuery('.tz_meetup_slider_blog');

    if ( $tz_meetup_slider_blog.length ) {

        var $number_item            =   $tz_meetup_slider_blog.data('item-dk'),
            $auto_blog              =   $tz_meetup_slider_blog.data('auto-blog'),
            $tz_auto_blog           =   '',
            $loop_blog              =   $tz_meetup_slider_blog.data('loop-blog'),
            $tz_loop_blog           =   '',
            $rtl_blog               =   $tz_meetup_slider_blog.data('rtl-blog'),
            $tz_rtl_blog            =   '';

        if ( $auto_blog === 0 ) {
            $tz_auto_blog = false;
        }
        if( $auto_blog === 1 ) {
            $tz_auto_blog = true;
        }

        if ( $loop_blog === 0 ) {
            $tz_loop_blog = false;
        }
        if( $loop_blog === 1 ) {
            $tz_loop_blog = true;
        }

        if ( $rtl_blog === 0 ) {
            $tz_rtl_blog = false;
        }
        if( $rtl_blog === 1 ) {
            $tz_rtl_blog = true;
        }

        $tz_meetup_slider_blog.each(function(){

            jQuery(this).owlCarousel({
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2,
                        margin: 30
                    },
                    1199:{
                        items:3,
                        margin: 30
                    },
                    1500:{
                        items:$number_item,
                        margin: 30
                    }
                },
                dots:false,
                autoplay:$tz_auto_blog,
                loop:$tz_loop_blog,
                rtl:$tz_rtl_blog,
                autoplaySpeed:800,
                autoHeight:true,
                smartSpeed:800
            });

            jQuery('.tz_recent_blog_pev_meetup').click(function(){
                jQuery(this).parents('.tz_recent_blog_meetup').find('.tz_meetup_slider_blog').trigger('prev.owl.carousel');
            });
            jQuery('.tz_recent_blog_next_meetup').click(function(){
                jQuery(this).parents('.tz_recent_blog_meetup').find('.tz_meetup_slider_blog').trigger('next.owl.carousel');
            });

        });

    }
    /* End Blog Slider Element */

    /* Start top_dots_slider_meetup_full */
    top_dots_slider_meetup_full();
    /* End top dots slider_meetup_full */

    /* Start height_our_team_thumbnail */
    height_our_team_thumbnail();
    /* End height_our_team_thumbnail */

    slider_meetup_full_height();

});

var tz_timer,
    $win_width;

jQuery(window).on("resize",function(){

    if ( tz_timer ) clearTimeout(tz_timer);

    tz_timer = setTimeout(function(){

        /* Start height video meetup */
        height_video_meetup();
        /* End height video meetup */

        slider_meetup_full_height();

        /* Start top_dots_slider_meetup_full */
        top_dots_slider_meetup_full();
        /* End top dots slider_meetup_full */

        /* Start height_our_team_thumbnail */
        height_our_team_thumbnail();
        /* End height_our_team_thumbnail */

        /* Start width column */
        tz_width_column();
        /* End width column */

        resize_img_slide_event();

        resize_speakers_slider();

    }, 200);

});

function TzTemplateResizeImageElement(obj){
    var widthStage;
    var heightStage ;
    var widthImage;
    var heightImage;
    obj.each(function (i,el){

        heightStage = jQuery(this).height();

        widthStage = jQuery (this).width();

        var img_url = jQuery(this).find('img').attr('src');

        var image = new Image();
        image.src = img_url;

        widthImage = image.naturalWidth;
        heightImage = image.naturalHeight;

        var tzimg	=	new resizeImage(widthImage, heightImage, widthStage, heightStage);
        jQuery(this).find('img').css ({ top: tzimg.top, left: tzimg.left, width: tzimg.width, height: tzimg.height });

    });

}

/* Start function  height video meetup */
function height_video_meetup() {

    var $win_width                      =   jQuery(window).width(),
        $tz_video_equal_height_meetup   =   jQuery(".tz_video_equal_height_meetup");

    if ( $tz_video_equal_height_meetup.length ){

        if ( $win_width >= 768 ) {

            var $tz_video_meetup_height     =   $tz_video_equal_height_meetup.parents('.tzSpace_default').first().outerHeight();

            $tz_video_equal_height_meetup.css("height", $tz_video_meetup_height);

        }else if ( $win_width <= 767 ) {
            $tz_video_equal_height_meetup.css("height", "auto");
        }
        TzTemplateResizeImageElement( $tz_video_equal_height_meetup );
    }
}
/* End function  height video meetup */

/* Start Counter */
function count($this,number_speed){

    var current = parseInt($this.html(), 10);
    current = current + number_speed; /* Where 50 is increment */

    $this.html(++current);
    if(current > $this.data('count')){
        $this.html($this.data('count'));
    } else {
        setTimeout(function(){count($this,number_speed)}, 50);
    }
}
/* End Counter */

/* Start function top_dots_slider_meetup_full */
function top_dots_slider_meetup_full() {

    var tz_slider_meetup_full = jQuery( '.tz_slider_meetup_full' );

    if ( tz_slider_meetup_full.length ) {
        tz_slider_meetup_full.each(function(){

            var $tz_top_owl_controls = jQuery(this).parents('.tzSpace_default').first().height();
            jQuery(".tz_slider_meetup .owl-theme .owl-dots").css({ top: $tz_top_owl_controls });

        });
    }

}
/* End function top dots slider_meetup_full */

/* function height_our_team_thumbnail */
function height_our_team_thumbnail() {

    var $win_width = jQuery(window).width();

    if ( jQuery(".tz_meetup_our_team_thumbnail").length ) {

        var $tz_column_inner_meetup = jQuery( '.tz_column_inner_meetup' );

        if ( $win_width > 768 && $tz_column_inner_meetup.length ) {

            $tz_column_inner_meetup.each(function () {

                var $to                             = jQuery(this).find('.tz_meetup_our_team_thumbnail').length,
                    $height_vc_column_inner         = jQuery(this).outerHeight(),
                    $tz_meetup_our_team_thumbnail   = jQuery(".tz_meetup_our_team_thumbnail");

                $tz_meetup_our_team_thumbnail.css("height", ($height_vc_column_inner / $to) );

                TzTemplateResizeImageElement( $tz_meetup_our_team_thumbnail );

            });
        }
    }

}
/* End function height_our_team_thumbnail */

/* Start function width_column */
function tz_width_column() {

    var $win_width      =   jQuery(window).width(),
        $tz_check_width = jQuery('.tz_check_width');

    if ( $tz_check_width.length ) {
        if ( $win_width >= 768 ) {

            var $contain_width = jQuery('.container').width();
            $tz_check_width.each(function () {

                if ( $contain_width === null ) {
                    $contain_width = 1170;
                }

                var $tz_check_width_content = jQuery(this).width(),
                    $tz_width_meetup_video_text = parseFloat($tz_check_width_content - (parseFloat($win_width - $contain_width) / 2));

                jQuery(this).find('.wpb_wrapper').first().css("width", $tz_width_meetup_video_text);

            })

        }else if ( $win_width <= 767 ) {
            jQuery('.tz_check_width .wpb_wrapper').css("width", "auto");
        }
    }
}
/* Start function width_column */

/* Start Resize Slide Event */
function resize_img_slide_event() {

    var $tz_thumb_navigation_post_event = jQuery( '.tz_thumb_navigation_post_event' );

    $tz_thumb_navigation_post_event.each(function () {
        TzTemplateResizeImage( jQuery(this));
    })

}
/* End Resize Slide Event */

/* Start Resize Speakers Slider */
function resize_speakers_slider() {

    var $our_speakers_content   =   jQuery( '.our_speakers_content' ),
        $win_width              =   jQuery(window).width();

    if ( $our_speakers_content.length ) {

        $our_speakers_content.each(function () {

            if ( $win_width > 991 ) {

                var $height_our_speakers_slide  =   $our_speakers_content.outerHeight();

                jQuery (this).find('.speakers_slider_item').css( 'height',$height_our_speakers_slide );
                TzTemplateResizeImage( jQuery('.speakers_slider_item'));

            }else {
                jQuery (this).find('.speakers_slider_item').css( 'height','auto' );
            }


        })

    }

}
/* End Resize Speakers Slider */

/* Start Slider meetup full */
function slider_meetup_full_height() {

    var tz_slider_meetup_full = jQuery( '.tz_slider_meetup_full' );

    if ( tz_slider_meetup_full.length ) {

        tz_slider_meetup_full.each( function () {

            var tz_slider_meetup_full_height = jQuery(this).parents('.tzSpace_default').first().outerHeight();
            jQuery(this).find('.tz_custom_images_slider').css(  "height", tz_slider_meetup_full_height );
            TzTemplateResizeImage( jQuery(this).find('.tz_custom_images_slider') );

        } )

    }
}
/* End Slider meetup full */
