<?php

	session_start();

	if(!function_exists('_log')){
	  function _log( $message ) {
	    if( WP_DEBUG === true ){
	      if( is_array( $message ) || is_object( $message ) ){
	        error_log( print_r( $message, true ) );
	      } else {
	        error_log( $message );
	      }
	    }
	  }
	}


	global $takeaway_option_data;



	require_once('uou/load.php');
	require_once('uou/wp_bootstrap_navwalker.php');
	require_once('uou/widget_function.php');
	require_once('uou/theme/breadcrumbs.php');
	require_once('uou/wc_api.php');

	//login action
	add_action( 'wp_ajax_nopriv_bg_login', 'takeaway_login' ) ;
	add_action( 'wp_ajax_bg_login', 'takeaway_login' ) ;

	//registration action
	add_action( 'wp_ajax_nopriv_takeaway_registration', 'takeaway_registration' ) ;
	add_action( 'wp_ajax_takeaway_registration', 'takeaway_registration' ) ;


	add_action('wp_head','takeaway_ajaxurl');
	function takeaway_ajaxurl() {
	    ?>
	    <script type="text/javascript">
	        var ajaxurl = '<?php echo esc_js(admin_url('admin-ajax.php')); ?>';
	    </script>
	<?php
	}




	function takeaway_add_more_buttons($buttons) {
	 $buttons[] = 'hr';
	 $buttons[] = 'del';
	 $buttons[] = 'sub';
	 $buttons[] = 'sup';
	 $buttons[] = 'fontselect';
	 $buttons[] = 'fontsizeselect';
	 $buttons[] = 'cleanup';
	 $buttons[] = 'styleselect';
	 return $buttons;
	}
	add_filter("mce_buttons_3", "takeaway_add_more_buttons");


	function takeaway_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'takeaway_excerpt_length', 999 );


	function takeaway_excerpt_more( $more ) {
		return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More...', 'takeaway') . '</a>';
	}
	add_filter( 'excerpt_more', 'takeaway_excerpt_more' );


	/***********************************************************************************************/
	/* Add Menus */
	/***********************************************************************************************/
	function takeaway_register_my_menus(){
		register_nav_menus(
			array(
				'top-menu' => __('Top Menu', 'new-item')
			)
		);
	}
	add_action('init', 'takeaway_register_my_menus');




	/***********************************************************************************************/
	/* Add Sidebar Support */
	/***********************************************************************************************/
		if (function_exists('register_sidebar')) {
		
		register_sidebar(
				array(
					'name' => __('Main Sidebar', 'takeaway'),
					'id' => 'main-sidebar',
					'description' => __('The main sidebar area goes here', 'takeaway'),

					'before_title' => '<h5>',
					'after_title' => '</h5>'
					
					
				)
			);


		register_sidebar(
			array(
				'name' => __('Footer widget 1', 'takeaway'),
				'id' => 'footer-widget-1',
				'description' => __('The footer widget area 1', 'takeaway'),
				'before_widget' => '',
				'after_widget' => '',
				'before_title' => '<h5>',
				'after_title' => '</h5>'
			)
		);
		register_sidebar(
			array(
				'name' => __('Footer widget 2', 'takeaway'),
				'id' => 'footer-widget-2',
				'description' => __('The footer widget area 2', 'takeaway'),
				'before_widget' => '',
				'after_widget' => '',
				'before_title' => '<h5>',
				'after_title' => '</h5>'
			)
		);
		register_sidebar(
			array(
				'name' => __('Footer widget 3', 'takeaway'),
				'id' => 'footer-widget-3',
				'description' => __('The footer widget area 3', 'takeaway'),
				'before_widget' => '',
				'after_widget' => '',
				'before_title' => '<h5>',
				'after_title' => '</h5>'
			)
		);

	}


	 add_action( 'wp_head', 'takeaway_custom_css' );


	 function takeaway_custom_css() {
	 	global $takeaway_option_data;
	 	echo "<style>" . $takeaway_option_data['takeaway-custom-css'] . "</style>";
	 }


	 add_action( 'wp_head', 'takeaway_custom_js' );


	 function takeaway_custom_js() {
	 	global $takeaway_option_data;
	 	echo "<script>" . $takeaway_option_data['takeaway-custom-js'] . "</script>";
	 }

	 
		/*-------------------------------------------------------------------------
		  START WP TITLE FILTER
		------------------------------------------------------------------------- */

		function takeaway_wp_title( $title, $sep ) {
		  global $paged, $page;

		  if ( is_feed() ) {
		    return $title;
		  }

		  // Add the site name.
		  $title .= get_bloginfo( 'name', 'display' );

		  // Add the site description for the home/front page.
		  $site_description = get_bloginfo( 'description', 'display' );
		  if ( $site_description && ( is_home() || is_front_page() ) ) {
		    $title = "$title $sep $site_description";
		  }

		  // Add a page number if necessary.
		  if ( $paged >= 2 || $page >= 2 ) {
		    $title = "$title $sep " . sprintf( __( 'Page %s', 'takeaway' ), max( $paged, $page ) );
		  }

		  return $title;
		}
		add_filter( 'wp_title', 'takeaway_wp_title', 10, 2 );

		/*-------------------------------------------------------------------------
		  END WP TITLE FILTER
		------------------------------------------------------------------------- */

	/***********************************************************************************************/
	/* Set the max width of the uploaded images */
	/***********************************************************************************************/
	if (!isset($content_width)) $content_width = 784;


	/***********************************************************************************************/
	/* Add Theme Support for Post Formats, Post Thumbnails and Automatic Feed Links */
	/***********************************************************************************************/
	if (function_exists('add_theme_support')) {
		add_theme_support('post-formats', 
			array(
			'aside', 
			'gallery', 
			'link', 
			'image', 
			'quote', 
			'status', 
			'video', 
			'audio', 
			'chat'));
		

		add_image_size('custom-blog-image', 784, 350);

		add_theme_support('automatic-feed-links');
			// woocommerce support
		add_theme_support( 'woocommerce' );

		add_image_size( 'product-thumb', 263, 148, true );
	}



		// Register Theme Features
		function takeaway_theme_features()  {
			
			global $wp_version;

			// Add theme support for Featured Images
			add_theme_support( 'post-thumbnails', array( 'post', 'page', 'product', 'partner', 'block', 'news', 'testimonial', 'chef' ) );		

			 // Set takeaway thumbnail dimensions
			set_post_thumbnail_size( 263, 148, true );


			add_image_size( 'product-thumb', 263, 148, true );

			add_image_size( 'recent-posts-thumb', 80, 80, true );
			
			add_image_size( 'latest-thumb', 500, 375, true );
			
			
			
		}

		// Hook into the 'after_setup_theme' action
		add_action( 'after_setup_theme', 'takeaway_theme_features' );

	



	/***********************************************************************************************/
	/* Function for Comments */
	/***********************************************************************************************/

	function takeaway_comments ($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		//if(get_comment_type() == 'pingback' || get_comment_type() == 'trackback') :?>
	     <div id="comment-<?php comment_ID(); ?>" class="comment">

	        <?php 
	        	$avatar_size=80;
	            if ($comment->comment_parent !=0) {
	            	$avatar_size=64;
	              }

	              $takeaway_avatar = get_avatar($comment, $avatar_size );
	              echo apply_filters( 'the_content', $takeaway_avatar );
	            // echo esc_attr( $takeaway_avatar );
	                     
	        ?>

	        <div class="meta">
	                     
	            <strong><?php comment_author_link(); ?></strong>
	                         
	                <?php _e('on', 'takeaway'); ?> <?php comment_date(); ?> - <?php comment_time(); ?> -
	                                 
	                <?php comment_reply_link(array_merge($args, array('depth'=>$depth, 'max_depth'=>$args['max_depth'])) ); ?>
	                          
	        </div>

	        <div class="content">
	                                
	            <p><?php comment_text(); ?></p>
	                               
	            <?php if($comment->comment_approved =='0') :?>
						
					<p class="awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'takeaway'); ?></p>
	                    	 
	            <?php endif; ?>
	                           
	        </div>
	    1</div>   

	<?php

	}

	/***********************************************************************************************/
	/* Custom Comment Form */
	/***********************************************************************************************/
	function takeaway_custom_comment_form($defaults) {


		$defaults['comment_notes_before'] = '';
		$defaults['comment_notes_after'] = '<button type="submit"><i class="fa fa-pencil-square-o"></i> Post Comment</button>';
		$defaults['class_form'] = 'comment-form';
		$defaults['title_reply'] = 'Leave a Reply';
		$defaults['comment_field'] = '<textarea  name="comment" class="form-control" placeholder="Your Comments ..."></textarea>';

		return $defaults;

	}

	add_filter('comment_form_defaults', 'takeaway_custom_comment_form');


	function takeaway_custom_comment_form_fields() {
		$commenter = wp_get_current_commenter();
		$req = get_option('require_name_email' );
		$aria_req = ($req ? "aria-required='true'" : ' ');

		$fields = array(

			'author' => '<div class="row">'.
	                    '<div class="col-md-4 col-sm-4">' . 
	                    
							'<input id="author" name="author" class="form-control" type="text" placeholder="Name*" value="' . esc_attr($commenter['comment_author']) . '" ' . $aria_req . ' />' .
							
			           ' </div>',

			 'email' => '<div class="col-md-4 col-sm-4">' .
							'<input id="comment-email" name="email" type="text" class="form-control" placeholder="Email*" value="' . esc_attr($commenter['comment_author_email']) . '" ' . $aria_req . ' />' .

							
			            '</div>',

			'url' => '<div class="col-md-4 col-sm-4">' . 
							'<input id="url" name="url" type="text" class="form-control" placeholder="Website" value="' . esc_attr($commenter['comment_author_url']) . '" />' .
							
			            '</div>'. '</div>',


			);

		return $fields;
	}

	add_filter('comment_form_default_fields', 'takeaway_custom_comment_form_fields');



	/*-------------------------------------------------------------------------
	  START AJAX REQUEST FOR CONVERT ZIP CODE TO LAT LAN FROM ADMIN SCRIPT
	------------------------------------------------------------------------- */

	function takeaway_convert_zip_to_long_lat(){
	  $data = array();
	  $country = $_POST['country'];
	  $region = $_POST['region'];
	  $address = $_POST['address'];
	  $zipcode = $_POST['zipcode'];
	  
	  $data['country'] = $country;
	  $data['region'] = $region;
	  $data['address'] = $address;
	  $data['zipcode'] = $zipcode;


	  $address = "$zipcode $address $country";

	  $coordinates = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&sensor=true');
	  $coordinates = json_decode($coordinates);

	  $lat = $coordinates->results[0]->geometry->location->lat;
	  $lng = $coordinates->results[0]->geometry->location->lng;

	  $data['lat'] = $lat;
	  $data['lng'] = $lng;

	  echo json_encode($data); 

	  wp_die();
	}

	add_action( 'wp_ajax_convert_zip_to_long_lat', 'takeaway_convert_zip_to_long_lat');


	/*-------------------------------------------------------------------------
	  Pagination goes here
	------------------------------------------------------------------------- */



	function takeaway_wpc_pagination($pages = '', $range = 2)
	{
	      $showitems = ($range * 2)+1;
	     global $paged;
	     if( empty($paged)) $paged = 1;
	     if($pages == '')
	     {
	         global $wp_query;
	         $pages = $wp_query->max_num_pages;
	         if(!$pages)
	         {
	             $pages = 1;
	         }
	     }

	     if(1 != $pages)
	     {
	          _e('<div class="pagination"><ul class="list-inline  text-right">', 'takeaway');

	         for ($i=1; $i <= $pages; $i++)
	         {
	             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
	             {
	                 echo ($paged == $i)? '<li class="active"><a href="#">'. $i .'</a></li>':'<li><a href="'.esc_url(get_pagenum_link($i)).'">'.$i.'</a></li>';
	             }
	         }

	         _e('</ul></div>', 'takeaway');
	     }
	}



