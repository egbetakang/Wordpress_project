<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>
<div class="container">

	<main class="content-area">

		<div class="row">

			<div id="hg-grid" class="col-md-8">	

				<?php 

				if ( have_posts()): 
					
					while ( have_posts() ): the_post();
						
						get_template_part( 'content', 'single' );

						do_action('hotelgalaxy_after_post');

						if ( comments_open() || '0' != get_comments_number() ) :				

						?>

						<div class="comments-area">

							<?php comments_template(); ?>

						</div>

						<?php

					endif;

				endwhile;

			endif;
			
			?>		

		</div>			

		<div class="col-md-4">

			<?php get_sidebar(); ?>

		</div>	

	</div>

</main>

</div>
<?php get_footer(); ?>