<?php

function takeaway_style(){

    $protocol = is_ssl() ? 'https' : 'http';
    
    wp_enqueue_style( 'takeaway-roboto', "$protocol://fonts.googleapis.com/css?family=Roboto+Slab:400,700" );

    wp_enqueue_style( 'nothing-you-could-do', "$protocol://fonts.googleapis.com/css?family=Nothing+You+Could+Do" );

 


  	wp_register_style('bootstrap', UOU_CSS.'bootstrap.css', array(), $ver = false, $media = 'all');
  	wp_enqueue_style('bootstrap');

  	wp_register_style('owl.carousel', UOU_CSS.'owl.carousel.css', array(), $ver = false, $media = 'all');
  	wp_enqueue_style('owl.carousel');

  	wp_register_style('font-awesome', UOU_CSS.'font-awesome.min.css', array(), $ver = false, $media = 'all');
  	wp_enqueue_style('font-awesome');

  	wp_register_style('owl.theme', UOU_CSS.'owl.theme.css', array(), $ver = false, $media = 'all');
  	wp_enqueue_style('owl.theme');

  	

    wp_register_style('thumb-slide', UOU_CSS.'thumb-slide.css', array(), $ver = false, $media = 'all');
    wp_enqueue_style('thumb-slide');

  	
    
    wp_register_style('uou-style', UOU_CSS.'style.css', array(), $ver = false, $media = 'all');
  	wp_enqueue_style('uou-style');



    wp_register_style('responsive', UOU_CSS.'responsive.css', array(), $ver = false, $media = 'all');
    wp_enqueue_style('responsive');
    

    wp_register_style('masterslider-style', UOU_JS.'masterslider/style/masterslider.css', array(), $ver = false, $media = 'all');
    wp_enqueue_style('masterslider-style');



}

add_action( 'wp_enqueue_scripts','takeaway_style' );