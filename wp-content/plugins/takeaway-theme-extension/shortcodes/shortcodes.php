<?php



function takeaway_fixing($content){

    $block = join("|",array(
                            'list',
                            'item',
                            'tabs',
                            'tab',
                            'progress',
                            'download',
                            'accordion',
                            'aitem',
                            'timeline',
                            'titem',
                            'portfolio',
                            'portfolio_grid',
                            'button',
                            'profile',
                            'video',
                            'row',
                            'column',
                            'one_half',
                            'one_half_last',
                            'one_third',
                            'one_third_last',
                            'two_third',
                            'two_third_last',
                            'one_fourth',
                            'one_fourth_last',
                            'three_fourth',
                            'three_fourth_last',
                            'one_fourth_second',
                            'one_fourth_third',
                            'one_half_second',
                            'one_third_second',
                            'one_column',
                            'name',
                            'heading',
                            'takeaway_buy_theme',
                            ) );

    $result = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
    $result = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$result);

    $Old     = array( '<br />', '<br>' );
    $New     = array( '','' );
    $result = str_replace( $Old, $New, $result );


    return $result;

}

add_filter('the_content', 'takeaway_fixing');
add_filter('the_content', 'do_shortcode', 7);



function xxl_column_shortcode( $atts , $content = null ) {


    extract( shortcode_atts( array(
      "lg"          => false,
      "md"          => false,
      "sm"          => false,
      "xs"          => false,
      "offset_lg"   => false,
      "offset_md"   => false,
      "offset_sm"   => false,
      "offset_xs"   => false,
      "pull_lg"     => false,
      "pull_md"     => false,
      "pull_sm"     => false,
      "pull_xs"     => false,
      "push_lg"     => false,
      "push_md"     => false,
      "push_sm"     => false,
      "push_xs"     => false,
          
    ), $atts ) );

    $class  = '';
    $class .= ( $lg )             ? ' col-lg-' . $lg : '';
    $class .= ( $md )             ? ' col-md-' . $md : '';
    $class .= ( $sm )             ? ' col-sm-' . $sm : '';
    $class .= ( $xs )             ? ' col-xs-' . $xs : '';
    $class .= ( $offset_lg )      ? ' col-lg-offset-' . $offset_lg : '';
    $class .= ( $offset_md )      ? ' col-md-offset-' . $offset_md : '';
    $class .= ( $offset_sm )      ? ' col-sm-offset-' . $offset_sm : '';
    $class .= ( $offset_xs )      ? ' col-xs-offset-' . $offset_xs : '';
    $class .= ( $pull_lg )        ? ' col-lg-pull-' . $pull_lg : '';
    $class .= ( $pull_md )        ? ' col-md-pull-' . $pull_md : '';
    $class .= ( $pull_sm )        ? ' col-sm-pull-' . $pull_sm : '';
    $class .= ( $pull_xs )        ? ' col-xs-pull-' . $pull_xs : '';
    $class .= ( $push_lg )        ? ' col-lg-push-' . $push_lg : '';
    $class .= ( $push_md )        ? ' col-md-push-' . $push_md : '';
    $class .= ( $push_sm )        ? ' col-sm-push-' . $push_sm : '';
    $class .= ( $push_xs )        ? ' col-xs-push-' . $push_xs : '';


    return '<div class="'.$class.'">' . do_shortcode($content) . '</div>';


}


/**
*######################################################################
*#  takeaway testing 
*######################################################################
*/


function hello($atts, $content) {

    extract(shortcode_atts( array(
      'salutation' => !empty($salutation) ? $salutation : 'Mr.', 
      'first_name' => !empty($first_name) ? $first_name : 'mamhmudul',  
      'last_name'  => !empty($last_name) ? $last_name : 'hasan'),  
      $atts));

  $result= $salutation .' '. $first_name. ' '. $last_name;
  return $result;
}

add_shortcode( 'name', 'hello' );




/**
*######################################################################
*#  takeaway heading
*######################################################################
*/



function takeaway_heading($atts){
  if(isset($atts['type'])){
    switch($atts['type']){
      case 'h1':
        return h1($atts);
        break;
      case 'h2':
        return h2($atts);
        break;
      case 'h3':
        return h3($atts);
        break;
       case 'h4':
        return h4($atts);
        break;
       case 'h5':
        return h5($atts);
        break;
    }
  }
  return '';
}

