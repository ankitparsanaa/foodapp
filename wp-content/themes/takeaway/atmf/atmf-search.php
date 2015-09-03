<?php
/**
 * Template Name: ATMF Search Page
 *
 * A template used to demonstrate how to include the template
 * using this plugin.
 *
 * @package ATMF
 * @since 	1.0.0
 * @version	1.0.0
 */
get_header();
global $takeaway_option_data;
?>

<?php if (get_post_meta($post->ID, '_atmf_meta_box_show_mega_call', true) != -1) : ?>

    <div class="mega-call-us">
        <div class="container">
            <div class="col-md-4 col-sm-4">
                <div class="call-mega-us ta-center">
                    <i class="fa fa-phone-square"></i>
                    <?php
                    if (isset($takeaway_option_data['takeaway-phone']) && !empty($takeaway_option_data['takeaway-phone'])) :
                        ?>
                        <p><?php _e('Call Us: ', 'takeaway'); ?><?php echo esc_attr($takeaway_option_data['takeaway-phone']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <h2 class="a-menu-title">Our Cuisine</h2>
            </div>
            <?php
            $time1 = date("H", strtotime($takeaway_option_data['takeaway-avability']));
            $time2 = date("H", strtotime($takeaway_option_data['closes-at']));
            $hour = date("H");
            ?>
            <div class="col-md-4 col-sm-4">
                <div class="open-now ta-center">
                    <?php if ($hour > $time1 && $hour < $time2) : ?>
                        <i class="fa fa-check-square"></i>
                        <p><?php _e('We are open now', 'takeaway'); ?> (<?php echo esc_attr($takeaway_option_data['takeaway-avability']); ?>-<?php echo esc_attr($takeaway_option_data['closes-at']); ?>)</p>
                    <?php else : ?>
                        <i class="fa fa-square"></i>
                        <p><?php _e('We are close now', 'takeaway'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>	

<div class="page-content mt30">
    <!--START : DO NOT DELETE THIS BLOCK -->
    <div id="dso" style="display: none;">
        <?php do_action('atmf_hidden_data_show'); ?>
    </div>
    <!--END: DO NOT DELETE THIS BLOCK -->

    <div data-ng-app="atmf" data-ng-cloak>
        <div data-ng-controller="AtmfFrontEnd">
            <div class="container">
                <div class="row">

                    <!-- start of main  -->
                    <div class="col-md-12 col-sm-12 col-xs-12" rel="sidebar">
                        <?php get_search_sidebar(); ?>
                    </div>
                    <!-- end of sidebar  -->
                    <!-- Start of main  -->	
                    <div class="col-md-12 col-sm-12 col-xs-12 mb30" rel="main">
                        <?php get_search_result(); ?>
                    </div>	
                    <!-- end of main  -->

                </div> <!--  end row  -->
            </div><!--   end container  -->
        </div>
    </div>
</div>
<?php
get_footer();




