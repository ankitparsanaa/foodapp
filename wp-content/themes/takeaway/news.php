<?php 
/*
Template Name: News 
*/
?>

<?php get_header( ); ?>

        <div class="page-content">
        
            <div class="heading">
                
                <h1><?php the_title( ); ?></h1>
            
            </div>
    
            <!-- end .heading -->
            <div class="news-events-blog">
    
                <div class="container">
                    
                    <div class="row">
                        
                        <div class="col-md-8">
                            <?php 

                                $args = array( 
                                'post_type' => 'news', 
                                'posts_per_page' => -1 
                                );

                                $loop = new WP_Query( $args );

                                while ( $loop->have_posts() ) : $loop->the_post();
                            ?>
                                    <div id= "post-<?php the_ID();?>" <?php post_class("blog-list"); ?>>
                                    
                                        <div class="row">
                                        
                                            <div class="col-md-4 col-sm-4">
                                    
                                                <div class="blog-list-img">
                                                    <?php 
                                                        if (has_post_thumbnail( $loop->post->ID )) { 
                                                        $thumb_id = get_post_thumbnail_id( $loop->post->ID );
                                                        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                                                        $thumb_url = $thumb_url_array[0]; 
                                                    ?>               
                                                    
                                                            <img src= "<?php echo esc_url($thumb_url); ?>" alt= "news-event-image">
                                                        <?php  }?>
                                                
                                                </div>
                                            
                                            </div>
                                    
                                            <div class="col-md-8 col-sm-8">

                                                <h5><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h5>
                                                
                                                <ul class="list-inline">

                                                <?php if (get_post_meta( $post->ID, '_news_meta_box_region', true )!=null && get_post_meta( $post->ID, '_news_meta_box_country', true )!=null) :?>
                                                   

                                                    <li class="place"><i class="fa fa-map-marker"></i>

                                                        <?php 

                                                                $takeaway_region = get_post_meta( $post->ID, '_news_meta_box_region', true ); 
                                                                $takeaway_country =  get_post_meta( $post->ID, '_news_meta_box_country', true );
                                                                
                                                                ?>

                                                        <span class="bl-sort"><?php _e('in', 'takeaway'); ?></span><?php echo esc_attr( $takeaway_region ); ?>, <?php echo  esc_attr( $takeaway_country ); ?>
                                                    
                                                    </li>
                                                <?php endif; ?>
                                                
                                                    <li class="date"><i class="fa fa-calendar"></i><?php the_time(get_option('date_format')); ?> <?php _e('at','takeaway'); ?>
                                                    
                                                        <?php the_time(get_option('time_format')); ?>
                                                    
                                                    </li>
                                                </ul>
                                                
                                                
                                                    <div class="bl-sort">

                                                    <?php 

                                                        the_excerpt();
                                                        
                                                    ?> 
                                                    
                                                    </div>
                                                
                                                <!-- <a href="event-page.html">Read More</a> -->

                                                <?php if (has_tag()) :?>

                                                <div class="tag-list">
                                                    
                                                    <p><i class="fa fa-tag"></i>
                                                        
                                                        <?php the_tags( ' ', ' , ', '' ); ?>
                                                    
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                            
                                            </div>
                                            <!--end .blog-details-->
                                        </div>
                                    <!--end .row-->
                                    </div>

                                <?php endwhile; ?>
                                <!--end .blog-list -->

                            <?php takeaway_wpc_pagination(); ?>

                           
                        </div><!-- end .col-md-8 -->
                            

                        <div class="col-md-4">
                        
                            <div class="events-side-panel">
                        
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
    
    <?php get_footer( ); ?>