/**
			login ajax request	 
*/


function takeaway_login(){

         // First check the nonce, if it fails the function will break
        check_ajax_referer( 'ajax-login-nonce', 'security' );

        // Nonce is checked, get the POST data and sign user on
        $info = array();
        $info['user_login'] = $_POST['login_username'];
        $info['user_password'] = $_POST['login_password'];
        $info['remember'] = true;

        $user_signon = wp_signon( $info, false );
        if ( is_wp_error($user_signon) ){

                echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
        } else {

               echo json_encode(array(
                            'loggedin'=>true,
                            'message'=>__('Login successful, redirecting...'),
                             'url'  =>  home_url(),
                ));


        }

        wp_die();
}



/**
			Takeaway Registration 		 
*/

function takeaway_registration(){

	global $wpdb, $user_ID;

	if(isset($_POST)){

		// print_r($_POST['form_data']);

		$form_data = $_POST['form_data'];

		parse_str($form_data,$user_info);

		$username = $user_info['user_name'];
		// echo $username;
		$user_exists = username_exists( $username );
		// echo $user_exists . "\n"; 

		$email = $user_info['email'];
		// echo $email;
		$e_exists = email_exists( $email );
		// echo $e_exists;

		$password = $user_info['reg_password'];
		// echo $password;
	}

    if( $user_exists ){
    	echo 'Username Alreday exists, please choose another';
    }elseif( $e_exists ){
    	echo 'This e-mail is already registered, please use another to register';
    }elseif( strpos($username, ' ') !== false ){
    	echo "Sorry, no spaces are allowed in usernames";
    }elseif( empty($username) ){
    	echo "Please enter a username";
    }elseif( empty( $password ) ){
    	echo "Please enter a password for your account";
    }elseif( !is_email( $email ) ){
    	echo "Please enter a valid email";
    }else{

    	$new_user = wp_create_user($username,$password,$email);
        echo 'Registration Successfull';

        wp_mail( $email, 'Welcome!', 'Your Password: ' . $password );
        
    }

    die();
}



