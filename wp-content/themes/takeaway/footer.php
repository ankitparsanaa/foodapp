    <!--footer start-->
  
    <footer id="footer">

        <div class="container">

            <div class="main-footer">

                <div class="row">

                    <div class="col-sm-6 col-md-3">

                        <?php global $takeaway_option_data; ?>
                        
                        <?php if (isset($takeaway_option_data['logo']['url']) && !empty($takeaway_option_data['logo']['url'])) :?>
                        
                          <img src="<?php echo esc_url($takeaway_option_data['logo']['url']); ?>" alt="TakeAway">
                        
                        <?php endif; ?>

                        <?php if (isset($takeaway_option_data['footer-description']) && !empty($takeaway_option_data['footer-description'])) :?>

                          <?php echo apply_filters( 'the_content', $takeaway_option_data['footer-description'] ); ?>

                        <?php endif; ?>

                    </div>

                    <div class="col-sm-6 col-md-3">

                        <?php get_sidebar('footer-widget-1' ); ?>
                    </div>

                    <div class="col-sm-6 col-md-3">
    
                        <?php get_sidebar('footer-widget-2' ); ?>
    
                    </div>

                    <div class="col-sm-6 col-md-3">
                        
                        <?php get_sidebar('footer-widget-3' ); ?>
                    
                    </div>
    
                </div>
            
            </div>
        
        </div>
      
       <?php if (isset($takeaway_option_data['footer-copyright-description']) && !empty($takeaway_option_data['footer-copyright-description'])) :?>

        <div class="footer-copyright">
            
            <div class="container">
  
                  <?php echo apply_filters('the_content', $takeaway_option_data['footer-copyright-description'] );?>

                <ul class="footer-social">


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
  
            <!-- end .footer-social -->
            </div>
    
        </div>

        <?php endif; ?>

  
    </footer>

</div>
<?php wp_footer(); ?>  
</body>
</html>
