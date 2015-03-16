'use strict';

(function($, undefined) {

    $('body').removeClass("condition-without-js");
    
    /*
    ** Scroll Up
    */
    scrollUp();

    function scrollUp() {

        if(!$(".scroll-up").length) return;

        var $scrollUp = $(".scroll-up"),
            body = $("html, body");

        $scrollUp.on("click", function() {
            body.animate({
                scrollTop:0
            }, '500', 'swing');
        });

        var checkScrollTop = function() {
            ($(window).scrollTop() > $(".header").height() ) ? $scrollUp.removeClass("u-isHidden") : $scrollUp.addClass("u-isHidden");
        };

        checkScrollTop();

        $(window).scroll(function() {
            checkScrollTop();
        });
    }

    /* ==========================================================================
    AJAX
   ========================================================================== */

    /*
    ** SelectShipments
    */

    $("#selectShipments").on("change", function(e) {
        var selected = $(this).children("option:selected").val();

        
        var w = $(".shipment-list").width();
        var h = $(".shipment-list").height();
        $(".shipment-list").animate({
            "opacity": 0
        }, 200);

        $(".shipment-list").addClass("reload-block").css({
            "width": w,
            "height": h
        }).empty();

        $.ajax({
            url: "ajax/shipment-list.php",
            type: "POST",
            context: e.target,
            data: {
                "limit": selected,
                "collection": window.location.href.slice(window.location.href.indexOf('=') + 1).split('&')[0]
            },
            success: shipmentListAjax
        });
    });

    function shipmentListAjax(data) {
        $(data).appendTo(".shipment-list");
        $(".shipment-list").removeClass("reload-block");
        $(".shipment-list").animate({
            "opacity": 1
        }, 200);
    };
})(jQuery);