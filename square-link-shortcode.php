<?php

function squarelink_shortcode( $atts ) {

    $code = "<!-- Square Link Ad Slot via Wordpress Plugin -->
	<div id=\"squarelink_{$atts['id']}\" class=\"squarelink_ad\"></div>
	<script type=\"text/javascript\">
	(function() {var a = document.createElement('script'); 
	a.type = 'text/javascript'; a.async = true; 
	a.src = '//app.square-link.com/ad.js';
	var s = document.getElementsByTagName('script')[0]; 
	s.parentNode.insertBefore(a, s); })();
	</script>";

	return $code;
}

add_shortcode('squarelink', 'squarelink_shortcode');