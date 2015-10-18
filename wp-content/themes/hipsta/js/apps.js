(function($){

    "use strict"; // Start of use strict

    /* ------------------------------------------------------------------------ */
    /* Document Ready JS
    /* ------------------------------------------------------------------------ */

    jQuery(document).ready(function ($){

        // Navigation

        $("header .navicon a").click(function(){
            $(this).fadeOut("slow");
            $(".nav-menu").css({"visibility":"visible", "opacity":"1"});
            $(".nav-menu .menu-logo").addClass("animated fadeInUp");
            $(".nav-menu .menu-list li").addClass("animated fadeInDownBig");
            $(".nav-menu .social-icons").addClass("animated fadeInDown");
            $(".nav-menu").addClass("animated fadeIn");
        });

        $(".nav-menu .close-icon").click(function(){
            $(".nav-menu").css({"visibility":"hidden", "opacity":"0"});
            $(".nav-menu .menu-logo").removeClass("animated fadeInUp");
            $(".nav-menu .menu-list li").removeClass("animated fadeInDownBig");
            $(".nav-menu .social-icons").removeClass("animated fadeInDown");
            $(".nav-menu").removeClass("animated fadeIn");
            $("header .navicon a").fadeIn("slow");
        });

        // Lightbox

        $(".fancybox").fancybox();
        $("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']").fancybox();
        $(".gallery a[href$='.jpg'], .gallery a[href$='.png'], .gallery a[href$='.jpeg'], .gallery a[href$='.gif']").attr('rel','gallery').fancybox();

        // FitVids

        $( '.hentry' ).fitVids();

        // Overlay
            
        function centerOverlay() {
            var ItemOverlay = $('.overlay-content');

            if (ItemOverlay.length) {
                ItemOverlay.each(function () {
                    var $this = $(this),
                        itemHeight = $this.closest('.item-overlay').height(),
                        ItemOverlayHeight = $this.height(),
                        ItemTitle = $this.children('.item-title'),
                        ItemTitleHeight = ItemTitle.children('span').height();

                        $this.children('h5').css({
                            'visibility': 'visible'
                        });
                        
                        $this.css({
                            marginTop: (itemHeight - ItemOverlayHeight) / 2
                        });
                });

            }
        }

        centerOverlay();
        $(window).on('load', centerOverlay);
        $(window).on('resize', centerOverlay);

        // Isotope

        if ( $().isotope ) {
            var $container = $( '#portfolio' );

            if ( $container.length ) {
                $container.imagesLoaded( function() {
                    $container.isotope( {
                        itemSelector: '.portfolio-item',
                        layoutMode: 'masonry'
                    } );
                } );

                $( '.portfolio-filter a' ).on( 'click', function( e ) {
                    e.preventDefault();
                    $container.isotope( {
                        filter: $( this ).attr( 'value' )
                    } );
                    $( '.portfolio-filter span a' ).removeClass( 'active' );
                    $( this ).addClass( 'active' );
                } );
            }
        }

        // Carousel

        var imageslider = $(".owl");

        imageslider.each(function() {

            var that = $(this),
                columns = that.data('columns'),
                navigation = (that.data('navigation') === true ? true : false),
                autoplay = (that.data('autoplay') === false ? false : true),
                pagination = (that.data('pagination') === true ? true : false),
                transition = (that.data('transition') ? that.data('transition'): false);

            that.owlCarousel({
                //Basic Speeds
                slideSpeed : 1200,
                
                //Autoplay
                autoPlay : autoplay,
                goToFirst : true,
                stopOnHover: true,
                
                // Navigation
                navigation : navigation,
                navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                pagination : pagination,
                
                // Responsive
                responsive: true,
                items : columns,
                itemsDesktop: false,
                itemsDesktopSmall : [980,(columns < 3 ? columns : 3)],
                itemsTablet: [768,(columns < 2 ? columns : 2)],
                itemsMobile: [479,1],
                addClassActive: true,
                transitionStyle: transition,
                autoHeight: true
            });

        });

        // Back to top

        $(window).scroll(function(){
            if($(window).scrollTop() > 200){
                $(".back-to-top").fadeIn(200);
            } else{
                $(".back-to-top").fadeOut(200);
            }
        });
        
        $('.back-to-top').click(function() {
              $('html, body').animate({ scrollTop:0 }, '800');
              return false;
        });

        // Page loader

        $( window ).load( function() {
            $( '#preloader' ).fadeOut( 300, function() {
                $( this ).remove();
            } );
        } );

        // Centering 404 Page

        $(window).resize(function(){

          $('.error-404 ').css({
           position:'absolute',
           left: ($(window).width() 
             - $('.error-404 ').outerWidth())/2,
           top: ($(window).height() 
             - $('.error-404 ').outerHeight())/2
          });
                
         });
         
         // To initially run the function:
         $(window).resize();

    });
    
})(jQuery); // End of use strict