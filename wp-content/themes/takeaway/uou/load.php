<?php


	
	define('UOU', get_template_directory_uri().'/uou/');
	define('UOU_LIB', get_template_directory_uri().'/uou/lib/');
	define('UOU_EX', get_template_directory_uri().'/uou/vendor/');
	define('UOU_JS', get_template_directory_uri().'/assets/js/' );	
	define('UOU_CSS', get_template_directory_uri().'/assets/css/' );
	define('UOU_IMG', get_template_directory_uri().'/assets/img' );


	if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/vendor/ReduxFramework/ReduxCore/framework.php' ) ) {
	    require_once( dirname( __FILE__ ) . '/vendor/ReduxFramework/ReduxCore/framework.php' );
	}
	if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/vendor/ReduxFramework/config/config.php' ) ) {
	    require_once( dirname( __FILE__ ) . '/vendor/ReduxFramework/config/config.php' );
	}




	// load plugins

	require_once('vendor/plugins/class-tgm-plugin-activation.php');

	require_once('vendor/plugins/load-plugin.php');


	
	require_once('lib/style.php');
	require_once('lib/script.php');


