    <?php get_header(); ?>

        <div class="page-content">
            
            <div class="heading">
        
                <h1><?php  _e('Blog Page', 'takeaway'); ?></h1>
            
            </div><!-- end .heading -->
        
            <div class="news-events-blog">
            
                <div class="container">
                    
                    <div class="row">
                    
                        <div class="col-md-8 col-sm-12 col-xs-12">
                          <?php if(have_posts()): while(have_posts()): the_post(); ?>

                            <?php get_template_part('framework/content', get_post_format( )); ?>
                            <?php endwhile; endif; ?>

                              <?php wp_link_pages(); ?>
                                <?php takeaway_wpc_pagination(); ?>
                            
                             
                        </div>

                        <div class="col-md-4 col-sm-12 col-xs-12">
                    
                            <div class="blog-side-panel"><!-- side bar area, add a widget -->
        
                                <?php get_sidebar(); ?>

                                <hr>

                            </div><!-- end .events-side-panel -->

                        </div><!-- end .row -->
        
                    </div><!-- end .container -->
        
                </div><!-- end .news-events -->
        
            </div><!-- end ,page-content --> 
        
        </div>
        


    <?php get_footer( ); ?>
