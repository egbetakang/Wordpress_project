<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<div class="inside-article">	

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