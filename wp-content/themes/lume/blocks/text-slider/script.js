jQuery(function ($) {
    if ($('.js-lume-text-slider').length > 0) {
        $('.js-lume-text-slider').each(function () {
            $(this).slick({
                arrows: false,
                infinite: true,
                slidesToScroll: 1,
                slidesToShow: 8,
                centerMode: true,
                autoplay: true,
                autoplaySpeed: 0,
                speed: 2000,
                pauseOnHover: false,
                pauseOnFocus: false,
                pauseOnDotsHover: false,
                cssEase: 'linear',
                variableWidth: true,
                draggable: false,
                swipe: false,
                touchMove: false,
                touchThreshold: false,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 6,
                            draggable: false,
                            pauseOnHover: false,
                            pauseOnFocus: false,
                            pauseOnDotsHover: false,
                            swipe: false,
                            touchMove: false,
                            touchThreshold: false,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                            infinite: false,
                            autoplay: false,
                            draggable: false,
                            pauseOnHover: false,
                            pauseOnFocus: false,
                            pauseOnDotsHover: false,
                            swipe: false,
                            touchMove: false,
                            touchThreshold: false,
                        }
                    }
                ]
            });
        });
    }
});