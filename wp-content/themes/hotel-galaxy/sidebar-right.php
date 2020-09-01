<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_active_sidebar( 'sidebar-primary' ) ){ 

	dynamic_sidebar( 'sidebar-primary' ); 

} 

?>
