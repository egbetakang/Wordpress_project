<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_active_sidebar( 'sidebar-left' ) ){ 	
	
	dynamic_sidebar( 'sidebar-left' );
} 

?>
