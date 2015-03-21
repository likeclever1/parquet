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
})(jQuery);