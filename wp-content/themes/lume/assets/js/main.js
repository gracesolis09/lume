jQuery(function ($) {
    $(window).on('load', function () {
        // Check if the cookie exists and if it's expired
        if ($.cookie('visited') == null || $.cookie('visited') == undefined) {
            myVar = setTimeout(showPage, 6500); // Show loader and animation for first-time visitors
            $('#loader').find('img').addClass('visible');
            // Set the cookie to expire in 24 hours
            $.cookie('visited', 'true', { expires: 1, path: '/' });

        } else {
            // If the cookie exists and hasn't expired, hide the loader immediately
            $('#loader').find('img').removeClass('visible');
            $('#loader').hide();

        }
    });

    function showPage() {
        $('#loader').fadeOut('slow');
    }


    var newscroll;

    $('.js-nav-toggler').on('click', function (e) {
        e.preventDefault();
        newscroll = scroll;
        $('body').toggleClass('nav-open');
        $('body').css('top', -scroll + 'px');
        $('header').toggleClass('mobile-nav-open');
    });

    function onMobile() {
        if ($(window).width() < 992) {
            $top = $('.header').outerHeight();
            $('.navbar-collapse').css('top', $top);
            $('.navbar-collapse').css('height', 'calc(100vh - ' + $top + 'px)');
            if ($('.lume-image-linking').length > 0) {
                $('.lume-image-linking__dot').each(function () {
                    $(this).on('click', function (e) {
                        var $siblingContent = $(this).find('.dot-content');
                        if (!$(e.target).is($siblingContent) || !$(e.target).is(this)) {
                            $('.dot-content').hide();
                        }
                        $(this).find('.dot-content').css('display', 'flex');
                    });
                });
            };
        } else {
            $('.navbar-collapse').css('height', '');
            $('.navbar-collapse').css('top', '');
            if ($('.lume-image-linking').length > 0) {
                var timeout;
                function hide() {
                    timeout = setTimeout(function () {
                        $('.dot-content').fadeOut(100);
                    }, 100);
                };

                $('.lume-image-linking__dot').mouseover(function () {
                    clearTimeout(timeout);
                    $(this).children('.dot-content').css('display', 'flex');;
                }).mouseout(hide);

                $('.dot-content').mouseover(function () {
                    clearTimeout(timeout);
                }).mouseout(hide);
            }
        }

        // //Anchor Links close header navigation after click
        $('a[href^="#"]').on('click', function () {
            $('body').removeClass('nav-open');
            $('.navbar-collapse').removeClass('show');
            $('.js-nav-toggler').attr('aria-expanded', 'false');
        });
    }

    // windows load 
    window.onload = function () {
        onMobile();
    }

    // window resize 
    window.onresize = function () {
        onMobile();
    }

    // document ready
    $(document).ready(function () {
        // onMobile();
        // $(".lume-newsletter .subscribe-btn").on('click', function(e) {
        //     e.preventDefault(); 
        //     var isValid = false;
        //     $(".error").text(""); // Clear all error messages

        //     var email = $(".lume-newsletter #email").val().trim();
        //     if (!/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        //         $(".lume-newsletter #email").next(".error").text("Please enter valid email address.").css('display','block');
        //     }else {
        //         isValid = true;
        //     }

        //     if (isValid) {
        //         $(this).closest('form').submit();
        //     }
        // });
        // $(".lume-newsletter form").submit(function(e) {
        //     e.preventDefault();
        //     var form = $(this);
        //     var actionUrl = form.attr('action');

        //     $.ajax({
        //         type: "POST",
        //         url: actionUrl,
        //         data: form.serialize(),
        //         success: function(resp) {
        //           console.log(resp);
        //         }
        //     });
        // });
    });
});