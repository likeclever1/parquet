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

    /*
    ** equalHeight
    */
   
    function equalHeight(selector) {
        if(selector.length) {
            var height = 0;
            selector.each(function() {
                if($(this).height() > height) {
                    height = $(this).height();
                }
            });

            selector.height(height);
        }
    }

    equalHeight($(".shipment-list__info"));

    /*
    ** tabs
    */
   
    $(".tabs").tabsUi();

    /*
    ** fancybox
    */
   
    $(".shipment__img").fancybox({
        helpers : {
            title : {
                type : 'over'
            }
        }
    });


    /* ==========================================================================
    AJAX
   ========================================================================== */

    /*
    ** SelectShipments
    */

    $("#selectShipments").on("change", function(e) {
        var shipments = $(".shipment-list"),
            selected = $(this).children("option:selected").val(),
            collection = $(this).data("collection");

        
        var w = shipments.width();
        var h = shipments.height();
        shipments.animate({
            "opacity": 0
        }, 200);

        shipments.addClass("reload-block").css({
            "width": w,
            "height": h
        }).empty();

        $.ajax({
            url: "/ajax/shipment-list.php",
            type: "POST",
            context: e.target,
            data: {
                "limit": selected,
                "collection": collection
            },
            success: shipmentListAjax,
            error: errorAjax
        });
    });

    function shipmentListAjax(data) {
        var shipments = $(".shipment-list");

        shipments.get(0).innerHTML = data;
        shipments.removeClass("reload-block");
        equalHeight($(".shipment-list__info"));
        shipments.animate({
            "opacity": 1
        }, 200);
    };

    function errorAjax(data) {
        console.log(data);
    }


})(jQuery);