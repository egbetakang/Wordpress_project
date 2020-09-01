<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

if ( ! function_exists( 'hotelgalaxy_posts_nav' ) ) {

	add_action('hotelgalaxy_after_post','hotelgalaxy_posts_nav');

	function hotelgalaxy_posts_nav( $nav_id ) {

		if ( ! apply_filters( 'hotelgalaxy_show_post_navigation', true ) ) {
			return;
		}

		$cpt = array('hg_room');


		global $wp_query, $post;

		if ( is_single() ) {

			$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );

			$next = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous ) {
				return;
			}
		}

		if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) ) {
			return;
		}		

		$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

		?>

		<nav id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo esc_attr( $nav_class ); ?>">

			<span class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'hotel-galaxy'); ?></span>

			<?php 

			if ( is_single() ){

				$post_nav_args = apply_filters( 'hotelgalaxy_post_navigation_args', array(
					'previous_format' => '<div class="nav-previous">' . hotelgalaxy_get_svg_icon( 'arrow' ) . '<span class="prev" title="' . esc_attr__( 'Previous', 'hotel-galaxy') . '">%link</span></div>',
					'next_format' => '<div class="nav-next">' . hotelgalaxy_get_svg_icon( 'arrow' ) . '<span class="next" title="' . esc_attr__( 'Next', 'hotel-galaxy') . '">%link</span></div>',
					'link' => '%title',
					'in_same_term' => apply_filters( 'hotelgalaxy_category_post_navigation', false ),
					'excluded_terms' => '',
					'taxonomy' => 'category',
				) );

				previous_post_link(
					$post_nav_args['previous_format'],
					$post_nav_args['link'],
					$post_nav_args['in_same_term'],
					$post_nav_args['excluded_terms'],
					$post_nav_args['taxonomy']
				);

				next_post_link(
					$post_nav_args['next_format'],
					$post_nav_args['link'],
					$post_nav_args['in_same_term'],
					$post_nav_args['excluded_terms'],
					$post_nav_args['taxonomy']
				);
			}elseif ( is_home() || is_archive() || is_search() || in_array($post->post_type, $cpt)){

				if ( get_next_posts_link() ){

					?>

					<div class="nav-previous">
						<?php hotelgalaxy_get_svg_icon( 'arrow' ); ?>
						<span class="prev" title="<?php esc_attr_e( 'Previous', 'hotel-galaxy');?>"><?php next_posts_link( __( 'Older posts', 'hotel-galaxy') ); ?></span>
					</div>

					<?php
				}

				if ( get_previous_posts_link() ){
					
					?>
					<div class="nav-next">
						<?php hotelgalaxy_get_svg_icon( 'arrow' ); ?>
						<span class="next" title="<?php esc_attr_e( 'Next', 'hotel-galaxy');?>"><?php previous_posts_link( __( 'Newer posts', 'hotel-galaxy') ); ?></span>
					</div>
					<?php
				}

				if ( function_exists( 'the_posts_pagination' ) ) {
					the_posts_pagination( array(
						'mid_size' => apply_filters( 'hotelgalaxy_pagination_mid_size', 1 ),
						'prev_text' => apply_filters( 'hotelgalaxy_previous_link_text', __( '&larr; Previous', 'hotel-galaxy') ),
						'next_text' => apply_filters( 'hotelgalaxy_next_link_text', __( 'Next &rarr;', 'hotel-galaxy') ),
					) );
				}
			}

			
			?>
			

		</nav>

		
		<?php	
	}
}

if ( ! function_exists( 'hotelgalaxy_modify_posts_pagination_template' ) ) {
	add_filter( 'navigation_markup_template', 'hotelgalaxy_modify_posts_pagination_template', 10, 2 );
	
	function hotelgalaxy_modify_posts_pagination_template( $template, $class ) {
		if ( ! empty( $class ) && false !== strpos( $class, 'pagination' ) ) {
			$template = '<div class="nav-links">%3$s</div>';
		}

		return $template;
	}
}

if ( ! function_exists( 'hotelgalaxy_footer_meta' ) ) {
	add_action( 'hotelgalaxy_get_category', 'hotelgalaxy_footer_meta' );
	
	function hotelgalaxy_footer_meta() {
		$post_types = apply_filters( 'hotelgalaxy_footer_meta_post_types', array(
			'post',
		) );

		if ( in_array( get_post_type(), $post_types ) ) : ?>
			<footer class="entry-meta">
				<?php

				hotelgalaxy_post_category_meta();

				// if ( is_single() ) {
				// 	hotelgalaxy_content_nav( 'nav-below' );
				// }
				?>
			</footer><!-- .entry-meta -->
		<?php endif;
	}
}

