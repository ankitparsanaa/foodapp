<?php get_header(); ?>

        <div class="page-content">
            
            <div class="heading">
                
                <h1><?php _e('The Chef', 'takeaway'); ?></h1>
            
            </div>
            <!-- end .heading -->
    
            <div class="chef-details">
            
                <div class="container">
                    
                    <div class="row">
                    
                        <div class="col-md-8">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="chef-img">

                                    <?php 

                                        
                                            $image_id =  get_post_thumbnail_id( get_the_ID() );
                                            $large_image = wp_get_attachment_image_src( $image_id ,'full');  
       
                                    ?>
                                    
                                            <img src="<?php echo esc_attr($large_image[0]); ?>" alt="image">
                                    
                                        

                                </div>
                            <?php endif; ?>
                            <h4> 
                          <?php 
                                            $chef_name = get_post_meta( $post->ID, '_chef_meta_box_name', true );
                                            $chef_designation = get_post_meta( $post->ID, '_chef_meta_box_designation', true );
                                        
                                         ?>


                                <a href="<?php  get_the_permalink(); ?>"> <?php if (!empty($chef_name)) {
                                    echo esc_attr($chef_name);
                                    }?> 
                                

                                <?php if (!empty($chef_designation)) {
                                    echo '- '. esc_attr($chef_designation );
                                } ?>

                               

                                </a>
    
                            </h4>


                            <div class="share-this">
    
                                <p><?php _e('Share this on:', 'takeaway'); ?></p>
    
                                <ul class="list-inline">
        
                                    <li>
        
                                        <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?> "><i class="fa fa-facebook-square"></i></a>
                                    
                                    </li>

                                    <li>
                                
                                        <a href="http://twitthis.com/twit?url=<?php the_permalink(); ?>"><i class="fa fa-twitter-square"></i></a>
                                    
                                    </li>

                                    <li>

                                        <a href="https://plus.google.com/share?url=<?php the_permalink();?>"><i class="fa fa-google-plus-square"></i></a>
                                    
                                    </li>
                                    
                                    <li>
                                        
                                        <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&amp;media=<?php echo urlencode(get_the_title()); ?>"><i class="fa fa-pinterest-square"></i></a>
                                    
                                    </li>
                                </ul>
                                <!-- end ul -->
                            </div>
                            <!-- end .share-this -->

                            <div class="chef-description">
                            
                                <p><?php _e('Few lines about me:', 'takeaway'); ?></p>
                            
                                <?php the_content( ); ?>
                            
                                <ul class="list-inline">
                                
                                    <li>
                                
                                        <?php the_tags('  ','  ','  '); ?>
                                    
                                    </li>

                                </ul>
                            
                            </div>
                            <!-- end .chef-description -->

                            <br>

                            <?php  comments_template( '', true ); ?>
                            <!-- end .comment-section -->

                        </div>
                        <!-- end .col-md-8 grid -->

                        <div class="col-md-4">
          
                            <div class="general-info">
                
                                <h4><?php _e('General Information','takeaway'); ?></h4>
                        
                                <ul class="list-unstyled">

                                    <li>

                                        <span class="value"><?php _e('Experience:', 'takeaway') ?></span>

                                        <?php $takeaway_experience = get_post_meta( $post->ID, '_chef_meta_box_experience', true ); ?>

                                        <span class="result"><?php echo esc_attr( $takeaway_experience );  ?></span>

                                    </li>

                                    <li>

                                        <span class="value"> <?php _e('School:', 'takeaway') ?></span>

                                        <?php $takeaway_school = get_post_meta( $post->ID, '_chef_meta_box_school', true ); ?>

                                        <span class="result"><?php echo  esc_attr( $takeaway_school ); ?></span>
                                        

                                    </li>

                                    <li>

                                        <span class="value"> <?php _e('Speciality:', 'takeaway') ?></span>

                                        <?php $takeaway_speciality   = get_post_meta( $post->ID, '_chef_meta_box_speciality', true ); ?>

                                        <span class="result"><?php  echo esc_attr( $takeaway_speciality ); ?></span>

                                    </li>

                                    <li>

                                        <span class="value"> <?php _e('Favourite Cuisine:', 'takeaway') ?></span>

                                        <?php $takeaway_cuisine = get_post_meta( $post->ID, '_chef_meta_box_favourite', true ); ?>

                                        <span class="result"><?php  echo esc_attr( $takeaway_cuisine );  ?></span>

                                    </li>

                                    <li>
                                    
                                        <span class="value"> <?php _e('Cooks for us:', 'takeaway') ?></span>

                                        <?php $takeaway_cook = get_post_meta( $post->ID, '_chef_meta_box_cooks', true ); ?>
                                        
                                        <span class="result"><?php  echo esc_attr( $takeaway_cook ); ?></span>
                                    
                                    </li>

                                    <li>
                                        
                                        <span class="value"> <?php _e('Staff Managed:', 'takeaway') ?></span>

                                        <?php $takeaway_staff = get_post_meta( $post->ID, '_chef_meta_box_staff', true ); ?>
                                        
                                        <span class="result"><?php  echo esc_attr( $takeaway_staff ); ?></span>
                                    
                                    </li>
                                
                                </ul>

                            </div>
                            <!-- end .general-info -->
                        </div>
                    
                    </div>
                    <!-- end .row -->
                </div>
                <!-- end .container -->
            </div>
            <!-- end .chef-details -->
        </div>
        <!-- end page-content -->

<?php get_footer();
