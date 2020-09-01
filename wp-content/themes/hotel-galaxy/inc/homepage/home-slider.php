<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !function_exists('hotelgalaxy_add_home_slider') ){
	
	add_action('hotelgalaxy_do_homeSlider','hotelgalaxy_add_home_slider');

	function hotelgalaxy_add_home_slider(){

		if( defined( 'HG_SLIDER_ADDON_VERSION' ) ){

			do_action('hotelgalaxy_get_premium_slider');

		}else{

			hotelgalaxy_construct_slider();
		}
		
	}	
}


if( ! function_exists('hotelgalaxy_construct_slider')){

	function hotelgalaxy_construct_slider(){

		$slider_details = hotelgalaxy_get_slider_details();

		$hotel_option = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), hotelgalaxy_get_default() ); 

		if( count( $slider_details ) > 0 ){
			?>

			<div id="main-carousel">

				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
				
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">

						<?php 

						foreach( $slider_details as $index=>$slide ){
							?>

							<div class="item <?php echo esc_attr(( $index == 0 ) ? 'active' :''); ?>">

								<?php echo wp_kses_post( $slide['image'] ); ?>

								<div class="carousel-caption">
									<?php 

									echo wp_kses_post( $slide['title'] ); 	

									echo wp_kses_post( $slide['excerpt'] );

									?>
								</div>
							</div>

							<?php
						}


						?>

					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>

			</div>

			<?php
		}


	}
}


if ( ! function_exists( 'hotelgalaxy_get_slider_details' ) ) {


	function hotelgalaxy_get_slider_details() {

		$output = array();

		$page_ids = array();

		for ( $i = 1; $i <= 5 ; $i++ ) {

			$page_id = get_theme_mod( "Page_slider_$i" );

			if ( absint( $page_id ) > 0 ) {

				$page_ids[] = absint( $page_id );
			}
		}

		if ( empty( $page_ids ) ) {
			return $output;
		}

		$args = array(
			'posts_per_page' => count( $page_ids ),
			'orderby'        => 'post__in',
			'post_type'      => 'page',
			'post__in'       => $page_ids,
			'post_status' => 'publish',
			'meta_query'     => array(
				array( 'key' => '_thumbnail_id' ),
			),
		);

		$posts = get_posts( $args );	

		$c = 0;

		foreach ( $posts as $post ) {		

			if ( has_post_thumbnail( $post->ID ) ) {

				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

				$output[$c]['image'] = sprintf('<img class="img-responsive" src="%1$s" title="%2$s" alt="%3$s" />',
					esc_url( $image[0] ),
					esc_html( $post->post_title),
					esc_html( $post->post_title)											
				);

				$output[$c]['title']     = 	sprintf('<h2>%1$s</h2>',
					esc_html( $post->post_title)
				);



				$output[$c]['excerpt']   = hotelgalaxy_trim_words($post->ID, $post->post_content );

				$c++;
			}
		}

		return $output;
	}

}

if(!function_exists('hotelgalaxy_trim_words')){	

	function hotelgalaxy_trim_words( $id, $content, $URL=null, $target=null, $is_readmore = true ){

		$hotel_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), hotelgalaxy_get_default() ); 

		$args= '';
		
		if( !empty( $hotel_settings['slider_sec_btn'] ) && absint( $is_readmore ) == true){

			$args = apply_filters('hotelgalaxy_slider_more_button', sprintf(

				'<footer style="margin-bottom:20px;"><a id="read-more" href="%1$s" target="%2$s"><i class="icon"></i>%3$s</a></footer>',

				esc_url( (empty($URL)) ? get_permalink( $id ) : $URL ),

				(!empty($target) ? '_blank' : '_self' ),

				esc_attr( $hotel_settings['slider_sec_btn'])

			) );

		}

		$html_trim = wp_trim_words( strip_shortcodes( wp_strip_all_tags( $content ) ), $hotel_settings['slider_excerpt_word'] );

		$html_out = sprintf('<p>%1$s</p>%2$s', esc_attr($html_trim), $args);

		return $html_out;
	}
}


if( !function_exists('hotelgalaxy_slider_indicators') ){

	function hotelgalaxy_slider_indicators(){

		$page_ids = array();

		for ( $i = 1; $i <= 5 ; $i++ ) {

			$page_id = get_theme_mod( "Page_slider_$i" );

			if ( absint( $page_id ) > 0 ) {

				$page_ids[] = absint( $page_id );
			}
		}

		if( count( $page_ids ) > 1 ){

			echo '<ol class="carousel-indicators">';

			foreach ($page_ids as $index => $pageId) {

				$active = ( $index==0 ) ? 'active' : '';

				print '<li data-target="#carousel-example-generic" data-slide-to="'.$index.'" class="'.$active.'"></li>';
			}

			echo '</ol>';

		}

	}
}


?>
