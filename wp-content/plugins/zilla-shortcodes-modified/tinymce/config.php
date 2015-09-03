<?php

/*-----------------------------------------------------------------------------------*/
/*	Button Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['button'] = array(
	'no_preview' => true,
	'params' => array(
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button URL', 'takeaway'),
			'desc' => __('Add the button\'s url eg http://example.com', 'takeaway')
		),
		
	
		'target' => array(
			'type' => 'select',
			'label' => __('Button Target', 'takeaway'),
			'desc' => __('_self = open in same window. _blank = open in new window', 'takeaway'),
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank'
			)
		),

		'icon' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Font awesome Icon', 'takeaway'),
			'desc' => __('e.g : fa-file-text-o', 'takeaway'),
		),

		'content' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => __('Button\'s Text', 'takeaway'),
			'desc' => __('Add the button\'s text', 'takeaway'),
		)
	),
	'shortcode' => '[button url="{{url}}" icon="{{icon}}" target="{{target}}"] {{content}} [/button]',
	'popup_title' => __('Insert Button Shortcode', 'takeaway')
);



/*-----------------------------------------------------------------------------------*/
/*	name
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['name'] = array(
	'no_preview' => true,
	'params' => array(

		'salutaion' => array(

			'type' => 'select',
			'label' => __('Salutation', 'takeaway'),
			'desc' => __('Select the salutation', 'takeaway'),
			'options' => array(
				'Mr'       => 'Mr.',
				'Mrs'      => 'Mrs.',
				'Miss'     => 'Miss',
			)
		),
		'first_name' => array(
			'std' => 'first name',
			'type' => 'text',
			'label' => __('First Name', 'takeaway'),
			'desc' => __('Enter first name', 'takeaway'),
		),

		'last_name' => array(
			'std' => 'last name',
			'type' => 'text',
			'label' => __('Last Name', 'takeaway'),
			'desc' => __('Enter last name', 'takeaway'),
		)
	),
	'shortcode' => '[name salutation="{{salutaion}}" first_name="{{first_name}}" last_name="{{last_name}}" ][/name]',
	'popup_title' => __('Insert Name', 'takeaway')
);


/*-----------------------------------------------------------------------------------*/
/*	takeaway blog post
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['blog_post'] = array(
	'no_preview' => true,
	'params' => array(


		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('ID of the blog post', 'takeaway'),
			'desc' => __('ID of the blog post', 'takeaway'),
			),

),
	'shortcode' => '[blog_post id="{{id}}"][/blog_post]',
	'popup_title' => __('Blog Post', 'takeaway'),

	);


/*-----------------------------------------------------------------------------------*/
/*	takeaway buy theme
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['buy_theme'] = array(
	'no_preview' => true,
	'params' => array(


			'title' => array(
			'std' => 'Purchase Takeaway',
			'type' => 'text',
			'label' => __('Title', 'textdomain'),
			'desc' => __('Enter title', 'textdomain'),
		),
			'content' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Content', 'textdomain'),
			'desc' => __('Enter Content', 'textdomain'),
		),

			'read_more' => array(
			'std' => 'www.example.com',
			'type' => 'text',
			'label' => __('Website', 'textdomain'),
			'desc' => __('Enter Website', 'textdomain'),
		),

			'image' => array(
			'std' => 'call-to-action-icon1.png',
			'type' => 'text',
			'label' => __('Name of the image', 'textdomain'),
			'desc' => __('Image from assets/img/content', 'textdomain'),
		),
			'purchase_now' => array(
			'std' => 'www.example.com',
			'type' => 'text',
			'label' => __('Website', 'textdomain'),
			'desc' => __('Enter Website', 'textdomain'),
		),
	),
	'shortcode' => '[buy_theme image="{{image}}" title="{{title}}" content="{{content}}" read_more="{{read_more}}" purchase_now="{{purchase_now}}" ]',
	'popup_title' => __('Insert buy theme', 'textdomain')
);



/*-----------------------------------------------------------------------------------*/
/*	video Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['video'] = array(
	'no_preview' => true,
	'params' => array(

		'host' => array(

			'type' => 'select',
			'label' => __('Host Name', 'textdomain'),
			'desc' => __('Select the host name', 'textdomain'),
			'options' => array(
				'youtube'     => 'YouTube',
				'vimeo'       => 'Vimeo',
				'dailymotion' => 'Dailymotion',
			)
		),
		'video_id' => array(
			'std' => 'Video ID',
			'type' => 'text',
			'label' => __('Video id', 'textdomain'),
			'desc' => __('add the video id', 'textdomain'),
		),

		'height' => array(
			'std' => '400',
			'type' => 'text',
			'label' => __('height', 'textdomain'),
			'desc' => __('height', 'textdomain'),
		),

		'width' => array(
			'std' => '650',
			'type' => 'text',
			'label' => __('width', 'textdomain'),
			'desc' => __('width', 'textdomain'),
		),

	),
	'shortcode' => '[takeaway_video type="{{host}}" video_id="{{video_id}}" width={{width}} height={{height}}][/takeaway_video]',
	'popup_title' => __('Insert Video Shortcode', 'textdomain')
);



/*-----------------------------------------------------------------------------------*/
/*	heading
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['heading'] = array(
	'no_preview' => true,
	'params' => array(

		'heading' => array(

			'type' => 'select',
			'label' => __('Typography', 'textdomain'),
			'desc' => __('Select Typography', 'textdomain'),
			'options' => array(
				'h1'     => 'h1',
				'h2'     => 'h2',
				'h3' 	 => 'h3',
				'h4' 	 => 'h4',
				'h5' 	 => 'h5',

			)
		),

		'content' => array(
			'std' => 'Content goes here',
			'type' => 'text',
			'label' => __('Content', 'textdomain'),
			'desc' => __('Enter Content', 'textdomain'),
		)
	),
	'shortcode' => '[heading type="{{heading}}" content = "{{content}}" ][/heading]',
	'popup_title' => __('Insert Heading', 'textdomain')
);




// [progress title ="Web programmer" score ="100" type="two" text="se din dujone dulechilam bone"]

/*-----------------------------------------------------------------------------------*/
/*	Progress Config
/*-----------------------------------------------------------------------------------*/


