<?php get_header(); ?>

        <div class="page-content">
        
            <div class="news-events-blog">
    
                <div class="container">
    
                    <div class="row">

                        <div class="col-md-8">

                            <?php while ( have_posts() ) : the_post(); ?>

                                <div id= "post-<?php the_ID();?>" <?php post_class("blog-post"); ?>>
                            
                                    <div class="row">
                                        
                                        <div class="col-md-12 col-sm-12">
                                            <?php if( has_post_thumbnail()) : ?>

                                                <div class="blog-post-img">

                                                    <?php 

                                                         $image_id =  get_post_thumbnail_id( get_the_ID() );
                                                         $large_image = wp_get_attachment_image_src( $image_id ,'full');  

                                                    ?>

                                                        <img src="<?php echo esc_attr($large_image[0]); ?>" alt="image">


                                                </div>

                                            <?php endif; ?>
            
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            
                                            <div class="about-author">
                                            
                                                <ul class="list-inline">
                                            
                                                    <li class="place"><i class="fa fa-user"></i>
                                                        
                                                        <span class="bl-sort"><?php _e('by', 'takeaway' ); ?></span><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a>
                                                    
                                                    </li>
                                                
                                                    <li class="date"><i class="fa fa-clock-o"></i><?php the_time(get_option('date_format'));?> <?php _e('at', 'takeaway'); ?><?php the_time(get_option('time_format'));?></li>
                                                
                                                   
                                                    
                                               
                                                    
                                                        <li><i class="fa fa-folder-open"></i> <?php the_category(',&nbsp; '); ?></li>  
                                                        
                                                        

                                       
                                                
                                                    <li><i class="fa fa-comment"></i><a href="#"><?php  comments_number(__('No comment','takeaway'), __('One comment','takeaway'), __('Comments (%)','takeaway') ); ?></a></li>
                                                
                                                </ul>
                                         
                                            </div>
                                            <!-- end .about author -->

                                            <div class="share-this">
                                            
                                                <p><?php _e('Share this on:','takeaway'); ?></p>
                                                
                                                <ul class="list-inline">
                                                    
                                                    <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                                    
                                                    <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                                    
                                                    <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                                    
                                                    <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                                    
                                                </ul>
                                                <!-- end ul -->
                                            
                                            </div>
                                            <!-- end .share-this -->

                                            <?php the_content( ); ?>

                                            <div class="tag">
                                                
                                                <ul class="list-inline">
                                                
                                                    <li><?php the_tags( ' ', ' ', '' ); ?></li>
                                                
                                                </ul>
                                            
                                            </div>


                                            <?php comments_template( '', true ); ?>

                                        </div>
                               
                                    </div>

                                </div>
                            
                            <?php endwhile; ?>
    
                        </div>
                        <!-- end .col-md-8 -->


                        <div class="col-md-4">
                            
                            <div class="blog-side-panel">

                                <?php get_sidebar(); ?>
                          
                            </div>
                            <!-- end .events-side-panel -->
                        </div>
                        <!-- end .col-md-4 -->
                    </div>
                    <!-- end .row -->
                </div>
                <!-- end .container -->
            </div>
            <!-- end .news-events -->
        </div>
        <!-- end page-content -->
    <?php get_footer(); 
