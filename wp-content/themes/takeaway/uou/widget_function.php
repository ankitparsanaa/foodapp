<?php

/**

  category widget class

**/


class takeaway_Categories extends WP_Widget {

    function __construct() {
        $widget_ops = array( 'classname' => 'takeaway_categories', 'description' => __( "Styled list or dropdown of categories.",'takeaway'  ) );
        parent::__construct('takeaway_categories', __('takeaway Categories','takeaway' ), $widget_ops);
    }

    function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters('widget_title', empty( $instance['title'] ) ? __( 'takeaway_Categories','takeaway'  ) : $instance['title'], $instance, $this->id_base);
        $c = ! empty( $instance['count'] ) ? '1' : '0';
        $h = ! empty( $instance['hierarchical'] ) ? '1' : '0';
        $d = ! empty( $instance['dropdown'] ) ? '1' : '0';

                ?>    

          <div class="categories">
          <?php if ( $title ) echo '<h4>' . $title . '</h4>'; ?>
   

          
            <?php
            
                $cat_args = array(
                    'orderby' => 'name',
                    'show_count' => $c,
                    'hierarchical' => $h,
                    'hide_if_empty' => true,


                );

                    if ( $d ) {
                    $cat_args['show_option_none'] = __('Select Category','takeaway' );
                    wp_dropdown_categories(apply_filters('widget_categories_dropdown_args', $cat_args));
                   
             ?>

                    <script type='text/javascript'>
                        /* <![CDATA[ */
                        var dropdown = document.getElementById("cat");
                        function onCatChange() {
                            if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
                                location.href = "<?php echo home_url(); ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
                            }
                        }
                        dropdown.onchange = onCatChange;
                        /* ]]> */
                    </script>

                <?php
                } else {
                    ?>
                    <ul class="list-unstyled">
                        <?php
                        $cat_args['title_li'] = '';
                        wp_list_categories(apply_filters('widget_categories_args', $cat_args));
                        ?>
                    </ul>
                <?php
                }
                ?>
        
         
        
        </div>
       
      
        <?php
       
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['count'] = !empty($new_instance['count']) ? 1 : 0;
        $instance['hierarchical'] = !empty($new_instance['hierarchical']) ? 1 : 0;
        $instance['dropdown'] = !empty($new_instance['dropdown']) ? 1 : 0;

        return $instance;
    }

    function form( $instance ) {
        //Defaults
        $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
        $title = esc_attr( $instance['title'] );
        $count = isset($instance['count']) ? (bool) $instance['count'] :false;
        $hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
        $dropdown = isset( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : false;
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:','takeaway' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>"<?php checked( $dropdown ); ?> />
            <label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e( 'Display as dropdown','takeaway'  ); ?></label><br />

            <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked( $count ); ?> />
            <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e( 'Show post counts','takeaway'  ); ?></label><br />

            <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hierarchical','takeaway' ); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>"<?php checked( $hierarchical ); ?> />
            <label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php _e( 'Show hierarchy','takeaway'  ); ?></label></p>
    <?php
    }

}

add_action('widgets_init', 'takeaway_categories');

function takeaway_categories(){
    register_widget('takeaway_Categories');
}


/**
search widget
*/


class takeaway_Search extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_search', 'description' => __( 'A search form for your site.', 'takeaway') );
        parent::__construct( 'takeaway_Search', __( 'Takeaway Search', 'takeaway' ), $widget_ops );
    }

    function widget( $args, $instance ) {
        extract($args);

        /** This filter is documented in wp-includes/default-widgets.php */
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        // echo $before_widget;
        if ( $title )
            echo $before_title . $title . $after_title;

    echo '<br><form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
     <div class="search-keyword">
     <input type="text" placeholder="Search" value="' . get_search_query() . '" name="s" id="s" />
     <button type="submit" value=""><i class="fa fa-search"></i></button> 
     </div>
     </form>
     <br>';



        // Use current theme search form if it exists
        //get_search_form();

        // echo $after_widget;
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
        $title = $instance['title'];
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'takeaway'); ?> 
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" 
        name="<?php echo $this->get_field_name('title'); ?>" type="text" 
        value="<?php echo esc_attr($title); ?>" /></label></p>

<?php
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $new_instance = wp_parse_args((array) $new_instance, array( 'title' => ''));
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

}

add_action('widgets_init', 'takeaway_Search');

function takeaway_Search(){
    register_widget('takeaway_Search');
}


/**
end search widget
*/



function my_search_form( $form ) {
    // $form = "hi";
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div class="search-keyword">
    <input type="text" placeholder="Search" value="' . get_search_query() . '" name="s" id="s" />
    <button type="submit" value=""><i class="fa fa-search"></i></button>
    
    </div>
    </form>
    <br>';
    return $form;
}
add_filter( 'get_search_form', 'my_search_form' );



