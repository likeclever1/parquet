'use strict';

    /*
    ** fancybox
    */

(function($, undefined) {
    $(".fancybox").fancybox({
        type: 'ajax',
        maxWidth    : 800,
        maxHeight   : 600,
        fitToView   : false,
        width       : '70%',
        height      : '70%',
        autoSize    : false,
        closeClick  : false,
        openEffect  : 'none',
        closeEffect : 'none'
    });

    $('#redactorCategory').redactor({
        imageUpload: 'modules/uploadRedactor.php'
    });

    $('#redactorShipment').redactor({
        imageUpload: 'modules/uploadRedactor.php'
    });

    $(".tabs").tabsUi();

    $("#feature").on("click", function(e) {
        var $target = $(e.target),
            $this = $(this),
            val = null;

        if($target.hasClass("btn")) {
            var val = $target.siblings("input[type='text']").val();
            if(val != "") {
                if(!$("#featureTable").length) {
                    $("<table id='featureTable' class='feature-table'>").appendTo($this);
                }

                $("#featureTable").append("<tr><td>" + val);
            }
        }

        $target.siblings("input[type='text']").val("");
    });
})(jQuery);