<?php 
add_action('wp_enqueue_scripts', 'hotel_sydney_style');
function hotel_sydney_style() {
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/style.css' );
}

?>