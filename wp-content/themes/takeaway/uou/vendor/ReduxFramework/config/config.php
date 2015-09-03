<?php

/**
 *  takeaway admin panel settings .   
 * @since       Version 1.0
 */



if (!class_exists('takeaway_admin_config')) {

    class takeaway_admin_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {


            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }



        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => __('Section via hook', 'takeaway'),
                'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'takeaway'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        /**

          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**

          Filter hook for filtering the default value of any given field. Very useful in development mode.

         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }


        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
            }
        }

        public function setSections() {

            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path   = ReduxFramework::$_dir . '../options/patterns/';
            $sample_patterns_url    = ReduxFramework::$_url . '../options/patterns/';
            $sample_patterns        = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode('.', $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[]  = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct             = wp_get_theme();
            $this->theme    = $ct;
            $item_name      = $this->theme->get('Name');
            $tags           = $this->theme->Tags;
            $screenshot     = $this->theme->get_screenshot();
            $class          = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'takeaway'), $this->theme->display('Name'));
            
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                <?php endif; ?>

                <h4><?php echo $this->theme->display('Name'); ?></h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'takeaway'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'takeaway'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'takeaway') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
            <?php
            if ($this->theme->parent()) {
                printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'takeaway'), $this->theme->parent()->display('Name'));
            }
            ?>

                </div>
            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }





            $this->sections[] = array(
                'title'     => __('General Settings', 'takeaway'),
           //     'desc'      => __('Redux Framework was created with the developer in mind. It allows for any theme developer to have an advanced theme panel with most of the features a developer would need. For more information check out the Github repo at: <a href="https://github.com/ReduxFramework/Redux-Framework">https://github.com/ReduxFramework/Redux-Framework</a>', 'takeaway'),
                'icon'      => 'el-icon-bulb',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(


                    array(
                        'id'       => 'takeaway-minicart-switch',
                        'type'     => 'switch', 
                        'title'    => __('Mini cart display on/off', 'redux-framework-demo'),
                        // 'subtitle' => __('Look, it\'s on!', 'redux-framework-demo'),
                        'default'  => true,
                    ),


                    array(
                        'id'        => 'takeaway-favicon',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('Custom favicon', 'takeaway'),
                        'compiler'  => 'true',
                        //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'      => __('Upload custom favicon.', 'takeaway'),
                        'default'   => '',

                    ),


                    array(
                        'id'        => 'takeaway-favicon-iphone',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('Custom favicon for iphone', 'takeaway'),
                        'compiler'  => 'true',
                         'default'   => '',
                        //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'      => __('Upload custom favicon for iphone.', 'takeaway'),

                    ),


                    array(
                        'id'        => 'takeaway-favicon-ipad',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('Custom favicon for ipad', 'takeaway'),
                        'compiler'  => 'true',
                         'default'   => '',
                        //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'      => __('Upload custom favicon for ipad', 'takeaway'),

                    ),


                    array(
                        'id'        => 'takeaway-custom-css',
                        'type'      => 'ace_editor',
                        'title'     => __('Custom CSS ', 'takeaway'),
                        'subtitle'  => __('Paste your custom CSS code here.', 'takeaway'),
                        'mode'      => 'css',
                        'theme'     => 'monokai',
                         'default'   => '',

                    ),


                    array(
                        'id'        => 'takeaway-custom-js',
                        'type'      => 'ace_editor',
                        'title'     => __('Tracking code', 'takeaway'),
                        'subtitle'  => __('Paste your JS code here.', 'takeaway'),
                        'mode'      => 'javascript',
                        'theme'     => 'chrome',
                         'default'   => '',

                    ),





                ),
            );


            $this->sections[] = array(
                'icon'      => 'el-icon-screen',
                'title' => __('Slider Settings', 'takeaway'),
                'fields' => array(

                   array(
                        'id'          => 'casa-opt-slides',
                        'type'        => 'slides',
                        'title'       => __('Slides Options', 'takeaway'),
                        'subtitle'    => __('Unlimited slides with drag and drop sortings.', 'takeaway'),
                        'placeholder' => array(
                            'title'           => __('This is a title', 'takeaway'),
                            'description'     => __('Description Here', 'takeaway'),
                            'url'             => __('Give us a link!', 'takeaway'),
                        ),
                    ),

                                  ),
                );

            $this->sections[] = array(
                'icon'      => 'el-icon-laptop',
                'title' => __('Landing page settings', 'takeaway'),
                'fields' => array(

                    array(
                        'id'        => 'takeaway-landing-logo',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('Logo for landing page', 'takeaway'),
                        'compiler'  => 'true',
                        //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'      => __('Upload banner image.', 'takeaway'),
                        'default'   => '',

                    ),
                  
                   array(
                        'id'          => 'takeaway-landing-slides',
                        'type'        => 'slides',
                        'title'       => __('Slides Options', 'takeaway'),
                        'subtitle'    => __('Unlimited slides with drag and drop sortings.', 'takeaway'),
                        'placeholder' => array(
                            'title'           => __('This is a title', 'takeaway'),
                            'description'     => __('Description Here', 'takeaway'),
                            'url'             => __('Give us a link!', 'takeaway'),
                        ),
                    ),

                   

                   array(
                        'id'        => 'takeaway-ribon-image',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('image for ribon page', 'takeaway'),
                        'compiler'  => 'true',
                        //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'      => __('Upload banner image.', 'takeaway'),
                        'default'   => '',

                    ),

                   array(
                        'id'        => 'takeaway-landing-content',
                        'title'     => __('landing slider Content ', 'takeaway'),
                        'type'      => 'editor',

                    ),

                   array(
                        'id'        => 'takeaway-landing-welcome',
                        'title'     => __('landing welcome Content ', 'takeaway'),
                        'type'      => 'editor',

                    ),


                    array(
                        'id'        => 'takeaway-order-online',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('image for order online', 'takeaway'),
                        'compiler'  => 'true',
                        //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'      => __('Upload image.', 'takeaway'),
                        'default'   => '',

                    ),

                    array(
                        'id'        => 'takeaway-about-us',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('image for about us', 'takeaway'),
                        'compiler'  => 'true',
                        //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'      => __('Upload image.', 'takeaway'),
                        'default'   => '',

                    ),

                    array(
                        'id'        => 'takeaway-find-us',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('image for find us', 'takeaway'),
                        'compiler'  => 'true',
                        //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'      => __('Upload image.', 'takeaway'),
                        'default'   => '',

                    ),
                ),
            );


            
             $this->sections[] = array(
                'title'     => __('Home page settings', 'takeaway'),
           //     'desc'      => __('Redux Framework was created with the developer in mind. It allows for any theme developer to have an advanced theme panel with most of the features a developer would need. For more information check out the Github repo at: <a href="https://github.com/ReduxFramework/Redux-Framework">https://github.com/ReduxFramework/Redux-Framework</a>', 'takeaway'),
                'icon'      => 'el-icon-print',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(



                    array(
                        'id'        => 'takeaway-banner',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('Banner Image', 'takeaway'),
                        'compiler'  => 'true',
                        //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'      => __('Upload banner image.', 'takeaway'),
                        'default'   => '',

                    ),

                    array(
                        'id'        => 'banner-title',
                        'title'     => __('Banner Title ', 'takeaway'),
                        'type'      => 'text',   

                    ),

                    array(
                        'id'        => 'takeaway-banner-content',
                        'title'     => __('Banner Banner Content ', 'takeaway'),
                        'type'      => 'editor',

                    ),


                    array(
                        'id'        => 'takeaway-background-image',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('Background Image', 'takeaway'),
                        'compiler'  => 'true',
                        'subtitle'      => __('Upload background image for welcome block.', 'takeaway'),
                        'default'   => '',

                    ),

                    

                    array(
                        'id'        => 'takeaway-banner-website-1',
                        'title'     => __('Banner Website 1', 'takeaway'),
                        'type'      => 'text',   

                    ),

                    array(
                        'id'        => 'takeaway-banner-website-2',
                        'title'     => __('Banner Website 2', 'takeaway'),
                        'type'      => 'text',   

                    ), 

                    array(
                        'id'        => 'takeaway-testimonial-background-image',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('Background Image ', 'takeaway'),
                        'compiler'  => 'true',
                        'subtitle'      => __('Upload background image for Testimonial Block.', 'takeaway'),
                        'default'   => '',

                    ),  

                    array(         
                        'id'       => 'opt-background',
                        'type'     => 'background',
                        'title'    => __('Background color', 'takeaway'),
                        'subtitle' => __('background color for testimonial block.', 'takeaway'),
                        
                )

            ));





            $this->sections[] = array(
                'icon'      => 'el-icon-paper-clip',
                'title'     => __('Header Settings', 'takeaway'),
                'fields'    => array(



                    array(
                        'id'        => 'logo',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('Logo', 'takeaway'),
                        'compiler'  => 'true',
                        //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'      => __('Upload logo image', 'takeaway'),
                        'subtitle'  => __('logo image', 'takeaway'),
                        
                    ),



                    array(
                        'id'        => 'takeaway-phone',
                        'type'      => 'text',                      
                        'title'     => __('Phone number', 'takeaway'),
                        'default'   => false,
                    ),

                    array(
                        'id'        => 'takeaway-avability',
                        'type'      => 'text',                      
                        'title'     => __('Opens at', 'takeaway'),
                        'default'   => false,
                    ),

                    array(
                        'id'        => 'closes-at',
                        'type'      => 'text',                      
                        'title'     => __('Closes at', 'takeaway'),
                        'default'   => false,
                    ),
                )
            );







            $this->sections[] = array(
                'icon'  => 'el-icon-link',
                'title' => __('Social Options', 'takeaway'),
                'fields' => array(
                    array(
                        'id'        => 'takeaway-facebook-link',
                        'type'      => 'text',                    
                        'title'     => __('Facebook', 'takeaway'),
                         'default'   => '',



                    ),
                    array(
                        'id'        => 'takeaway-twitter-link',
                        'type'      => 'text',                    
                        'title'     => __('Twitter', 'takeaway'),
                         'default'   => '',

                    ),
                    array(
                        'id'        => 'takeaway-google-link',
                        'type'      => 'text',                    
                        'title'     => __('Google', 'takeaway'),
                         'default'   => '',

                    ),
                    array(
                        'id'        => 'takeaway-linkedin-link',
                        'type'      => 'text',                    
                        'title'     => __('Linkedin', 'takeaway'),
                         'default'   => '',

                    ),
                    array(
                        'id'        => 'takeaway-pinterest-link',
                        'type'      => 'text',                    
                        'title'     => __('Pinterest', 'takeaway'),
                         'default'   => '',

                    ),
                    array(
                        'id'        => 'takeaway-dribbble-link',
                        'type'      => 'text',                    
                        'title'     => __('Dribbble', 'takeaway'),
                         'default'   => '',

                    ),

                )
            );

            $this->sections[] = array(
                'icon'      => 'el-icon-photo',
                'title'     => __('Footer Options', 'takeaway'),
                'fields'    => array(
                   
                    
                    array(
                        'id'               => 'footer-description',
                        'type'             => 'editor',
                        'title'            => __('Footer short description', 'takeaway'),
                        'subtitle'         => __('Some words from your organization', 'takeaway'),
                        // 'default'          => 'Powered by UOUApps.',
                        'args'   => array(
                            'teeny'            => true,
                            'textarea_rows'    => 10
                        )
                    ),

                    
                    array(
                        'id'               => 'footer-copyright-description',
                        'type'             => 'editor',
                        'title'            => __('Footer copyright-description', 'takeaway'),
                        'subtitle'         => __('Enter the text you want to show as footer copyright-description', 'takeaway'),
                        // 'default'          => 'Powered by UOUApps.',
                        'args'   => array(
                            'teeny'            => true,
                            'textarea_rows'    => 10
                        )
                    ),


                )
            );

            $this->sections[] = array(
                'icon'      => 'el-icon-website',
                'title'     => __('Styling Options', 'takeaway'),
                'fields'    => array(


                    array(
                        'id'            => 'takeaway-body-typography',
                        'type'          => 'typography',
                        'title'         => __('Body', 'takeaway'),
                        'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'   => true,    // Select a backup non-google font in addition to a google font
                        'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'       => false, // Only appears if google is true and subsets not set to false
                        'font-size'     => false,
                        'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
                        'output'        => array('body'), // An array of CSS selectors to apply this font style to dynamically
                        'units'         => 'px', // Defaults to px
                        'default'   => '',

                    ),



                    array(
                        'id'            => 'takeaway-header-typography',
                        'type'          => 'typography',
                        'title'         => __('Header', 'takeaway'),
                        'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'   => true,    // Select a backup non-google font in addition to a google font
                        'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'       => false, // Only appears if google is true and subsets not set to false
                        'font-size'     => false,
                        'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
                        'output'        => array('h1','h2','h3','h4','h5'), // An array of CSS selectors to apply this font style to dynamically

                        'units'         => 'px', // Defaults to px
                        'default'   => '',
                    ),

                )
            );




            $theme_info  = '<div class="redux-framework-section-desc">';
            $theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . __('<strong>Theme URL:</strong> ', 'takeaway') . '<a href="' . $this->theme->get('ThemeURI') . '" target="_blank">' . $this->theme->get('ThemeURI') . '</a></p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-author">' . __('<strong>Author:</strong> ', 'takeaway') . $this->theme->get('Author') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-version">' . __('<strong>Version:</strong> ', 'takeaway') . $this->theme->get('Version') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get('Description') . '</p>';
            $tabs = $this->theme->get('Tags');
            if (!empty($tabs)) {
                $theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . __('<strong>Tags:</strong> ', 'takeaway') . implode(', ', $tabs) . '</p>';
            }
            $theme_info .= '</div>';

            if (file_exists(dirname(__FILE__) . '/../README.md')) {
                $this->sections['theme_docs'] = array(
                    'icon'      => 'el-icon-list-alt',
                    'title'     => __('Documentation', 'takeaway'),
                    'fields'    => array(
                        array(
                            'id'        => '17',
                            'type'      => 'raw',
                            'markdown'  => true,
                            'content'   => file_get_contents(dirname(__FILE__) . '/../README.md')
                        ),
                    ),
                );
            }
            

            $this->sections[] = array(
                'title'     => __('Import / Export', 'takeaway'),
                'desc'      => __('Import and Export your Redux Framework settings from file, text or URL.', 'takeaway'),
                'icon'      => 'el-icon-refresh',
                'fields'    => array(
                    array(
                        'id'            => 'opt-import-export',
                        'type'          => 'import_export',
                        'title'         => 'Import Export',
                        'subtitle'      => 'Save and restore your Redux options',
                        'full_width'    => false,
                    ),
                ),
            );                     
                    



            if (file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
                $tabs['docs'] = array(
                    'icon'      => 'el-icon-book',
                    'title'     => __('Documentation', 'takeaway'),
                    'content'   => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
                );
            }
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => __('Theme Information 1', 'takeaway'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'takeaway')
            );

            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-2',
                'title'     => __('Theme Information 2', 'takeaway'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'takeaway')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'takeaway');
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */

