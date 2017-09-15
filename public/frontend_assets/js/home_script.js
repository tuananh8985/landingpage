
$(document).ready(function () {
  $(".dotdotdot").dotdotdot();
  $('.image_primary').click(function() { return false; });
  $("#alert_cart").delay(4000).slideUp();

    // 1
    $('#new_featured .list_new_slick').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        prevArrow: $('#new_featured .prev'),
        nextArrow: $('#new_featured .next'),
        responsive: [
        {
            breakpoint: 1600,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 568,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        ]
    });
    // 2
    $('.slick_best_seller').slick({
        slidesToShow: 1,
        rows:2,
        slidesPerRow: 3,
        prevArrow: $('#product_best_seller .prev'),
        nextArrow: $('#product_best_seller .next'),
        responsive: [{ 
            breakpoint: 768,
            settings: {
             rows:1,
             slidesToShow: 1,
             infinite: true,
         }
     }]
 });



    $('.slick_best_seller_mobile').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: $('#product_best_seller .prev'),
        nextArrow: $('#product_best_seller .next'),
    });

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav',
    });
    $('.slider-nav').slick({
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: true,
        centerMode: true,
        focusOnSelect: true

    });
// end
});


