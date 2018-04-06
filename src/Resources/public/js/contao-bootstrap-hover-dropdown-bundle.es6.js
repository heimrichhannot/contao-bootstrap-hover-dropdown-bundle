global.$ = global.jQuery = require('jquery');

(function($) {
    // outside the scope of the jQuery plugin to
    // keep track of all dropdowns
    let $allDropdowns = $();

    // if instantlyCloseOthers is true, then it will instantly
    // shut other nav items when a new one is hovered over
    $.fn.dropdownHover = function(options) {
        // don't do anything if touch is supported
        // (plugin causes some issues on mobile)
        if ('ontouchstart' in document) return this; // don't want to affect chaining

        // the element we really care about
        // is the dropdown-toggle's parent
        $allDropdowns = $allDropdowns.add(this.parent());

        return this.each(function() {
            let $this = $(this),
                $parent = $this.parent(),
                defaults = {
                    delayClose: 1000,
                    delayOpen: 300,
                    delaySwitch: 100,
                    instantlyCloseOthers: true
                },
                data = {
                    delayClose: $(this).data('delay-close'),
                    delayOpen: $(this).data('delay-open'),
                    delaySwitch: $(this).data('delay-switch'),
                    instantlyCloseOthers: $(this).data('close-others')
                },
                showEvent = 'show.bs.dropdown',
                hideEvent = 'hide.bs.dropdown',
                // shownEvent  = 'shown.bs.dropdown',
                // hiddenEvent = 'hidden.bs.dropdown',
                settings = $.extend(true, {}, defaults, options, data),
                timeoutOpen,
                timeoutClose;

            $parent.hover(function(event) {

                // so a neighbor can't open the dropdown
                // FIX: see https://github.com/CWSpear/bootstrap-hover-dropdown/issues/55
                if ($parent.hasClass('open') && !$this.is(event.target)) {
                    // stop this event, stop executing any code
                    // in this callback but continue to propagate
                    return true;
                }

                let isChildMenu = $parent.parents('.dropdown-menu').length,
                    siblingIsOpen = $parent.siblings().hasClass('show');

                window.clearTimeout(timeoutClose);

                timeoutOpen = window.setTimeout(function() {
                    openDropdown(event);
                }, siblingIsOpen || isChildMenu ? settings.delaySwitch : settings.delayOpen);

            }, function() {
                clearTimeout(timeoutOpen);

                let isChildMenu = $parent.parents('.dropdown-menu').length;

                timeoutClose = window.setTimeout(function() {
                    $parent.removeClass('open');
                    $parent.find('.dropdown-menu').removeClass('show');
                }, timeoutOpen && !isChildMenu ? settings.delayClose : settings.delaySwitch);
            });

            // clear timeout if hovering submenu
            $allDropdowns.find('.dropdown-menu').hover(function() {
                window.clearTimeout(timeoutClose);
            }, function() {

                let isChildMenu = $(this).parents('.dropdown-menu').length;

                if (isChildMenu) {
                    return true;
                }

                timeoutClose = window.setTimeout(function() {
                    $parent.removeClass('open');
                    $this.trigger(hideEvent);
                }, timeoutOpen > 0 ? settings.delayClose : 0);
            });

            // this helps with button groups!
            $this.hover(function(event) {
                // this helps prevent a double event from firing.
                // see https://github.com/CWSpear/bootstrap-hover-dropdown/issues/55
                if ($parent.hasClass('open') && !$parent.is(event.target)) {
                    // stop this event, stop executing any code
                    // in this callback but continue to propagate
                    return true;
                }
            });

            // handle submenus
            $parent.find('.dropdown-submenu').each(function() {
                let $this = $(this);
                let subTimeout;
                $this.hover(function() {
                    window.clearTimeout(subTimeout);
                    $this.children('.dropdown-menu').show();
                    // always close submenu siblings instantly
                    $this.siblings().children('.dropdown-menu').hide();
                }, function() {
                    let $submenu = $this.children('.dropdown-menu');
                    subTimeout = window.setTimeout(function() {
                        $submenu.hide();
                    }, timeoutOpen > 0 ? settings.delayClose : 0);
                });
            });

            function openDropdown(event) {
                $allDropdowns.find(':focus').blur();

                if (settings.instantlyCloseOthers === true) {

                    // not the first level
                    if ($this.parents('.dropdown-menu').length && $this.siblings().parent().hasClass('open')) {
                        $this.siblings().parent().removeClass('open');
                        $this.siblings().parent().find('.dropdown-menu').removeClass('show');
                    } else {
                        $this.parent('li').siblings().removeClass('open');
                        $this.parent('li').siblings().find('.dropdown-menu').removeClass('show');
                    }
                }

                window.clearTimeout(timeoutClose);
                $parent.addClass('open');
                $parent.find('.dropdown-menu:first').addClass('show');
            }
        });
    };

    $(document).ready(function() {

        // touch support -> click
        if (typeof Modernizr === 'object' && Modernizr.touchevents && /Mobi/i.test(navigator.userAgent)) {
            let $allDropDowns = $('[data-hover="dropdown"]'),
                $allActiveDropDowns = $('[data-hover="dropdown"].trail, [data-hover="dropdown"].active'),
                isMobile = Modernizr.mq('screen and (max-width: 767px)');
            $allDropDowns.attr('data-toggle', 'dropdown');
            $allDropDowns.removeAttr('data-hover', '');

            // mobile support
            if (isMobile) {
                $allActiveDropDowns.parent().addClass('open');
            }

            // bootstraps clearMenus function closes all dropdowns per default, we need trail and active to stay open
            $allDropDowns.parent().on('hide.bs.dropdown', function(e) {
                let $this = $(this);

                if ($this.hasClass('trail') || $this.hasClass('active')) {
                    e.preventDefault();
                }
            });

            // hide sibling dropdowns only
            $allDropDowns.on('click', function(e) {
                let $this = $(this);
                $this.parent().siblings().removeClass('open');
            });

            return false;
        }

        // apply dropdownHover to all elements with the data-hover="dropdown" attribute
        $('[data-hover="dropdown"]').dropdownHover();
    });
})(jQuery);

// MooTools
if (window.MooTools) {
    window.addEvent('domready', function() {

        Element.prototype.hide = function() {
            if ($(this).getAttribute('data-hover') === 'dropdown') {
                return this;
            }

            this.setStyle('display', 'none');
        };
    });
}
