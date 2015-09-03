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
                
                                            <div class="blog-post-img">

                                                <article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment' ); ?>>
    
                                                    <header class="entry-header">


                                                        <nav id="image-navigation" class="navigation" role="navigation">
                                                        
                                                            <span class="previous-image"><?php previous_image_link( false, __( '&larr; Previous', 'takeaway' ) ); ?></span>
                                                            
                                                            <span class="next-image"><?php next_image_link( false, __( 'Next &rarr;', 'takeaway' ) ); ?></span>
                                                        
                                                        </nav><!-- #image-navigation -->
                        
                                                    </header><!-- .entry-header -->

                                                    <div class="entry-content">

                                                        <div class="entry-attachment">
                                
                                                            <div class="attachment">

                                                                <?php

                                                                    /*
                                                                    * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
                                                                    * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
                                                                    */
                                                                    $attachments = array_values( get_children( array

                                                                                                                    ( 'post_parent' => $post->post_parent, 
                                                                                                                      'post_status' => 'inherit', 
                                                                                                                      'post_type' => 'attachment', 
                                                                                                                      'post_mime_type' => 'image', 
                                                                                                                      'order' => 'ASC', 
                                                                                                                      'orderby' => 'menu_order ID' ) ) );
                                                                    if (isset($attachments) && !empty($attachments)) :
                                                                       

                                                                        foreach ( $attachments as $k => $attachment ) :
                                                                            if ( $attachment->ID == $post->ID )
                                                                            break;
                                                                        endforeach;
                                                                        
                                                                    endif;

                                                                    // If there is more than 1 attachment in a gallery
                                                                    if ( count( $attachments ) > 1 ) :
                                                                        $k++;

                                                                            if ( isset( $attachments[ $k ] ) ) :
                                                                                // get the URL of the next image attachment
                                                                                $next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
                                                                                
                                                                                else :
                                                                                    // or get the URL of the first image attachment
                                                                                    $next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
                                                                            endif;
                                                                    
                                                                        else :
                                                                        // or, if there's only 1 image, get the URL of the image
                                                                        $next_attachment_url = wp_get_attachment_url();
                                                                    endif;
                                                                ?>
                                                                
                                                                <a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
                                                                $attachment_size = apply_filters( 'takeaway_attachment_size', array( 800, 800 ) );
                                                                $takeaway_img = wp_get_attachment_image( $post->ID, $attachment_size );

                                                                echo apply_filters( 'the_content', $takeaway_img );?>
                                                                </a>
                                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>


                                                            </div><!-- .attachment -->

                                                        </div><!-- .entry-attachment -->

                                                    </div><!-- .entry-content -->

                                                </article><!-- #post -->

                                            </div>
    
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                        
                                            <div class="about-author">
                                        
                                                <ul class="list-inline">
                                                    
                                                    <li class="place"><i class="fa fa-user"></i>
                                            
                                                        <span class="bl-sort"><?php _e('by', 'takeaway' ); ?></span><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_attr( get_the_author() ); ?></a>
                                                    
                                                    </li>
                                                    
                                                    <li class="date"><i class="fa fa-clock-o"></i><?php the_time(get_option('date_format')); ?> <?php _e('at', 'takeaway' ); ?> <?php the_time(get_option('time_format')); ?></li>
                                        
                                                    
                                                    
                                                        <li><i class="fa fa-folder-open"></i> <?php the_category(',&nbsp; '); ?> </li>
                                         
                                                    
                                        
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


                                            <?php the_content(); ?>

                                            <div class="tag">
                                                <ul class="list-inline">

                                                    <li><?php the_tags( ' ', ' ', '' ); ?></li>
                                                
                                                </ul>
                                            </div>

                                            <br>
                                            <?php comments_template( '', true ); ?>


                                        </div>
                                    
                                    <!--end grid-layout -->
                                    </div>
                                    
                                    <?php endwhile; ?>
                                    <!--end .row-->
                    
                                </div><!--end .blog-list -->
    
                            </div><!-- end .col-md-8 -->
    
                            <div class="col-md-4">
                            
                                <div class="blog-side-panel">

                                    <?php get_sidebar(); ?>

                                </div><!-- end .events-side-panel -->
                            
                            </div><!-- end .col-md-4 -->
                        
                    </div><!-- end .row -->
    
                </div><!-- end .container -->
    
            </div><!-- end .news-events -->
    
        </div><!-- end page-content -->
    
        <?php get_footer(); ?>
