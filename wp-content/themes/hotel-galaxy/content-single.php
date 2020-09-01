<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<div class="inside-article">
		
		<?php do_action( 'hotelgalaxy_single_post_image' ); ?>

		<header class="entry-header">

			<div class="entry-meta">

				<?php do_action('hotelgalaxy_get_category'); ?>	

			</div>

			<?php

			do_action( 'hotelgalaxy_post_time' ); 

			the_title( sprintf( '<h1 class="entry-title" itemprop="headline">', esc_url( get_permalink() ) ), '</h1>' );
			?>

		</header>

		<div class="entry-content" itemprop="text">

			<?php

			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'hotel-galaxy'),
				'after'  => '</div>',
			) );

			?>

		</div>

	</div>
	
</article>