add_shortcode('heading', 'takeaway_heading');


function h1($atts) {
  extract(shortcode_atts(array(
    'content'  => !empty($content) ? $content  : 'Heading',
  ), $atts));

$output = '<h1>';
$output .= $content;
$output .= '</h1>';

return $output;
}


function h2($atts) {
  extract(shortcode_atts(array(
    'content'  => !empty($content) ? $content  : 'Heading',
  ), $atts));

$output = '<h2>';
$output .= $content;
$output .= '</h2>';

return $output;}

function h3($atts) {
  extract(shortcode_atts(array(
    'content'  => !empty($content) ? $content  : 'Heading',
  ), $atts));

$output = '<h3>';
$output .= $content;
$output .= '</h3>';

return $output;
}

function h4($atts) {
  extract(shortcode_atts(array(
    'content'  => !empty($content) ? $content  : 'Heading',
  ), $atts));

$output = '<h4>';
$output .= $content;
$output .= '</h4>';

return $output;
}

function h5($atts) {
  extract(shortcode_atts(array(
    'content'  => !empty($content) ? $content  : 'Heading',
  ), $atts));

$output = '<h5>';
$output .= $content;
$output .= '</h5>';

return $output;
}





/**
*######################################################################
*#  1. takeaway buy theme
*######################################################################
*/


function takeaway_buy_theme( $atts, $content ){
  $atts = shortcode_atts(
    array(
      'image'       =>  !empty($image) ? $image : 'call-to-action-icon1.png',
      'title'       =>  !empty($title) ? $title : 'Purchase Takeaway',
      'content'     =>  !empty($content) ? $content : 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi..',
      'read_more'     =>  !empty($read_more) ? $read_more : 'xyz.com',
      'purchase_now'    =>  !empty($purchase_now) ? $purchase_now : 'xyz.com',

      
    ), $atts
  );

  extract($atts);

  $image_url = UOU_IMG . '/content/'.$image;
  


  $output  =  '<div class="call-to-action-section">';
  $output.=   '<div class="css-table-cell">';
  $output.=   '<div class="icon">';
  $output.=    '<img src=" ' . $image_url . ' " alt="">';
  $output.=      '</div>';
  $output.=      '</div>';
  $output.=   '<div class="text css-table">';
  $output.=   '<div class="css-table-cell">';
  $output.=    '<h4>'.$title.'</h4>';
  $output.=            '<p>' . $content . '</p>';
  $output.=          '</div>';
  $output.=          '<div class="css-table-cell">';
  $output.=            '<a href=" ' . $read_more . ' " class="btn btn-default-red pad-bottom"><i class="fa fa-file-text-o"></i>Read  More</a>';
  $output.=        '</div>';
  $output.=          '<div class="css-table-cell">';
  $output.=            '<a href=" '. $purchase_now .' " class="btn btn-default-red-inverse pad-top"><i class="fa fa-shopping-cart"></i>Purchase Now!</a>';
  $output.=        '</div>';
  $output.=      '</div>';
  $output.=    '</div>';

  return $output;

}
add_shortcode( 'buy_theme', 'takeaway_buy_theme' );


/**
*######################################################################
*#  2. takeaway one half
*######################################################################
*/

