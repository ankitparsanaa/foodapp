<?php

function takeaway_scripts() {

	global $post;

	wp_enqueue_script('jquery');


	wp_register_script( 'bootstrap', UOU_JS .'bootstrap.js', array('jquery'), $ver = false, true );
	wp_enqueue_script( 'bootstrap' );

	

	wp_register_script( 'jquery-ui-1.10.4.custom.min', UOU_JS .'jquery-ui-1.10.4.custom.min.js', array('jquery'), $ver = false, true );
	wp_enqueue_script( 'jquery-ui-1.10.4.custom.min' );

	wp_register_script( 'jquery.magnific-popup.min', UOU_JS .'jquery.magnific-popup.min.js', array('jquery'), $ver = false, true );
	wp_enqueue_script( 'jquery.magnific-popup.min' );

	wp_register_script( 'jquery.ui.map', UOU_JS .'jquery.ui.map.js', array('jquery'), $ver = false, true );
	wp_enqueue_script( 'jquery.ui.map' );


	// wp_register_script( 'slider', UOU_JS .'slider.js', array('jquery','masterslider'), $ver = false, true );
	// wp_enqueue_script( 'slider' );

	wp_enqueue_script('maps.google', 'http://maps.google.com/maps/api/js?sensor=false', array('jquery'), false, true);

	wp_enqueue_script('jquery.gomap-1.3.2.js', UOU_JS.'jquery.gomap-1.3.2.js', array('jquery'), false, true);
	
	wp_register_script( 'a', UOU_JS .'a.js', array('jquery'), $ver = false, true );
	wp_enqueue_script( 'a' );


	wp_register_script( 'uou-owl', UOU_JS .'owl.carousel.js', array('jquery'), $ver = false, true );
	wp_enqueue_script( 'uou-owl' );


	wp_register_script( 'masterslider', UOU_JS .'masterslider/masterslider.min.js', array('jquery'), $ver = false, true );
	wp_enqueue_script( 'masterslider' );

	wp_register_script( 'jquery.easing.min', UOU_JS .'masterslider/jquery.easing.min.js', array('jquery'), $ver = false, true );
	wp_enqueue_script( 'jquery.easing.min' );

	wp_register_script( 'takeaway_ba-outside-events', UOU_JS .'jquery.ba-outside-events.min.js', array(), $ver = false, true );
	wp_enqueue_script( 'takeaway_ba-outside-events' );
		
	wp_register_script( 'uou-scripts', UOU_JS .'scripts.js', array('jquery', 'uou-owl', 'masterslider'), $ver = false, true );
	wp_enqueue_script( 'uou-scripts' );

	wp_localize_script( 'uou-scripts', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );



	  if(is_page_template('atmf-search.php') ) { 	
	  	
	  }else{	
			wp_register_script( 'takeaway_angular', UOU_JS .'angular.js', array(), $ver = false, true );
			wp_enqueue_script( 'takeaway_angular' );

			wp_register_script( 'takeaway_angular-animate', UOU_JS .'angular-animate.min.js', array('takeaway_angular'), $ver = false, true );
			wp_enqueue_script( 'takeaway_angular-animate' );


			wp_register_script( 'takeaway_angular-strap', UOU_JS .'angular-strap.js', array('takeaway_angular'), $ver = false, true );
			wp_enqueue_script( 'takeaway_angular-strap' );

			wp_register_script( 'takeaway_angular-tpl', UOU_JS .'angular-strap.tpl.js', array('takeaway_angular'), $ver = false, true );
			wp_enqueue_script( 'takeaway_angular-tpl' );

			wp_register_script( 'takeaway_angular-progress', UOU_JS .'ngProgress.min.js', array('takeaway_angular'), $ver = false, true );
			wp_enqueue_script( 'takeaway_angular-progress' );


			wp_register_script( 'takeaway_angular_custom', UOU_JS .'angular-custom.js', array('takeaway_angular'), $ver = false, true );
			wp_enqueue_script( 'takeaway_angular_custom' );


			$cat_data = array();
			$cat_data = takeway_product_category_data();



			if (isset($post->ID)){
				$per_page = get_post_meta($post->ID,'product_per_page',true);
				$some =  json_decode( get_post_meta($post->ID , 'takeaway_settings', true) );
				$main_price = get_post_meta($post->ID , '_price_for_grouped_product_grp_product_price', true);

				wp_localize_script( 'takeaway_angular_custom', 'takeaway_category', array('data' => $cat_data ,'option'=> $some ,'per_page'=> $per_page ,'main_price'=>$main_price,'url' => admin_url( 'admin-ajax.php' ) ));


			}




	  }







	
	
}




add_action( 'wp_enqueue_scripts', 'takeaway_scripts' );

/////////////////////////////////////////////////////////////////////
/* Loads js File on All Admin Pages*/
/////////////////////////////////////////////////////////////////

function takeaway_admin_load_scripts() {
	wp_register_script( 'uou_meta', UOU_JS . 'uou_meta.js', array('jquery'), $ver = false, true );
	wp_enqueue_script( 'uou_meta' );

	wp_register_script( 'gmap', UOU_JS .'gmap.js', array('jquery'), $ver = false, true );
	wp_enqueue_script( 'gmap' );

	// $translation_array = array( 'lat_value' => 'lat_gmap' , 'lng_value' => 'lng_gmap' );
	// wp_localize_script( 'gmap', 'loc_gmap', $translation_array );

}
add_action('admin_enqueue_scripts', 'takeaway_admin_load_scripts') ;

################################################################
/* variable type prodcut*/
################################################################


function takeaway_register_woo_radio_button_scripts () { 
	 
  wp_deregister_script('wc-add-to-cart-variation'); 
   
  wp_dequeue_script('wc-add-to-cart-variation'); 
  
  wp_register_script( 'takeaway-add-to-cart-variation', UOU_JS .'add-to-cart-variation.min.js', array('jquery'), $ver = false, true );
   
  wp_enqueue_script('takeaway-add-to-cart-variation'); 
   
} 
add_action( 'wp_enqueue_scripts', 'takeaway_register_woo_radio_button_scripts' ); 
add_action( 'wp_footer', 'takeaway_register_woo_radio_button_scripts'); 
 

