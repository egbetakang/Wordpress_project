<?php 

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if(! function_exists('hotelgalaxy_add_page_header')){

    add_action('hotelgalaxy_page_breadcrums','hotelgalaxy_add_page_header');

    function hotelgalaxy_add_page_header(){

        if(! is_page_template('template-parts/template-homepage.php') ){
            ?>
            <div id="breadcrumb-section">       

                <div class="overlay clearfix">

                    <div id="trapezoid">

                        <h3 class="breadcrumb-header">
                            <?php do_action('hotelgalaxy_the_breadcrumb'); ?>
                        </h3>

                    </div>  
                </div>
            </div>

            <?php
        }
    }
}

if(! function_exists('hotelgalaxy_get_breadcrumb')){

    add_action('hotelgalaxy_the_breadcrumb','hotelgalaxy_get_breadcrumb');

    function hotelgalaxy_get_breadcrumb() {        

        if (is_category()) {

            echo wp_title('Category&nbsp;&#8282;&nbsp;');

        }elseif(is_single()){
            the_title();
        }
        elseif(is_date()){

            echo wp_title();
        }
        elseif (is_page()) {

            echo the_title();

        }elseif (is_home()) {

            echo wp_title('');
        } 

        elseif (is_search()) {

            echo __("Search Results for... ", 'hotel-galaxy');
            echo '"<em>';
            echo the_search_query();
            echo '</em>"';

        }elseif (is_404()) {

            echo __('404 Error','hotel-galaxy');

        }elseif(is_tag()){

            echo wp_title('Tag&nbsp;&#8282;&nbsp;');

        }elseif(is_author()){

            echo wp_title('Author&nbsp;&#8282;&nbsp;');

        }elseif (is_woocommerce()) {
            woocommerce_page_title();
        }
    }
}
?>