function takeaway_theme_one_half($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-6 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . '  one-half">';
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('one_half', 'takeaway_theme_one_half');





/**
*######################################################################
*#  3. list item 
*######################################################################
*/


// Add Shortcode
function takeaway_list_shortcode( $atts , $content = null ) {

  // Attributes
  $atts = extract( shortcode_atts(
    array(
      'type' => 'check',
    ), $atts )
  );

  if( $type == 'check'){
    $class = "b-check-list";
  }
  else{
    $class = " ";
  }


  if ($type == "number"){
    return '<ol>'. do_shortcode($content) . '</ol>';
  }


  return '<ul class="'.$class.'">'. do_shortcode($content) . '</ul>';

}
add_shortcode( 'list', 'takeaway_list_shortcode' );





function xxl_li_item_shortcode( $atts , $content = null ) {
  $atts = extract( shortcode_atts( array( 'default'=>'values' ),$atts ) );

  return '<li>'.do_shortcode($content).'</li>';
}
add_shortcode( 'item','xxl_li_item_shortcode' );



/**
*######################################################################
*#  4. Tabs
*######################################################################
*/


$tabs_divs = '';

function takeaway_tabs_group_shortcode($atts, $content = null ) {
    global $tabs_divs;

    extract(shortcode_atts(array(          
       'type' => 'top',
       'id'=>'',
       'active'=>false
    ), $atts)); 

  $class= '';
  if($type == 'vertical'){
    $class= ' m-type-vertical';
  }

  if(empty($id))
        $id = 'dummy-tab-'.rand(100,999);

  $var = '';
  if ($active == 'true') {
    $var = 'in active';
  }

    $tabs_divs = '';



    $output = '<ul class="nav nav-tabs mt30" role="tablist"';
    $output.='>'.do_shortcode($content).'</ul>';
    $output.= '<div class="tab-content">'.$tabs_divs.'</div>';


    return $output;  
}  


function takeaway_tab_shortcode($atts, $content = null) {  
    global $tabs_divs;

    extract(shortcode_atts(array(  
        'id' => '',
        'title' => '', 
        'active' => false
    ), $atts));  

    $class= '';
    if($active == 'true'){
      $class = ' in active';
    }


    if(empty($id))
        $id = 'tab-'.rand(100,999);

    $output = '<li class="'.$class.'">
            <a href="#'.$id.'" role="tab" data-toggle="tab">'.$title.'</a>
        </li>';

    $tabs_divs.= '<div class="tab-pane fade '.$class.'" id="'.$id.'">'.$content.'</div>';

    return $output;
}

add_shortcode('tabs', 'takeaway_tabs_group_shortcode');
add_shortcode('tab', 'takeaway_tab_shortcode');



/**
*######################################################################
*#  blog post
*######################################################################
*/

function takeaway_post( $atts, $content ){
  $atts = shortcode_atts(
    array(
      'id'      =>  '',
      
    ), $atts
  );

  extract($atts);


  $args = array (
    'post_type' => 'post',
    'post__in' => array($id),
  );

 $post_array = get_posts($args);
 

 if(isset($post_array) && sizeof($post_array) != null) {
 $thumb_url= 'http://placehold.it/400x400';

  if (has_post_thumbnail( $post_array['0']->ID )) { 

  $thumb_id = get_post_thumbnail_id( $post_array['0']->ID );
  $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
  $thumb_url = $thumb_url_array[0];
  }

  
    
$content = $post_array['0']->post_content ;
$trimmed_content = wp_trim_words( $content, 10) ;

  $output =  '<div class="col-md-6 col-sm-6 col-xs-12">';
  $output.=  '<div class="latest-from-blog">';
  $output.=  '<div class="blog-latest">';
  $output.=   '<div class="row">';
  $output.=   '<div class="col-md-6 col-sm-12">';
  $output.=   '<img class="" src="'. $thumb_url. '" alt="blog-image">';
  $output.=   '</div>';
  $output.=   '<div class="col-md-6 col-sm-12">';
  $output.=   '<h5><a href="' . $post_array['0']->guid . '"> ' . $post_array['0']->post_title . '</a>';
  $output.=   '</h5>';
  $output.=   '<p><i class="fa fa-clock-o"></i>';         
  $output.=   '<span class="date">' . $post_array['0']->post_date . '</span> '. '';
  $output.=   '</p>';
  $output.=   '<p class="bl-sort">' .  $trimmed_content .'</p>';                     
  $output.=   '<a href="' . $post_array['0']->guid . '" class="btn btn-default-red"><i class="fa fa-file-text-o"></i> Read  More</a>';
  $output.=   '</div>';
  $output.=   '</div>';
  $output.=   '</div>';
  $output.=   '</div>';
  $output.=   '</div>';
  


  // return print_r($post_array);
  return $output;

}else { return   "No post is associated with this ID, please enter a valid one....";}

}


add_shortcode( 'blog_post', 'takeaway_post' );


/**
*######################################################################
*#  progress
*######################################################################
*/




function takeaway_progress_shortcode( $atts ) {
  $atts = extract( shortcode_atts( array( 'score'=>'60', 'title'=>'', 'type'=>'' ,'text' => '' ),$atts ) );

  $class = '';
  $button = '';
  $innertext ='';
  $output = '';

  if($type == 'two'){
    $class = " m-type-2";
    $button = '<button class="b-button e-toggle"><i class="fa fa-plus"></i></button>';
    $innertext = '<p class="e-progress-bar-text" style="display: none;">'.$text.'</p>';
  }elseif( $type == 'three'){
    $class = " m-type-3";
  }

  if ($type == 'four'){
    $output.='<div class="b-radial-progress-bar" data-percentage="'.$score.'">';
    $output.='<h4 class="e-radial-progress-bar-label">'.$title.'</h4></div>';

  }else{

  
  $output.= '<div class="b-progress-bar '.$class.'" data-percentage="'.$score.'">';
  $output.= $button;
  $output.= '<h5 class="e-progress-bar-title">'.$title.'</h5>';
  $output.= '<div class="e-progress-bar-inner"><span style="width: '.$score.'%;"></span></div>';
  $output.= $innertext;
  $output.= '</div>';

  }


    // Add this code
    $output = preg_replace( '%<p>&nbsp;\s*</p>%', '', $output ); // Remove all instances of "<p>&nbsp;</p>" to avoid extra lines.
    $Old     = array( '<br />', '<br>' );
    $New     = array( '','' );
    $output = str_replace( $Old, $New, $output );




  return $output;


}
add_shortcode( 'progress','takeaway_progress_shortcode' );







/**
*######################################################################
*#  download
*######################################################################
*/





function takeaway_download_shortcode( $atts ) {
  $atts = extract( shortcode_atts( array( 'title'=>'', 'description'=>'', 'extension'=>'', 'default'=>'values' ,'type'=>'' ),$atts ) );

  $tclass = '';
  if( $type == 'small'){
    $tclass = 'm-small';
  }

  $output = '<a href="#" class="b-download  '.$tclass.'">';
  $output.='<span class="e-download-ico"><span><i class="fa fa-download"></i> <span>Download</span></span></span>';
  $output.='<span class="e-download-title">'.$title.'</span>';
  $output.='<span class="e-download-description">'.$description.'</span>';
  if( !empty($extension) ){
      $output.='<span class="e-download-extension"><span>'.$extension.'</span></span>';
  }
 
  $output.='</a>';

  return $output;
}
add_shortcode( 'download','takeaway_download_shortcode' );




/**
*######################################################################
*#  accordion
*######################################################################
*/



function takeaway_accordion($atts, $content = null){
  extract(shortcode_atts(array(
    'id'=>''
    ), $atts));

  $content = preg_replace('/<br class="nc".\/>/', '', $content);
  $result = '<ul class="b-accordion m-type-toggle">';
  $result .= do_shortcode($content );
  $result .= '</ul>'; 

  return force_balance_tags( $result );
}
add_shortcode('accordion', 'takeaway_accordion');



function takeaway_accordion_item($atts, $content = null){
  extract(shortcode_atts(array(

    'title'=>'',
    'subtitle'=>''

    ), $atts));

  $content = preg_replace('/<br class="nc".\/>/', '', $content);


  $result = '<li class="e-accordion-item">';
  $result.='<button class="b-button e-accordion-toggle"><i class="fa fa-plus"></i></button> ';
  $result.='<div class="e-accordion-item-inner">';
  $result.='<h4 class="e-accordion-item-title">'.$title.'</h4>';
  $result.='<h5 class="e-accordion-item-subtitle">'.$subtitle.'</h5>';
  $result.='<div class="e-accordion-item-content" style="display: none;">'.do_shortcode($content).'</div></div></li>';



  return force_balance_tags( $result );
}
add_shortcode('aitem', 'takeaway_accordion_item');





/**
*######################################################################
*#  Timeline
*######################################################################
*/




function takeaway_timeline( $atts , $content = null ) {
  $atts = extract( shortcode_atts( array('default'=>''),$atts ) );

  $output = '<ul class="b-timeline">'.do_shortcode( $content ).'</ul>';

  return $output; 
}
add_shortcode( 'timeline','takeaway_timeline' );


function takeaway_timeline_item( $atts ) {
  $atts = extract( shortcode_atts( array(  'title'=>'','subtitle'=>'','position'=>'' ),$atts ) );
  $output = '';
  $output.='<li class="e-timeline-item">';
  $output.='<span class="e-timeline-item-label">'.$position.'.</span>';
  $output.='<h4 class="e-timeline-item-title">'.$title.'</h4>';
  $output.='<h5 class="e-timeline-item-subtitle">'.$subtitle.'</h5>';
  $output.='</li>';

  return $output;
}
add_shortcode( 'titem','takeaway_timeline_item' );




/**
*######################################################################
*#  portfolio 
*######################################################################
*/



  

function takeaway_portfolio_shortcode( $atts ) {
  $atts = extract( shortcode_atts( array( 'item'=>'2' ),$atts ) );

  $portfolio_args = array(
    'post_type' => 'portfolio', 'post_status' => 'publish','orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => $item, 'cache_results' => false, 'no_found_rows' => true,
  );
  $portfolio_query = new WP_Query( $portfolio_args );



  $output='<div class="row">';
  while ( $portfolio_query->have_posts() ){ 

    $portfolio_query->the_post();
    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'huge'); 
    //$categories = get_the_category();
     //   $categories = get_terms('skill');
        $categories = get_the_terms( get_the_ID(),'skill' );
    //$tags = get_tags();

    $output.='<div class="col-md-3">';
    $output.='<div class="b-project"><div class="e-project-header">';
    $output.='<a class="e-project-thumb m-lightbox" href="'.$large_image_url[0].'" data-lightbox-group="dummy-projects">';
    $output.='<img alt="" src="'.$large_image_url[0].'"><span class="e-overlay"><span><span><i class="fa fa-search"></i> Zoom In</span></span></span></a>';
    
    
    $output.='</div><div class="e-project-content">';
    $output.='<h4 class="e-project-title"><a href="#">'.get_the_title().'</a></h4>';
    $output.='<h5 class="e-project-category">';
    
    if($categories){ foreach($categories as $category){
      $output.= ' '.$category->name.' ';

    } }
    $output.='</h5></div></div></div>';

    
  }

  wp_reset_query();

  $output.='</div>';

  return do_shortcode($output);
}
add_shortcode( 'portfolio','takeaway_portfolio_shortcode' );









