/*
 * MonsieurPress Script file
 * Author: David MANSON
 */

jQuery(document).ready(function($) {

    $('.js-menu-toggle').on('click', function(){
        $('body').toggleClass('is-menu-on');
    });

    // -----------------------
    // Popup Controls
    // -----------------------

    // Hero CTA buttons controls
    $('.popup-btn').on('click', function(){
        $('#ctaPopup').removeClass('hide-popup');
        $('body').addClass('is-popup-on');
    });

    // Secondary CTA buttons controls
    $('.standard-popup-btn').on('click', function(){
        $('#secondaryPopup').removeClass('hide-popup');
        $('body').addClass('is-popup-on');
    });

    // Popup dismiss
    $('.popupOverlay').on('click', function(e){
        if ($(e.target).hasClass('popupOverlay') ) {
            $('#secondaryPopup').addClass('hide-popup');
            $('#ctaPopup').addClass('hide-popup');
            $('body').removeClass('is-popup-on');
        }
    });


    // -----------------------
    // Navbar background
    // -----------------------

    var scroll_start = 0;
  	var startchange = $('.transparent-nav');
  	var offset = startchange.offset();

  	$(document).scroll(function() {
  	   	scroll_start = $(this).scrollTop();
  	   	if(scroll_start > 50) {
  	       	$('.transparent-nav').addClass('header-bg');//css('background-color', 'rgba(39,56,93,1)');
      	}
      	else {
     		   $('.transparent-nav').removeClass('header-bg');//css('background-color', 'transparent');
  		  }
	  });


    // -----------------------
    // Hashtag Navigation
    // -----------------------

    $(function() {
      $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: target.offset().top-80
            }, 700);
            return false;
          }
        }
      });
    });


    // -----------------------
    // Slider functions
    // -----------------------

    var slideCount = $('#slider ul li').length;
  	var slideWidth = $('#slider ul li').width();
  	var slideHeight = $('#slider ul li').height();
  	var sliderUlWidth = slideCount * slideWidth;

  	$('#slider').css({ width: slideWidth, height: slideHeight });
  	$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 300, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 300, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

      $('a.control_prev').click(function (e) {
          moveLeft();
          return false;
      });

      $('a.control_next').click(function (e) {
          moveRight();
          return false;
      });

      // setInterval(function () {
      //     moveRight();
      // }, 3000);




});
