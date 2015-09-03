<?php 
/*
Template Name: Team
*/
?>

    <?php get_header( ); ?>

        <div class="page-content">
            
            <div class="heading">
                
                <h1><?php the_title( ); ?></h1>
            
            </div>
            <!-- end .heading -->
            <div class="our-team">
                
                <div class="container">

                    <?php the_content( ); ?>

                        <div class="row">
                           
                            <?php 
                            
                                $args = array( 
                                'post_type' => 'chef', 
                                'posts_per_page' => -1,
                                'order' => 'ASC', 
                                );

                                $loop = new WP_Query( $args );

                                while ( $loop->have_posts() ) : $loop->the_post();
                            ?>
                                
                                    <div class="col-md-4">

                                        <div class="profile-pic">

                                            <?php 
                                                    
                                                $takeaway_team_img = wp_get_attachment_image(get_post_meta($post->ID, '_chef_meta_box_takeaway_preview_image', true),array(360,375));

                                               echo apply_filters( 'the_content', $takeaway_team_img );                                                  
                                                                                                
                                            ?>               
                                            

                                        </div>
                                        
                                        <h5>
                                            <a href="<?php echo esc_url(get_the_permalink()); ?>"> 

                                                <?php 
                                                    
                                                        $name = get_post_meta( $post->ID, '_chef_meta_box_name', true );                                                 

                                                    
                                                        $designation = get_post_meta( $post->ID, '_chef_meta_box_designation', true ); 
                                                 
                                                        if (!empty($name)) {
                                                            echo esc_attr($name);
                                                        }
                                                        if (!empty($designation)){
                                                            echo '-'.esc_attr($designation);
                                                        }
                                                ?>  


                                            </a>
                                        </h5>

                                     
                    
                                        <div class="share-this">
                                        
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
                                    
                                        
                                        
                                            <?php 

                                               the_excerpt();

                                            ?> 

                                        
            
                                    </div>
                
                                <?php endwhile; ?>

                        </div>
                        <!-- end .row -->
                </div>
                <!-- end .container -->
            </div>
            <!-- end .our-team -->
        </div>
        <!-- end page-content -->


    <?php get_footer( ); ?>
