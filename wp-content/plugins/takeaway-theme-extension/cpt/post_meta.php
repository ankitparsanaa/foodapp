<?php 


$post_meta = new Cuztom_Post_Type( 'block', array(
  'menu_position' => 7,
    'has_archive' => true,
    'supports' => array( 'title', 'editor', 'thumbnail' )
) );





$post_meta-> add_meta_box( 
   'post_meta_box_1',
   'post', 
    array(
        
        array(
        'name'          => 'post_select',
        'label'         => 'post type',
        'description'   => 'Select a post type',
        'type'          => 'select',
        'options'       => array(
                      'content'      => 'content',
                      'testimonial'    => 'testimonial',
                      'blog'    => 'blog',
                      'welcome' => 'welcome'
                 ),
          )  
          )
    );

$post_meta-> add_meta_box( 
   'post_meta_box_2',
   'slide setting', 
    array(
        array(
        'name'          => 'name_checkbox',
        'label'         => 'Checkbox',
        'description'   => 'Checkbox Description',
        'type'          => 'checkbox',
        'default_value' => 'on'
    ),
         array(
        'name'          => 'testimonial',
        'label'         => 'Number of testimonial',
        'description'   => 'number of slides to show in the slider',
        'type'          => 'text',

      ),       
         
      )
   );


$post_meta-> add_meta_box( 
   'post_meta_box_54',
   'Post settings for the front page', 
    array(
        

        array(

          'name'   => 'bg_color',
          'label'  => 'background color for block',
          'description' => 'bg image',
          'type'   => 'image',
          )

    
      )
   );

$food_option = new Cuztom_Post_Type( 'Food option', array(
  // 'menu_position' => 7,
    'has_archive' => true,
    'supports' => array( 'title', 'editor', 'thumbnail' )
) );



  $testimonial  = new Cuztom_Post_Type( 'testimonial', array(
    "label" => 'Testimonials',
    
    'has_archive' => true,
        
    'supports' => array('title', 'excerpt','thumbnail')
   ) 
  );


 $testimonial->add_meta_box(

    'testimonial_author_info',
    'Testimonial Author Information',

    array(

        array(

            'name' => 'testimonial_author_name',
            'label' => 'Testimonial Author Name',
            'description' => 'Put the author name here',
            'type' => 'text'

          ),
         )
 );




$chef = new Cuztom_Post_Type( 'chef', array(
  'menu_position' => 9,
    'has_archive' => true,
    'supports' => array( 'title', 'editor', 'thumbnail', 'comments', ),
    'taxonomies' => array('category', 'post_tag')
) );

$chef->add_meta_box( 
   'chef_meta_box',
   'General Information', 
    array(
        array(
            'name'          => 'name',
            'label'         => 'Name of the Chef:',
            'description'   => 'Enter Name e.g: Abu Antar',
            'type'          => 'text'
         ),
      array(
            'name'          => 'designation',
            'label'         => 'designation of the Chef:',
            'description'   => 'Enter designation e.g: Master chef',
            'type'          => 'text'
         ),

        array(
            'name'          => 'Experience',
            'label'         => 'Experience:',
            'description'   => 'Enter experience e.g: 20 years',
            'type'          => 'text'
         ),
         array(
            'name'          => 'School',
            'label'         => 'School:',
            'description'   => 'Enter School name e.g: Paris Cuisine University',
            'type'          => 'text',
            
         ),
         array(
            'name'          => 'Speciality',
            'label'         => 'Speciality:',
            'description'   => 'Speciality e.g: Modern French Cuisine',
            'type'          => 'text',
          ),
          array(
            'name'          => 'Favourite',
            'label'         => 'Favourite Cuisine:',
            'description'   => 'Favourite Cuisine e.g: Asian Traditional',
            'type'          => 'text',
          ),
          array(
            'name'          => 'Cooks',
            'label'         => 'Cooks for us:',
            'description'   => 'e.g: 7 years',
            'type'          => 'text',
          ),
          array(
            'name'          => 'Staff',
            'label'         => 'Staff Managed:',
            'description'   => 'e.g: 15 Persons',
            'type'          => 'text',
          ),
          array(
            'name'          => 'takeaway_preview_image',
            'label'         => 'Preview image:',
            'description'   => 'Upload image 360 x 375 for best view ',
            'type'          => 'image',
          ),
      )
   );


$news = new Cuztom_Post_Type( 'news', array(
  'menu_position' => 10,
    // 'has_archive' => true,
     'taxonomies' => array('category', 'post_tag'),
'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    // 'supports' => array( 'title', 'editor', 'thumbnail', 'comments', ),
   
) );


$news-> add_meta_box( 
  'news_meta_box', 
  'Location', 
  array(
        array(
            'name'          => 'country',
            'label'         => 'Name of the country:',
            
            'type'          => 'text'
         ),
        
        array(
            'name'          => 'region',
            'label'         => 'Region:',
            
            'type'          => 'text'
         ),
         array(
            'name'          => 'zip',
            'label'         => 'Zip Code:',
            
            'type'          => 'text',
            
         ),

         
      )
       );

$news-> add_meta_box( 
  'ingrediant_meta_box', 
  'Ingrediant', 
  array(
      array(
        'name'          => 'checkbox',
        'label'         => 'Ingrediant on/off',
        'description'   => 'Do you want ingrediant field?',
        'type'          => 'checkbox',
        'default_value' => 'on'
    ),  
        array(
            'name'          => 'ingrediant',
            'label'         => 'Ingrediants:',
            'description'   => 'name ingrediants by separating comma.',
            'type'          => 'text'
         ),
      

        
      )
       );



$front_page_meta = new Cuztom_Post_Type('page');

$args = array(

    'post_type' => 'block',
    'posts_per_page' => -1

  );

$get_all_block_posts = get_posts($args);


$all_block_posts = array();
foreach ($get_all_block_posts as $key => $value) {
  $all_block_posts[$value->ID] = $value->post_title;    
}


$front_page_meta->add_meta_box(

      'front_page_meta_box',
      'All Block Posts',

      array(

           array(
              'name'          => 'name_select',
              'label'         => 'Multiple Select',
              'description'   => 'select multiple post to show in the front page',
              'type'          => 'multi_select',
              'options'       => $all_block_posts,
              'default_value' => 'value2'
           )

         
        )
    );



$product = new Cuztom_Post_Type( 'product' );

$args  = array(
  'rewrite' => array( 'slug' => 'cuisines' ),
);

$product->add_taxonomy( 'Cuisines', $args );


// $takeaway_grp_price = new Cuztom_Post_Type( 'product' );

// $takeaway_grp_price->add_meta_box(

//   'price_for_grouped_product',
//   'Price for the main product',

//    array(

//             array(
//                 'label' => __('Main Price ', 'takeaway'),
//                 'name' => 'grp_product_price',
//                 'type' => 'text',
//                 'description' => __('If you want variation then please do not add main price' , 'takeaway'),
//             ),
            
          

//           )


//  );

