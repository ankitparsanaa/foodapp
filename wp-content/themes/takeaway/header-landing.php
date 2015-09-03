<?php

        if(isset($post) ){
            global $post;
            setup_postdata( $post );
        }

        global $takeaway_option_data;
       

    ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

            <head>

                <meta charset="<?php bloginfo('charset') ?>">
                
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <!-- <title>Home-TakeAway</title> -->
    
                <title> <?php wp_title(('|'),true,'right');?> <?php bloginfo('name'); ?> </title>

                <!-- Stylesheets -->
    
                <link rel="stylesheet" type="text/css" href=" <?php bloginfo('stylesheet_url'); ?>">
    

                <!-- favicon starts here -->
                <?php if(isset($takeaway_option_data['takeaway-favicon']['url']) && !empty($takeaway_option_data['takeaway-favicon']['url'])): ?>
                    
                    <link rel="shortcut icon" href="<?php echo esc_url($takeaway_option_data['takeaway-favicon']['url']); ?>" type="image/x-icon" />
                
                <?php endif; ?>

                <?php if(isset($takeaway_option_data['takeaway-favicon-iphone']['url']) && !empty($takeaway_option_data['takeaway-favicon-iphone']['url'])): ?>
                <!-- For iPhone -->
    
                    <link rel="apple-touch-icon-precomposed" href="<?php echo esc_url($takeaway_option_data['takeaway-favicon-iphone']['url']); ?>">
    
                <?php endif; ?>

                <?php if(isset($takeaway_option_data['takeaway-favicon-ipad']['url']) && !empty($takeaway_option_data['takeaway-favicon-ipad']['url'])): ?>
    
                <!-- For iPad -->
                
                <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo esc_url($takeaway_option_data['takeaway-favicon-ipad']['url']); ?>">
                
                <?php endif; ?>

                <!-- favicon ends -->


                <?php wp_head(); ?>
            </head>