$zilla_shortcodes['progress'] = array(
	'no_preview' => true,
	'params' => array(

		'type' => array(
			'type' => 'select',
			'label' => __('Type', 'textdomain'),
			'desc' => __('Select the type', 'textdomain'),
			'options' => array(
				'one'     => 'Default',
				'two'       => 'With Toggle',
				'three' => 'Deep',
				'four' => 'Radial',
			)
		),
		'title' => array(
			'std' => 'Title',
			'type' => 'text',
			'label' => __('Title', 'textdomain'),
			'desc' => __('add the title', 'textdomain'),
		),
		'score' => array(
			'std' => '50',
			'type' => 'text',
			'label' => __('Score', 'textdomain'),
			'desc' => __('Please add integer value', 'textdomain'),
		),
		'alltext' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Hidden Text', 'textdomain'),
			'desc' => __('add hidden text only in toggle type', 'textdomain'),
		),


	),
	'shortcode' => '[progress title="{{title}}" type="{{type}}" score="{{score}}"   text="{{alltext}}" ]',
	'popup_title' => __('Insert Progress Shortcode', 'textdomain')
);






/*-----------------------------------------------------------------------------------*/
/*	download Config
/*-----------------------------------------------------------------------------------*/


$zilla_shortcodes['download'] = array(
	'no_preview' => true,
	'params' => array(


		'title' => array(
			'std' => 'Title',
			'type' => 'text',
			'label' => __('Title', 'textdomain'),
			'desc' => __('add the title', 'textdomain'),
		),
		'description' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Description', 'textdomain'),
			'desc' => __('', 'textdomain'),
		),
		'extension' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Extension', 'textdomain'),
			'desc' => __('add extension like .pdf', 'textdomain'),
		),


	),
	'shortcode' => '[download title="{{title}}"  description="{{description}}"   extension="{{extension}}" ]',
	'popup_title' => __('Insert Progress Shortcode', 'textdomain')
);










