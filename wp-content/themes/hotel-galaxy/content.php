<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<div class="inside-article">
		
		<?php do_action( 'hotelgalaxy_posts_featured_image' ); ?>

		<header class="entry-header">
			
			<div class="entry-meta">
				
				<?php do_action('hotelgalaxy_get_category'); ?>					
				
			</div>

			<?php

			do_action( 'hotelgalaxy_post_time' ); 

			?>
			
			<?php

			the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			?>
		</header>

		<?php 

		if( hotelgalaxy_show_excerpt() ){
			?>

			<div class="entry-summary" itemprop="text">
				<?php the_excerpt(); ?>
			</div>

			<?php
		}else{
			?>

			<div class="entry-content" itemprop="text">
				<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'hotel-galaxy'),
					'after'  => '</div>',
				) );
				?>
			</div>

			<?php
		}

		?>	
	</div>
</article>