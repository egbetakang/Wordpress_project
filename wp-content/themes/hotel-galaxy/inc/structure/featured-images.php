<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// 

if ( ! function_exists( 'hotelgalaxy_add_posts_image' ) ) {

	add_action( 'hotelgalaxy_posts_featured_image', 'hotelgalaxy_add_posts_image' );
	
	function hotelgalaxy_add_posts_image() {

		if ( ! has_post_thumbnail() ) {
			return;
		}
		
		if (! is_404() && ! is_singular() || is_page_template()) {

			$args = sprintf( 
				'<div class="post-image">%3$s<a href="%1$s">%2$s</a></div>',
				esc_url( get_permalink() ),
				get_the_post_thumbnail( get_the_ID(), apply_filters( 'hotelgalaxy_page_header_default_size', 'full' ), 
					array(
						'itemprop' => 'image',
						'class'=>'img-responsive',
					)
				),
				apply_filters( 'hotelgalaxy_inside_featured_image_output', '' )
			); 

			echo apply_filters( 'hotelgalaxy_featured_image_output', $args);
		}
	}
}

// 


if ( ! function_exists( 'hotelgalaxy_homepage_posts_image' ) ) {

	add_action( 'hotelgalaxy_homepage_post_img', 'hotelgalaxy_homepage_posts_image' );
	
	function hotelgalaxy_homepage_posts_image() {

		if ( ! has_post_thumbnail() ) {
			return;
		}
		
		if (is_front_page() ) {

			$args = sprintf( 
				'<div class="post-image">%3$s<a href="%1$s">%2$s</a></div>',
				esc_url( get_permalink() ),
				get_the_post_thumbnail( get_the_ID(), apply_filters( 'hotelgalaxy_page_header_default_size', 'full' ), 
					array(
						'itemprop' => 'image',
						'class'=>'img-responsive',
					)
				),
				apply_filters( 'hotelgalaxy_inside_featured_image_output', '' )
			); 


			echo apply_filters( 'hotelgalaxy_featured_image_output', $args);
		}
	}
}

// 

if ( ! function_exists( 'hotelgalaxy_featured_page_header_inside_single' ) ) {
	
	add_action( 'hotelgalaxy_single_post_image', 'hotelgalaxy_featured_page_header_inside_single', 10 );
	
	function hotelgalaxy_featured_page_header_inside_single() {
		if ( function_exists( 'hotelgalaxy_page_header' ) ) {
			return;
		}

		if ( is_single() ) {
			hotelgalaxy_featured_page_header_area( 'single-post-header-image' );
		}
	}
}

// 
if ( ! function_exists( 'hotelgalaxy_add_page_featured_image' ) ) {
	
	add_action( 'hotelgalaxy_page_featured_image', 'hotelgalaxy_add_page_featured_image', 10 );
	
	function hotelgalaxy_add_page_featured_image() {
		if ( function_exists( 'hotelgalaxy_page_header' ) ) {
			return;
		}

		if ( is_page() ) {
			hotelgalaxy_featured_page_header_area( 'page-header-image' );
		}
	}
}

// 
if ( ! function_exists( 'hotelgalaxy_featured_page_header_area' ) ) {
	
	function hotelgalaxy_featured_page_header_area( $class ) {
		
		if ( ! is_singular() ) {
			return;
		}
		
		if ( ! has_post_thumbnail() ) {
			return;
		}
		?>
		<div class="<?php echo esc_attr( $class ); ?> grid-container">
			<?php the_post_thumbnail(
				apply_filters( 'hotelgalaxy_page_header_default_size', 'full' ),
				array(
					'itemprop' => 'image',
				)
			); ?>
		</div>
		<?php
	}
}


?>