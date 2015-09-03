<?php 
/*
Template Name: Contact
*/
?>
  <?php get_header(); ?>

    <div class="page-content">

      <?php  

        

        $long = get_post_meta( $post->ID ,'_meta_box_2_casa_address_lng' , true);
        $lat = get_post_meta( $post->ID ,'_meta_box_2_casa_address_lat' , true);


      ?>

      <input type="hidden" id="map_long" name="map_long" value="<?php echo esc_attr($long);?>">
      <input type="hidden" id="map_lat" name="map_lat" value="<?php echo esc_attr($lat); ?>">


      <div class="map-section">

        <div id="map_canvas_go"></div>

      </div>
      <!-- end .map-section -->
      
      <div class="contact-us">

        <div class="container">

          <div class="row">
  
            <div class="col-md-6">
    
              <div class="contact-details">
              
                <h4><?php _e('Contact Details', 'takeaway' ); ?></h4>
  
                  <div class="row">
                  <!-- address one starts here -->
                    <div class="col-md-6 col-sm-6">
                      <?php 

                          $title1 = get_post_meta( $post->ID, '_meta_box_3_address_meta_title', true );
                          $address1 = get_post_meta( $post->ID, '_meta_box_3_address_meta_address', true );
                          $schedule1 = get_post_meta( $post->ID, '_meta_box_3_address_meta_schedule', true );
                       
                       ?>
                      
                      <?php if (!empty($title1)) { ?>

                        <h5><?php echo esc_attr($title1); ?></h5>

                      <?php } ?>

                      <div class="address clearfix">

                        <?php if (!empty($address1)) { ?>

                          <i class="fa fa-map-marker"></i>

                          <p><?php echo esc_attr($address1); ?></p>
                        
                        <?php } ?>
                      </div>

                      <div class="time-to-open clearfix">

                        <?php if (!empty($schedule1)) { ?>

                          <i class="fa fa-clock-o"></i>
                          <p><?php echo esc_attr($schedule1); ?></p>

                        <?php } ?>

                      </div>

                    </div>
                    <!-- address one ends here -->

                    <!-- address two starts here -->

                    <div class="col-md-6 col-sm-6">

                      <?php 

                          $title2 = get_post_meta( $post->ID, '_meta_box_4_address_meta_title', true );
                          $address2 = get_post_meta( $post->ID, '_meta_box_4_address_meta_address', true );
                          $schedule2 = get_post_meta( $post->ID, '_meta_box_4_address_meta_schedule', true );

                       ?>

                      <?php if (!empty($title2)) { ?>

                        <h5><?php echo esc_attr($title2); ?></h5>

                      <?php } ?>

                      <div class="address clearfix">

                        <?php if (!empty($address2)) { ?>

                          <i class="fa fa-map-marker"></i>

                          <p><?php echo esc_attr($address2); ?></p>
            
                        <?php } ?>
    
                      </div>

                      <div class="time-to-open clearfix">

                        <?php if (!empty($schedule2)) { ?>

                          <i class="fa fa-clock-o"></i>
  
                          <p><?php echo esc_attr($schedule2); ?></p>

                        <?php } ?>

                      </div>
            
                    </div>

                    <!-- address two ends here -->

                  </div>
                  
                  <!-- end nasted .row -->
  
              </div>
  
             <!-- end .contact-details -->
            
            </div>
            
            <!-- end .main-grid-layout -->

            <div class="col-md-6">

              <?php echo do_shortcode( the_content()); ?>

            </div>
          
          <!-- end .main-grid-layout -->
          
          </div>
  
        <!-- end .row -->
        
        </div>

        <!-- end .container -->
      
      </div>
  <!-- end .contact-us -->
    </div>

  <!-- end page-content -->

  <?php get_footer( ); ?>