/*-----------------------------------------------------------------------------------*/
/*	Alert Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['alert'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Alert Style', 'textdomain'),
			'desc' => __('Select the alert\'s style, ie the alert colour', 'textdomain'),
			'options' => array(
				'white' => 'White',
				'grey' => 'Grey',
				'red' => 'Red',
				'yellow' => 'Yellow',
				'green' => 'Green'
			)
		),
		'content' => array(
			'std' => 'Your Alert!',
			'type' => 'textarea',
			'label' => __('Alert Text', 'textdomain'),
			'desc' => __('Add the alert\'s text', 'textdomain'),
		)
		
	),
	'shortcode' => '[zilla_alert style="{{style}}"] {{content}} [/zilla_alert]',
	'popup_title' => __('Insert Alert Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Toggle Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['toggle'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Toggle Content Title', 'textdomain'),
			'desc' => __('Add the title that will go above the toggle content', 'textdomain'),
			'std' => 'Title'
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Toggle Content', 'textdomain'),
			'desc' => __('Add the toggle content. Will accept HTML', 'textdomain'),
		),
		'state' => array(
			'type' => 'select',
			'label' => __('Toggle State', 'textdomain'),
			'desc' => __('Select the state of the toggle on page load', 'textdomain'),
			'options' => array(
				'open' => 'Open',
				'closed' => 'Closed'
			)
		),
		
	),
	'shortcode' => '[zilla_toggle title="{{title}}" state="{{state}}"] {{content}} [/zilla_toggle]',
	'popup_title' => __('Insert Toggle Content Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Tabs Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['tabs'] = array(
    'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Tab Direction', 'textdomain'),
			'desc' => __('Select the direction of Tab on page load', 'textdomain'),
			'options' => array(
				'top' => 'Top',
				// 'vertical' => 'Vertical',
				
			)
		),

   	),
    'no_preview' => true,
    'shortcode' => '[tabs type="{{type}}"] {{child_shortcode}}  [/tabs]',
    'popup_title' => __('Insert Tab Shortcode', 'textdomain'),
    
    'child_shortcode' => array(
        'params' => array(

		'type' => array(
			'type' => 'select',
			'label' => __('Tab Active', 'textdomain'),
			'desc' => __('please select this just for one', 'textdomain'),
			'options' => array(
				'' => '',
				'true' => 'true',
				
			),
		),

            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'textdomain'),
                'desc' => __('Title of the tab', 'textdomain'),
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'textdomain'),
                'desc' => __('Add the tabs content', 'textdomain')
            )
        ),
        'shortcode' => '[tab active="{{type}}" title="{{title}}"] {{content}} [/tab]',
        'clone_button' => __('Add Tab', 'textdomain')
    )
);



// [accordion ]
// [aitem title="Web Developer at Envato" subtitle="September 2007 - June 2013"]





/*-----------------------------------------------------------------------------------*/
/*	accordion Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['accordion'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[accordion] {{child_shortcode}}  [/accordion]',
    'popup_title' => __('Insert Accordion Shortcode', 'textdomain'),
    
    'child_shortcode' => array(
        'params' => array(

            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Title', 'textdomain'),
                'desc' => __('', 'textdomain'),
            ),
            'subtitle' => array(
                'std' => 'Subtitle',
                'type' => 'text',
                'label' => __('Subtitle', 'textdomain'),
                'desc' => __('', 'textdomain')
            ),
            'content' => array(
                'std' => 'Content',
                'type' => 'textarea',
                'label' => __('Content', 'textdomain'),
                'desc' => __('Add content', 'textdomain')
            )

        ),
        'shortcode' => '[aitem title="{{title}}" subtitle="{{subtitle}}"] {{content}} [/aitem]',
        'clone_button' => __('Add Accordion', 'textdomain')
    )
);





// [timeline]
// [titem position="1" title="Master of Science - Harvard" subtitle="September 2007 - June 2013" ]
// [titem position="2" title="Master of Science - Harvard" subtitle="September 2007 - June 2013" ]
// [titem position="3" title="Master of Science - Harvard" subtitle="September 2007 - June 2013" ]
// [/timeline]



/*-----------------------------------------------------------------------------------*/
/*	timeline Config
/*-----------------------------------------------------------------------------------*/


$zilla_shortcodes['timeline'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[timeline] {{child_shortcode}}  [/timeline]',
    'popup_title' => __('Insert Timeline Shortcode', 'textdomain'),
    
    'child_shortcode' => array(
        'params' => array(

            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Title', 'textdomain'),
                'desc' => __('', 'textdomain'),
            ),
            'position' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Position', 'textdomain'),
                'desc' => __('pleae give them a position number like : 1,2,3', 'textdomain')
            ),


        ),
        'shortcode' => '[titem title="{{title}}" position="{{position}}" ]',
        'clone_button' => __('Add timeline item', 'textdomain')
    )
);


// [list type="bullet"]
// [item]asdfsdlfja[/item]
// [item]asdfsdlfja[/item]
// [item]asdfsdlfja[/item]

// [/list]



/*-----------------------------------------------------------------------------------*/
/*	list Config
/*-----------------------------------------------------------------------------------*/


