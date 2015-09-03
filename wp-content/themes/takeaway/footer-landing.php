
<div class="finding-social text-center">
				<h6><?php _e('Find Us On','takeaway');?></h6>
				<?php global $takeaway_option_data; ?>
				<ul class="list-inline">
				  <?php if(isset($takeaway_option_data['takeaway-facebook-link']) && !empty($takeaway_option_data['takeaway-facebook-link'])) : ?>

                      <li>
                          
                          <a href="<?php echo esc_url($takeaway_option_data['takeaway-facebook-link']); ?>">
                          
                            <i class="fa fa-facebook-square"></i>
                          
                          </a>
                      
                      </li>  

                    <?php endif; ?>

                    <?php if(isset($takeaway_option_data['takeaway-twitter-link']) && !empty($takeaway_option_data['takeaway-twitter-link'])) : ?>

                      <li>
                    
                          <a href="<?php echo esc_url($takeaway_option_data['takeaway-twitter-link']); ?>">
                      
                            <i class="fa fa-twitter-square"></i>
                        
                          </a>
                      
                      </li>
                    
                    <?php endif; ?>

                    <?php if(isset($takeaway_option_data['takeaway-google-link']) && !empty($takeaway_option_data['takeaway-google-link'])) : ?>

                      <li>
                    
                          <a href="<?php echo esc_url($takeaway_option_data['takeaway-google-link']); ?>">
                      
                            <i class="fa fa-google-plus-square"></i>
                        
                          </a>
                      
                      </li>
                    
                    <?php endif; ?>

                    <?php if(isset($takeaway_option_data['takeaway-linkedin-link']) && !empty($takeaway_option_data['takeaway-linkedin-link'])) : ?>

                      <li>
                    
                          <a href="<?php echo esc_url($takeaway_option_data['takeaway-linkedin-link']); ?>">
                      
                            <i class="fa fa-linkedin-square"></i>
                        
                          </a>
                      
                      </li>
                    
                    <?php endif; ?>

                    <?php if(isset($takeaway_option_data['takeaway-pinterest-link']) && !empty($takeaway_option_data['takeaway-pinterest-link'])) : ?>

                      <li>
                    
                          <a href="<?php echo esc_url($takeaway_option_data['takeaway-pinterest-link']); ?>">
                      
                            <i class="fa fa-pinterest-square"></i>
                        
                          </a>
                      
                      </li>
                    
                    <?php endif; ?>

                    <?php if(isset($takeaway_option_data['takeaway-dribbble-link']) && !empty($takeaway_option_data['takeaway-dribbble-link'])) : ?>

                      <li>
                    
                          <a href="<?php echo esc_url($takeaway_option_data['takeaway-dribbble-link']); ?>">
                      
                            <i class="fa fa-dribbble-square"></i>
                        
                          </a>
                      
                      </li>
                    
                    <?php endif; ?>
				</ul>
				<?php 
                if (isset($takeaway_option_data['footer-copyright-description']) && !empty($takeaway_option_data['footer-copyright-description'])) {
                  echo apply_filters('the_content', $takeaway_option_data['footer-copyright-description'] );

                }
                
            ?>
        
			</div>
		</div> <!-- end .page-content -->
	</div>

<?php wp_footer(); ?>  
</body>

</html>