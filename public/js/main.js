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
