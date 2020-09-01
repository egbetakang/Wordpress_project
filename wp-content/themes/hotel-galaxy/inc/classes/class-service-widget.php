<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


// Register Foo_Widget widget
add_action( 'widgets_init', 'hotelgalaxy_register_service' );

function hotelgalaxy_register_service() { 
	register_widget( 'hotelgalaxy_service_widget_class' ); 
}


class hotelgalaxy_service_widget_class extends WP_Widget {


	function __construct() {

		parent::__construct(
            'hotel_galaxy_service_widget',  // Base ID
            __('Theme Service', 'hotel-galaxy')   // Name
        );

		add_action( 'load-widgets.php', array(&$this, 'hotelgalaxy_custom_load') );

	}
	
	function hotelgalaxy_custom_load() {  

		wp_enqueue_style( 'wp-color-picker' );        
		wp_enqueue_script( 'wp-color-picker' );		
		
	}

	public function widget( $args, $instance ) {

		$column = hotelgalaxy_get_option('home_service_widget_column');
		$is_button = hotelgalaxy_get_option('is_home_service_button');
		$button_text = hotelgalaxy_get_option('home_service_button_text');
		$target = hotelgalaxy_get_option('home_service_button_target');

		$args = array(
			'before_title'  => '<h3 class="service-title">',
			'after_title'   => '</h3>',
			'before_widget' => '<div class="'.$column.' col-sm-6"><aside class="service-widget-item">',
			'after_widget'  => '</aside></div>',
		);

		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New Title', 'hotel-galaxy');
		
		$description = ! empty( $instance['desc'] ) ? $instance['desc'] : '';		

		$icon = ! empty( $instance['icon'] ) ? $instance['icon'] : '';

		$icon_color = ! empty( $instance['icon_color'] ) ? $instance['icon_color'] : '';

		$button_url = ! empty( $instance['btn_url'] ) ? $instance['btn_url'] : '';

		$button_target = ! empty( $target ) ? '_blank' : '_self' ;

		
		echo $args['before_widget'];		

		

		if( !empty( $icon ) ){
			?>
			<span class="service-icon"><i class="<?php echo esc_attr( $icon ); ?>" style="color:<?php echo esc_attr( !empty( $icon_color ) ) ? $instance['icon_color'] : '#000000' ?>"></i>
			</span>
			<?php
		}


		echo '<div class="service-content">';

		if ( ! empty( $instance['title'] ) ) {

			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];

		}

		echo '<p>';

		echo esc_attr( $description );

		echo '</p>';

		if(!empty($button_text) && ($is_button== true)){
			?>		

			<footer>
				<a title="<?php echo esc_attr($title) ?>" id="read-more" target="<?php echo $button_target?>" href="<?php echo esc_url( $button_url ); ?>">
					<i class="icon"></i>
					<?php echo esc_attr( $button_text ); ?>
				</a>
			</footer>

			
			<?php
		}

		echo '</div>';

		echo $args['after_widget'];

	}

	public function form( $instance ) {

		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New Title', 'hotel-galaxy');
		
		$description = ! empty( $instance['desc'] ) ? $instance['desc'] : '';		

		$icon = ! empty( $instance['icon'] ) ? $instance['icon'] : '';

		$icon_color = ! empty( $instance['icon_color'] ) ? $instance['icon_color'] : __( '#000000', 'hotel-galaxy');

		$button_url = ! empty( $instance['btn_url'] ) ? $instance['btn_url'] : '';		
		
		?>

		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'hotel-galaxy'); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>


		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'Description' ) ); ?>"><?php echo esc_html__( 'Description:', 'hotel-galaxy'); ?></label>
			
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>" type="text" cols="30" rows="5"><?php echo sprintf( __( '%s', 'hotel-galaxy' ), $description ); ?></textarea>
		</p>
		

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>"><?php echo esc_html__( 'Icon ', 'hotel-galaxy'); ?> 
			<a href="<?php echo esc_url( __('https://fontawesome.com/v4.7.0/icons/', 'hotel-galaxy'));?>" target="_blank" ><?php _e('Get fontawesome icon','hotel-galaxy'); ?></a>
		</label>

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon' ) ); ?>" type="text" placeholder='Example : far fa-bell' value="<?php echo esc_attr( $icon ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>"><?php echo esc_html__( 'URL :', 'hotel-galaxy'); ?></label>

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'btn_url' ) ); ?>" type="text" value="<?php echo esc_attr( $button_url ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'icon_color' ) ); ?>"><?php echo esc_html__( 'Icon Color :', 'hotel-galaxy'); ?></label>

			<input class="widefat my-color-picker" id="<?php echo esc_attr( $this->get_field_id( 'icon_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_color' ) ); ?>" type="text" value="<?php echo esc_attr( $icon_color ); ?>">
		</p>		

		<script type='text/javascript'>

			jQuery(document).ready( function($) {

				var params = { 
					change: function(e, ui) {
						$( e.target ).val( ui.color.toString() );
						$( e.target ).trigger('change'); 
					},
				}

				$('.my-color-picker').wpColorPicker( params );
			})
		</script>

		<?php

	}

	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['icon'] = ( ! empty( $new_instance['icon'] ) ) ? sanitize_text_field( $new_instance['icon'] ) : '';

		$instance['icon_color'] = ( ! empty( $new_instance['icon_color'] ) ) ? sanitize_text_field( $new_instance['icon_color'] ) : '';

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		$instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? sanitize_text_field( $new_instance['desc'] ) : '';		

		$instance['btn_url'] = ( ! empty( $new_instance['btn_url'] ) ) ? esc_url_raw( $new_instance['btn_url'] ) : '';		

		return $instance;
	}

} 

?>