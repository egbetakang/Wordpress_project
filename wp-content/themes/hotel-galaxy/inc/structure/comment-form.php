<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}


if ( ! function_exists( 'hotelgalaxy_comment_list' ) ) :
	
	function hotelgalaxy_comment_list( $comment, $args, $depth ){
		
		$args['avatar_size'] = apply_filters( 'hotelgalaxy_comment_avatar_size', 50 );

		if ( 'trackback' == $comment->comment_type || 'pingback' == $comment->comment_type ) : ?>

			<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?> >
				
				<div class="comment-body">

					<?php _e( 'Pingback:', 'hotel-galaxy'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'hotel-galaxy'), '<span class="edit-link">', '</span>' ); ?>

				</div>


				<?php else : ?>

					<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> >


						<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
							
							<footer class="comment-meta">
								<?php
								if ( 0 != $args['avatar_size'] ) {
									echo get_avatar( $comment, $args['avatar_size'] );
								}
								?>

								<div class="comment-author-info">
									<div class="comment-author">
										<?php printf( '<cite itemprop="name" class="fn">%s</cite>', get_comment_author_link() ); ?>
									</div>



									<div class="entry-meta">
										<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
											<time datetime="<?php comment_time( 'c' ); ?>" itemprop="datePublished">
												<?php printf( 
													_x( '%1$s at %2$s', '1: date, 2: time', 'hotel-galaxy'),
													get_comment_date(),
													get_comment_time()
												); ?>
											</time>
										</a>
										<?php edit_comment_link( __( 'Edit', 'hotel-galaxy'), '<span class="edit-link">| ', '</span>' ); ?>
									</div>


									<?php if ( $comment->comment_approved == '0') : ?>
										<p class="awaiting-comment"><?php _e( 'Your comment is awaiting moderation.', 'hotel-galaxy');  ?></p>
									<?php endif; ?>

								</div>						

							</footer>

							<div class="comment-content" itemprop="text">
								<?php 

								comment_text();

								do_action( 'hotelgalaxy_comment_reply_link', $comment, $args, $depth );

								?>
							</div>

						</article>

						<?php 

					endif;
				}

endif;			


add_action( 'hotelgalaxy_comment_reply_link', 'hotelgalaxy_do_comment_reply_link', 10, 3 );

function hotelgalaxy_do_comment_reply_link( $comment, $args, $depth ) {
	comment_reply_link( array_merge( $args, array(
		'add_below' => 'div-comment',
		'depth'     => $depth,
		'max_depth' => $args['max_depth'],
		'before'    => '<span class="reply">',
		'after'     => '</span>',
	) ) );
}



add_filter( 'comment_form_defaults', 'hotelgalaxy_set_comment_form_defaults' );

function hotelgalaxy_set_comment_form_defaults( $defaults ) {

	$defaults['comment_field'] = sprintf(
		'<div class="form-group"><label for="comment" class="screen-reader-text">%1$s</label><textarea class="form-control" id="comment" name="comment" rows="8" aria-required="true" placeholder="%1$s"></textarea></div>',
		esc_html__( 'Comment', 'hotel-galaxy')
	);

	
	$defaults['id_form'] 				= 'commentform';
	$defaults['id_submit'] 				= 'submit';
	$defaults['comment_notes_before']	= null;
	$defaults['comment_notes_after']	= null;
	$defaults['title_reply'] 			= apply_filters( 'hotelgalaxy_leave_comment', __( 'Leave a Comment', 'hotel-galaxy') );
	$defaults['label_submit'] 			= apply_filters( 'hotelgalaxy_post_comment', __( 'Post Comment', 'hotel-galaxy') );

	return $defaults;
}



add_filter( 'comment_form_default_fields', 'hotelgalaxy_filter_comment_fields' );

function hotelgalaxy_filter_comment_fields( $fields ) {

	$commenter = wp_get_current_commenter();

	$fields['author'] = sprintf(
		'<div class="form-group"><label for="author" class="screen-reader-text">%1$s</label><input placeholder="%1$s *" class="form-control" id="author" name="author" type="text" value="%2$s" size="30" /></div>',
		esc_html__( 'Name', 'hotel-galaxy'),
		esc_attr( $commenter['comment_author'] )
	);

	$fields['email'] = sprintf(
		'<div class="form-group"><label for="email" class="screen-reader-text">%1$s</label><input placeholder="%1$s *" class="form-control" id="email" name="email" type="email" value="%2$s" size="30" /></div>',
		esc_html__( 'Email', 'hotel-galaxy'),
		esc_attr( $commenter['comment_author_email'] )
	);

	$fields['url'] = sprintf(
		'<div class="form-group"><label for="url" class="screen-reader-text">%1$s</label><input placeholder="%1$s" class="form-control" id="url" name="url" type="url" value="%2$s" size="30" /></div>',
		esc_html__( 'Website', 'hotel-galaxy'),
		esc_attr( $commenter['comment_author_url'] )
	);

	$fields['cookies'] = sprintf(
		'<div class="checkbox"><label for="wp-comment-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" class="checkbox" value="yes">Save my name, email, and website in this browser for the next time I comment.</label></div>',
		esc_html__( 'Website', 'hotel-galaxy'),
		esc_attr( $commenter['comment_author_url'] )
	);

	return $fields;
}


?>