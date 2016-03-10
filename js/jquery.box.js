/*
 * Easy Dialog
 * Copyright 2009 Pieterjan de Smet
 * www.paprikadesign.be
 *
 * Version 1.0   -   Created: Feb. 17, 2010
 *
 * This Easy Dialog jQuery plug-in is dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 */
// create an instance of the object
if (!DIALOG) var DIALOG = new Object();

// set the plugin
(function($){
	// init the plugin
	$.fn.eDialog = function(properties){
		DIALOG._init(properties, this);
	};
	// set the open functionality
	$.fn.eDialog.open = function(evt){
		// open the dialog
		DIALOG.open();
	};
	// set the close functionality
	$.fn.eDialog.close = function(evt){
		// close the dialog
		DIALOG.close();
	};
})(jQuery);

// the DIALOG object
DIALOG = {
	// set vars
	// the properties
	properties: null,
	// the animation
	animationTime: 500,
	// overlay
	overlay: 'eDialogOverlay',
	overlayBackground: '#555555',
	overlayOpacity: 0.5,
	// selectors
	closeSelector: '',
	openSelector: '',
	// callbacks
	closeCallback: '',
	openCallback: '',
	//jquery object
	object: null,

	// init
	_init: function(properties, object){
		// set the vars
		DIALOG.properties = properties;
		DIALOG.object = object;

		// hide the dialogbox
		DIALOG.object.hide();

		// set the properties
		DIALOG.setProperties();

		// bind if necessary
		if(DIALOG.openSelector != '') $(DIALOG.openSelector).bind('click', DIALOG.open);
		if(DIALOG.closeSelector != '') $(DIALOG.closeSelector).bind('click', DIALOG.close);;
	},

	// close the dialogbox
	close : function(){
		// check if the body has the modelshowing class
		if($('body').hasClass('dialogboxShowing'))
		{
			// remove the class
			$('body').removeClass('dialogboxShowing');

			// check if the browser is IE
			if (jQuery.browser.msie) {
				// hide the dialogbox
				DIALOG.object.css('display', 'none');
				// hide the overlay
				$('#' + DIALOG.overlay).css('display', 'none');
			} else{
				// fade the dialogbox and the overlay out
				DIALOG.object.fadeOut(DIALOG.animationTime);
				$('#' + DIALOG.overlay).fadeOut(DIALOG.animationTime);
			}

			// use the callback that is given
			if(DIALOG.closeCallback != '') setTimeout(DIALOG.closeCallback, DIALOG.animationTime);
			
			$(document.body).unbind();
		}

		// stop the bubbling
		return false;
	},

	// open the dialogbox
	open: function(){
		// parse the object in o
		var o = DIALOG.object;

		// position the box
		DIALOG.rePosition();

		// set the overlay
		DIALOG.setOverlay();

		// Detect the browser
		if (jQuery.browser.msie) {
			// show tagBox
			o.fadeIn(DIALOG.animationTime);
			$('#' + DIALOG.overlay).css('display', 'block');
			$('#' + DIALOG.overlay).fadeTo(DIALOG.animationTime, DIALOG.overlayOpacity);

			// only IE should use absolute
			if($.browser.msie && $.browser.version =='6.0') {
				$('#' + DIALOG.overlay).css('height', $(document).height());
			}
		} else {
			// show tagBox
			o.fadeIn(DIALOG.animationTime);
			$('#' + DIALOG.overlay).css('display', 'block');
			$('#' + DIALOG.overlay).fadeTo(DIALOG.animationTime, DIALOG.overlayOpacity);
		}
		// add the modalshowing class
		$('body').addClass('dialogboxShowing');

		// Make sure the hide code has no effect on the tagbox itself
		o.bind('click', function(evt) { evt.stopPropagation(); });

		// Hide dialogbox when clicking outside it
		$(document.body).bind('click', function(evt) {
			DIALOG.close();
		});

		// Hide dialog ox when pressing escape button
		$(document.body).bind("keypress", function(evt) {
			if (evt.keyCode == 27) {
				DIALOG.close();
			}
		});

		// use the callback that is given
		if(DIALOG.openCallback != '') setTimeout(DIALOG.openCallback, DIALOG.animationTime);

		return false;
	},

	// position the box
	rePosition: function() {
		// parse the object in o
		var o = DIALOG.object;

		// calculate offset
		var offsetLeft = parseInt(($(window).width() - o.width()) / 2);
		var offsetTop = parseInt(($(window).height() - o.height()) / 2);

		var modalWidth = parseInt(o.width());
		var modalHeight = parseInt(o.height());

		// set properties
		o.css('left', offsetLeft)
			.css('top', offsetTop)
			.css('width', modalWidth)
			.css('height', modalHeight)
			.css('z-index', '1200')
			.css('position', 'fixed');

		// only IE should use absolute
		if($.browser.msie && $.browser.version =='6.0') {
			// Set scroll to top to avoid have to use buggy fixed positioning
			$(window).scrollTop(0);
			// fix the position
			o.css('position', 'absolute')
				.css('top', parseInt(offsetTop + $(window).scrollTop()));
		}
	},

	// set the overlay
	setOverlay: function(){
		// add the overlay div to the body
		$('body').append('<div id="'+ DIALOG.overlay +'">&nbsp;</div>')

		// set styling
		$('#' + DIALOG.overlay).attr('style', 'z-index: 1000; height: 100%; width: 100%; position: fixed; _position: absolute; top: 0; left: 0;')
			// set bg color
			.css('background', DIALOG.overlayBackground)
			// fade to 0
			.fadeTo(0, 0)
			// hide it
			.hide();
	},

	// set the properties
	setProperties: function(){
		// set animation
		if(DIALOG.properties.animationTime != undefined) DIALOG.animationTime = DIALOG.properties.animationTime;
		//set selectors
		if(DIALOG.properties.openSelector != undefined) DIALOG.openSelector = DIALOG.properties.openSelector;
		if(DIALOG.properties.closeSelector != undefined) DIALOG.closeSelector = DIALOG.properties.closeSelector;
		//set overlay
		if(DIALOG.properties.overlay != undefined) DIALOG.overlay = DIALOG.properties.overlay;
		if(DIALOG.properties.overlayBackground != undefined) DIALOG.overlayBackground = DIALOG.properties.overlayBackground;
		if(DIALOG.properties.overlayOpacity != undefined) DIALOG.overlayOpacity = DIALOG.properties.overlayOpacity;
		// callbacks
		if(DIALOG.properties.closeCallback != undefined) DIALOG.closeCallback = DIALOG.properties.closeCallback;
		if(DIALOG.properties.openCallback != undefined) DIALOG.openCallback = DIALOG.properties.openCallback;
	}
};
