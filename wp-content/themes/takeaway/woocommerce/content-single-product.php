

<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

global $product, $woocommerce_loop;


if (is_product()) {
    add_filter('wc_product_sku_enabled', '__return_false');
}
// print_r($product);
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div id="page-content">
        <div class="container">
            <div class="row mt30">
                <div class="col-md-12">
                    <?php
                    /**
                     * woocommerce_before_single_product hook
                     *
                     * @hooked wc_print_notices - 10
                     */
                    do_action('woocommerce_before_single_product');

                    if (post_password_required()) {
                        echo get_the_password_form();
                        return;
                    }
                    ?>
                    <div class="all-menu-details">
                        <!-- <h5>Daily Menu</h5> -->
                        <div class="single-menu">
                            <div class="list-image">
                                <img class="a-cat-tag" src="<?php get_stylesheet_directory_uri(); ?>/wp-content/uploads/img/veg-tag.png">
                                <?php
                                /**
                                  it is showing the image
                                 * woocommerce_before_single_product_summary hook
                                 *
                                 * @hooked woocommerce_show_product_sale_flash - 10
                                 * @hooked woocommerce_show_product_images - 20
                                 */
                                do_action('woocommerce_before_single_product_summary');
                                ?>                    </div>
                            <div class="all-details">
                                <div class="visible-option">
                                    <div class="details">
                                        <h6><?php the_title(); ?></h6>       
                                        <ul class="share-this list-inline text-right">
                                            <li><a href="#">Share</a>
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
                                            </li>
                                        </ul>
                                        <?php the_content(); ?>
                                        <?php //woocommerce_template_single_add_to_cart()  ?>
                                    </div> 
                                    <?php global $woocommerce, $product, $post; ?>
                                    <?php //print_r($available_variations); ?>
                                    <?php
                                    $class_price = '';
                                    $class_product = '';
                                    ?>
                                    <?php if ($product->product_type == 'simple') { ?>
                                        <?php
                                        $class_price = 'simple-price';
                                        $class_product = 'simple-product';
                                    } else {
                                        if ($product->product_type == 'food') {
                                            $class_price = 'food-price';
                                            $class_product = 'food-product';
                                        }
                                    }
                                    ?>
                                    <div class="price-option <?php echo $class_price; ?>">
                                        <?php $takeaway_main_price = get_post_meta($post->ID, '_price_for_grouped_product_grp_product_price', true); ?>
                                        <h4><?php
                                            if ($product->product_type == 'food') {
                                                if ($takeaway_main_price != null) :
                                                    echo get_woocommerce_currency_symbol() . esc_attr($takeaway_main_price);
                                                endif;
                                            } else {
                                                echo $product->get_price_html();
                                            }
                                            ?></h4>
                                        <?php if ($product->product_type != 'simple') : ?>
                                            <button id="single-product-toggle" class="toggle"><?php _e('Option', 'takeaway'); ?></button>
                                        <?php endif; ?>
                                    </div>
                                    <!-- end .price-option-->
                                    <div class="qty-cart variable-product text-center clearfix <?php echo $class_product; ?>">
                                        <?php if ($product->product_type != 'variable' && $product->product_type != 'grouped') { ?>
                                            <h6>Qty</h6>
                                        <?php } ?>
                                        <?php //_log($product->product_type);    ?>
                                        <form class="cart" method="post" enctype='multipart/form-data'>
                                            <?php do_action('woocommerce_before_add_to_cart_button'); ?>
                                            <?php
                                            if ($product->product_type != 'variable' && $product->product_type != 'grouped') {
                                                if (!$product->is_sold_individually())
                                                    woocommerce_quantity_input(array(
                                                        'min_value' => apply_filters('woocommerce_quantity_input_min', 1, $product),
                                                        'max_value' => apply_filters('woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product)
                                                    ));
                                            }
                                            ?>
                                            <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->id); ?>" />
                                            <?php if ($product->product_type != 'variable' && $product->product_type != 'grouped') { ?>
                                                <button type="submit" class="single_add_to_cart_button button alt"><i class="fa fa-shopping-cart"></i></button>
                                            <?php } //do_action( 'woocommerce_after_add_to_cart_button' );    ?>
                                        </form>
                                    </div>
                                </div> <!-- end .visible option -->
                                <!-- end .qty-cart -->
                                <?php //echo $product->product_type;  ?>
                                <?php if ($product->product_type != 'simple') : ?>
                                    <div class="dropdown-option clearfix">
                                        <div class="dropdown-details">
                                            <?php
                                            /**
                                              it is showing the title
                                             * woocommerce_single_product_summary hook
                                             *
                                             * @hooked woocommerce_template_single_title - 5
                                             * @hooked woocommerce_template_single_rating - 10
                                             * @hooked woocommerce_template_single_price - 10
                                             * @hooked woocommerce_template_single_excerpt - 20
                                             * @hooked woocommerce_template_single_add_to_cart - 30
                                             * @hooked woocommerce_template_single_meta - 40
                                             * @hooked woocommerce_template_single_sharing - 50
                                             */
                                            do_action('woocommerce_single_product_summary');
                                            ?>
                                        </div>
                                        <!--end .dropdown-details-->
                                    </div>
                                    <!--end .dropdown-option-->
                                <?php endif; ?>
                            </div> <!-- end all-details -->
                        </div> <!-- end .all-menu-details -->
                    </div>
                    <!--end main-grid layout-->
                </div>
                <!-- end .row -->
            </div>
            <!--end .container -->
        </div> <!-- end .page-content -->
        <?php
        global $post;
        $meta = get_post_custom($post->ID);
// print_r($meta);
        ?>
        <div class="summary entry-summary"></div><!-- .summary -->
        <?php
        /**
          it is showing the tab description
         * woocommerce_after_single_product_summary hook
         *
         * @hooked woocommerce_output_product_data_tabs - 10
         * @hooked woocommerce_output_related_products - 20
         */
        //do_action( 'woocommerce_after_single_product_summary' );
        ?>
        <meta itemprop="url" content="<?php the_permalink(); ?>" />
    </div><!-- #product- -->
    <?php do_action('woocommerce_after_single_product'); ?>