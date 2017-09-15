    // $('.relatedslide').slick({
    //     infinite: true,
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     prevArrow:'.lush-prev',
    //     nextArrow:'.lush-next',
    //     responsive: [
    //     {
    //         breakpoint: 1024,
    //         settings: {
    //             slidesToShow: 1,
    //             slidesToScroll: 1,
    //             infinite: true,
    //             dots: true
    //         }
    //     },
    //     {
    //         breakpoint: 600,
    //         settings: {
    //             slidesToShow: 1,
    //             slidesToScroll: 1,
    //             infinite: true,
    //             dots: true
    //         }
    //     },
    //     {
    //         breakpoint: 480,
    //         settings: {
    //             slidesToShow: 1,
    //             slidesToScroll: 1
    //         }
    //     }
    //     ]
    // });
 
    function truncated() {
        if (typeof $(".truncated").dotdotdot == 'function') {
            $(".truncated").dotdotdot({
                height: $(this).height() + "px",
                after: "a.readmore",
            });
        }
    }


