

    <div <?php post_class("blog-list");?> id="post-<?php the_ID();?>">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <div class="blog-list-img">
            <?php 

              if (has_post_thumbnail()) { 
                   $image_id =  get_post_thumbnail_id( get_the_ID() );
                   $large_image = wp_get_attachment_image_src( $image_id ,'huge');  
                   echo ' <img class="" src="'. esc_url($large_image[0]) .'" alt="blog-list-img">';

              }else { ?>
                      
                    <img src=" <?php echo esc_url( UOU_IMG .'/no-image-big.jpg' ); ?> ">

                    <?php }?>               
          </div>
        </div>

        <div class="col-md-8 col-sm-8">
          <h5><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h5>
            <ul class="list-inline">
              <li class="place">
                <i class="fa fa-user"></i>
                <span class="bl-sort">by</span><?php the_author_posts_link();?>
              </li>

              <li class="date">
                <i class="fa fa-clock-o"></i><?php the_time(get_option('date_format')); ?> at<?php the_time(get_option('time_format')); ?>
              </li>
            </ul>
            <div class="bl-sort">
                <?php 
                
                the_excerpt();
               
                 ?> 
            </div>
            <div class="tag-list">
              <p><i class="fa fa-folder-open"></i>

              <?php the_category(',&nbsp; '); ?>

              </p>
            </div>
        </div>
        
      </div>
    </div>
  
  

