<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php 

	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} 
	
	?>
	
	<header id="mastser-header" class="mastser-header site-header" role="header">

		<div class="container">

			<?php 

			do_action('hotelgalaxy_add_logo');

			do_action('hotelgalaxy_menu'); 

			?>

		</div>

	</header>

	<div class="info-bar">
		
		<?php do_action('hotelgalaxy_site_info_bar'); ?>
		
	</div>
	
	<div id="hg-wrapper" class="clearfix">


		<?php do_action( 'hotelgalaxy_page_breadcrums' ) ?>