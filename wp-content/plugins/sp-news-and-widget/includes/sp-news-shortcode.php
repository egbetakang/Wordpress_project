<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;	// Exit if accessed directly
}

function wpnaw_get_news( $atts, $content = null ){
	// setup the query
	extract(shortcode_atts(array(
		"limit"                 => 10,	
		"category"              => '',
		"grid"                  => 1,
		"show_date"             => 'true',
		"show_category_name"    => 'true',
		"show_content"          => 'true',
		"show_full_content"     => 'false',
		"content_words_limit"   => 20,
		"order"					=> 'DESC',
		"orderby"				=> 'date',
		"pagination_type"       => 'numeric',
	), $atts, 'sp_news'));
	
	// Define variables 
	
	$posts_per_page 	= !empty($limit) 					? $limit 						: 10;	
	$cat 				= (!empty($category)) 				? explode(',', $category) 		: '';	
	$gridcol 			= !empty($grid) 					? $grid 						: 1;
	$showDate 			= ( $show_date == 'false' ) 		? 'false' 						: 'true';
	$showCategory 		= ( $show_category_name == 'false' )? 'false' 						: 'true';	
	$showContent 		= ( $show_content == 'false' ) 		? 'false' 						: 'true';
	$showFullContent   	= ( $show_full_content == 'false' ) ? 'false' 						: 'true';	
	$words_limit 		= (!empty($content_words_limit)) 	? $content_words_limit 			: 20;
	$pagination_type   	= ( $pagination_type == 'numeric' ) ? 'numeric' 					: 'next-prev';	
	$order 				= ( strtolower( $order ) == 'asc' ) 	? 'ASC' 						: 'DESC';
	$orderby 			= !empty( $orderby )					? $orderby 						: 'date';

	ob_start();
	
	global $paged;
	
	if(is_home() || is_front_page()) {
		  $paged = get_query_var('page');
	} else {
		 $paged = get_query_var('paged');
	}

	$post_type 		= WPNW_POST_TYPE;	

	$args = array ( 
		'post_type'      => $post_type,
		'post_status'    => array( 'publish' ),
		'orderby'        => $orderby,
		'order'          => $order,
		'posts_per_page' => $posts_per_page,
		'paged'          => $paged,
	);

	if($cat != "") {
		$args['tax_query'] = array(
			array(
				'taxonomy'  => WPNW_CAT,
				'field'     => 'term_id',
				'terms'     => $cat
			));
	}

	$query = new WP_Query($args);

	global $post;
	$post_count = $query->post_count;
	$count = 0;
	?>
	<div class="wpnawfree-plugin news-clearfix">
	<?php
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
		
		$count++;
		$terms 		= get_the_terms( $post->ID, WPNW_CAT );
		$news_links = array();

		if($terms) {
			foreach ( $terms as $term ) {
				$term_link = get_term_link( $term );
				$news_links[] = '<a href="' . esc_url( $term_link ) . '">'.$term->name.'</a>';
			}
		}
		
		$cate_name = join( ", ", $news_links );
		$css_class="wpnaw-news-post";

		if ( ( is_numeric( $grid ) && ( $grid > 0 ) && ( 0 == ($count - 1) % $grid ) ) || 1 == $count ) { $css_class .= ' wpnaw-first'; }
		if ( ( is_numeric( $grid ) && ( $grid > 0 ) && ( 0 == $count % $grid ) ) || $post_count == $count ) { $css_class .= ' wpnaw-last'; }
		if($showDate == 'true'){ $date_class = "has-date"; } else { $date_class = "has-no-date";} ?>
	
		<div id="post-<?php the_ID(); ?>" class="news type-news news-col-<?php echo $gridcol.' '.$css_class.' '.$date_class; ?>">
			<div class="news-inner-wrap-view news-clearfix <?php  if ( !has_post_thumbnail()) { echo 'wpnaw-news-no-image'; } ?>">	
				<?php  if ( has_post_thumbnail()) { ?>
				<div class="news-thumb">    			
				<?php if($gridcol == '1'){ ?>    					
							<div class="grid-news-thumb">    				    
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
							</div>
						<?php } else if($gridcol > '2') { ?>    					
							<div class="grid-news-thumb">	    				    
								<a href="<?php the_permalink(); ?>">	<?php the_post_thumbnail('medium_large'); ?></a>
							</div>
						<?php	} else { ?>        			    
							<div class="grid-news-thumb">        				
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_large'); ?></a>
							</div>
						<?php }  ?>
				</div>	
				<?php }  ?>	
				<div class="news-content">    			
					<?php if($gridcol == '1') {                    
						if($showDate == 'true'){ ?>        				
							<div class="date-post">            			
								<h2><span><?php echo get_the_date('j'); ?></span></h2>            			
								<p><?php echo get_the_date('M y'); ?></p>
							</div>
						<?php }?>
					<?php } else {  ?>    				
						<div class="grid-date-post">        			
							<?php echo ($showDate == "true")? get_the_date() : "" ;?>                    
							<?php echo ($showDate == "true" && $showCategory == "true" && $cate_name != '') ? " / " : "";?>                    
							<?php echo ($showCategory == 'true' && $cate_name != '') ? $cate_name : ""?>
						</div>
					<?php  } ?>    			
					<div class="post-content-text">    				
						<?php the_title( sprintf( '<h3 class="news-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );	?>    			    
						<?php if($showCategory == 'true' && $gridcol == '1'){ ?>    				
							<div class="news-cat">                        
								<?php echo $cate_name; ?>
							</div>
						<?php }?>
						<?php if($showContent == 'true'){?>        			 
							<div class="news-content-excerpt">            			
								<?php  if($showFullContent == "false" ) {									
									$excerpt = get_the_content(); ?>                				
									<div class="news-short-content">                                    
										<?php echo string_limit_newswords( $post->ID, $excerpt, $words_limit, '...'); ?>
									</div>                				
									<a href="<?php the_permalink(); ?>" class="news-more-link"><?php _e( 'Read More', 'sp-news-and-widget' ); ?></a>	
								<?php } else { 									
									the_content();
								} ?>
							</div><!-- .entry-content -->
						<?php }?>
					</div>
				</div>
			</div><!-- #post-## -->
		</div><!-- #post-## -->
	<?php  endwhile; endif; ?>
	</div>		
	<div class="news_pagination">        
		<?php if($pagination_type == 'numeric'){ 
			echo news_pagination( array( 'paged' => $paged , 'total' => $query->max_num_pages ) );
		} else { ?>
			<div class="button-news-p"><?php next_posts_link( __('Next', 'sp-news-and-widget').' &raquo;', $query->max_num_pages ); ?></div>    		
			<div class="button-news-n"><?php previous_posts_link( '&laquo; '.__('Previous', 'sp-news-and-widget') ); ?></div>
		<?php } ?>
	</div><?php
	
	wp_reset_postdata(); 
				
	return ob_get_clean();
}

// 'sp_news' shortcode
add_shortcode('sp_news','wpnaw_get_news');