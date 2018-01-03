 $(".click").click(function() {
     $("#header-mobile ul").toggleClass("remove");
 });

 function tabSlider() {
     var $li1 = $('#header-mobile li:nth-child(1)').outerWidth(),
         $li2 = $('#header-mobile li:nth-child(2)').outerWidth(),
         $li3 = $('#header-mobile li:nth-child(3)').outerWidth(),
         $li4 = $('#header-mobile li:nth-child(4)').outerWidth(),
         $li5 = $('#header-mobile li:nth-child(5)').outerWidth(),
         $li6 = $('#header-mobile li:nth-child(6)').outerWidth();
 }

 function headerPadding() {
     var $headerHeight = $('#header-mobile').outerHeight();
     $('main').css('padding-top', $headerHeight);
 }

 $(function() {
     "use strict";

     tabSlider();

     // TABS

     $('#header-mobile li').on('click', function() {
         $('#header-mobile li').removeClass('active');
         $(this).addClass('active');
         tabSlider();
     });

     // CARD HEIGHT & 'MAIN' PADDING

     $(window, 'main').resize(function() {
         headerPadding();
     }).resize();

     // HEADER SHADOW

     $(window).scroll(function() {
         if ($(this).scrollTop() >= 10) {
             $("#header-mobile").addClass("shadow");
         } else {
             $("#header-mobile").removeClass("shadow");
         }
     });

     // MENU

     $('.menu, .side-menu-overlay').on('click', function() {
         var $sidebarWidth = $('.side-menu').width();
         $('.side-menu').toggleClass('active');
         if ($('.side-menu').hasClass('active')) {
             $('#header-mobile, main').css('width', 'calc(100% - ' + $sidebarWidth + 'px)');
         } else {
             $('#header-mobile, main').css('width', '100%');
         }
     });

     // PROFILE MENU

     $('.profile').on('click', function() {
         $('.account').toggleClass('active');
     });

     $(document).on("click", function(e) {
         if (($(".account").hasClass("active")) && (!$(".account, .account *, .profile").is(e.target))) {
             $(".account").toggleClass("active");
         }
     });

     $(window).scroll(function() {
         $('.account').removeClass('active');
     });

     // MOBILE SEARCH

     $('label.mobile-only').on('click', function() {
         $(this).toggleClass('close');
         $('body').toggleClass('mobile-input');
     });

     $(window).on('load resize', function() {
         if ($(document).width() <= 600) {
             $('.mobile-search-input').attr('placeholder', 'Search');
         } else {
             $('.mobile-search-input').attr('placeholder', 'Search Albums or Artists');
         }
     });

     $('#header-mobile .search-btn, .mobile-search-header .mobile-search-back').on('click', function() {
         $('.mobile-search').toggleClass('searching');
         $('.mobile-search').toggleClass('mobile-search-hide');
     });

     // RIPPLE
   
     $(document).on('click', '.ripple', function(e) {

         var $ripple = $('<span class="rippling" />'),
             $button = $(this),
             btnOffset = $button.offset(),
             xPos = e.pageX - btnOffset.left,
             yPos = e.pageY - btnOffset.top,
             size = 0,
             animateSize = parseInt(Math.max($button.width(), $button.height()) * Math.PI);

         $ripple.css({
                 top: yPos,
                 left: xPos,
                 width: size,
                 height: size,
                 backgroundColor: $button.attr("ripple-color"),
                 opacity: $button.attr("ripple-opacity")
             })
             .appendTo($button)
             .animate({
                 width: animateSize,
                 height: animateSize,
                 opacity: 0
             }, 500, function() {
                 $(this).remove();
             });
     });

     // IOS STUFF

     if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
         $('body').addClass('ios');
     }

 });