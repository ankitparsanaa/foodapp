<?php
if ( ! defined( 'ABSPATH' ) )
	exit;

/**
 * Takeaway_Food_Cart class.
 */
class Takeaway_Food_Cart {

	/**
	 * Constructor
	 */
	public function __construct() {

		add_filter( 'woocommerce_add_cart_item', array( $this, 'add_cart_item' ), 10, 1 );
		add_filter( 'woocommerce_get_cart_item_from_session', array( $this, 'get_cart_item_from_session' ), 10, 2 );
		add_filter( 'woocommerce_get_item_data', array( $this, 'get_item_data' ), 10, 2 );
		add_action( 'woocommerce_add_order_item_meta', array( $this, 'order_item_meta' ), 10, 2 );

		add_action( "wp_ajax_nopriv_do_cart_new", array( $this, 'takeaway_do_cart_new' ) );
		add_action( "wp_ajax_do_cart_new", array( $this, 'takeaway_do_cart_new' ) );
	}

	public function takeaway_do_cart_new() {

		$cart_item_data = array();
		
		$food_id  = $_POST['product_id'];
		$quantity = $_POST['quantity'];
		$product  = get_product( $food_id );

		update_post_meta($food_id, '_price', 0);
		$food_form                       = new Takeaway_Food_Form( $product );
		$cart_item_data['food']          = $food_form->get_posted_data( $_POST );
		$cart_item_data['food']['_cost'] = $food_form->calculate_food_cost( $_POST );

		if ( WC()->cart->add_to_cart( $food_id, $quantity, $variation_id = '', $variation = '', $cart_item_data ) ) {
			$was_added_to_cart = true;
			$added_to_cart[] = $cart_item_data;
			// wc_add_to_cart_message($food_id);
		}


	}

	/**
	 * Adjust the price of the food product based on variations and options
	 *
	 * @access public
	 * @param mixed $cart_item
	 * @return array cart item
	 */
	public function add_cart_item( $cart_item ) {
		
		if ( ! empty( $cart_item['food'] ) && ! empty( $cart_item['food']['_cost'] ) ) {
			$cart_item['data']->set_price( $cart_item['food']['_cost'] );
		}
		
		return $cart_item;

	}

	/**
	 * Get data from the session and add to the cart item's meta
	 *
	 * @access public
	 * @param mixed $cart_item
	 * @param mixed $values
	 * @return array cart item
	 */
	public function get_cart_item_from_session( $cart_item, $values ) {

		if ( ! empty( $values['food'] ) ) {
			$cart_item['food'] = $values['food'];
			$cart_item         = $this->add_cart_item( $cart_item );
		}
		return $cart_item;
	}

	/**
	 * Add posted data to the cart item
	 *
	 * @access public
	 * @param mixed $cart_item_meta
	 * @param mixed $product_id
	 * @return void
	 */
	public function add_cart_item_data( $cart_item_meta, $product_id ) {

		$product = get_product( $product_id );

		if ( 'food' !== $product->product_type ) {
			return $cart_item_meta;
		}

		$food_form                       = new Takeaway_Food_Form( $product );
		$cart_item_meta['food']          = $food_form->get_posted_data( $_POST );
		$cart_item_meta['food']['_cost'] = $food_form->calculate_food_cost( $_POST );
		
		return $cart_item_meta;
	}

	/**
	 * Put meta data into format which can be displayed
	 *
	 * @access public
	 * @param mixed $other_data
	 * @param mixed $cart_item
	 * @return array meta
	 */
	public function get_item_data( $other_data, $cart_item ) {

		$product = get_product( $cart_item['product_id'] );

		if ( 'food' !== $product->product_type ) {
			return;
		}
		
		if ( ! empty( $cart_item['food'] ) ) {
			foreach ( $cart_item['food'] as $key => $value ) {

				if ( substr( $key, 0, 1 ) !== '_' )
					if( is_array ( $value ) ) {
						foreach ($value as $data) {
							$other_data[] = array(
								'name'    => get_takeaway_food_data_label( $key, $cart_item['data'] ),
								'value'   => $data,
								'display' => ''
							);
						}
						
					} else {
						$other_data[] = array(
							'name'    => get_takeaway_food_data_label( $key, $cart_item['data'] ),
							'value'   => $value,
							'display' => ''
						);
					}
					
			}
		}
		return $other_data;
	}

	/**
	 * order_item_meta function.
	 *
	 * @param mixed $item_id
	 * @param mixed $values
	 */
	public function order_item_meta( $item_id, $values ) {
		
		if ( ! empty( $values['food'] ) ) {
			
			$product = $values['data'];

			// Add summary of details to line item
			foreach ( $values['food'] as $key => $value ) {

				if ( strpos( $key, '_' ) !== 0 ) {

					if( is_array ( $value ) ) {
						foreach ($value as $data) {
							woocommerce_add_order_item_meta( $item_id, get_takeaway_food_data_label( $key, $product ), $data );
						}
					} else {
						woocommerce_add_order_item_meta( $item_id, get_takeaway_food_data_label( $key, $product ), $value );
					}
					
				}
			}
		}
	}

}

new Takeaway_Food_Cart();