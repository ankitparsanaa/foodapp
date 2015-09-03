  <?php get_header(); ?>

    <div class="page-content">

      <div class="heading">

        <?php if(have_posts()) { ?>

          <h1 class="archive-title">

              <?php

                printf( __( 'Category Archive : %s', 'takeaway' ), '<span>' . single_cat_title( '', false ) . '</span>' );
               
              ?>
              
          </h1>
          
      </div>
      <!-- end .heading -->

      <div class="news-events-blog">

        <div class="container">

          <div class="row">
  
            <div class="col-md-8 col-sm-12 col-xs-12">
  
              <?php while(have_posts()): the_post(); ?>
    
                <div id= "post-<?php the_ID();?>" <?php post_class("blog-list"); ?>>
  
                  <div class="row">
  
                    <div class="col-md-4 col-sm-4">
  
                      <div class="blog-list-img">
  
                        <?php 
                            if (has_post_thumbnail()) :

                                $image_id =  get_post_thumbnail_id( get_the_ID() );
                                $large_image = wp_get_attachment_image_src( $image_id ,'huge');  ?>
                                
                                <img src="<?php echo esc_url( $large_image[0] ); ?>" alt="img">

                                <?php
                           
                              else : echo esc_url('<img src="http://placehold.it/400x400">');
                                    
                            endif;     
                            
                        ?>               

                      </div>
                    
                    </div>

                    <div class="col-md-8 col-sm-8">
                      
                      <h5><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h5>

                      <ul class="list-inline">
            
                        <li class="place"><i class="fa fa-user"></i><span class="bl-sort"><?php _e('by', 'takeaway') ?></span><?php the_author_posts_link();?></li>
            
                        <li class="date"><i class="fa fa-clock-o"></i><?php the_time(get_option('date_format')); ?> <?php _e('at', 'takeaway'); ?><?php the_time(get_option('time_format')); ?></li>
            
                      </ul>

                      <div class="bl-sort">
                        <?php 

                          the_excerpt(); 

                        ?> 

                      </div>

                      <div class="tag-list">

                        <p><i class="fa fa-folder-open"></i>

                          <?php the_tags( ' ', ' , ', '' ); ?>

                        </p>

                      </div>
  
                    </div>

                  </div>
  
                </div>              
  
                <?php endwhile;  ?>

                  <?php wp_link_pages(); ?>


                <?php takeaway_wpc_pagination(); } ?>


              </div>

              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="blog-side-panel">
                  <!-- side bar area, add a widget -->

                  <?php get_sidebar(); ?>

                  <hr>

                </div>
              <!-- end .events-side-panel -->
              </div>
            <!-- end .row -->
            </div>
          <!-- end .container -->
          </div>
        <!-- end .news-events -->
        </div> 
      <!-- end ,page-content -->
      </div>
    <!-- </div> -->

  <?php get_footer( ); ?>