/**

**/


        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'          => 'takeaway_option_data',            // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'      => $theme->get('Name'),     // Name that appears at the top of your panel
                'display_version'   => $theme->get('Version'),  // Version that appears at the top of your panel
                'menu_type'         => 'menu',                  //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'    => false,                    // Show the sections below the admin menu item or not
                'menu_title'        => __('Takeaway', 'takeaway'),
                'page_title'        => __('Takeaway Options', 'takeaway'),
                
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => 'AIzaSyBj4Lx93qjbVn9_p3Kqx178aDp4G6YrFeg', // Must be defined to add google fonts to the typography module
                
                'async_typography'  => false,                    // Use a asynchronous font on the front end or font string
                'admin_bar'         => true,                    // Show the panel pages on the admin bar
                'global_variable'   => '',                      // Set a different name for your global variable other than the opt_name
                'dev_mode'          => false,                    // Show the time the page took to load, etc
                'customizer'        => true,                    // Enable basic customizer support
                
                // OPTIONAL -> Give you extra features
                'page_priority'     => null,                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'       => 'themes.php',            // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'  => 'manage_options',        // Permissions needed to access the options panel.
                'menu_icon'         => '',                      // Specify a custom URL to an icon
                'last_tab'          => '',                      // Force your panel to always open to a specific tab (by id)
                'page_icon'         => 'icon-themes',           // Icon displayed in the admin panel next to your menu_title
                'page_slug'         => 'takeaway_options',      // Page slug used to denote the panel
                'save_defaults'     => true,                    // On load save the defaults to DB before user clicks save or not
                'default_show'      => false,                   // If true, shows the default value next to each field that is not the default value.
                'default_mark'      => '',                      // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,                   // Shows the Import/Export panel when not used as a field.
                
                // CAREFUL -> These options are for advanced use only
                'transient_time'    => 60 * MINUTE_IN_SECONDS,
                'output'            => true,                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'        => true,                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
                
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'              => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info'           => false, // REMOVE


            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'https://github.com/uouapps',
                'title' => 'Visit us on GitHub',
                'icon'  => 'el-icon-github'
                //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.facebook.com/',
                'title' => 'Like us on Facebook',
                'icon'  => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://twitter.com/uouapps',
                'title' => 'Follow us on Twitter',
                'icon'  => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://linkedin.com/company/',
                'title' => 'Find us on LinkedIn',
                'icon'  => 'el-icon-linkedin'
            );

            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace('-', '_', $this->args['opt_name']);
                }

            } else {

            }


        }

    }
    
    global $reduxConfig;
    $reduxConfig = new takeaway_admin_config();
}


if (!function_exists('redux_my_custom_field')):
    function redux_my_custom_field($field, $value) {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
endif;


if (!function_exists('redux_validate_callback_function')):
    function redux_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';


        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }
endif;
