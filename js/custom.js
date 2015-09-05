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

/**
 * textFit v2.1.1
 * Previously known as jQuery.textFit
 * 11/2014 by STRML (strml.github.com)
 * MIT License
 *
 * To use: textFit(document.getElementById('target-div'), options);
 *
 * Will make the *text* content inside a container scale to fit the container
 * The container is required to have a set width and height
 * Uses binary search to fit text with minimal layout calls.
 * Version 2.0 does not use jQuery.
 */
/*global define:true, document:true, window:true, HTMLElement:true*/

(function(root, factory) {
  "use strict";

  // UMD shim
  if (typeof define === "function" && define.amd) {
    // AMD
    define([], factory);
  } else if (typeof exports === "object") {
    // Node/CommonJS
    module.exports = factory();
  } else {
    // Browser
    root.textFit = factory();
  }

}(typeof global === "object" ? global : this, function () {
  "use strict";

  var defaultSettings = {
    alignVert: false, // if true, textFit will align vertically using css tables
    alignHoriz: false, // if true, textFit will set text-align: center
    multiLine: false, // if true, textFit will not set white-space: no-wrap
    detectMultiLine: true, // disable to turn off automatic multi-line sensing
    minFontSize: 6,
    maxFontSize: 80,
    reProcess: true, // if true, textFit will re-process already-fit nodes. Set to 'false' for better performance
    widthOnly: false // if true, textFit will fit text to element width, regardless of text height
  };

  return function textFit(els, options) {

    if (!options) options = {};

    // Extend options.
    var settings = {};
    for(var key in defaultSettings){
      if(options.hasOwnProperty(key)){
        settings[key] = options[key];
      } else {
        settings[key] = defaultSettings[key];
      }
    }

    // Convert jQuery objects into arrays
    if (typeof els.toArray === "function") {
      els = els.toArray();
    }

    // Support passing a single el
    var elType = Object.prototype.toString.call(els);
    if (elType !== '[object Array]' && elType !== '[object NodeList]'){
      els = [els];
    }

    // Process each el we've passed.
    for(var i = 0; i < els.length; i++){
      processItem(els[i], settings);
    }
  };

  /**
   * The meat. Given an el, make the text inside it fit its parent.
   * @param  {DOMElement} el       Child el.
   * @param  {Object} settings     Options for fit.
   */
  function processItem(el, settings){
    if (!isElement(el) || (!settings.reProcess && el.getAttribute('textFitted'))) {
      return false;
    }

    // Set textFitted attribute so we know this was processed.
    if(!settings.reProcess){
      el.setAttribute('textFitted', 1);
    }

    var innerSpan, originalHeight, originalHTML, originalWidth;
    var low, mid, high;

    // Get element data.
    originalHTML = el.innerHTML;
    originalWidth = innerWidth(el);
    originalHeight = innerHeight(el);

    // Don't process if we can't find box dimensions
    if (!originalWidth || (!settings.widthOnly && !originalHeight)) {
      if(!settings.widthOnly)
        throw new Error('Set a static height and width on the target element ' + el.outerHTML +
          ' before using textFit!');
      else
        throw new Error('Set a static width on the target element ' + el.outerHTML +
          ' before using textFit!');
    }

    // Add textFitted span inside this container.
    if (originalHTML.indexOf('textFitted') === -1) {
      innerSpan = document.createElement('span');
      innerSpan.className = 'textFitted';
      // Inline block ensure it takes on the size of its contents, even if they are enclosed
      // in other tags like <p>
      innerSpan.style['display'] = 'inline-block';
      innerSpan.innerHTML = originalHTML;
      el.innerHTML = '';
      el.appendChild(innerSpan);
    } else {
      // Reprocessing.
      innerSpan = el.querySelector('span.textFitted');
      // Remove vertical align if we're reprocessing.
      if (hasClass(innerSpan, 'textFitAlignVert')){
        innerSpan.className = innerSpan.className.replace('textFitAlignVert', '');
        innerSpan.style['height'] = '';
      }
    }

    // Prepare & set alignment
    if (settings.alignHoriz) {
      el.style['text-align'] = 'center';
      innerSpan.style['text-align'] = 'center';
    }

    // Check if this string is multiple lines
    // Not guaranteed to always work if you use wonky line-heights
    var multiLine = settings.multiLine;
    if (settings.detectMultiLine && !multiLine &&
        innerSpan.scrollHeight >= parseInt(window.getComputedStyle(innerSpan)['font-size'], 10) * 2){
      multiLine = true;
    }

    // If we're not treating this as a multiline string, don't let it wrap.
    if (!multiLine) {
      el.style['white-space'] = 'nowrap';
    }

    low = settings.minFontSize + 1;
    high = settings.maxFontSize + 1;

    // Binary search for best fit
    while (low <= high) {
      mid = parseInt((low + high) / 2, 10);
      innerSpan.style.fontSize = mid + 'px';
      if(innerSpan.scrollWidth <= originalWidth && (settings.widthOnly || innerSpan.scrollHeight <= originalHeight)){
        low = mid + 1;
      } else {
        high = mid - 1;
      }
    }
    // Sub 1 at the very end, this is closer to what we wanted.
    innerSpan.style.fontSize = (mid - 1) + 'px';

    // Our height is finalized. If we are aligning vertically, set that up.
    if (settings.alignVert) {
      addStyleSheet();
      var height = innerSpan.scrollHeight;
      if( height > 180 ) height = 180;
      if (window.getComputedStyle(el)['position'] === "static"){
        // el.style['position'] = 'relative';
      }
      if (!hasClass(innerSpan, "textFitAlignVert")){
        innerSpan.className = innerSpan.className + " textFitAlignVert";
      }
      innerSpan.style['height'] = height + "px";
    }
  }

  // Calculate height without padding.
  function innerHeight(el){
    var style = window.getComputedStyle(el, null);
    return el.clientHeight -
      parseInt(style.getPropertyValue('padding-top'), 10) -
      parseInt(style.getPropertyValue('padding-bottom'), 10);
  }

  // Calculate width without padding.
  function innerWidth(el){
    var style = window.getComputedStyle(el, null);
    return el.clientWidth -
      parseInt(style.getPropertyValue('padding-left'), 10) -
      parseInt(style.getPropertyValue('padding-right'), 10);
  }

  //Returns true if it is a DOM element
  function isElement(o){
    return (
      typeof HTMLElement === "object" ? o instanceof HTMLElement : //DOM2
      o && typeof o === "object" && o !== null && o.nodeType === 1 && typeof o.nodeName==="string"
    );
  }

  function hasClass(element, cls) {
    return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
  }

  // Better than a stylesheet dependency
  function addStyleSheet() {
    if (document.getElementById("textFitStyleSheet")) return;
    var style = [
      ".textFitAlignVert{",
        "position: absolute;",
        "top: 0; right: 0; bottom: 0; left: 0;",
        "margin: auto;",
      "}"].join("");

    var css = document.createElement("style");
    css.type = "text/css";
    css.id = "textFitStyleSheet";
    css.innerHTML = style;
    document.body.appendChild(css);
  }
}));

