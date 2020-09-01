<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/** nav-menu-walker.php */
class hotelgalaxy_wp_bootstrap_navwalker extends Walker_Nav_Menu {	

	function start_lvl( &$output, $depth = 0, $args = array() ) {

		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";

	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		if ($args->has_children && $depth > 0) {
			$classes[] = 'dropdown-submenu';
		} else if($args->has_children && $depth === 0) {
			$classes[] = 'dropdown';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

		

		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );

		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		//$attributes .= ($args->has_children) 	    ? ' data-toggle="dropdown" data-target="#" class="dropdown-toggle"' : '';
			
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

		$item_output .= in_array('dropdown', $classes) ? '<span class="caret"></span>': '' ;
		
		$item_output .= ($args->has_children) ? '</a>' : '</a>';
		
		$item_output .= $args->after;

		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}


	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) ) 
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array($this, 'start_el'), $cb_args);

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array($this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array($this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array($this, 'end_el'), $cb_args);
	}
}

function hotelgalaxy_fallback( $args = array() ) {
	
	$defaults = array('sort_column' => 'menu_order, post_title', 'menu_class' => 'menu', 'echo' => true, 'link_before' => '', 'link_after' => '');
	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'wp_page_menu_args', $args );

	$menu = '';

	$list_args = $args;

	// Show Home in the menu
	if ( ! empty($args['show_home']) ) 
	{
		if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
			$text = __('Home','hotel-galaxy');
		else
			$text = $args['show_home'];
		$class = '';

		if ( is_front_page() && !is_paged() )
			$class = 'class="current_page_item active"';
		$menu .= '<li ' . $class . '><a href="' .   esc_url( home_url('/')) . '" title="' . esc_attr($text) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
		// If the front page is a page, add it to the exclude list

		if (get_option('show_on_front') == 'page') 
		{			
			if ( !empty( $list_args['exclude'] ) ) 
			{
				$list_args['exclude'] .= ',';
			} 
			else 
			{
				$list_args['exclude'] = '';
			}
			$list_args['exclude'] .= get_option('page_on_front');
		}
	}

	$list_args['echo'] = false;
	$list_args['title_li'] = '';
	$list_args['walker'] = new hotel_galaxy_walker_page_menu;
	$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages($list_args) );

	if ( $menu )
		$menu = '<ul class="'. esc_attr($args['menu_class']) .'">' . $menu . '</ul>';

	$menu = '<div class="' . esc_attr($args['container_class']) . '">' . $menu . "</div>\n";
	$menu = apply_filters( 'wp_page_menu', $menu, $args );
	if ( $args['echo'] )
		echo $menu;
	else
		return $menu;
}



function hotelgalaxy_add_nav_menu_css_class( $classes ) {

	if ( in_array('current-menu-item', $classes ) OR in_array( 'current-menu-ancestor', $classes ) )
		$classes[]	=	'active';

	return $classes;
}


add_filter( 'nav_menu_css_class', 'hotelgalaxy_add_nav_menu_css_class' );


?>