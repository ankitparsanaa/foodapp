<?php 
/*
  Template Name: landing page
*/
?>


<?php get_header('landing'); 
global $takeaway_option_data;
?>

<body>
	<div id="main-wrapper">
		<div class="container">
			<div class="landing-logo">
				<a href="<?php echo esc_url( home_url()); ?>">
				<img src="<?php 
								if (isset($takeaway_option_data['takeaway-landing-logo']['url'])) {
									echo esc_url($takeaway_option_data['takeaway-landing-logo']['url']);
								}
						?>" alt="landing page logo"></a>
			</div>
		</div>
		<!-- all page-content start -->
		<?php $get_list_view_pages = get_pages(array(
					                'meta_key' => '_wp_page_template',
					                'meta_value' =>  'template-list-view.php',
					            ));

        						
            
					            if(isset($get_list_view_pages) && !empty($get_list_view_pages)){
					                    foreach ($get_list_view_pages as $key => $value1) {
					                         
					                        $list_id = $value1->ID;
					                }
					            }

				            	$get_grid_view_pages = get_pages( array(
				            		'meta_key' => '_wp_page_template',
				            		'meta_value' => 'template-grid-view.php'
				            		) );

				            	if (isset($get_grid_view_pages) && !empty($get_grid_view_pages)) {
				            		foreach ($get_grid_view_pages as $key => $value2) {
				            			$grid_id = $value2->ID;
				            		}
				            	}

				            	$get_atmf_pages = get_pages( array(
				            		'meta_key' => '_wp_page_template',
				            		'meta_value' => 'atmf-search.php'
				            		) );

				            	if (isset($get_atmf_pages) && !empty($get_atmf_pages)) {
				            		foreach ($get_atmf_pages as $key => $value3) {
				            			$atmf_id = $value3->ID;
				            		}
				            	} ?>
		<div id="page-content">
			<!-- masterslider -->
			<div class="master-slider landing ms-skin-black-2 round-skin" id="landing-masterslider">
			<?php if(isset($takeaway_option_data['takeaway-landing-slides']) && !empty($takeaway_option_data['takeaway-landing-slides'])) : ?>
				<!-- new slide -->
				<?php foreach ($takeaway_option_data['takeaway-landing-slides'] as $key => $value) : ?>
					<div class="ms-slide">
						<!-- slide background -->

						<img src="<?php echo esc_url( UOU_JS . '/masterslider/blank.gif' ); ?>" data-src="<?php echo esc_url($value['image']); ?>" alt="landing-slide-img1.jpg">
						<!-- slide text layer -->
						<div class="container">
							<div class="ms-layer ms-caption" >
								<?php $takeaway_caption = ($takeaway_option_data['takeaway-landing-content']); 
										echo apply_filters( 'the_content', $takeaway_caption );
								?>

								<a href="<?php if (!empty($list_id)) {echo esc_url(get_permalink( $list_id ));} elseif (!empty($grid_id)) {
													echo esc_url(get_permalink($grid_id));} elseif (!empty($atmf_id)) {
														echo esc_url(get_permalink($atmf_id));
													} ?>" class="btn btn-landing"><i class="fa fa-list-ol"></i><?php _e('Order Online','takeaway'); ?></a>
							</div>
						</div>
					</div>
					<!-- end of slide -->
				<?php endforeach;?>
			<?php endif; ?>

				
			</div>
			<!-- end of masterslider -->
			<?php 
				if (isset($takeaway_option_data['takeaway-ribon-image']) && !empty($takeaway_option_data['takeaway-ribon-image'])) {
				$ribon_image = $takeaway_option_data['takeaway-ribon-image']['url'];
			} 

				if (isset($takeaway_option_data['takeaway-landing-welcome']) && !empty($takeaway_option_data['takeaway-landing-welcome'])) {
					$landing_welcome = $takeaway_option_data['takeaway-landing-welcome'];
				}


			?>
			<div class="welcome-msg">
				<img src="<?php echo esc_url($ribon_image); ?>" alt="">
				<h6><?php echo esc_attr( $landing_welcome ); ?></h6>
			</div>

			<div class="landing-link">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="box-link">
								<figure>
									<?php if (isset($takeaway_option_data['takeaway-find-us']) && !empty($takeaway_option_data['takeaway-find-us'])) {
										$find_us = $takeaway_option_data['takeaway-find-us']['url'];
									} ?>
									<img src="<?php echo esc_url($find_us); ?>" alt="">
									<?php 

										 $get_list_view_pages = get_pages(array(
						                'meta_key' => '_wp_page_template',
						                'meta_value' =>  'contact-us.php',
						            ));

	        						
	            
						            if(isset($get_list_view_pages) && !empty($get_list_view_pages)){
						                    foreach ($get_list_view_pages as $key => $value5) {
						                         
						                        $contact_us = $value5->ID;
						                }
						            } 
					            ?>
									<h4><a href="javascript:"><?php _e('1. Select Location', 'takeaway'); ?></a></h4>
									<figcaption>
										<a href="javascript:"><i class="fa fa-search"></i></a>
									</figcaption>
								</figure>
							</div>
						</div>

						<div class="col-md-4">
							<div class="box-link">
								<figure>
								<?php if (isset($takeaway_option_data['takeaway-order-online']['url']) && !empty($takeaway_option_data['takeaway-order-online']['url'])) {
									$online_order = $takeaway_option_data['takeaway-order-online']['url'];
								} ?>
									<img src="<?php echo esc_url($online_order); ?>" alt="">
									
									<h4><a href="<?php if (!empty($list_id)) {echo esc_url(get_permalink( $list_id ));} elseif (!empty($grid_id)) {
												echo esc_url(get_permalink($grid_id));} elseif (!empty($atmf_id)) {
													echo esc_url(get_permalink($atmf_id));
												} ?>"><?php _e('2. Choose Order Online', 'takeaway'); ?></a></h4>
									<figcaption>
										<a href="<?php if (!empty($list_id)) {echo esc_url(get_permalink( $list_id ));} elseif (!empty($grid_id)) {
												echo esc_url(get_permalink($grid_id));} elseif (!empty($atmf_id)) {
													echo esc_url(get_permalink($atmf_id));
												} ?>"><i class="fa fa-laptop"></i></a>
									</figcaption>
								</figure>
							</div>
						</div>
				
						<div class="col-md-4">
							<div class="box-link">
								<figure>
									<?php if (isset($takeaway_option_data['takeaway-about-us']['url']) && !empty($takeaway_option_data['takeaway-about-us']['url'])) {
										$about_t = $takeaway_option_data['takeaway-about-us']['url'];
									} ?>
									<img src="<?php echo esc_url($about_t); ?>" alt="">
									<?php 

										 $get_list_view_pages = get_pages(array(
						                'meta_key' => '_wp_page_template',
						                'meta_value' =>  'team.php',
						            ));

	        						
	            
						            if(isset($get_list_view_pages) && !empty($get_list_view_pages)){
						                    foreach ($get_list_view_pages as $key => $value4) {
						                         
						                        $about_us = $value4->ID;
						                }
						            } 
					            ?>
									<h4><a href="<?php if (!empty($about_us)) {
										echo esc_url(get_permalink($about_us ));
									} ?>"><?php _e('3. Pay', 'takeaway'); ?></a></h4>
									<figcaption>
										<a href="<?php if (!empty($about_us)) {
										echo esc_url(get_permalink($about_us ));
									} ?>"><i class="fa fa-user"></i></a>
									</figcaption>
								</figure>
							</div>
						</div>
					</div> <!-- end .row --> 
				</div> <!-- end .container -->
			</div>

			
<?php get_footer('landing'); ?>
