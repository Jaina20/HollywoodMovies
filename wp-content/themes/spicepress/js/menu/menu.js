/* ---------------------------------------------- /*
 * Preloader
 /* ---------------------------------------------- */
(function(){

    jQuery(document).ready(function() {

      
        /* ---------------------------------------------- /*
         * Scroll top
         /* ---------------------------------------------- */
    
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > 100) {
                jQuery('.scroll-up').fadeIn();
            } else {
                jQuery('.scroll-up').fadeOut();
            }
        });

        
        jQuery('.scroll-up').click(function () {
            jQuery("html, body").animate({
                scrollTop: 0
            }, 700);
            return false;
        });
    

        /* ---------------------------------------------- /*
         * Initialization General Scripts for all pages
         /* ---------------------------------------------- */

        var homeSection = jQuery('.home-section'),
            navbar      = jQuery('.navbar-custom'),
            navHeight   = navbar.height(),
           // worksgrid   = jQuery('#works-grid'),
            width       = Math.max(jQuery(window).width(), window.innerWidth),
            mobileTest  = false;

        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            mobileTest = true;
        }
        document.onload = my_function();
        spicepress_buildHomeSection(homeSection);
        spicepress_navbarAnimation(navbar, homeSection, navHeight);
        spicepress_navbarSubmenu(width);
        spicepress_hoverDropdown(width, mobileTest);

        jQuery(window).resize(function() {
            var width = Math.max(jQuery(window).width(), window.innerWidth);
            spicepress_buildHomeSection(homeSection);
            spicepress_hoverDropdown(width, mobileTest);
        });

        function my_function () {
    jQuery('.dropdown-menu').parent().addClass('dropdown');
    jQuery('li.dropdown').find('a:first').addClass('dropdown-toggle');
//    jQuery('li.dropdown').find('a:first').after( "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fa fa-angle-down'></i></button>" );
    }



       /* ---------------------------------------------- /*
         * Home section height
         /* ---------------------------------------------- */

        function spicepress_buildHomeSection(homeSection) {
            if (homeSection.length > 0) {
                if (homeSection.hasClass('home-full-height')) {
                    homeSection.height(jQuery(window).height());
                } else {
                    homeSection.height(jQuery(window).height() * 0.85);
                }
            }
        }


        /* ---------------------------------------------- /*
         * Transparent navbar animation
         /* ---------------------------------------------- */

        function spicepress_navbarAnimation(navbar, homeSection, navHeight) {
            var topScroll = jQuery(window).scrollTop();
            if (navbar.length > 0 && homeSection.length > 0) {
                if(topScroll >= navHeight) {
                    navbar.removeClass('navbar-transparent');
                } else {
                    navbar.addClass('navbar-transparent');
                }
            }
        }
        /* ---------------------------------------------- /*
         * Navbar submenu
         /* ---------------------------------------------- */

        function spicepress_navbarSubmenu(width) {
            if (width > breakpoint_settings.menu_breakpoint) {
                jQuery('.navbar-custom .navbar-nav > li.dropdown').hover(function() {
                    var MenuLeftOffset  = jQuery('.dropdown-menu', jQuery(this)).offset().left;
                    var Menu1LevelWidth = jQuery('.dropdown-menu', jQuery(this)).width();
                    if (width - MenuLeftOffset < Menu1LevelWidth * 2) {
                        jQuery(this).children('.dropdown-menu').addClass('leftauto');
                    } else {
                        jQuery(this).children('.dropdown-menu').removeClass('leftauto');
                    }
                    if (jQuery('.dropdown', jQuery(this)).length > 0) {
                        var Menu2LevelWidth = jQuery('.dropdown-menu', jQuery(this)).width();
                        if (width - MenuLeftOffset - Menu1LevelWidth < Menu2LevelWidth) {
                            jQuery(this).children('.dropdown-menu').addClass('left-side');
                        } else {
                            jQuery(this).children('.dropdown-menu').removeClass('left-side');
                        }
                    }
                });

                 jQuery('.navbar-custom .navbar-nav > li.dropdown a.dropdown-toggle').focus(function() {
                    var MenuLeftOffsets  = jQuery('.dropdown-menu', jQuery(this).parent()).offset().left;
                    var Menu1LevelWidth = jQuery('.dropdown-menu', jQuery(this).parent()).width();
                    if (width - MenuLeftOffsets < Menu1LevelWidth * 2) {
                        jQuery(this).parent().children('.dropdown-menu').addClass('leftauto');
                    } else {
                        jQuery(this).parent().children('.dropdown-menu').removeClass('leftauto');
                    }
                    if (jQuery('.dropdown', jQuery(this).parent()).length > 0) {
                        var Menu2LevelWidth = jQuery('.dropdown-menu', jQuery(this).parent()).width();
                        if (width - MenuLeftOffsets - Menu1LevelWidth < Menu2LevelWidth) {
                            jQuery(this).parent().children('.dropdown-menu').addClass('left-side');
                        } else {
                            jQuery(this).parent().children('.dropdown-menu').removeClass('left-side');
                        }
                    }
                });
            }
        }

        /* ---------------------------------------------- /*
         * Navbar hover dropdown on desctop
         /* ---------------------------------------------- */

        function spicepress_hoverDropdown(width, mobileTest) {
            if ((width > breakpoint_settings.menu_breakpoint) && (mobileTest !== true)) {
                jQuery('.navbar-custom').removeClass('open');
                var delay = 0;
                var setTimeoutConst;
                jQuery('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').hover(function() {
                        var jQuerythis = jQuery(this);
                        setTimeoutConst = setTimeout(function() {
                            jQuerythis.addClass('open');
                            jQuerythis.find('.dropdown-toggle').addClass('disabled');
                        }, delay);
                    },
                    function() {
                        clearTimeout(setTimeoutConst);
                        jQuery(this).removeClass('open');
                        jQuery(this).find('.dropdown-toggle').removeClass('disabled');
                    });
            } else {
                jQuery('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').unbind('mouseenter mouseleave');
                jQuery('.navbar-custom [data-toggle=dropdown]').not('.binded').addClass('binded').on('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    jQuery(this).parent().siblings().removeClass('open');
                    jQuery(this).parent().siblings().find('[data-toggle=dropdown]').parent().removeClass('open');
                    jQuery(this).parent().toggleClass('open');
                });
            }
        }

        /* ---------------------------------------------- /*
         * Navbar collapse on click
         /* ---------------------------------------------- */

        jQuery(document).on('click','.navbar-collapse.show',function(e) {
            if( jQuery(e.target).is('a') && jQuery(e.target).attr('class') != 'dropdown-toggle' ) {
                jQuery(this).collapse('hide');
            }
        });


        if( jQuery(window).width() > breakpoint_settings.menu_breakpoint) {
           jQuery('.nav li.dropdown').hover(function() {
            if( jQuery(window).width() > 1100) {
                jQuery('.dropdown-menu').removeAttr("style");
              }
               jQuery(this).addClass('open');

           }, function() {
               jQuery(this).removeClass('open');
           }); 
           jQuery('.nav li.dropdown-submenu').hover(function() {
               jQuery(this).addClass('open');
           }, function() {
               jQuery(this).removeClass('open');
           }); 
        }
        
        
        jQuery('li.dropdown').find('.fa-angle-down').each(function(){
            jQuery(this).on('click', function(){
                if( jQuery(window).width() < breakpoint_settings.menu_breakpoint) {
                    jQuery(this).parent().next().slideToggle();
                }
                return false;
            });
        });

         /* ---------------------------------------------- /*
         * Navbar focus dropdown on desktop
         /* ---------------------------------------------- */
        const topLevelLinks = Array.prototype.slice.call(document.querySelectorAll(".navbar-custom .navbar-nav > li.dropdown a.dropdown-toggle"), 0);
          topLevelLinks.forEach(function(link){
             return link.addEventListener('focus', function(e) {
                this.parentElement.classList.add('open')
                e.preventDefault();
               
                var div_list = e.target.parentElement.querySelectorAll( ".open" );
                var div_array = Array.prototype.slice.call(div_list);
                  div_array.forEach(function(e){
                   return e.classList.remove( "open" ) 
                });
              })             

            })

            jQuery('li a').focus(function() { 
              jQuery(this).parent().siblings().removeClass('open');
              jQuery(this).parent().siblings().find(".open").removeClass('open');
         });
     
            jQuery('a,input').bind('focus', function() {
             if(!jQuery(this).closest(".menu-item").length ) {
                topLevelLinks.forEach(function(link){
                return link.parentElement.classList.remove('open')
            })
            }
        })

        if(jQuery(window).width() >= breakpoint_settings.menu_breakpoint){
        //For header fix
        jQuery(window).bind('scroll', function () {
            if (jQuery(window).scrollTop() > 100) {
                jQuery('.navbar-overlapped.navbar-custom').addClass('stiky-header');
            } else {
                jQuery('.navbar-overlapped.navbar-custom').removeClass('stiky-header');
            }
        });
    
    }    
    
    
            jQuery('li.dropdown').find('.caret').each(function(){
            jQuery(this).on('click', function(){
                if( jQuery(window).width() <= breakpoint_settings.menu_breakpoint) {
                  jQuery('li.dropdown,li.dropdown-submenu').removeClass('open');
                  jQuery(this).parent().next().slideToggle();
                }
             return false;
            });
        });

        jQuery('a,input').bind('focus', function() {
            if(!jQuery(this).closest(".menu-item").length && ( jQuery(window).width() <= breakpoint_settings.menu_breakpoint) ) {
               jQuery('.navbar-collapse').removeClass('in');
            }
        })
    
    });
})(jQuery);