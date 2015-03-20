/**
 * checkboxRadioUI v1.0.0
 * More information visit http://likeclever1.github.io/tabUi/
 * Copyright 2015, Yuriy Berezovskiy
 *
 * Released under the MIT license - http://opensource.org/licenses/MIT
 * 
 * Usages: $(...).tabsUi();
 * 
 */

"use strict"
;(function() {
    var plugin = {};

    var defaults = {
        current: 0,
        // CALLBACKS
        onChange: function() {}
    }

    $.fn.tabsUi = function(options) {
        if(this.length == 0) return this;

        if(this.length > 1) {
            this.each(function() {
                $(this).tabsUi(options);
            });
            return this;
        }

        // create the namespace to be throught the plugin
        var ui = {};

        // set the reference to out ui element
        ui.el = this,
        ui.$el = $(this);

        /**
         * ===================================================================================
         * = PRIVATE FUNCTIONS
         * ===================================================================================
         */
        
        /**
         * Initializes namespace settings to be used throughout plugin
         */
        
        var _init = function() {
            // merge user options with defaults
            ui.settings = $.extend({}, defaults, options);
            //determine Cls
            ui.tabsNavCls = "tabs__nav";
            ui.tabsContentCls = "tabs__content";
            ui.tabsContentItemCls = "tabs__item";
            ui.tabsActiveNavItemCls = "current";
            ui.showCls = "tabs__isShow";
            ui.hideCls = "tabs__isHidden";
            // determine tabs navigation
            ui.tabsNav = ui.$el.find("." + ui.tabsNavCls);
            // determine tabs content
            ui.tabsContent = ui.$el.find("." + ui.tabsContentCls);
            // determine active item
            ui.tabsactiveItem = ui.tabsNav.find("." + ui.tabsActiveNavItemCls);
            // determine touch events
            ui.touch = ("ontouchstart" in document.documentElement) ? true : false;
            // determine event types
            ui.eventTypes = {
                mousedown: (ui.touch) ? "touchstart" : "mousedown"
            };

            _setup();
        };

        /**
         * Performs all DOM and CSS modifications
         */
        
        var _setup = function() {
            
            
            if(!ui.tabsactiveItem.length) {
                ui.tabsNav.find("span").each(function(item) {
                    if($(this).hasClass(ui.tabsActiveNavItemCls)) ui.settings.current = item;
                });

                ui.tabsNav.find("span").eq(ui.settings.current).addClass(ui.tabsActiveNavItemCls);
                ui.tabsactiveItem = ui.tabsNav.find("." + ui.tabsActiveNavItemCls);
            }

            ui.tabsContent.find(ui.tabsactiveItem.children('span').attr("data-tab")).show()
                .siblings('.' + ui.tabsContentItemCls).hide();

            // initialize events
            if(ui.tabsNav.find("span").length > 1) {
                _eventClick();
            }
        };

        /**
         * Event Methods _eventClick, _eventClickLabel
         */
        
        // method for event click on element
        function _eventClick() {
            ui.tabsNav.find("span").on(ui.eventTypes.mousedown, function(e) {
                e.preventDefault();
                
                var item = this.getAttribute("data-tab");

                ui.tabsNav.find("li").removeClass(ui.tabsActiveNavItemCls)
                $(this).parent().addClass(ui.tabsActiveNavItemCls);

                ui.tabsContent.children("." + ui.tabsContentItemCls).hide();
                ui.tabsContent.children(item).fadeIn(300);
            });

            return false;
        };

        _init();
    }
})(jQuery);