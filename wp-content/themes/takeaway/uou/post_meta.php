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
					            'content'    	 => 'content',
					            'testimonial'    => 'testimonial',
					            'blog'    => 'blog',
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



$dish = new Cuztom_Post_Type( 'dish', array(
  'menu_position' => 8,
    'has_archive' => true,
    'supports' => array( 'title', 'editor', 'thumbnail', 'comments' )
    
) );

  $dish_cat = register_cuztom_taxonomy( 'dish_cat ', 'dish' );


   $dish_cat->add_term_meta (
        array(
            array(
              'name'          => 'marker_icon',
              'label'         => 'Dish category Icon',
              'description'   => 'Upload dish image',
              'type'          => 'image',
          )
        )
    );


  add_filter("manage_edit-dish_cat_columns", 'takeaway_types_tax_columns');
    function takeaway_types_tax_columns($category_columns) {
        $new_columns = array(
            'cb'            => '<input type="checkbox" />',
            'name'          => __('Name', 'casa'),
            'marker'      => __('Marker', 'casa'),            
            'description'       => __('Description', 'casa'),
            'slug'          => __('Slug', 'casa'),
            'posts'         => __('Items', 'casa'),
        );
        return $new_columns;
    }

    /*show type taxonomy column*/
    add_filter("manage_dish_cat_custom_column", 'takeaway_manage_category_columns', 10, 3);

    function takeaway_manage_category_columns($out, $column_name, $cat_id) {
        
        $marker = get_option( 'term_meta_dish_cat_'.$cat_id, '' );
        // print_r($marker);
        if(!empty($marker))       
          $marker_icon = wp_get_attachment_image_src($marker['_marker_icon'],array(32,32));        

        switch ($column_name) {
            case 'marker':
                if(!empty($marker_icon[0])){
                    $out .= '<img src="'.$marker_icon[0].'" alt="">';
                }
                break;
            
            default:
                break;
        }
        return $out;
    }

    // Add image field to Genre (Note that you need to wrap all the fields in an array).


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
        'label'         => 'Designation',
        'description'   => 'Select a Designation',
        'type'          => 'select',
        'options'       => array(
            'Master chef'    => 'Master Chef',
            'Chef'    => 'Chef',
            'value3'    => 'Other'
        ),
        'default_value' => 'Chef'
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
      )
   );


$news = new Cuztom_Post_Type( 'news', array(
  'menu_position' => 10,
    'has_archive' => true,
    'supports' => array( 'title', 'editor', 'thumbnail', 'comments', ),
    'taxonomies' => array('category', 'post_tag')
) );



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



 