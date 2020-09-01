<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); 

?>

<div class="container">

	<div class="content-area">

		<div class="row">

			<div class="col-md-8">		

				<div class="inside-article">	

					<h2>

						<?php echo apply_filters( 'hotelgalaxy_404_title', __( 'Oops! That page can&rsquo;t be found.', 'hotel-galaxy') ); 
						?>

					</h2>					

					<div class="entry-content">

						<?php

						echo '<p>' . apply_filters( 'hotelgalaxy_404_text', __( 'It looks like nothing was found at this location. Maybe try searching?', 'hotel-galaxy') ) . '</p>'; 

						get_search_form();

						?>
					</div>

				</div>
			</div>	

			<div class="col-md-4">

				<?php get_sidebar(); ?>

			</div>

		</div>
	</div>
</div>	

<?php get_footer(); ?>