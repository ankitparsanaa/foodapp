<?php 
/*
Template Name: Full width
*/
?>

    <?php get_header(); ?>

        <div class="page-content">
    
            <div class="news-events-blog">
                
                <div class="container">
                    
                    <div class="row">
                        
                        <div class="col-md-12">
                            
                            <div class="blog-post no-dish-side">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="blog-post-img">
                                        <?php 
                                        
                                            $image_id =  get_post_thumbnail_id( get_the_ID() );
                                            $large_image = wp_get_attachment_image_src( $image_id ,'huge');  
                                  
                                        
                                        ?>
                                        <img class="" src="<?php echo esc_attr($large_image[0]); ?>" alt="">
                                    </div>
                                <?php endif; ?>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                
                                <?php if (!is_cart()) {?>
                                     
                                
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
                              <?php  } ?>
                               
                                <?php the_content(); ?>
                                
                                <?php if (has_tag()) :?>
                                   
                             
                                    <div class="tag">
                                        
                                        <ul class="list-inline">
                                        
                                            <li><?php the_tags( ' ', ' ', '' ); ?></li>

                                        </ul>
        
                                    </div>

                                <?php endif; ?>

                            </div>
                            <!--end .blog-list -->
                        </div>
                        <!-- end .col-md-12 -->
                    </div>
                    <!-- end .row -->
                </div>
                <!-- end .container -->
            </div>
            <!-- end .news-events -->
        </div>
        <!-- end page-content -->

    <?php get_footer(); ?>
