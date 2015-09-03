    <?php get_header(); ?>

        <div class="page-content">
    
            <div class="heading">
                
                <?php if(have_posts()):?>
    
                    <h1 class="archive-title">
                        
                        <?php
                    
                            _e( 'Tag Archives For : '.  ucwords(single_tag_title( '', false ))  .' ', 'takeaway' );
                        ?>

                    </h1>
            </div>
            <!-- end .heading -->
            
            <div class="news-events-blog">
            
                <div class="container">
                
                    <div class="row">
                        
                        <div class="col-md-8">
                        
                            <?php while(have_posts()): the_post(); ?>
                                
                                <div id= "post-<?php the_ID();?>" <?php post_class("blog-list"); ?>>
                                
                                    <div class="row">
                                    
                                        <div class="col-md-4 col-sm-4">
                                            
                                            <div class="blog-list-img">
                                                <?php 
                                                    if (has_post_thumbnail()) {
                                                     
                                                         $image_id =  get_post_thumbnail_id( get_the_ID() );
                                                        $large_image = wp_get_attachment_image_src( $image_id ,'huge');  

                                                    echo '<img class="" src=" '. esc_attr($large_image[0]) .' " alt="">';


                                                    }

                                                        else {?> 

                                            <img src=" <?php echo esc_url( UOU_IMG .'/no-image-big.jpg' ); ?> ">


                                                        <?php

                                                        }
                                                ?>               
                                            </div>
                                        
                                        </div>

                                        <div class="col-md-8 col-sm-8">
                
                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h5>
                        
                                            <ul class="list-inline">
                                                
                                                <li class="place"><i class="fa fa-user"></i>
                                                
                                                    <span class="bl-sort"><?php _e('by', 'takeaway'); ?></span><?php the_author_posts_link();?>
                                                
                                                </li>
                                                
                                                <li class="date"><i class="fa fa-clock-o"></i><?php echo esc_attr( the_time(get_option('date_format')) ); ?> <?php _e('at', 'takeaway'); ?><?php echo esc_attr( the_time(get_option('time_format')) ); ?></li>

                                                
                                            </ul>
                            
                                            <div class="bl-sort">
                                                
                                                <?php 
                                                   
                                                   the_excerpt();
                                                
                                                ?> 
                                            
                                            </div>
                                        <?php if (has_tag()) :?>
                                            <div class="tag-list">
                                        
                                                <p><i class="fa fa-folder-open"></i>
                                                
                                                    <?php the_tags( ' ', ' , ', '' ); ?>
                                                
                                                </p>
                                            
                                            </div>
                                        <?php endif; ?>
                                        
                                        </div>
                                    
                                    </div>
                                
                                </div>               

                            <?php endwhile; endif; ?>

                              <?php wp_link_pages(); ?>


                            <?php takeaway_wpc_pagination(); ?>

                        </div>
                        
                        <div class="col-md-4">

                            <div class="blog-side-panel">
                        
                                <?php get_sidebar(); ?>
                                <hr>
                            
                            </div> <!-- end of blog side panel -->
                            
                        </div><!-- end of blog side panel -->
                
                    </div>

                </div>

            </div> 
    
        </div>

    <?php get_footer( ); ?>
