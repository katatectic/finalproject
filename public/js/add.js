/* Course Quick Preview JS */

;( function( $ ) {
	
	"use strict";
	var CHEF = window.CHEF || {};

	CHEF.handleToggle = function() {
		
		if( $( 'div[ id^="course-preview-" ]' ).length && $( 'a[ href^="#course-preview-" ]' ).length ) {
		   $( 'a[ href^="#course-preview-" ]' ).on( 'click', function() {
			   var this_id = $( this ).attr( 'data-id' );
			   $( '#course-preview-' + this_id ).slideToggle( 200 );
			   return false;
		   } );
		}
		
	}
	// events
	$( document ).ready( function() {
		CHEF.handleToggle();
	} );

} )( jQuery );
document.body.className = document.body.className.replace("siteorigin-panels-before-js", "");
WebFont.load({google: {families: ['Lato:700i,300i:cyrillic,cyrillic-ext,devanagari,greek,greek-ext,khmer,latin,latin-ext,vietnamese,hebrew,arabic,bengali,gujarati,tamil,telugu,thai', 'Open Sans:300:cyrillic,cyrillic-ext,devanagari,greek,greek-ext,khmer,latin,latin-ext,vietnamese,hebrew,arabic,bengali,gujarati,tamil,telugu,thai']}});