<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


?>

<div class="inside-article">

	<header class="entry-header">

		<h1 class="entry-title">

			<?php _e( 'Nothing Found', 'hotel-galaxy'); ?>

		</h1>

	</header>

	<div class="entry-content">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p>
			<?php
			printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'hotel-galaxy'),
				esc_url( admin_url( 'post-new.php' ) )
			);
			?>
		</p>

		<?php elseif ( is_search() ) : ?>

			<p>
				<?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'hotel-galaxy');  ?>

			</p>
			<?php get_search_form(); ?>

			<?php else : ?>

				<p>
					<?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'hotel-galaxy');  ?>

				</p>
				<?php get_search_form(); ?>

			<?php endif; ?>

		</div><!-- .entry-content -->
	</div>