/**
*######################################################################
*#  portfolio grid
*######################################################################
*/



  

function takeaway_portfolio_grid_shortcode( $atts ) {
  $atts = extract( shortcode_atts( array( 'item'=>'2' ),$atts ) );

  $portfolio_args = array(
    'post_type' => 'portfolio', 'post_status' => 'publish','orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => $item, 'cache_results' => false, 'no_found_rows' => true,
  );
  $portfolio_query = new WP_Query( $portfolio_args );


  $lclass= 1;
  $output='<div class="b-profile-portfolio"><ul>';
  while ( $portfolio_query->have_posts() ){ 

    $portfolio_query->the_post();
    

    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'huge'); 

      $wr = '';
      if($lclass % 3 == 0)
      {
        $wr = 'class="last-in-row"';
      }


        $output.='<li '.$wr.'>';
        $output.='<a href="'.$large_image_url[0].'" class="m-lightbox" data-lightbox-group="profile-portfolio">';
        $output.='<img src="'.$large_image_url[0].'" alt="">';
        $output.='<span class="e-overlay"><span><span><i class="fa fa-search"></i> Zoom In</span></span></span></a></li>';
        $lclass++;
    
  }

  wp_reset_query();

  $output.='</ul></div>';

  return do_shortcode($output);
}
add_shortcode( 'portfolio_grid','takeaway_portfolio_grid_shortcode' );