$zilla_shortcodes['list'] = array(
    'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('List Style', 'textdomain'),
			'desc' => __('Select list style', 'textdomain'),
			'options' => array(
				'bullet' => 'Bullet',
				'check' => 'Check',
				'number' => 'Number',
				
			)
		),
    ),
    'no_preview' => true,
    'shortcode' => '[list type="{{type}}"] {{child_shortcode}}  [/list]',
    'popup_title' => __('Insert Timeline Shortcode', 'textdomain'),
    
    'child_shortcode' => array(
        'params' => array(

            'content' => array(
                'std' => 'Content',
                'type' => 'text',
                'label' => __('Content', 'textdomain'),
                'desc' => __('', 'textdomain'),
            ),



        ),
        'shortcode' => '[item] {{content}} [/item]',
        'clone_button' => __('Add list item', 'textdomain')
    )
);










// [profile name="Tareq Jobayere" birth="April 26, 1988" location="Rome,Italy" status="Employed" degree="MBA" permit="E.U." website="http://example.com"]


/*-----------------------------------------------------------------------------------*/
/*	Profile Config
/*-----------------------------------------------------------------------------------*/




$zilla_shortcodes['profile'] = array(
	'no_preview' => true,
	'params' => array(
		'name' => array(
			'type' => 'text',
			'label' => __('Name', 'textdomain'),
			'desc' => __('Add your name', 'textdomain'),
			'std' => 'Name'
		),
		'birth' => array(
			'type' => 'text',
			'label' => __('Birth', 'textdomain'),
			'desc' => __('Add your birthday', 'textdomain'),
			'std' => 'birth'
		),
		'location' => array(
			'type' => 'text',
			'label' => __('Location', 'textdomain'),
			'desc' => __('Add your location', 'textdomain'),
			'std' => 'Location'
		),

		'status' => array(
			'type' => 'text',
			'label' => __('Status', 'textdomain'),
			'desc' => __('Add your status', 'textdomain'),
			'std' => 'Status'
		),
		'degree' => array(
			'type' => 'text',
			'label' => __('Degree', 'textdomain'),
			'desc' => __('Add your degree', 'textdomain'),
			'std' => 'Degree'
		),
		'permit' => array(
			'type' => 'text',
			'label' => __('permit', 'textdomain'),
			'desc' => __('', 'textdomain'),
			'std' => 'Permit'
		),
		'website' => array(
			'type' => 'text',
			'label' => __('Website', 'textdomain'),
			'desc' => __('', 'textdomain'),
			'std' => 'Website'
		),


		
		
	),
	'shortcode' => '[profile name="{{name}}" birth="{{birth}}" location="{{location}}" status="{{status}}" degree="{{degree}}" permit="{{permit}}" website="{{website}}"]',
	'popup_title' => __('Insert Profile Shortcode', 'textdomain')
);






/*-----------------------------------------------------------------------------------*/
/*	Columns Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => __('Insert Columns Shortcode', 'textdomain'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __('Column Type', 'textdomain'),
				'desc' => __('Select the type, ie width of the column.', 'textdomain'),
				'options' => array(
					'zilla_one_third' => 'One Third',
					'zilla_one_third_last' => 'One Third Last',
					'zilla_two_third' => 'Two Thirds',
					'zilla_two_third_last' => 'Two Thirds Last',
					'zilla_one_half' => 'One Half',
					'zilla_one_half_last' => 'One Half Last',
					'zilla_one_fourth' => 'One Fourth',
					'zilla_one_fourth_last' => 'One Fourth Last',
					'zilla_three_fourth' => 'Three Fourth',
					'zilla_three_fourth_last' => 'Three Fourth Last',
					'zilla_one_fifth' => 'One Fifth',
					'zilla_one_fifth_last' => 'One Fifth Last',
					'zilla_two_fifth' => 'Two Fifth',
					'zilla_two_fifth_last' => 'Two Fifth Last',
					'zilla_three_fifth' => 'Three Fifth',
					'zilla_three_fifth_last' => 'Three Fifth Last',
					'zilla_four_fifth' => 'Four Fifth',
					'zilla_four_fifth_last' => 'Four Fifth Last',
					'zilla_one_sixth' => 'One Sixth',
					'zilla_one_sixth_last' => 'One Sixth Last',
					'zilla_five_sixth' => 'Five Sixth',
					'zilla_five_sixth_last' => 'Five Sixth Last'
				)
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Column Content', 'textdomain'),
				'desc' => __('Add the column content.', 'textdomain'),
			)
		),
		'shortcode' => '[{{column}}] {{content}} [/{{column}}] ',
		'clone_button' => __('Add Column', 'textdomain')
	)
);

?>