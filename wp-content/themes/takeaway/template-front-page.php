<?php 
/*
  Template Name: front page
*/
?>

	<?php 

	global $takeaway_option_data, $woocommerce, $post, $product; 

	get_header();
	$flag = 0;
	?>

			
	<!-- all page-content start -->
	<div id="page-content">
		<!-- masterslider -->
		<div class="master-slider ms-skin-black-2 round-skin" id="masterslider">

			<?php if(isset($takeaway_option_data['casa-opt-slides']) && !empty($takeaway_option_data['casa-opt-slides'])) : ?>
				
					<?php $i=0; ?>
					
					<?php foreach ($takeaway_option_data['casa-opt-slides'] as $key => $value) : ?>
				
						<?php $i++; ?>

						<!-- new slide -->

						<div class="ms-slide">	

							<?php if(!empty($value['image'])){ ?>

								<!-- slide background -->

								<img src="<?php echo esc_url( UOU_JS . '/masterslider/blank.gif' ); ?>"	data-src="<?php echo esc_url( $value['image'] ); ?>" alt="home-slide-img1.jpg">
							
								<?php }

									else { ?> 

					                    <img src=" <?php echo esc_url( UOU_IMG .'/no-image-big.jpg' ); ?> ">


									<?php
									
									} ?>

								<!-- slide text layer -->

							<div class="ms-layer ms-caption" style="">
								<h1 class="text-right fixed-width">
									<span class="slider-text<?php echo esc_attr( $i ); ?>"><?php echo esc_attr( $value['description'] ); ?></span>
									<a href="<?php echo esc_url($value['url']); ?>" class="btn btn-default"><i class="fa fa-file-text-o"></i><?php _e( 'Read More', 'takeaway' ); ?></a>
								</h1>
								
							</div>
						</div>

						<!-- end of slide -->

					<?php endforeach; ?>

				
			<?php endif; ?>

		</div>
		<!-- end of masterslider -->

				<!-- purchase TakeAway section start -->
		<div class="container">
			<div class="call-to-action-section">
				<div class="css-table-cell">
					<div class="icon">
						<img src="<?php echo esc_url( $takeaway_option_data['takeaway-banner']['url'] ); ?>" alt="banner image">
					</div>
				</div>
				<div class="text css-table">
					<div class="css-table-cell">
						<h4><?php echo esc_attr( $takeaway_option_data['banner-title'] ); ?></h4>
						<p><?php echo esc_attr( $takeaway_option_data['takeaway-banner-content'] ); ?></p>
					</div>

					<div class="css-table-cell">
						<a href="<?php echo esc_attr( $takeaway_option_data['takeaway-banner-website-1'] ); ?>" class="btn btn-default-red  pad-bottom"><i class="fa fa-file-text-o"></i> <?php _e('Read  More', 'takeaway'); ?></a>
					</div>

					<div class="css-table-cell">
						<a href="<?php echo esc_attr( $takeaway_option_data['takeaway-banner-website-2'] ); ?>" class="btn btn-default-red-inverse pad-top"><i class="fa fa-shopping-cart"></i> <?php _e('Purchase Now!', 'takeaway'); ?></a>
					</div>
				</div>
			</div>
			<!-- end .call-to-action-section -->
		</div>

		<!-- purchase takeaway section ends -->
			

			<?php 

			$block_posts = get_post_meta(get_the_ID(),'_front_page_meta_box_name_select', true);

			$selected_block_post = array();

			if( isset($block_posts) && !empty($block_posts) ):
				foreach ($block_posts as $key => $value) 
				{
					array_push($selected_block_post, $value);
				}
			endif;

			// print_r($selected_block_post);

			$queried_posts = get_posts( 
					array( 
						'post_type' => 'block', 
						'post__in' => $selected_block_post ,
						'posts_per_page' => -1,
						) 
				); 
			// print_r($queried_posts);

			 foreach ($queried_posts as $key => $value) 
			 { 

				$post_id = $value->ID;
				$meta = get_post_custom( $post_id );	
			
				$block_type = $meta['_post_meta_box_1_post_select'][0];	
					// print_r( $block_type);
			if($block_type === 'content'){		

	///////////////////////////////////////////////////////////////////
	/*content block starts here*/
	//////////////////////////////////////////////////////////////////
		// global $wp_query;
	 //    $cat = $wp_query->get_queried_object();
	 //    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	 //    _log($thumbnail_id);

			$args = array(
			'taxonomy'  => 'product_cat',
			'posts_per_page' => -1,
			); 

	        $ts = get_categories($args); 
	        
	     
			usort($ts, function($a, $b) {
			    return $b->category_count - $a->category_count;

			});
	?>  

	     	<div class="category-boxes-icons">
				<div class=" container">
					<div class="row">
						<?php
						
							foreach ($ts as $key => $value) {
								$flag ++;
								if ($flag == 5) {
									break;
								}
						     $cat = $value->term_id;

			    			$thumbnail_id = get_woocommerce_term_meta( $cat, 'thumbnail_id', true );

 							$image = wp_get_attachment_url( $thumbnail_id );
	    
						    						     
							if(($image)){ 

								$get_list_view_pages = get_pages(array(
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
				            	}

						?>
							
								<div class="col-md-3 col-sm-6 col-xs-6 text-center">
									<div class="category-boxes-item">
										<figure>
											<?php echo '<img src="'.esc_url($image).'" alt="">';?>
									
											<h4><?php echo esc_attr( $value->name ); ?></h4>

											<figcaption> <a href="<?php echo esc_url(get_term_link( $value->slug, 'product_cat' )); ?>" class="btn btn-default-white"><i class="fa fa-file-text-o"></i> <?php _e('Read  More', 'takeaway'); ?> </a>
										    </figcaption>			
									
										</figure>
									</div>
								</div>

						<?php  }  ?>

					<?php } ?>

					</div>
				</div>
			</div>




	<?php }

	///////////////////////////////////////////////////////////////////
	/*welcome block starts here*/
	//////////////////////////////////////////////////////////////////


	elseif($block_type === 'testimonial'){ ?>
	<?php 
	///////////////////////////////////////////////////////////////////
	/*testimonial block starts here*/
	//////////////////////////////////////////////////////////////////
	 ?>

	<?php 

		if(isset($takeaway_option_data['opt-background']['background-color']) ){
			
			$bg_color = $takeaway_option_data['opt-background']['background-color']; 
		}

		if( isset($takeaway_option_data['takeaway-testimonial-background-image']['url'] ) ){

			$bg_image = $takeaway_option_data['takeaway-testimonial-background-image']['url']; 	
		}

		 global $post;
		 	

	 ?>
		

		<div id="sm-slide-section" style="background-position: top center;
						   background-repeat: no-repeat; 
						   <?php if(isset($bg_image) && !empty($bg_image)) { ?>
						   background-image: url(<?php {echo esc_url( $bg_image );}?>);><?php }else {?>
				 			
				 			<?php if (isset($bg_color) && !empty($bg_color)) {?>					 			
						    background: <?php echo esc_attr( $bg_color ); ?>;<?php } }?>">
			



				<div class="container">
							<div class="slide-heading text-center">
								<h4><?php _e('Our Clients Say','takeaway'); ?></h4>
							</div>
							<div id="slide-content" class="owl-carousel">

								<?php $args = array(
												    'parent'=>0,    
												    'post_type' => 'testimonial',
												    'number' => '10',
												    'orderby' => 'date',
												    'order' => 'DESC'
												  );
										
												// $comments = get_comments($de);
												$testimonials = new WP_Query($args);
												// print_r($comments);
												// _log($testimonials);
												if($testimonials->have_posts()): while($testimonials->have_posts()): $testimonials->the_post(); 
												// foreach($comments as $comment) :
												// _log($post->ID);
													$meta = get_post_custom( $post->ID );
												    ?>

										
										<div <?php post_class('item' );?> id="post-<?php the_ID(); ?>">

											<?php if(has_post_thumbnail( $post->ID)) :?>
						
												<?php 

													 $image_id =  get_post_thumbnail_id( get_the_ID() );
	                   								 $large_image = wp_get_attachment_image_src( $image_id ,'huge');  
	                   								 echo ' <img class="" src="'. esc_url($large_image[0]) .'" alt="blog-list-img">';
												
												?>

												<?php else : ?> <img src=" <?php echo esc_url( UOU_IMG .'/no-image-big.jpg' ); ?> ">
										
											<?php endif; ?>
											<div class="details">
												<h5>
													<a href="#">
														<?php if(isset($meta['_testimonial_author_info_testimonial_author_name'][0]) && $meta['_testimonial_author_info_testimonial_author_name'][0]) : ?>
														<?php echo esc_attr($meta['_testimonial_author_info_testimonial_author_name'][0]); ?>
														<?php else: ?>
														<?php _e( 'Undefined', 'takeaway' ); ?>
														<?php endif; ?></a>

												</h5>
										
											

													<?php
														the_excerpt();
																											
													?>
												
											
											</div>
										</div>

								<?php endwhile; endif; ?>
							</div>
				</div>
		</div>



			
			
			<?php }
elseif ($block_type === 'welcome') {?>
	<div class="chef-welcome" 
						style="background-position: top center;
							   background-repeat: no-repeat; 
							   background-image: url(<?php if(isset($takeaway_option_data['takeaway-background-image']['url']))
					{echo esc_url($takeaway_option_data['takeaway-background-image']['url']);}?>);">
						<div class="container">
							<?php the_content( ); ?>	
						</div>
					</div>

	<?php
}
	///////////////////////////////////////////////////////////////////
	/*testimonial block ends here*/
	//////////////////////////////////////////////////////////////////


			elseif($block_type === 'blog'){ 

	///////////////////////////////////////////////////////////////////
	/*blog block starts here*/
	//////////////////////////////////////////////////////////////////
	 $args = array(
		'posts_per_page'   => 4,
		'category'         => '',
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true );

	$posts_array = get_posts( $args );
	
	?>


				<div class="latest-from-blog text-center">
					<div class="container">
						<h4><?php _e('Latest From the Blog', 'takeaway'); ?></h4>
						<div class="row">
							<?php foreach ($posts_array as $post ) :  ?>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="blog-latest">
									<div class="row">
										<div class="col-md-6 col-sm-12">
										<?php 

							              if (has_post_thumbnail()) { 
							                   $image_id =  get_post_thumbnail_id( get_the_ID() );
							                   $large_image = wp_get_attachment_image_src( $image_id ,'huge');  
							                   echo ' <img class="" src="'. esc_url($large_image[0]) .'" alt="blog-list-img">';

							              }else { ?>
                      
                    							<img src=" <?php echo esc_url( UOU_IMG .'/no-image-big.jpg' ); ?> ">

                    					<?php }?>   
				                      
										</div>
										<div class="col-md-6 col-sm-12">
											<h5>
												<a href="<?php the_permalink(); ?>">
													<?php 
														if (strlen($post->post_title) > 20) {
															echo substr(the_title($before = '', $after = '', FALSE), 0, 20) . '...'; 
														} else {
															the_title(); 
															}?>
												</a>
											</h5>
											<p><i class="fa fa-clock-o"></i>
												<span class="date"><?php the_time(get_option('date_format')); ?></span>at
												<span class="time"><?php the_time(get_option('time_format')); ?></span>
											</p>
											<p class="bl-sort">
												<?php 

												 echo substr(wp_strip_all_tags( $post->post_content ), 0,50) . ' ...';
													
		                       					?>

	                       					</p>

											<a href="<?php the_permalink(); ?>" class="btn btn-default-red"><i class="fa fa-file-text-o"></i> Read  More</a>
										</div>
										<!--end .blog-details-->
									</div>
									<!--end .row-->
								</div>
								<!--end .blog-latest -->
							</div>
							<!--end grid layout-->
							<?php endforeach; ?>
						</div>
						<!--end .row main-->
						<!-- read older button -->
						<div class="read-older">
							<a href="<?php  echo esc_url(get_permalink( get_option( 'page_for_posts' ) ));?>" class="btn btn-default-red"><i class="fa fa-file-text-o"></i> <?php _e('Read Older Entries', 'takeaway'); ?></a>
						</div>
					</div>
					<!--end container-->
				</div>

				
			<!-- BROWSE : end -->

			<!-- CONTENT SECTION: begin -->
			<?php //include(locate_template('about-casa.php')); ?>
			<?php }elseif($block_type === 'testimonial_slider'){ ?>
			<!-- CONTENT SECTION : end -->
			
		</div>
		<!-- CORE : end -->
		

		<!-- TESTIMONIALS : begin -->
		<?php //include(locate_template('testimonial.php')); ?>
		<?php }?>
		<!-- TESTIMONIALS : end -->
		<?php } ?>




			
		<?php 

				$terms = get_the_terms( $post->ID, 'product_cat' );
				if(is_array($terms)) {
				foreach ( $terms as $term ){
				  $category_name = $term->name;
				  $category_thumbnail = get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true);
				  $image = wp_get_attachment_url($category_thumbnail);
				  echo '<img class="absolute category-image" src="'.esc_url($image).'">';
				}
					}	

	 ?>
	</div>
		
<?php get_footer();?>