function takeaway_button( $atts ,$content = null ) {
  $atts = extract( shortcode_atts( array(
    'target'=>'_self', 
    'url'=> 'http://google.com', 
    
    'icon' => '' , 
 
    ),$atts ) );


  $add_icon ='';
  if(!empty($icon)){
    $add_icon='<i class="fa '.$icon.'"></i>';
  }

    if (!preg_match("~^(?:f|ht)tps?://~i", $url) ) {
        $url = "" . $url;
    }

  
$output = '
    <a  href="'.$url.'" target="'.$target.'" class="btn btn-default-red '.'">'
    .$add_icon.$content.'</a>';
  

// <a href="#" class="btn btn-default-red"><i class="fa fa-file-text-o"></i> Read  More</a>


  
  
  return $output;

}
add_shortcode( 'button','takeaway_button' );








function takeaway_profile_shortcode( $atts ,$content = null ) {
  $atts = extract( shortcode_atts( array( 'name'=>'','birth'=>'','location' =>'' ,'status'=>'','degree'=>'','permit'=>'','website'=>'' ),$atts ) );

  $output = '<div class="b-profile-details"><dl>';

  if(!empty($name)){
    $output.= '<dt>Name</dt>';
    $output.= '<dd>'.$name.'</dd>';
  }
  if(!empty($birth)){
    $output.= '<dt>Birth</dt>';
    $output.= '<dd>'.$birth.'</dd>';
  }

  if(!empty($location)){
    $output.= '<dt>Location</dt>';
    $output.= '<dd>'.$location.'</dd>';
  }



  if(!empty($status)){
    $output.= '<dt>Status</dt>';
    $output.= '<dd>'.$status.'</dd>';
  }

  if(!empty($degree)){
    $output.= '<dt>Degree</dt>';
    $output.= '<dd>'.$degree.'</dd>';
  }

  if(!empty($permit)){
    $output.= '<dt>Work Permit</dt>';
    $output.= '<dd>'.$permit.'</dd>';
  }


  if(!empty($website)){

        if (!preg_match("~^(?:f|ht)tps?://~i", $website) ) {
            $website = "http://" . $website;
        }


    $output.= '<dt>Website</dt>';
    $output.= '<dd><a href="'.$website.'"> '.$website.'</a></dd>';
  }


  $output.= '</dl></div>';

  return $output;
}
add_shortcode( 'profile','takeaway_profile_shortcode' );