/**
building product array
*/

	function takeway_product_category_data(){

		if (class_exists('Woocommerce')) {


					global $woocommerce, $product, $post; 

					$args = array('taxonomy'  => 'product_cat');

					$get_all_categories = get_categories( $args );

					$categorires_name_list = array();

					$i = 2;

					if (isset($get_all_categories) && !empty($get_all_categories)) {
					
						foreach ($get_all_categories as $value) {
							array_push($categorires_name_list,$value->name);
						}
					}

					$all = array();
					$cat_all_info = array();
					
					$args = array(								
						'post_type'        => 'product',
						'posts_per_page'   => -1,
					);

					$homepage_query = get_posts( $args );		



					// build all 				

					foreach( $homepage_query as $children ) {


								$image_id =  get_post_thumbnail_id( $children->ID );
								$large_image = wp_get_attachment_image_src( $image_id ,'huge');

								

							$build_all = array();
							
							$build_all= array(
								'post_id'      => $children->ID,
								'post_title'   => $children->post_title,
								'guid'         => get_the_permalink($children->ID) ,
								'grp_price'    => get_post_meta( $children->ID, '_takeaway_grouped_product_metabox_grouped_product_price', true ),
								'price'        => get_post_meta( $children->ID, '_price', true ),
								'post_content' => $children->post_content, 
								'image'        => $large_image[0],
								'signed_price' => wc_price(get_post_meta( $children->ID, '_price', true ) )							

							);

								$meta = get_post_custom($children->ID);
				                

				                // group 
				                if(has_term( 'grouped', 'product_type', $children )) :
			                    
				                    $need_post_args = array(
										'post_parent'    => $children->ID,
										'post_type'      => 'product', 
										'posts_per_page' => -1,
										'post_status'    => 'publish'
				                    );
				                    $children_array_all = get_children( $need_post_args, OBJECT );
				                    // _log($children_array_all);
				                    foreach ($children_array_all as $children) {

				                		$build_all['children'][] = array(
											'post_id'        => $children->ID,
											'post_title'     => $children->post_title,
											'post_permalink' => get_the_permalink($children->ID) ,
											'price'          =>  get_post_meta( $children->ID, '_price', true ), 
											'signed_price'   => wc_price(get_post_meta( $children->ID, '_price', true ) ),
				                        );

				                    }
				                
				                endif; // checking for group product




				                  if(has_term( 'food', 'product_type', $children )) :



				                        $food = get_post_meta($children->ID , 'takeaway_settings', true);                                

				                        if( is_string($food) ){
				                            $build_all['food']= json_decode($food);
				                        }



				                        $main_pricee = get_post_meta( $children->ID , '_price_for_grouped_product_grp_product_price' , true);

				                        if(!empty($main_pricee) ){
				                            $build_all['food_price'] = $main_pricee;
				                        }
								                  		                 		


				                  endif;




				         		$all[] = $build_all;

				         		
					}

					$count = count($all);

					$cat_all_info['all'] = $all; 






					// category product execpt all 

					if( isset($categorires_name_list) && !empty($categorires_name_list) ):			

						foreach( $categorires_name_list as $category_name):

							$category_args = array( 
								'post_type'      => 'product', 
								'posts_per_page' => -1, 
								'product_cat'    => $category_name
							);

							$grab_category_posts = get_posts( $category_args );
							
							$push_posts = array();

							foreach ($grab_category_posts as $need_post) {

								$build_array = array();

								$build_array['post_id']      = $need_post->ID;
								$build_array['post_title']   = $need_post->post_title;
								$build_array['post_content'] = $need_post->post_content;
								$build_array['guid']         = html_entity_decode($need_post->guid);
								$build_array['grp_price']    = get_post_meta( $need_post->ID, '_takeaway_grouped_product_metabox_grouped_product_price', true );
								$build_array['price']        = get_post_meta( $need_post->ID, '_price', true );
								
								$image_id                    = get_post_thumbnail_id( $need_post->ID );
								$large_image                 = wp_get_attachment_image_src( $image_id ,'huge');
								
								$build_array['image']        = $large_image[0];
								// children for group product
								
								$meta                        = get_post_custom($need_post->ID);


								// group
				                
				                if(has_term( 'grouped', 'product_type', $need_post )) :
				                    
				                    $need_post_args = array(
										'post_parent'    => $need_post->ID,
										'post_type'      => 'product', 
										'posts_per_page' => -1,
										'post_status'    => 'publish'
				                    );
				                    $children_array = get_children( $need_post_args, OBJECT );

				                    // _log($children_array);

				                    foreach ($children_array as $children) {

				                		$build_array['children'][] = array(
											'post_id'        => $children->ID,
											'post_title'     => $children->post_title,
											'post_permalink' => get_the_permalink($children->ID) ,
											'price'          =>  get_post_meta( $children->ID, '_price', true ) ,
											'signed_price'   => wc_price(get_post_meta( $children->ID, '_price', true ) ),

				                        );

				                    }
				                
				                endif;





				                  if(has_term( 'food', 'product_type', $need_post )) :


				                        $food = get_post_meta($need_post->ID , 'takeaway_settings', true);                                

				                        if( is_string($food) ){
				                            $build_array['food']= json_decode($food);
				                        }



				                  		// $build_array['food']= json_decode( get_post_meta($need_post->ID , 'takeaway_settings', true) );		                  		



				                        $main_pri = get_post_meta( $need_post->ID , '_price_for_grouped_product_grp_product_price' , true);

				                        if(!empty($main_pri) ){
				                            $build_array['food_price'] = $main_pri;
				                        }
								              

				                  endif;


				                
				                // _log($build_array);
				     					
								$push_posts[] = $build_array;								
							}

							$cat_all_info[ $category_name ] = $push_posts;	

						endforeach;

					endif;

					$last = array(
						'cat_all_info'    => $cat_all_info,
						'category_name'   => $categorires_name_list,
						'currency_symbol' => get_woocommerce_currency_symbol()
					);


					return $last;
				}
	
	}



	add_action( "wp_ajax_nopriv_do_add_to_cart", 'takeaway_do_add_to_cart');
	add_action( "wp_ajax_do_add_to_cart",'takeaway_do_add_to_cart');


	add_action( "wp_ajax_nopriv_do_add_to_cart_simple", 'takeaway_do_add_to_cart_simple');
	add_action( "wp_ajax_do_add_to_cart_simple",'takeaway_do_add_to_cart_simple');
	






  	function takeaway_do_add_to_cart_simple(){

  		global $woocommerce; 		
 

  		$added = $woocommerce->cart->add_to_cart( $_POST['id'] );

  		if( $added ){

  			$cart_url = $woocommerce->cart->get_cart_url();

			$message = 'Added to your <a style="color:#e00000 !important;" href="'.$cart_url.'">cart</a> ' ;
		

			echo json_encode(array('message' => $message , 'cart' => $woocommerce->cart->get_cart_total() ,'success' => 1  ) );


  		}else{

			 echo json_encode(array('message' => 'Sorry , There is a problem , please Contact us ' , 'cart' => $woocommerce->cart->get_cart_total() ,'success' => 0  ));

			 
		}


		wp_die();

  	}






	function takeaway_do_add_to_cart(){

		global $woocommerce;

		if( isset( $_POST['items'] ) ){

			$items = $_POST['items'];

			foreach( $items as $item ){				

				$woocommerce->cart->add_to_cart($item['child_product_id']);
			}

			$cart_url = $woocommerce->cart->get_cart_url();		
			

			$message = 'Added to your <a style="color:#e00000 !important;" href="'.$cart_url.'">cart</a> ' ;

			echo json_encode(array('message' => $message , 'cart' => $woocommerce->cart->get_cart_total() ,'success' => 1  ) );


		}else{
			

			 echo json_encode(array('message' => 'Sorry , There is a problem , please Contact us ' , 'cart' => $woocommerce->cart->get_cart_total() ,'success' => 0  ));
		}


		wp_die();
	}



	add_action( "wp_ajax_nopriv_show_mini_cart", 'takeaway_show_mini_cart');
	add_action( "wp_ajax_show_mini_cart",'takeaway_show_mini_cart');


	function takeaway_show_mini_cart(){

		return woocommerce_mini_cart();

		wp_die();
	}


