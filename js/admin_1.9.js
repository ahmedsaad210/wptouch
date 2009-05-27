/*
 * WPtouch Admin Javascript
 * Version: 1.9
 * This file holds all the default jQuery & Ajax functions all in one neat place.
 * 
 * Copyright (c) 2009 Duane Storey & Dale Mugford (BraveNewCode Inc.)
 * Licensed under GPL.
 *
 * Updated: May 27th, 2009
 */
 
	$j = jQuery.noConflict();
	$j(document).ready(function(){
		new Ajax_upload('#upload_button', {
			action: '/?wptouch=upload',
			autoSubmit: true,
			name: 'submitted_file',
			onSubmit: function(file, extension) { $j("#upload_progress").show(); },
			onComplete: function(file, response) { $j("#upload_progress").hide();
			$j('#upload_response').hide().html(response).fadeIn(); }
	});
	
	$j("a.wptouch-fancylink").fancybox({
		'padding':						5,
		'imageScale':					true,
		'zoomSpeedIn':				250, 
		'zoomSpeedOut':			250,
		'zoomOpacity':				true, 
		'overlayShow':				false,
		'frameHeight':				250,
		'hideOnContentClick': 	true
	});

	jQuery.ajax({
		url: "/?wptouch=news",
		success: function(data) {
			jQuery("#wptouch-news-content").html(data).fadeIn();
		}});
	
	jQuery.ajax({
		url: "/?wptouch=beta",
		success: function(data) {
			jQuery("#wptouch-beta-content").html(data).fadeIn();
		}}); 

	jQuery('#header-text-color, #header-background-color, #header-border-color, #link-color').ColorPicker({
		onSubmit: function(hsb, hex, rgb, el) {
			jQuery(el).val(hex);
			jQuery(el).ColorPickerHide();
		},
		onBeforeShow: function () {
			jQuery(this).ColorPickerSetColor( jQuery(this).attr('value') );
		}
	});

});