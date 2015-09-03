    <?php get_header( ); ?>
        
        <div class="page-content">
            
            <div class="heading">
                
                <h1><?php the_title( ); ?></h1>
            
            </div> 
            
            <div class="news-events-blog">
    
                <div class="container">
                    
                    <div class="row">
    
                        <div class="col-md-8">

                            <div class="blog-post">
                        
                                <div class="row">
                                    
                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <div class="col-md-12 col-sm-12">
                        
                                            <div class="blog-post-img">
                                                
                                                <?php 
                                                
                                                    
                                                    $image_id =  get_post_thumbnail_id( get_the_ID() );
                                                    $large_image = wp_get_attachment_image_src( $image_id ,'huge');  
                                                
                                                ?>
                                        
                                                    <img src="<?php echo esc_attr($large_image[0]); ?>" alt="">
                                        
                                                             
                        
                                            </div>
                    
                                        </div>
                                    <?php } ?>      

                                    <div class="col-md-12 col-sm-12">

                                        <h4><a href="<?php echo esc_url(the_permalink()); ?>"><?php the_title( ); ?></a></h4>
    
                                        <div class="about-author">
                                        
                                            <ul class="list-inline">
                                        
                                                <li class="place"><i class="fa fa-user"></i>
                                            
                                                    <span class="bl-sort"><?php _e('by', 'takeaway'); ?></span><?php the_author_posts_link();?>
                                            
                                                </li>
                                            
                                                <li class="date"><i class="fa fa-clock-o"></i><?php the_time(get_option('date_format'));?> <?php _e('at', 'takeaway'); ?><?php the_time(get_option('time_format'));?></li>
                                               
                                                   
                                                        <li><i class="fa fa-folder-open"></i> <?php the_category(',&nbsp; '); ?></li>  

                                               
                                            
                                                <li><i class="fa fa-comment"></i><a href="#"><?php comments_number( 'No Comment', 'One Comment', '% Comment' ); ?></a></li>
                                            
                                            </ul>
                                        
                                        </div>

                                        <div class="share-this">
                                        
                                            <p><?php _e('Share this on:','takeaway'); ?></p>

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

                                        <?php the_content( ); ?>

                                        <?php if (get_post_meta( $post->ID, '_ingrediant_meta_box_checkbox', true ) != -1) {?> <p>
                                            
                                            <strong><?php _e('Ingredient:','takeaway'); ?></strong>

                                            <?php $takeaway_ingredient = get_post_meta( $post->ID, '_ingrediant_meta_box_ingrediant', true ); ?>
                                        
                                            <?php echo esc_attr( $takeaway_ingredient ); ?></p>
                                        
                                        <?php  }   ?>

                                        <div class="tag">

                                            <ul class="list-inline"> 
            
                                                <li>
                        
                                                    <?php the_tags(' ','    ',' '); ?>
                                
                                                </li>
                                    
                                            </ul>
                                    
                                        </div>

                                        <?php comments_template( '', true ); ?>

                                    </div>

                                </div> 
                    
                            </div> 
                    
                        </div> 
           
                        <div class="col-md-4">
            
                            <div class="events-side-panel">
                
                                <?php get_sidebar(); ?>
    
                            </div>
        
                        </div> 
                
                    </div> 
                
                </div> 
    
            </div> 
    
        </div> 
    
    <?php get_footer( ); ?>