<?php

/**
 * Convert key to a nice readable label
 * @param  string $key
 * @return string
 */
function get_takeaway_food_data_label( $key, $product ) {
	switch ( $key ) {
		case "food_variation_name" :
			return __( 'Food Variation', '' );
		case "food_option_name" :
			return __( 'Extra Options', '' );
		default :
			return $key;
	}
}