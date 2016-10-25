<?php
/*
Plugin Name: Override Woo Search
Plugin URI: http://www.lanex.com
Description: Overrides the Woo Search Box in header of storefront theme
Version: 1.0
Author: Joshua Szuslik
Author URI: http://www.lanex.com
License: GPL2
GitHub Plugin URI:
GitHub Plugin URI:
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/* Remove Storefront Product Search in Header*/
add_action( 'init', 'jk_remove_storefront_header_search' );
function jk_remove_storefront_header_search() {
	remove_action( 'storefront_header', 'storefront_product_search',    40 );
}

/* Add search all function to replace search product*/
if ( ! function_exists( 'storefront_all_search' ) ) {
	function storefront_all_search() {
		if ( is_woocommerce_activated() ) { ?>
			<div class="site-search">
				<?php the_widget( 'WP_Widget_Search' ); ?>
			</div>
			<?php
		}
	}
}

add_action('storefront_header', 'storefront_all_search', 40);