// process our links
(function($) {
  $(document).ready(function() {

    var hostname = window.location.hostname.toLowerCase();   


    $("a").each(function() {
      var href = this.href.toLowerCase();

      // track this
      if( $(this).hasClass('ga-track') ){
        $(this).click( function(e){
          e.preventDefault();

          var eventCategory = 'Link';
          // if( $(this).hasClass('ga-track-featurebox') ){
          //   eventCategory = 'FeatureBox';
          // }
          if( $(this).attr('data-track-event-category') ){
            eventCategory = $(this).attr('data-track-event-category');
          }
          var eventAction = 'click';
          if( $(this).attr('data-track-event-action') ){
            eventAction = $(this).attr('data-track-event-action');
          }
          var eventLabel = $(this).attr('href');
          if( $(this).attr('data-track-event-label') ){
            eventLabel = $(this).attr('data-track-event-label');
          }
          else{
            if( $(this).attr('title') ){
              eventLabel = $(this).attr('title');
            }
          }

          // console.log('track category',eventCategory,'action',eventAction,'label', eventLabel );
          ga('send', 'event', eventCategory, eventAction, eventLabel);
          window.location.href = href;
        });
      }

      // force external links to open in new windows
      if (href.indexOf("http") === 0 && href.indexOf(hostname) === -1) {
        $(this).addClass('external').click(function(e) {
          e.preventDefault();
          // console.log('track outbound link');
          ga('send', 'event', 'Outbound Link', 'click', href);
          window.open(href, '_blank');
        });
      }

    });

  });
})(jQuery);

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
