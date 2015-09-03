<?php
if (isset($post)) {
    global $post;
    setup_postdata($post);
}

global $takeaway_option_data;
global $woocommerce;
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>

    <head>

        <meta charset="<?php bloginfo('charset') ?>">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- <title>Home-TakeAway</title> -->

        <title> <?php wp_title(('|'), true, 'right'); ?> </title>

        <!-- Stylesheets -->

        <link rel="stylesheet" type="text/css" href=" <?php bloginfo('stylesheet_url'); ?>">


        <!-- favicon starts here -->
        <?php if (isset($takeaway_option_data['takeaway-favicon']['url']) && !empty($takeaway_option_data['takeaway-favicon']['url'])): ?>

            <link rel="shortcut icon" href="<?php echo esc_url($takeaway_option_data['takeaway-favicon']['url']); ?>" type="image/x-icon" />

        <?php endif; ?>

        <?php if (isset($takeaway_option_data['takeaway-favicon-iphone']['url']) && !empty($takeaway_option_data['takeaway-favicon-iphone']['url'])): ?>
            <!-- For iPhone -->

            <link rel="apple-touch-icon-precomposed" href="<?php echo esc_url($takeaway_option_data['takeaway-favicon-iphone']['url']); ?>">

        <?php endif; ?>

        <?php if (isset($takeaway_option_data['takeaway-favicon-ipad']['url']) && !empty($takeaway_option_data['takeaway-favicon-ipad']['url'])): ?>

            <!-- For iPad -->

            <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo esc_url($takeaway_option_data['takeaway-favicon-ipad']['url']); ?>">

        <?php endif; ?>

        <!-- favicon ends -->

        <?php if (is_singular()) wp_enqueue_script("comment-reply"); ?>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>> 
        <div id="main-wrapper">
            <header id="header">
                <div class="header-top-bar">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 col-sm-9 col-xs-7">
                                <?php include(locate_template('login.php')); ?>
                                <!-- end .header-login -->
                                <!-- Header Social -->
                                <ul class="header-social">
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
                            </div>
                            <?php if (!is_page_template('atmf-search.php') || (get_post_meta($post->ID, '_atmf_meta_box_show_mega_call', true) == -1)) { ?>
                                <div class="col-md-5 col-sm-3 col-xs-6 hide-contentresponsive">
                                    <p class="call-us">
                                        <?php if (isset($takeaway_option_data['takeaway-phone']) && !empty($takeaway_option_data['takeaway-phone'])) : ?>
                                            <?php _e('Call Us:', 'takeaway'); ?> <a class="font" href="#"><?php echo esc_attr($takeaway_option_data['takeaway-phone']); ?></a>
                                        <?php endif; ?>
                                        <?php
                                        $time1 = date("H:i", strtotime($takeaway_option_data['takeaway-avability']));
                                        $time2 = date("H:i", strtotime($takeaway_option_data['closes-at']));
                                        $hour = date('H:i', current_time('timestamp', 0));

                                        if ($time2 < $time1) {
                                            if ($hour < $time2 && $hour < $time1) {
                                                $hour = $hour + 24;
                                            }
                                            $time2 = $time2 + 24;
                                        }
                                        if ($hour > $time1 && $hour < $time2) :
                                            ?>
                                            <span id= "hello1"><?php $time1 ?></span>
                                            <span id= "hello2"><?php $time2 ?></span>
                                            <span id= "hello3"><?php $hour ?></span>
                                            <span class="open-now"><i class="fa fa-check-square"></i><?php _e('We are open now', 'takeaway'); ?>(<?php echo esc_attr($takeaway_option_data['takeaway-avability']); ?>-<?php echo esc_attr($takeaway_option_data['closes-at']); ?>)</span>
                                        <?php else : ?>
                                            <span class="close-now"><i class="fa fa-square"></i><?php _e('We are close now', 'takeaway'); ?></span>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            <?php } ?>
                            <?php if ($takeaway_option_data['takeaway-minicart-switch'] == 1) : ?>
                                <div class="col-md-2 col-sm-3 col-xs-5 pull-right">
                                    <span class="cart-contents pull-right"  title="<?php _e('View your shopping cart', 'takeaway'); ?>">
                                        <?php //echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> 
                                        <?php _e('Cart ', 'takeaway'); ?>
                                        <?php if (class_exists('Woocommerce')) : ?>
                                            <?php //$takeaway_total = $woocommerce->cart->get_cart_total();  ?>
                                            <?php //_e($takeaway_total, 'takeaway'); ?>
                                        <?php endif; ?>
                                    </span>
                                    <div id="mini-cart"></div>
                                </div>
                            <?php endif; ?>
                        </div> <!-- end .row --> 
                    </div> <!-- end .container -->
                </div>   <!-- end .header-top-bar -->
                <div class="header-nav-bar">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">
                                    <?php if (isset($takeaway_option_data['logo']['url']) && !empty($takeaway_option_data['logo']['url'])) : ?>
                                        <img src="<?php echo esc_url($takeaway_option_data['logo']['url']); ?>" alt="TakeAway">
                                    <?php else : ?>
                                        <img src="<?php echo esc_url(UOU_IMG . '/header-logo.png'); ?>" alt="TakeAway">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <?php
                            $defaults = array(
                                'theme_location' => 'top-menu',
                                'menu' => '',
                                'container' => 'div',
                                'container_class' => 'collapse navbar-collapse',
                                'container_id' => 'bs-example-navbar-collapse-1',
                                'menu_class' => 'nav navbar-nav navbar-right',
                                'menu_id' => '',
                                'echo' => true,
                                'before' => '',
                                'after' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'depth' => 0,
                                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                'walker' => new wp_bootstrap_navwalker()
                            );
                            wp_nav_menu($defaults);
                            ?>
                        </div>
                    </nav>
                </div>
                <!-- small menu section -->
                <!--div class="small-menu">
                    <div class="container">
                        <ul class="list-unstyled list-inline">
                            <?php takeaway_breadcrumbs(); ?>
                        </ul>
                    </div>
                </div-->
            </header>