/**
 
  Recent_Posts widget class

**/
class takeaway_Recent_Posts extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'takeaway_recent_entries', 'description' => __( "takeaway&#8217;s most recent Posts.", 'takeaway') );
        parent::__construct('recent-posts', __('takeaway Recent Posts', 'takeaway'), $widget_ops);
        $this->alt_option_name = 'takeaway_recent_entries';

        add_action( 'save_post', array($this, 'flush_widget_cache') );
        add_action( 'deleted_post', array($this, 'flush_widget_cache') );
        add_action( 'switch_theme', array($this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = array();
        if ( ! $this->is_preview() ) {
            $cache = wp_cache_get( 'widget_recent_posts', 'widget' );
        }

        if ( ! is_array( $cache ) ) {
            $cache = array();
        }

        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'takeaway Recent Posts', 'takeaway' );

        /** This filter is documented in wp-includes/default-widgets.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number )
            $number = 5;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        /**
         * Filter the arguments for the Recent Posts widget.
         *
         * @since 3.4.0
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args An array of arguments used to retrieve the recent posts.
         */
        $r = new WP_Query( array(
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true
        ) );

              

        if ($r->have_posts()) :
?>
 

        <div class="widget">
        <?php if ( $title ) echo '<h5>' . $title . '</h5>'; ?>
        
          
            <?php while ( $r->have_posts() ) : $r->the_post(); ?>
                <div class="blog-latest">
                    <div class="row">

                    <?php if (has_post_thumbnail()) : ?>

                        <?php
                            $thumb_id = get_post_thumbnail_id();
                            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                            $thumb_url = $thumb_url_array[0];
                        ?>

                        <div class="blog-latest-img">
                            <img class="thumb" style="width:80px;height:80px" src="<?php echo esc_attr($thumb_url); ?>" alt="thumb-img">
                        </div>

                        


                    <?php else: ?>
                        <div class="blog-latest-img">
                            <!-- <img src="http://placehold.it/80x80" alt="" class="thumb"> -->
                            <?php echo '<img src=" '. UOU_IMG .'/no-image-big.jpg " alt="" class = "thumb">'; ?>
                        </div>
                  
                    <?php endif; ?>


                    <div class="blog-latest-detail">
                        <h5><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
                        </h5>
                        <p class="bl-sort"><?php
                            $content = get_the_content();
                            $trimmed_content = wp_trim_words( $content, 10 );
                            echo $trimmed_content;
                        ?></p>
                        <a href="<?php the_permalink(); ?>">Read More</a>
                      </div>


               
                <?php if ( $show_date ) : ?>
                    <span class="post-date"><?php the_time(get_option('date_format')); ?></span>
                <?php endif; ?>
                </div>
                </div>
            <?php endwhile; ?>
            
       

       </div>
    
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        if ( ! $this->is_preview() ) {
            $cache[ $args['widget_id'] ] = ob_get_flush();
            wp_cache_set( 'widget_recent_posts', $cache, 'widget' );
        } else {
            ob_end_flush();
        }
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['takeaway_recent_entries']) )
            delete_option('takeaway_recent_entries');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_recent_posts', 'widget');
    }

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'takeaway' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'takeaway' ); ?></label>
        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
        <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?', 'takeaway' ); ?></label></p>
<?php
    }
}



add_action('widgets_init', 'takeaway_recent_posts');

function takeaway_recent_posts(){
    register_widget('takeaway_Recent_Posts');
}

/**

quick link

**/

class takeaway_quick_link extends WP_Widget{


    function __construct() {
        $widget_ops = array( 'description' => __('Add a quick link menu for takeaway.','takeaway') );
        parent::__construct( 'nav_menu', __('Takeaway Quick Link','casa'), $widget_ops );
    }


    function form( $instance ) {


        $title = isset( $instance['title'] ) ? $instance['title'] : '';
        $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

        
        $menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );
// _log($menus);
        
        if ( !$menus ) {
            echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
            return;
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','casa') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" 
            name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:','casa'); ?></label>
            <select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
                <option value="0"><?php _e( '&mdash; Select &mdash;','casa' ) ?></option>
        <?php
            foreach ( $menus as $menu ) {
                _log($menu);
                echo '<option value="' . $menu->term_id . '"'
                    . selected( $nav_menu, $menu->term_id, false )
                    . '>'. esc_html( $menu->name ) . '</option>';
            }
        ?>
            </select>
        </p>
        <?php
    }




    function widget($args, $instance) {
        
    
        $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;



        if ( !$nav_menu )
            return;

        /** This filter is documented in wp-includes/default-widgets.php */
        $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        echo $args['before_widget'];

        if ( !empty($instance['title']) )
            echo $args['before_title'] . $instance['title'] . $args['after_title'];

        $quick_link_item = wp_get_nav_menu_items($nav_menu);
        
        // _log($quick_link_item);
        
        $length = sizeof($quick_link_item);

        ?>

        <div class="widget-content">
            <div class="row">
                
                
                <div class="col-md-12">
                    <ul class="footer-links padd">
                        <?php for($i=0; $i<5; $i++ ){ ?>
                        <li ><a href="<?php echo $quick_link_item[$i]->url; ?>"><?php echo $quick_link_item[$i]->title; ?></a></li>              
                        <?php } ?>
                    </ul>
                </div>
                
        
            </div>
        </div>
        


        
        <?php
        echo $args['after_widget'];
    }



    function update( $new_instance, $old_instance ) {
        $instance['title'] = strip_tags( stripslashes($new_instance['title']) );
        $instance['nav_menu'] = (int) $new_instance['nav_menu'];
        return $instance;
    }


}



function takeaway_register_quick_link(){
    register_widget('takeaway_quick_link');
}

add_action('widgets_init','takeaway_register_quick_link' ); 