/**
*######################################################################
*#  video  [video type="vimeo" video_id=""]
*######################################################################
*/



function video($atts){
  if(isset($atts['type'])){
    switch($atts['type']){
      case 'youtube':
        return youtube($atts);
        break;
      case 'vimeo':
        return vimeo($atts);
        break;
      case 'dailymotion':
        return dailymotion($atts);
        break;
    }
  }
  return '';
}
add_shortcode('takeaway_video', 'video');


function vimeo($atts) {
  extract(shortcode_atts(array(
    'video_id'  => '',
    'width' => false,
    'height' => false,
    'title' => 'false',
  ), $atts));

  if ($height && !$width) $width = intval($height * 16 / 9);
  if (!$height && $width) $height = intval($width * 9 / 16);
  if (!$height && !$width){
    $height = '400';
    $width = '650';
  }
  if($title!='false'){
    $title = 1;
  }else{
    $title = 0;
  }

  if (!empty($video_id) && is_numeric($video_id)){
    return "<br><div class='video_frame'><iframe src='http://player.vimeo.com/video/$video_id?title={$title}&amp;byline=0&amp;portrait=0' width='$width' height='$height' ></iframe></div>";
  }
}

function youtube($atts, $content=null) {
  extract(shortcode_atts(array(
    'video_id'  => '',
    'width'   => false,
    'height'  => false,
  ), $atts));
  
  if ($height && !$width) $width = intval($height * 16 / 9);
  if (!$height && $width) $height = intval($width * 9 / 16) + 25;
  if (!$height && !$width){
    $height = '400';
    $width = '650';
  }

  if (!empty($video_id)){
    return "<div class='video_frame'><iframe src='http://www.youtube.com/embed/$video_id' width='$width' height='$height'></iframe></div>";
  }
}

function dailymotion($atts, $content=null) {

  extract(shortcode_atts(array(
    'video_id'  => '',
    'width'   => false,
    'height'  => false,
  ), $atts));
  
  if ($height && !$width) $width = intval($height * 16 / 9);
  if (!$height && $width) $height = intval($width * 9 / 16);
  if (!$height && !$width){
    $height = '400';
    $width = '650';
  }

  if (!empty($video_id)){
    return "<div class='video_frame'><iframe src=http://www.dailymotion.com/embed/video/$video_id?width=$width&theme=none&foreground=%23F7FFFD&highlight=%23FFC300&background=%23171D1B&start=&animatedTitle=&iframe=1&additionalInfos=0&autoPlay=0&hideInfos=0' width='$width' height='$height'></iframe></div>";
  }
}





/**
 *######################################################################
 *#  row
 *######################################################################
 */

