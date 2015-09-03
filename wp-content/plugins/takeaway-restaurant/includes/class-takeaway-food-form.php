<?php
/**
 * Food form class
 */
class Takeaway_Food_Form {

	/**
	 * Food product data.
	 * @var WC_Product_Food
	 */
	public $product;

	/**
	 * Constructor
	 * @param $product WC_Product_Food
	 */
	public function __construct( $product ) {
		$this->product = $product;
	}

	/**
	 * Get posted form data into a neat array
	 * @param  array $posted
	 * @return array
	 */
	public function get_posted_data( $posted = array() ) {
		
		if ( empty( $posted ) ) {
			$posted = $_POST;
		}

		$data = array(
			'_food_variation_name'    => '',
			'_food_option_name'    => '',
			'_base_cost'    => ''
		);

		$options = $posted['option'];

		foreach ($options as $option) {
			foreach ($option as $key => $value) {
				if($key === 'variation' && $value === 'yes') {
					$data['_food_variation_name'] = $option['text'];
					$data['food_variation_name'] = $option['text'];
				}
				
				if($key === 'type' && $value === 'checkbox') {
					
					$data['_food_option_name'][] = $option['title'];
					$data['food_option_name'][] = $option['title'];
				}
				
			}
		}

		$data['_base_cost']   = $posted['price'];

		return $data;
	}

	/**
	 * Calculate costs from posted values
	 * @param  array $posted
	 * @return string cost
	 */
	public function calculate_food_cost( $posted ) {
		if ( ! empty( $this->food_cost ) ) {
			return $this->food_cost;
		}

		$data         = $this->get_posted_data( $posted );

		// Dynamic base costs
		$base_cost = $data['_base_cost'];

		$this->food_cost = $base_cost;

		return apply_filters( 'takeaway_calculated_food_cost', $this->food_cost, $this, $posted );

	}
}