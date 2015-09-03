<?php get_header(); ?>
<div class="page-content">
    <div class="news-events-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div id= "post-<?php the_ID(); ?>" class = "blog-post" >
                        <div class="row">
                            <?php if (has_post_thumbnail()) { ?>
                                <div class="col-md-12 col-sm-12">
                                    <div class="blog-post-img">
                                        <?php
                                        $image_id = get_post_thumbnail_id(get_the_ID());
                                        $large_image = wp_get_attachment_image_src($image_id, 'huge');
                                        // _log($large_image);
                                        ?>
                                        <img class="" src="<?php echo esc_attr($large_image[0]); ?>" alt="">
                                    </div> 
                                </div>
                            <?php } ?>
                            <div class="col-md-12 col-sm-12">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <div class="about-author">
                                    <ul class="list-inline">
                                        <li class="place"><i class="fa fa-user"></i>
                                            <span class="bl-sort"><?php _e('by', 'takeaway'); ?></span><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_attr(get_the_author()); ?></a>
                                        </li>
                                        <li class="date"><i class="fa fa-clock-o"></i><?php the_time(get_option('date_format')); ?> <?php _e('at', 'takeaway'); ?><?php the_time(get_option('time_format')); ?></li>
                                        <?php //if(has_category()) :  ?>
                                        <li><i class="fa fa-folder-open"></i> <?php the_category(',&nbsp; '); ?></li>  
                                        <?php //endif;  ?>
                                        <li><i class="fa fa-comment"></i><a href="#"><?php comments_number(__('No comment', 'takeaway'), __('One comment', 'takeaway'), __('Comments (%)', 'takeaway')); ?></a></li>
                                    </ul>
                                </div>
                                <!-- end .about author -->
                                <div class="share-this">
                                    <p><?php _e('Share this on:', 'takeaway'); ?></p>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?> "><i class="fa fa-facebook-square"></i></a>
                                        </li>
                                        <li>
                                            <a href="http://twitthis.com/twit?url=<?php the_permalink(); ?>"><i class="fa fa-twitter-square"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus-square"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo urlencode(get_the_title()); ?>"><i class="fa fa-pinterest-square"></i></a>
                                        </li>
                                    </ul>
                                    <!-- end ul -->
                                </div>
                                <!-- end .share-this -->
                                <?php the_content(); ?>
                                <?php wp_link_pages(); ?>
                                <div class="clearfix">
                                    <p class="prev_post pull-left ">
                                        <span class="nav-previous"><?php previous_post_link('%link', '<span class="meta-nav">' . __('&larr;', 'Previous post link', 'takeaway') . '</span> %title'); ?></span>
                                    </p>
                                    <p class="next_post text-right pull-right ">
                                        <span class="nav-next"><?php next_post_link('%link', '%title <span class="meta-nav">' . __('&rarr;', 'Next post link', 'takeaway') . '</span>'); ?></span>
                                    </p>
                                </div>
                                <div class="tag">
                                    <ul class="list-inline">
                                        <li><?php the_tags(' ', ' ', ''); ?></li>
                                    </ul>
                                </div>
                                <br>
                                <?php comments_template('', true); ?>
                            </div>
                            <!--end grid-layout -->
                        </div>
                    </div>
                </div>        
                <div class="col-md-4">
                    <div class="blog-side-panel">
                        <?php get_sidebar(); ?>
                    </div> <!-- end .events-side-panel -->
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
<?php get_footer(); ?>
