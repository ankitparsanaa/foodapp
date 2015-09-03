    <?php get_header(); ?>

        <div class="page-content">
    
            <div class="news-events-blog page-format">
    
                <div class="container">
                
                    <div class="row">
                    <?php if(class_exists('Woocommerce')) : ?>

                    <?php if ( is_cart() || is_checkout() ) : ?>
                        <div class="col-md-12">
                            <?php else : ?>  <div class="col-md-8">

                    <?php endif; ?>

                        <?php else : ?> <div class="col-md-8">

                    <?php endif; ?>
                    
                            <?php 

                                while ( have_posts() ) : the_post(); 

                            ?>

                                <div id= "post-<?php the_ID();?>" <?php post_class("blog-post"); ?>>
                                    
                                    <div class="row">

                                        <?php if ( has_post_thumbnail() ) {?>
        
                                            <div class="col-md-12 col-sm-12">
            
                                                
                                                    <div class="blog-post-img">
                                                        <?php  

                                                            $image_id =  get_post_thumbnail_id( get_the_ID() );
                                                            $large_image = wp_get_attachment_image_src( $image_id ,'huge');  

                                                        ?>
                                                        
                                                        <img class="" src="<?php echo esc_attr($large_image[0]); ?>" alt="">
                                                   
                            
                                                    </div> 
                                               
                                            </div>
                                        <?php   } ?>

                                        <div class="col-md-12 col-sm-12">

                    
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <?php if(class_exists('Woocommerce')) : ?>
                                           
                                                <?php if ( !is_cart() && !is_checkout() ) : ?>

                                                    <div class="about-author">
                                    
                                                        <ul class="list-inline">
                                                            
                                                            <li class="place"><i class="fa fa-user"></i>
                                                            
                                                                <span class="bl-sort"><?php _e('by', 'takeaway' ); ?></span><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_attr(get_the_author()); ?></a>
                                                            
                                                            </li>
                                        
                                                            <li class="date"><i class="fa fa-clock-o"></i><?php esc_attr( the_time(get_option('date_format')) ); ?> <?php _e('at', 'takeaway' ); ?> <?php esc_attr( the_time(get_option('time_format')) ); ?></li>
                                                    
                                                            
                                                                
                                                                <li><i class="fa fa-folder-open"></i> <?php the_category(',&nbsp; '); ?></li>  
                                                        
                                                            

                                                            <li><i class="fa fa-comment"></i><a href="#"><?php  comments_number(__('No comment','takeaway'), __('One comment','takeaway'), __('Comments (%)','takeaway') ); ?></a></li>
                                        
                                                        </ul>
                                                    </div>
                                                     <!-- end .about author -->

                                                    <div class="share-this">
                                                    
                                                        <p><?php _e('Share this on:', 'takeaway'); ?></p>
                                                    
                                                        <ul class="list-inline">

                                                            <li>
                                                                <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?> "><i class="fa fa-facebook-square"></i></a>
                                                            </li>

                                                            <li>
                                                                <a href="http://twitthis.com/twit?url=<?php the_permalink(); ?>"><i class="fa fa-twitter-square"></i>
                                                            </a>
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
                                                <?php endif; ?>
                                            
                                            <?php else : ?>
                                                <div class="about-author">
                                
                                                    <ul class="list-inline">
                                                        
                                                        <li class="place"><i class="fa fa-user"></i>
                                                        
                                                            <span class="bl-sort"><?php _e('by', 'takeaway' ); ?></span><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_attr( get_the_author() ); ?></a>
                                                        
                                                        </li>
                                    
                                                        <li class="date"><i class="fa fa-clock-o"></i><?php esc_attr( the_time(get_option('date_format')) ); ?> <?php _e('at', 'takeaway' ); ?> <?php esc_attr( the_time(get_option('time_format')) ); ?></li>
                                                
                                                        
                                                            
                                                            <li><i class="fa fa-folder-open"></i> <?php the_category(',&nbsp; '); ?></li>  
                                                    
                                                        

                                                        <li><i class="fa fa-comment"></i><a href="#"><?php  comments_number(__('No comment','takeaway'), __('One comment','takeaway'), __('Comments (%)','takeaway') ); ?></a></li>
                                    
                                                    </ul>
                                                </div>
                                                 <!-- end .about author -->

                                                <div class="share-this">
                                                
                                                    <p><?php _e('Share this on:', 'takeaway'); ?></p>
                                                
                                                    <ul class="list-inline">

                                                        <li>
                                                            <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?> "><i class="fa fa-facebook-square"></i></a>
                                                        </li>

                                                        <li>
                                                            <a href="http://twitthis.com/twit?url=<?php the_permalink(); ?>"><i class="fa fa-twitter-square"></i>
                                                        </a>
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
                                            
                                            <?php endif; ?>
                                          

                                             <?php echo do_shortcode( the_content() );  ?> 

                                            <?php
                                                $args = array(
                                                'before' => '<p class="post-navigation">',
                                                'after' => '</p>',
                                                'pagelink' => 'Page %'
                                                );
                                                wp_link_pages( $args );
                                            ?>

                                        </div>
                                        <!--end grid-layout -->
                                    </div>
            
                                 </div>
                            
                            <?php endwhile; ?>
                                
                        </div>        
                    <?php if(class_exists('Woocommerce')) : ?>
                        
                        <?php if ( !is_cart() && !is_checkout() ) : ?>


                            <div class="col-md-4">
                            
                                <div class="blog-side-panel">

                                    <?php get_sidebar(); ?>
                                
                                </div> <!-- end .events-side-panel -->
                           
                            </div>
                            <!-- end .col-md-4 -->
                        <?php endif; ?>

                    <?php else : ?>
                        <div class="col-md-4">
                            
                                <div class="blog-side-panel">

                                    <?php get_sidebar(); ?>
                                
                                </div> <!-- end .events-side-panel -->
                           
                            </div>
                            <!-- end .col-md-4 -->
                    <?php endif; ?>
                    </div>
                    <!-- end .row -->
                </div>
                <!-- end .container -->
            </div>
            <!-- end .news-events -->
        </div>
        <!-- end page-content -->
    <?php get_footer(); ?>
