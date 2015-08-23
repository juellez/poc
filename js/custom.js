var $j = jQuery.noConflict();
/* ---------------------------------------------------- */
/*	PARALLAX											*/
/* ---------------------------------------------------- */
jQuery.fn.parallax = function(xpos, speedFactor) {

	'use strict';

	var firstTop, methods = {};

	return this.each(function(idx, value) {

		var $this = jQuery(value), firstTop = $this.offset().top;

		if (arguments.length < 1 || xpos === null)

			xpos = "50%";

		if (arguments.length < 2 || speedFactor === null)

			speedFactor = 0.1;

		methods = {

			update: function() {

				var pos = jQuery(window).scrollTop();

				$this.each(function() {

					$this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");

				});

			},

			init: function() {

				this.update();

				jQuery(window).on('scroll', methods.update);

			}

		}

		return methods.init();

	});

};

//MOBILE MENU -----------------------------------------
//-----------------------------------------------------
jQuery(document).ready(function(){
'use strict';
jQuery('#menu-main').superfish();
jQuery('#menu-main li:has(ul)').each(function(){
jQuery(this).addClass('has_child').prepend('<span class="this_child"></span>');
});
jQuery('#menu-main.skt-mob-menu li.has_child > a').click(function(){
if(jQuery(this).hasClass('active')){
jQuery(this).removeClass('active');
jQuery(this).next('ul:first').stop(true,true).slideUp();
}
else{
jQuery(this).addClass('active');
jQuery(this).next('ul:first').stop(true,true).slideDown();
}
});
});
(function( $ ) {
'use strict';
$.fn.sktmobilemenu = function( options ) { 
var defaults = {
'fwidth': 1025
};
//call in the default otions
var options = $.extend(defaults, options);
var obj = $(this);
return this.each(function() {
if($(window).width() < options.fwidth) {
sktMobileRes();
}
$(window).resize(function() {
if($(window).width() < options.fwidth) {
sktMobileRes();
}else{
sktDeskRes();
}
});
function sktMobileRes() {
jQuery('#menu-main').superfish('destroy');
obj.addClass('skt-mob-menu').hide();
obj.parent().css('position','relative');
if(obj.prev('.sktmenu-toggle').length === 0) {
obj.before('<div class="sktmenu-toggle" id="responsive-nav-button"></div>');
}
obj.parent().find('.sktmenu-toggle').removeClass('active');
}
function sktDeskRes() {
jQuery('#menu-main').superfish('init');
obj.removeClass('skt-mob-menu').show();
if(obj.prev('.sktmenu-toggle').length) {
obj.prev('.sktmenu-toggle').remove();
}
}
obj.parent().on('click','.sktmenu-toggle',function() {
if(!$(this).hasClass('active')){
$(this).addClass('active');
$(this).next('ul').stop(true,true).slideDown();
}
else{
$(this).removeClass('active');
$(this).next('ul').stop(true,true).slideUp();
}
});
});
};
})( jQuery );

jQuery(window).load(function(){
	'use strict';
	jQuery('#full-division-box').parallax("center", 0.2);
});


jQuery(document).ready(function ($) {
'use strict';
document.getElementById('s') && document.getElementById('s').focus();
});
jQuery(document).ready(function(){
	'use strict';
	jQuery('#menu-main').sktmobilemenu();
});

//BACK TO TOP -----------------------------------------
//-----------------------------------------------------
jQuery(document).ready( function() {
'use strict';
jQuery('#back-to-top,#backtop').hide();
jQuery(window).scroll(function() {
if (jQuery(this).scrollTop() > 100) {
jQuery('#back-to-top,#backtop').fadeIn();
} else {
jQuery('#back-to-top,#backtop').fadeOut();
}
});
jQuery('#back-to-top,#backtop').click(function(){
jQuery('html, body').animate({scrollTop:0}, 'slow');
});
});

//WAYPOINTS MAGIC -----------------------------------------
//---------------------------------------------------------
if ( typeof window['vc_waypoints'] !== 'function' ) {
function vc_waypoints() {
if (typeof jQuery.fn.waypoint !== 'undefined') {
$j('.fade_in_hide').waypoint(function() {
$j(this).addClass('skt_start_animation');
}, { offset: '90%' });
$j('.skt_animate_when_almost_visible').waypoint(function() {
$j(this).addClass('skt_start_animation');
}, { offset: '90%' });
}
}
}
jQuery(document).ready(function($) {
'use strict';
vc_waypoints();
}); 

//------------------------------------------------------------

/*global jQuery */
/*!
* FitText.js 1.2
*
* Copyright 2011, Dave Rupert http://daverupert.com
* Released under the WTFPL license
* http://sam.zoy.org/wtfpl/
*
* Date: Thu May 05 14:23:00 2011 -0600
*/

(function( $ ){

  $.fn.fitText = function( kompressor, options ) {

    // Setup options
    var compressor = kompressor || 1,
        settings = $.extend({
          'minFontSize' : Number.NEGATIVE_INFINITY,
          'maxFontSize' : Number.POSITIVE_INFINITY
        }, options);

    return this.each(function(){

      // Store the object
      var $this = $(this);

      // Resizer() resizes items based on the object width divided by the compressor * 10
      var resizer = function () {
        $this.css('font-size', Math.max(Math.min($this.width() / (compressor*10), parseFloat(settings.maxFontSize)), parseFloat(settings.minFontSize)));
      };

      // Call once to set.
      resizer();

      // Call on resize. Opera debounces their resize by default.
      $(window).on('resize.fittext orientationchange.fittext', resizer);

    });

  };

})( jQuery );