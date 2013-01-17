<?php
/*
Plugin Name: wp-next-coda-slider
Plugin URI: https://github.com/annecamille/wp-next-mosaic.git <<---
Description: Plugin to coda slider
Version: 0.1.0
Author: Anne Camille
Author URI: em breve
*/

/**
 * Load BP functions safely
 */
function wp_next_coda_loader() {
	include( dirname(__FILE__) . '/wp-next-coda-widgets.php' );

	$meuPluginURL = WP_CONTENT_URL.'/plugins/'.plugin_basename( dirname(__FILE__)).'/';
	
	$urlCoda = $meuPluginURL . 'js/coda-slider.1.1.1.pack.js';
	$urlCoda2 = $meuPluginURL . 'js/jquery-easing.1.2.pack.js';
	$urlCoda3 = $meuPluginURL . 'js/jquery-easing-compatibility.1.2.pack.js';
	
	wp_register_script( 'coda' , $urlCoda, $deps = array('jquery'), '1.0', true);
	wp_register_script( 'coda2' , $urlCoda2, $deps = array('jquery'), '1.0', true);
	wp_register_script( 'coda3' , $urlCoda3, $deps = array('jquery'), '1.0', true);
}
add_action( 'bp_include', 'wp_next_coda_loader' );

function wp_next_coda_load_scripts() {
	wp_enqueue_script('coda');
	wp_enqueue_script('coda2');
	wp_enqueue_script('coda3');
}

add_action('init', 'wp_next_coda_load_scripts');


function wp_next_coda_footer(){
	$script = "
	<script type='text/javascript'>
		jQuery(window).bind('load', function() {
			jQuery('div#slider1').codaSlider()
			// jQuery('div#slider2').codaSlider()
			// etc, etc. Beware of cross-linking difficulties if using multiple sliders on one page.
		});
	</script>
	";
    print $script;	
} 

add_action('wp_footer', 'wp_next_coda_footer');


?>