if ( ! function_exists( 'hotelgalaxy_post_category_meta' ) ) {
	
	function hotelgalaxy_post_category_meta() {

		$items = apply_filters( 'hotelgalaxy_category_meta_items', array(
			'categories',
			'comments-link',
		) );

		foreach ( $items as $item ) {
			hotelgalaxy_post_meta_item( $item );
		}
	}
}

if ( ! function_exists( 'hotelgalaxy_post_meta' ) ) {

	add_action( 'hotelgalaxy_post_time', 'hotelgalaxy_post_meta' );
	
	function hotelgalaxy_post_meta() {
		$post_types = apply_filters( 'hotelgalaxy_entry_meta_post_types', array(
			'post',
		) );

		if ( in_array( get_post_type(), $post_types ) ) : ?>
			<div class="entry-meta">
				<?php hotelgalaxy_posted_on(); ?>
			</div>
		<?php endif;
	}
}

if ( ! function_exists( 'hotelgalaxy_posted_on' ) ) {
	
	function hotelgalaxy_posted_on() {
		$items = apply_filters( 'hotelgalaxy_header_entry_meta_items', array(
			'date',
			'author',
			'tags'
		) );

		foreach ( $items as $item ) {

			hotelgalaxy_post_meta_item( $item );
		}
	}
}


function hotelgalaxy_post_meta_item( $item ){

	if ( 'categories' === $item ) {
		$categories = apply_filters( 'hotelgalaxy_show_categories', true );

		$term_separator = apply_filters( 'hotelgalaxy_term_separator', _x( ', ', 'Used between list items, there is a space after the comma.', 'hotel-galaxy'), 'categories' );
		$categories_list = get_the_category_list( $term_separator );

		if ( $categories_list && $categories ) {
			echo apply_filters( 'hotelgalaxy_category_list_output',
				sprintf( '<span class="category-links">%3$s<span class="screen-reader-text">%1$s </span>%2$s</span> ', 
					esc_html_x( 'Categories', 'Used before category names.', 'hotel-galaxy'),
					$categories_list,
					apply_filters( 'hotelgalaxy_inside_post_meta_item_output', '', 'categories' )
				)
			);
		}
	}

	if ( 'tags' === $item ) {
		$tags = apply_filters( 'hotelgalaxy_show_tags', true );

		$term_separator = apply_filters( 'hotelgalaxy_term_separator', _x( ', ', 'Used between list items, there is a space after the comma.', 'hotel-galaxy'), 'tags' );
		$tags_list = get_the_tag_list( '', $term_separator );

		if ( $tags_list && $tags ) {
			echo apply_filters( 'hotelgalaxy_tag_list_output',
				sprintf( '<span class="tags-links">%2$s %1$s</span> ', 

					$tags_list,

					apply_filters( 'hotelgalaxy_inside_post_meta_item_output', '', 'tags' )
				)
			);
		}
	}

	if ( 'date' === $item ) {
		
		$date = apply_filters( 'hotelgalaxy_post_date', true );

		$time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>' . $time_string;
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		// If our date is enabled, show it.
		if ( $date ) {
			echo apply_filters( 'hotelgalaxy_post_date_output',
				sprintf( '<span class="posted-on">%1$s<a href="%2$s" title="%3$s" rel="bookmark">%4$s</a></span> ',
					apply_filters( 'hotelgalaxy_inside_post_meta_item_output', '', 'date' ),
					esc_url( get_permalink() ),
					esc_attr( get_the_time() ),
					$time_string
				),
				$time_string );
		}
	}

	if ( 'author' === $item ) {
		$author = apply_filters( 'hotelgalaxy_post_author', true );

		if ( $author ) {

			echo apply_filters( 'hotelgalaxy_post_author_output',

				sprintf( '<span class="byline"><span class="author vcard" %4$s><a class="url" href="%1$s" title="%2$s" rel="author" itemprop="url"><span class="author-name" itemprop="name">%3$s</span></a></span></span> ',				

					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					
					esc_attr( sprintf( __( 'View all posts by %s', 'hotel-galaxy'), get_the_author() ) ),

					esc_html( get_the_author() ),
					'itemprop="author" itemtype="https://schema.org/Person" itemscope'
				)
			);
		}
	}

}


add_filter( 'hotelgalaxy_inside_post_meta_item_output', 'hotelgalaxy_do_post_meta_prefix', 10, 2 );

function hotelgalaxy_do_post_meta_prefix( $output, $item ) {
	if ( 'author' === $item ) {
		$output = __( 'by', 'hotel-galaxy') . ' ';
	}

	if ( 'categories' === $item ) {
		$output = hotelgalaxy_get_svg_icon( 'categories' );
	}

	if ( 'tags' === $item ) {
		$output = hotelgalaxy_get_svg_icon( 'tags' );
	}

	if ( 'comments-link' === $item ) {
		$output = hotelgalaxy_get_svg_icon( 'comments' );
	}

	return $output;
}

?>