function takeaway_theme_row($params, $content = null) {
    extract(shortcode_atts(array(
        'class' => ''
    ), $params));
    $result = '<div class="row ' . $class . '">';
    //echo '<textarea>'.$content.'</textarea>';
    $content = str_replace("]<br />", ']', $content);
    $content = str_replace("<br />\n[", '[', $content);
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('row', 'takeaway_theme_row');


/**
 *######################################################################
 *#  column
 *######################################################################
 */

function takeaway_theme_column($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'lg' => '',
        'mdoff' => '',
        'smoff' => '',
        'xsoff' => '',
        'lgoff' => '',
        'mdhide' => '',
        'smhide' => '',
        'xshide' => '',
        'lghide' => '',
        'mdclear' => '',
        'smclear' => '',
        'xsclear' => '',
        'lgclear' => '',
        'off'=>''
    ), $params));


    $arr = array('md', 'xs', 'sm');
    $classes = array();
    foreach ($arr as $k => $aa) {
        if (${$aa} == 12 || ${$aa} == '') {
            $classes[] = 'col-' . $aa . '-12';
        } else {
            $classes[] = 'col-' . $aa . '-' . ${$aa};
        }
    }
    $arr2 = array('mdoff', 'smoff', 'xsoff', 'lgoff');
    foreach ($arr2 as $k => $aa) {
        $nn = str_replace('off', '', $aa);
        if (${$aa} == 0 || ${$aa} == '') {
            //$classes[] = '';
        } else {
            $classes[] = 'col-' . $nn . '-offset-' . ${$aa};
        }
    }
    $arr2 = array('mdhide', 'smhide', 'xshide', 'lghide');
    foreach ($arr2 as $k => $aa) {
        $nn = str_replace('hide', '', $aa);
        if (${$aa} == 'yes') {
            $classes[] = 'hidden-' . $nn;
        }
    }
    $arr2 = array('mdclear', 'smclear', 'xsclear', 'lgclear');
    foreach ($arr2 as $k => $aa) {
        $nn = str_replace('clear', '', $aa);
        if (${$aa} == 'yes') {
            $classes[] = 'clear-' . $nn;
        }
    }
    if ($off != '') {
        $classes[] = 'col-lg-offset-'.$off;
    }

    if ($off != '') {
        $classes[] = 'col-lg-offset-'.$off;
    }
    $result = '<div class="col-lg-' . $lg . ' ' . implode(' ', $classes) . '">';
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('column', 'takeaway_theme_column');




function takeaway_theme_one_half_last($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-6 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' one-half-last">';
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('one_half_last', 'takeaway_theme_one_half_last');

/* * *********************************************************
 * THIRD
 * ********************************************************* */

function takeaway_theme_one_third($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="sc-column col-lg-4 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' ">'; //one-third
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('one_third', 'takeaway_theme_one_third');

function takeaway_theme_one_third_last($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-4 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . '  column-last">'; // one-third-last
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('one_third_last', 'takeaway_theme_one_third_last');

function takeaway_theme_two_third($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class=" col-lg-8 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' ">'; //two-third
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('two_third', 'takeaway_theme_two_third');

function takeaway_theme_two_third_last($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-8 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . '  column-last ">'; //two-third-last
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('two_third_last', 'takeaway_theme_two_third_last');

/* * *********************************************************
 * FOURTH
 * ********************************************************* */

function takeaway_theme_one_fourth($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-3 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' one-fourth">';
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('one_fourth', 'takeaway_theme_one_fourth');

function takeaway_theme_one_fourth_last($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-3 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' column-last one-fourth-last">';
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('one_fourth_last', 'takeaway_theme_one_fourth_last');

function takeaway_theme_three_fourth($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-3 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . '  three-fourth">';
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('three_fourth', 'takeaway_theme_three_fourth');

function takeaway_theme_three_fourth_last($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-6  ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' column-last three-fourth-last">';
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('three_fourth_last', 'takeaway_theme_three_fourth_last');

function takeaway_theme_one_fourth_second($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-3  ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' one-fourth-second">';
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('one_fourth_second', 'takeaway_theme_one_fourth_second');

function takeaway_theme_one_fourth_third($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }

    $result = '<div class="col-lg-3  ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' one-fourth-third">';
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('one_fourth_third', 'takeaway_theme_one_fourth_third');

function takeaway_theme_one_half_second($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-6  ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' one-half-second">';
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('one_half_second', 'takeaway_theme_one_half_second');

function takeaway_theme_one_third_second($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-4  ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' one-third-second">';
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('one_third_second', 'takeaway_theme_one_third_second');

function takeaway_theme_one_column($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-12  ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' one-column">';
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('one_column', 'takeaway_theme_one_column');




