<?php 

$map_post = new Cuztom_Post_Type('page');

$map_post->add_meta_box(

        'meta_box_2',
        'Map',

        array(

            array(
                'label' => __('Country Name ', 'takeaway'),
                'name' => 'casa_address_country_name',
                'type' => 'text',
                'description' => __('Country', 'takeaway')
            ),
            array(
                'label' => __('Region Name', 'takeaway'),
                'name' => 'casa_address_region_name',
                'type' => 'text',
                'description' => __('Region', 'takeaway')
            ),
            array(
                'label' => __('Address Name', 'takeaway'),
                'name' => 'casa_address_name',
                'type' => 'text',
                'description' => __('Address', 'takeaway')
            ),
            array(
                'label' => __('Zip Code of Region', 'takeaway'),
                'name' => 'casa_address_zip',
                'type' => 'text',
                'description' => __('ZIP codes', 'takeaway')
            ),
            array(
                'name'          => 'convert_zip',
                'label'         => 'Covert to zip code to latitude and longitude',
                'description'   => 'click checkbox to find result',
                'type'          => 'checkbox',
                'default_value' => 'off'
            ),
            array(
                'label' => __('Latitude', 'takeaway'),
                'name' => 'casa_address_lat',
                'type' => 'text',
                'std' => '0',
                'description' => __('Latitude', 'takeaway')
            ),
            array(
                'label' => __('Longitude', 'takeaway'),
                'name' => 'casa_address_lng',
                'type' => 'text',
                'std' => '0',
                'description' => __('longitude', 'takeaway')
            ),

          )

      );

$atmf = new Cuztom_Post_Type('page');

$atmf-> add_meta_box( 
   'atmf_meta_box',
   'Settings for atmf search page', 
    array(
        

        array(

          'name'   => 'show_mega_call',
          'label'  => 'Check to show mega call block',
          'description' => 'Mega call block show/hide',
          'type'          => 'checkbox',
          'default_value' => 'on'
          ),
   
      )
   );




$address_meta = new Cuztom_Post_Type('page');

$address_meta->add_meta_box(

        'meta_box_3',
        'Address and Schedule',

        array(

            array(
                'label' => __('Title ', 'takeaway'),
                'name' => 'address_meta_title',
                'type' => 'text',
                'description' => __('Title for the address', 'takeaway')
            ),
            array(
                'label' => __('Address', 'takeaway'),
                'name' => 'address_meta_address',
                'type' => 'text',
                'description' => __('Full address', 'takeaway')
            ),
            array(
                'label' => __('Schedule', 'takeaway'),
                'name' => 'address_meta_schedule',
                'type' => 'text',
                'description' => __('e.g: Monday - Friday:9am - 11pm Saturday:10am - till last customer Sunday:10am - till last customer', 'casa')
            ),
          

          )

      );

$address_meta->add_meta_box(

        'meta_box_4',
        'Address and Schedule of second location',

        array(

            array(
                'label' => __('Title ', 'takeaway'),
                'name' => 'address_meta_title',
                'type' => 'text',
                'description' => __('Title for the address', 'takeaway')
            ),
            array(
                'label' => __('Address', 'takeaway'),
                'name' => 'address_meta_address',
                'type' => 'text',
                'description' => __('Full address', 'takeaway')
            ),
            array(
                'label' => __('Schedule', 'takeaway'),
                'name' => 'address_meta_schedule',
                'type' => 'text',
                'description' => __('e.g: Monday - Friday:9am - 11pm Saturday:10am - till last customer Sunday:10am - till last customer', 'casa')
            ),
          

          )

      );

