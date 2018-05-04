<?php
    /**
     * ReduxFramework Config File (Podcaster)
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "podcaster-theme";


    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    $theme_options_img = get_template_directory_uri() . '/includes/options/img/';
    $theme_img = get_template_directory_uri() . '/img/';
    $theme_dir = get_template_directory_uri();

    /* Patterns */
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    //Background Patterns Reader
	$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
	$sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
	$sample_patterns      = array();
	$theme_options_img = get_template_directory_uri(). '/options/img/';

	function newIconFont() {
	    // Uncomment this to remove elusive icon from the panel completely
	    //wp_deregister_style( 'redux-elusive-icon' );
	    //wp_deregister_style( 'redux-elusive-icon-ie7' );
	 
	    wp_register_style(
	        'redux-font-awesome',
	        get_template_directory_uri(). '/css/font-awesome-4.4.min.css',
	        array(),
	        time(),
	        'all'
	    ); 
	    wp_enqueue_style( 'redux-font-awesome' );
	}
	// This example assumes the opt_name is set to redux_demo.  Please replace it with your opt_name value.
	add_action( 'redux/page/podcaster-theme/enqueue', 'newIconFont' );


    /*
     *
     * --> Action hook examples
     *
     */

    // If Redux is running as a plugin, this will remove the demo notice and links
    add_action( 'redux/loaded', 'pod_remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'pod_compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'pod_change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'pod_change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'pod_dynamic_section');


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    $googleapi = '';

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'thstlang' ),
        'page_title'           => __( 'Podcaster Theme Options', 'thstlang' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => $googleapi,
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        //'menu_icon'            => '',
        // Set a custom menu icon.
        'menu_icon' => $theme_options_img. 'icon.png',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'system_info'          => false,
        // REMOVE

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['share_icons']['twitter'] = array(
        'link' => 'http://twitter.com/themestationco',
        'title' => 'Follow on Twitter', 
        'img' => $theme_options_img . '/social/Twitter.png'
    );
    $args['share_icons']['vimeo'] = array(
        'link' => 'https://vimeo.com/user26521303',
        'title' => 'Follow on Vimeo', 
        'img' => $theme_options_img . '/social/Vimeo.png'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        //$args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'thstlang' ), $v );
    } else {
        //$args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'thstlang' );
    }

    // Add content after the form.
    //$args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'thstlang' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'thstlang' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'thstlang' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'thstlang' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'thstlang' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'thstlang' );
    Redux::setHelpSidebar( $opt_name, $content );

    $plugin_inuse = get_pod_plugin_active();

    

    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields

    
    Redux::setSection( $opt_name, array(
        'icon' => 'fa fa-cog',
        'title' => __('Presets', 'thstlang'),
        'desc' => __('<p class="description">Use a preset to set up your theme options with just one click.</p>', 'thstlang'),
        'fields' => array(
        	array(
                'id'         => 'pod-preset-templates',
                'type'       => 'image_select',
                'presets'    => true,
                'full_width' => true,
                'title'      => __( 'Templates Presets', 'thstlang' ),
                'subtitle'   => __( 'Click one of the templates below, to have your website set up within minutes.', 'thstlang' ),
                'default'    => 1,
                'options'    => array(
                    '5' => array(
                        'alt'     => 'Preset Default',
                        'img'     => $theme_options_img. 'preset-default.png',
                        'presets' => array(
                            'pod-color-darklight'       => 'classic',
                            'pod-color-primary'         => '#1ee8a3',
                            'pod-color-buttons-bg'      => '#1ee8a3',
                            'pod-color-buttons-link'      => '#ffffff',
                            'pod-page-header-bg'      => '#24292c',
                            'pod-page-header-text'      => '#ffffff',
                            'pod-transparent-screen'    => array(
                                'color'     => '#000000',
                                'alpha'     => 0.5
                                ),
                            'pod-colors-advanced'       => false,

                            /* Header Settings */
                            'pod-featured-header-type'  => 'static',
                            'pod-featured-header-text'  => 'Welcome to Podcaster. Handcrafted WordPress themes for your podcasting project.', 
                            'pod-upload-frontpage-header' => array(
                                'url'   => $theme_options_img. 'header.jpg'
                                ),
                            'pod-fh-bg'     => '#24292c',
                            
                            'pod-frontpage-bg-style'    => 'background-repeat:no-repeat; background-size:cover;',
                            'pod-frontpage-header-par'  => true,
                            'pod-frontpage-nextweek'    => 'show',
                            'pod-scheduling'            => true,

                            /* Front Page Posts */
                            'pod-front-posts'           => '9',
                            'pod-excerpts-type'         => 'force_excerpt',
                            'pod-excerpts-style'        => 'list',

                            /* Navigation */
                            'pod-nav-bg'                => '#282d31',
                            'pod-nav-color'             => '#fff',
                            'pod-sticky-header'         => false,
                            'pod-nav-bg-sticky'         => '#81F9AC',
                            'pod-nav-color-sticky'         => '#222',

                            /* Logo */

                            /* Type & Direction */
                            'pod-typography'            => 'sans-serif',
                            'pod-reading-direction'     => false,

                            /* Podcast */
                            'pod-archive-icons'         => 'audio_icons',
                            'pod-list-style'            => 'list',
                            'pod-recordings-amount'     => '9',
                            'pod-archive-hide-in-blog'  => false,
                            'pod-single-header-display' => 'has-thumbnail',
                            'pod-single-header-par'     => false,
                            'pod-single-video-bg'       => false,

                            /* Blog & Avatars */
                            'pod-blog-layout'           => 'sidebar-right',
                            'pod-blog-header'           => array(
                                'url'   =>  $theme_options_img. 'preset-1-header.jpg'
                                ),
                            'pod-blog-bg-style'         => 'background-repeat:no-repeat; background-size:cover;',
                            'pod-blog-header-par'       => true,
                            'pod-blog-header-title'     => 'News & Updates',
                            'pod-blog-header-blurb'     => 'A page for your blog posts',
                            'pod-comments-setup'        => 'comm',
                            'pod-pofo-gallery'          => 'grid_on',
                            'pod-avatar-front'          => false,
                            'pod-avatar-blog'           => false,
                            'pod-authname-blog'         => false,
                            'pod-avatar-single'         => false,
                            'pod-authname-single'       => true,
                            'pod-avatar-comments'       => false,
                            'pod-avatar-authorpages'    => true,

                            /* Social Media */
                            'pod-social-color'          => 'light-icons',
                            'pod-social-nav'            => true,
                            'pod-social-footer'         => true,

                        )
                    ),
                	'1' => array(
                        'alt'     => 'Preset 1',
                        'img'     => $theme_options_img. 'preset-1.png',
                        'presets' => array(
                        	'pod-color-darklight'		=> 'classic',
                        	'pod-color-primary'			=> '#3cb3b2',
                            'pod-color-buttons-bg'      => '#3cb3b2',
                            'pod-color-buttons-link'      => '#ffffff',
                            'pod-page-header-bg'      => '#3cb3b2',
                            'pod-page-header-text'      => '#ffffff',
                            'pod-colors-advanced'       => false,

                            /* Header Settings */
                            'pod-featured-header-type'  => 'text',
                            'pod-upload-frontpage-header' => array(
                                'url'   => $theme_options_img. 'preset-1-header.jpg'
                                ),
                            'pod-fh-bg'     => '#24292c',
                            'pod-fh-padding'            => array(
                                'padding-top'     => '400px', 
                                'padding-bottom'  => '100px', 
                                'units'          => 'px', 
                            ),
                            'pod-frontpage-bg-style'    => 'background-repeat:no-repeat; background-size:cover;',
                            'pod-frontpage-header-par'  => true,
                            'pod-frontpage-nextweek'    => 'show',
                            'pod-scheduling'            => true,

                            /* Front Page Posts */
                            'pod-front-posts'           => '9',
                            'pod-excerpts-type'         => 'force_excerpt',
                            'pod-excerpts-style'        => 'list',

                            /* Navigation */
                            'pod-nav-bg'                => 'transparent',
                            'pod-nav-bg-if-transparent' => '#349099',
                            'pod-nav-color'             => '#55e0de',
                            'pod-sticky-header'         => false,
                            'pod-nav-bg-sticky'         => '#28c1b5',
                            'pod-nav-color-sticky'         => '#ffffff',

                            /* Logo */

                            /* Type & Direction */
                            'pod-typography'            => 'sans-serif',
                            'pod-reading-direction'     => false,

                            /* Podcast */
                            'pod-archive-icons'         => 'audio_icons',
                            'pod-list-style'            => 'list',
                            'pod-recordings-amount'     => '9',
                            'pod-archive-hide-in-blog'  => false,
                            'pod-single-header-display' => 'has-thumbnail',
                            'pod-single-header-par'     => false,
                            'pod-single-video-bg'       => false,

                            /* Blog & Avatars */
                            'pod-blog-layout'           => 'sidebar-right',
                            'pod-blog-header'           => array(
                                'url'   =>  $theme_options_img. 'preset-1-header.jpg'
                                ),
                            'pod-blog-bg-style'         => 'background-repeat:no-repeat; background-size:cover;',
                            'pod-blog-header-par'       => true,
                            'pod-blog-header-title'     => 'News & Updates',
                            'pod-blog-header-blurb'     => 'A page for your blog posts',
                            'pod-comments-setup'        => 'comm',
                            'pod-pofo-gallery'          => 'grid_on',
                            'pod-avatar-front'          => false,
                            'pod-avatar-blog'           => false,
                            'pod-authname-blog'         => false,
                            'pod-avatar-single'         => false,
                            'pod-authname-single'       => true,
                            'pod-avatar-comments'       => false,
                            'pod-avatar-authorpages'    => true,

                            /* Social Media */
                            'pod-social-nav'            => true,
                            'pod-social-footer'         => true,

                        )
                    ),
					'2' => array(
                        'alt'     => 'Preset 2',
                        'img'     => $theme_options_img . 'preset-2.png',
                        'presets' => array(
                        	/* Template & Color */
                            'pod-color-darklight'      => 'dark',
                            'pod-color-primary'         => '#e04318',
                            'pod-page-header-bg'        => '#161616',
                            'pod-color-buttons-bg'      => '#e04318',
                            'pod-color-buttons-link'      => '#ffffff',
                            'pod-colors-advanced'       => false,

                            /* Header */
                            'pod-featured-header-type'  => 'static',
                            'pod-upload-frontpage-header' => array(
                                'url'   => $theme_options_img. 'preset-2-header.jpg'
                                ),
                            'pod-frontpage-bg-style'    => 'background-repeat:no-repeat; background-size:cover;',
                            'pod-frontpage-header-par'  => true,
                            'pod-frontpage-nextweek'    => 'show',
                            'pod-scheduling'            => true,

                            /* Front Page Posts */
                            'pod-front-posts'           => '9',
                            'pod-excerpts-type'         => 'force_excerpt',
                            'pod-excerpts-style'        => 'list',

                            /* Navigation */
                            'pod-nav-bg'                => 'transparent',
                            'pod-nav-color'             => '#bfbfbf',
                            'pod-nav-bg-if-transparent' => '#e04318',
                            'pod-sticky-header'         => true,
                            'pod-nav-bg-sticky'         => '#ff470a',
                            'pod-nav-color-sticky'         => '#ffe1d8',

                            /* Logo */

                            /* Type & Direction */
                            'pod-typography'            => 'serif',
                            'pod-reading-direction'     => false,

                            /* Podcast */
                            'pod-archive-icons'         => 'video_icons',
                            'pod-list-style'            => 'list',
                            'pod-recordings-amount'     => '9',
                            'pod-archive-hide-in-blog'  => false,
                            'pod-single-header-display' => 'has-thumbnail',
                            'pod-single-header-par'     => false,
                            'pod-single-video-bg'       => false,

                            /* Blog & Avatars */
                            'pod-blog-layout'           => 'sidebar-left',
                            'pod-blog-header'           => array(
                                'url'   =>  $theme_options_img. 'preset-2-header.jpg'
                                ),
                            'pod-blog-bg-style'         => 'background-repeat:no-repeat; background-size:cover;',
                            'pod-blog-header-par'       => true,
                            'pod-blog-header-title'     => 'News & Updates',
                            'pod-blog-header-blurb'     => 'A page for your blog posts',
                            'pod-comments-setup'        => 'comm',
                            'pod-pofo-gallery'          => 'grid_on',
                            'pod-avatar-front'          => false,
                            'pod-avatar-blog'           => false,
                            'pod-authname-blog'         => false,
                            'pod-avatar-single'         => false,
                            'pod-authname-single'       => true,
                            'pod-avatar-comments'       => false,
                            'pod-avatar-authorpages'    => true,

                            /* Social Media */
                            'pod-social-color'          => 'light-icons',
                            'pod-social-nav'            => true,
                            'pod-social-footer'         => true,
                        )
                    ),
					'3' => array(
                        'alt'     => 'Preset 3',
                        'img'     => $theme_options_img . 'preset-3.png',
                        'presets' => array(
                        	/* Template & Color */
                            'pod-color-darklight'      => 'classic',
                            'pod-color-primary'         => '#eab710',
                            'pod-page-header-bg'        => '#ffb711',
                            'pod-color-buttons-bg'      => '#eab710',
                            'pod-color-buttons-link'      => '#222222',
                            'pod-colors-advanced'       => false,

                            /* Header */
                            'pod-featured-header-type'  => 'static-posts',
                            'pod-upload-frontpage-header' => array(
                                'url'   => $theme_options_img. 'preset-3-header.jpg'
                                ),
                            'pod-frontpage-bg-style'    => 'background-repeat:no-repeat; background-size:cover;',
                            'pod-frontpage-header-par'  => true,
                            'pod-frontpage-nextweek'    => 'show',
                            'pod-scheduling'            => true,

                            /* Front Page Posts */
                            'pod-front-posts'           => '9',
                            'pod-excerpts-type'         => 'force_excerpt',
                            'pod-excerpts-style'        => 'columns',

                            /* Navigation */
                            'pod-nav-bg'                => '#ffd711',
                            'pod-nav-color'             => '#111111',
                            'pod-sticky-header'         => true,
                            'pod-nav-bg-sticky'         => '#000000',
                            'pod-nav-color-sticky'      => '#ffd711',

                            /* Logo */

                            /* Type & Direction */
                            'pod-typography'            => 'sans-serif',
                            'pod-reading-direction'     => false,

                            /* Podcast */
                            'pod-archive-icons'         => 'video_icons',
                            'pod-list-style'            => 'list',
                            'pod-recordings-amount'     => '9',
                            'pod-archive-hide-in-blog'  => false,
                            'pod-single-header-display' => 'has-thumbnail',
                            'pod-single-header-par'     => false,
                            'pod-single-video-bg'       => false,

                            /* Blog & Avatars */
                            'pod-blog-layout'           => 'sidebar-left',
                            'pod-blog-header'           => array(
                                'url'   =>  $theme_options_img. 'preset-3-header.jpg'
                                ),
                            'pod-blog-bg-style'         => 'background-repeat:no-repeat; background-size:cover;',
                            'pod-blog-header-par'       => true,
                            'pod-blog-header-title'     => 'News & Updates',
                            'pod-blog-header-blurb'     => 'A page for your blog posts',
                            'pod-comments-setup'        => 'comm',
                            'pod-pofo-gallery'          => 'grid_on',
                            'pod-avatar-front'          => false,
                            'pod-avatar-blog'           => false,
                            'pod-authname-blog'         => false,
                            'pod-avatar-single'         => false,
                            'pod-authname-single'       => true,
                            'pod-avatar-comments'       => false,
                            'pod-avatar-authorpages'    => true,

                            /* Social Media */
                            'pod-social-color'          => 'dark-icons',
                            'pod-social-nav'            => true,
                            'pod-social-footer'         => true,
                        )
                    ),
					'4' => array(
                        'alt'     => 'Preset 4',
                        'img'     => $theme_options_img . 'preset-4.png',
                        'presets' => array(
                        	/* Template & Color */
                            'pod-color-darklight'      => 'classic',
                            'pod-color-primary'         => '#ff565f',
                            'pod-color-buttons-bg'      => '#ffffff',
                            'pod-color-buttons-link'      => '#3d3d3d',
                            'pod-page-header-bg'        => '#adadad',
                            'pod-page-header-text'      => '#ffffff',
                            'pod-colors-advanced'       => false,

                            /* Header */
                            'pod-featured-header-type'  => 'slideshow',
                            'pod-featured-header-slides-amount' => '3',
                            'pod-fh-bg'                 => '#ff565f',
                            'pod-frontpage-header-par'  => false,
                            'pod-frontpage-nextweek'    => 'show',
                            'pod-scheduling'            => true,

                            /* Front Page Posts */
                            'pod-front-posts'           => '9',
                            'pod-excerpts-type'         => 'force_excerpt',
                            'pod-excerpts-style'        => 'columns',

                            /* Navigation */
                            'pod-nav-bg'                => '#ffffff',
                            'pod-nav-bg-if-transparent' => '#c44247',
                            'pod-nav-color'             => '#212121',
                            'pod-sticky-header'         => false,

                            /* Logo */

                            /* Type & Direction */
                            'pod-typography'            => 'sans-serif',
                            'pod-reading-direction'     => false,

                            /* Podcast */
                            'pod-archive-icons'         => 'video_icons',
                            'pod-list-style'            => 'grid',
                            'pod-recordings-amount'     => '9',
                            'pod-archive-hide-in-blog'  => false,
                            'pod-single-header-display' => 'has-thumbnail',
                            'pod-single-header-par'     => false,
                            'pod-single-video-bg'       => false,

                            /* Blog & Avatars */
                            'pod-blog-layout'           => 'sidebar-left',
                            'pod-blog-header'           => array(
                                'url'   =>  ''
                                ),
                            'pod-blog-bg-style'         => 'background-repeat:no-repeat; background-size:cover;',
                            'pod-blog-header-par'       => true,
                            'pod-comments-setup'        => 'comm',
                            'pod-pofo-gallery'          => 'slideshow',
                            'pod-avatar-front'          => false,
                            'pod-avatar-blog'           => false,
                            'pod-authname-blog'         => false,
                            'pod-avatar-single'         => false,
                            'pod-authname-single'       => true,
                            'pod-avatar-comments'       => false,
                            'pod-avatar-authorpages'    => true,

                            /* Social Media */
                            'pod-social-color'          => 'dark-icons',
                            'pod-social-nav'            => true,
                            'pod-social-footer'         => true,
                        )
                    ),
                    /*'6' => array(
                        'alt'     => 'Preset 5',
                        'img'     => $theme_options_img . 'preset-5.png',
                        'presets' => array(
                            /* Template & Color 
                            'pod-color-darklight'      => 'classic',
                            'pod-color-primary'         => '#0164bd',
                            'pod-color-buttons-bg'      => '#0164bd',
                            'pod-color-buttons-link'      => '#fff',
                            'pod-page-header-bg'        => '#adadad',
                            'pod-page-header-text'      => '#ffffff',

                            /* Header 
                            'pod-featured-header-type'  => 'slideshow',
                            'pod-featured-header-slides-amount' => '5',
                            'pod-featured-header-content' => 'newest',
                            'pod-fh-bg'                 => '#b4d7ed',
                            'pod-fh-text-color'         => '#fff',
                            'pod-embed-style'           => 'center',
                            'pod-embed-widths'          => 'narrow',
                            'pod-embed-title-position'  => 'above',
                            'pod-embed-excerpt-position' => 'above',
                            'pod-frontpage-fetured-ex'  => true,
                            'pod-frontpage-featured-ex-style' => 'stlye-2',
                            'pod-frontpage-featured-read-more' => 'show',
                            'pod-frontpage-nextweek'    => 'show',
                            'pod-scheduling'            => true,

                            /* Front Page Posts 
                            'pod-front-posts'           => '9',
                            'pod-excerpts-type'         => 'force_excerpt',
                            'pod-excerpts-style'        => 'columns',

                            /* Navigation 
                            'pod-nav-bg'                => 'transparent',
                            'pod-nav-bg-if-transparent' => '#c44247',
                            'pod-nav-color'             => '#fff',
                            'pod-sticky-header'         => true,
                            'pod-nav-bg-sticky'         => '#2586e8',
                            'pod-nav-color-sticky'      => '#222222',
                            'pod-nav-search'            => true,


                            /* Logo 

                            /* Type & Direction 
                            'pod-typography'            => 'custom',
                            'pod-typo-main-heading'     => array(
                                'color'       => '#fff', 
                                'font-weight'  => '700', 
                                'font-family' => 'Playfair Display', 
                            ),
                            'pod-typo-featured-heading' => array(
                                'color'       => '#fff', 
                                'font-weight'  => '400', 
                                'font-family' => 'Playfair Display',
                                'font-size' => '64px',
                            ),
                            'pod-typo-headings'         => array(
                                'color'       => '#fff', 
                                'font-weight'  => '400', 
                                'font-family' => 'Playfair Display',
                                'font-size' => '54px',
                            ),
                            'pod-typo-text'             => array(
                                'color'       => '#555555', 
                                'font-weight'  => '200', 
                                'font-family' => 'Martel Sans',
                                'font-size' => '18px',
                            ),
                            'pod-reading-direction'     => false,

                            /* Podcast 
                            'pod-archive-icons'         => 'video_icons',
                            'pod-list-style'            => 'grid',
                            'pod-recordings-amount'     => '9',
                            'pod-archive-hide-in-blog'  => false,
                            'pod-single-header-display' => 'has-thumbnail',
                            'pod-single-header-par'     => false,
                            'pod-single-video-bg'       => false,

                            /* Blog & Avatars 
                            'pod-blog-layout'           => 'no-sidebar',
                            'pod-blog-header'           => array(
                                'url'   =>  ''
                                ),
                            'pod-blog-bg-style'         => 'background-repeat:no-repeat; background-size:cover;',
                            'pod-blog-header-par'       => true,
                            'pod-comments-setup'        => 'comm',
                            'pod-pofo-gallery'          => 'slideshow',
                            'pod-avatar-front'          => false,
                            'pod-avatar-blog'           => false,
                            'pod-authname-blog'         => false,
                            'pod-avatar-single'         => false,
                            'pod-authname-single'       => true,
                            'pod-avatar-comments'       => false,
                            'pod-avatar-authorpages'    => true,

                            /* Social Media 
                            'pod-social-color'          => 'dark-icons',
                            'pod-social-nav'            => true,
                            'pod-social-footer'         => true,
                        )
                    ),*/
				)
			)
		)
	));
	
	Redux::setSection( $opt_name, array(
        'icon' => 'fa fa-eyedropper',
        'title' => __('Colors', 'thstlang'),
        'desc' => __('<p class="description">Select your website template and colors.</p>', 'thstlang'),
        'fields' => array(
        	array(
				'id'=>'pod-color-darklight',
				'type' => 'image_select',
				'title' => __('Light/Dark Template', 'thstlang'), 
				'subtitle' => __('Which template would you like to use?', 'thstlang'),
				'desc' => __('Choose between classic and dark.', 'thstlang'),
				'options' => array(
                    'classic' => array('title' => 'Classic', 'img' => $theme_options_img. 'color-options-classic.png'),
                    'dark' => array('title' => 'Dark', 'img' => $theme_options_img. 'color-options-dark.png')
				),
				'default' => 'classic'
			),
        	array(
                'id' => 'pod-color-primary',
                'type' => 'color',
                'title' => __('Accent Color', 'thstlang'),
                'subtitle' => __('Which highlight color would you like to use?', 'thstlang'),
                'desc' => __('Use the colorpicker to choose a highlight color.', 'thstlang'),
                'default' => '#1ee8a3',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'pod-color-buttons-raw-title',
                'type'     => 'raw',
                'title'  => __( '<h3>Buttons</h3>', 'thstlang' ),
                'content'  => __( 'Use the settings below to customize the buttons for your website.', 'thstlang' ),
            ),
            array(
                'id' => 'pod-color-buttons-bg',
                'type' => 'color',
                'title' => __('Button Background Color', 'thstlang'),
                'subtitle' => __('Which color would you like to use for the background color of your buttons?', 'thstlang'),
                'desc' => __('Use the colorpicker to choose a background color for your buttons.', 'thstlang'),
                'default' => '#1ee8a3',
                'validate' => 'color',
                'transparent' => false,
                'output'    => array('background-color' => '.input[type="submit"]:link, input[type="submit"]:visited, #respond #commentform #submit:link, #respond #commentform #submit:visited, a.butn:link, a.butn:visited, .butn:link, .butn:visited,input.secondary[type="submit"], #respond #cancel-comment-reply-link:link, #respond #cancel-comment-reply-link:visited, #comments .commentlist li .comment-body .reply a:link, #comments .commentlist li .comment-body .reply a:visited,#respond #commentform #submit, .wpcf7-form-control.wpcf7-submit, .fromtheblog.list article .post-content .cats a:link, .fromtheblog.list article .post-content .cats a:visited')
            ),
            array(
                'id' => 'pod-color-buttons-link',
                'type' => 'color',
                'title' => __('Button Text Color', 'thstlang'),
                'subtitle' => __('Which color would you like to use for the text on your buttons?', 'thstlang'),
                'desc' => __('Use the colorpicker to choose a color for the text on your buttons.', 'thstlang'),
                'default' => '#fff',
                'validate' => 'color',
                'transparent' => false,
                'output'    => array('color' => '.input[type="submit"]:link, input[type="submit"]:visited, #respond #commentform #submit:link, #respond #commentform #submit:visited, a.butn:link, a.butn:visited, .butn:link, .butn:visited,input.secondary[type="submit"], #respond #cancel-comment-reply-link:link, #respond #cancel-comment-reply-link:visited, #comments .commentlist li .comment-body .reply a:link, #comments .commentlist li .comment-body .reply a:visited,#respond #commentform #submit, .wpcf7-form-control.wpcf7-submit, .fromtheblog.list article .post-content .cats a:link, .fromtheblog.list article .post-content .cats a:visited')
            ),
            array(
                'id'       => 'pod-color-page-raw-title',
                'type'     => 'raw',
                'title'  => __( '<h3>Page Headers</h3>', 'thstlang' ),
                'content'  => __( 'Use the settings below to customize the header section for your website.', 'thstlang' ),
            ),
			array(
			    'id'       => 'pod-page-header-bg',
			    'type'     => 'color',
			    'title'    => __('Page Header Background Color', 'thstlang'),
			    'subtitle' => __('Set the background color for the headers used on your pages.', 'thstlang'),
			    'desc'     => __('Use the color picker to select the background color.', 'thstlang'),		    
			    'default' => '#24292c',
			    'transparent' => false,
			),
            array(
                'id'       => 'pod-page-header-title',
                'type'     => 'color',
                'title'    => __('Page Header Title Color', 'thstlang'),
                'subtitle' => __('Set the text color for the headers used on your pages.', 'thstlang'),
                'desc'     => __('Use the color picker to select the text color.', 'thstlang'),           
                'default' => '#fff',
                'transparent' => false,
                'output'    => array('color' => '.page .reg .heading h1, .podcast-archive .reg .heading h1, .search .reg .heading h1, .archive .reg .heading h1, .archive .reg .heading h2, .blog .static .title h1, .archive .author_profile .info .author_name, .page .reg .heading .title, .archive .reg .heading .title, .search .reg .heading .title')
            ),
            array(
                'id'       => 'pod-page-header-text',
                'type'     => 'color',
                'title'    => __('Page Header Text Color', 'thstlang'),
                'subtitle' => __('Set the text color for the headers used on your pages.', 'thstlang'),
                'desc'     => __('Use the color picker to select the text color.', 'thstlang'),           
                'default' => '#fff',
                'transparent' => false,
                'output'    => array('color' => '.postfooter, .archive .reg .heading .title p, .page .reg .heading .title p')
            ),
            array(
                'id' => 'pod-filter-active',
                'type' => 'switch',
                'title' => __('Activate Transparent Filter', 'thstlang'), 
                'subtitle' => __('Would you like to activate the transparent filter displayed over header images?', 'thstlang'),
                'desc' => __('Turn the switch to activate the filter.', 'thstlang'),
                'default' => true
            ),
            array(
                'id'        => 'pod-transparent-screen',
                'type'      => 'color_rgba',
                'required'  => array( 'pod-filter-active', '=', true ),
                'title'     => 'Transparent Filter',
                'subtitle'  => 'Set color and transparency of the screens used on headers across the website.',
                'desc'      => 'Use the color picker to select a color. Then use the slider to select the transparency.',
                'transparent' => false,
                'output'    => array('background-color' => '
                    .screen, 
                    .latest-episode.front-header .translucent,
                    .front-page-header.front-header .translucent,
                    .single .single-featured.has-featured-image .translucent, 
                    .single .single-featured.thumb_bg .background, 
                    .front-page-header.slideshow .has-header .inside, 
                    .front-page-header.static.has-header .inside,
                    .front-page-header.text.has-header .inside'),
                'default'   => array(
                    'color'     => '#000000',
                    'alpha'     => 0.5
                ),                    
            ),
            array(
                'id'       => 'pod-color-footer-raw-title',
                'type'     => 'raw',
                'title'  => __( '<h3>Footer</h3>', 'thstlang' ),
                'content'  => __( 'Use the settings below to customize the footer section for your website.', 'thstlang' ),
            ),
            array(
                'id'       => 'pod-footer-navigation',
                'type'     => 'color',
                'title'    => __('Footer Navigation Background Color', 'thstlang'),
                'subtitle' => __('Set the background color for your footer navigation.', 'thstlang'),
                'desc'     => __('Use the color picker to select the background color of your footer navigation.', 'thstlang'),           
                'default' => '#282d31',
                'transparent' => false,
                'output'    => array('background-color' => '.postfooter')
            ),
            array(
                'id'       => 'pod-footer-navigation-text',
                'type'     => 'color',
                'title'    => __('Footer Navigation Text Color', 'thstlang'),
                'subtitle' => __('Set the color for your footer navigation text.', 'thstlang'),
                'desc'     => __('Use the color picker to select the color of your footer navigation text.', 'thstlang'),           
                'default' => '#fff',
                'transparent' => false,
                'output'    => array('color' => '.postfooter')
            ),
            array(
                'id'       => 'pod-footer-navigation-link',
                'type'     => 'color',
                'title'    => __('Footer Navigation Link Color', 'thstlang'),
                'subtitle' => __('Set the color for your footer navigation links.', 'thstlang'),
                'desc'     => __('Use the color picker to select the color of your footer navigation links.', 'thstlang'),           
                'default' => '#fff',
                'transparent' => false,
                'output'    => array('color' => '.postfooter a:link, .postfooter a:visited')
            ),
            array(
                'id'       => 'pod-footer-navigation-hover',
                'type'     => 'color',
                'title'    => __('Footer Navigation Hover Color', 'thstlang'),
                'subtitle' => __('Set the hover color for your footer navigation links.', 'thstlang'),
                'desc'     => __('Use the hover color picker to select the color of your footer navigation links.', 'thstlang'),           
                'default' => '#fff',
                'transparent' => false,
                'output'    => array('color' => '.postfooter a:hover')
            ),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'icon' => 'fa fa-picture-o',
        'icon_class' => 'icon-large',
        'title' => __('Front Page Header', 'thstlang'),
        'desc' => __('<p class="description">Set up your header.</p>', 'thstlang'),
        'fields' => array(
            array(
                'id' => 'pod-featured-header-type',
                'type' => 'button_set',
                'title' => __('Header Type', 'thstlang'),
                'subtitle' => __('What type of header would you like to display?', 'thstlang'),
                'desc' => __('Choose between a text, static header or slideshow.', 'thstlang'),
                'options' => array(
                    'text' => 'Text',
                    'static' => 'Static',
                    'static-posts' => 'Static (Posts)',
                    'slideshow' => 'Slideshow',
                    ),
                'default' => 'static'
            ),
            array(
                'id' => 'pod-featured-header-text',
                'type' => 'text',
                'required' => array('pod-featured-header-type', '=', 'text'),
                'title' => __('Text', 'thstlang'),
                'subtitle' => __('What text should be displayed on your header?', 'thstlang'),
                'desc' => __('Enter the text to be displayed on your header.', 'thstlang'),
                'placeholder' => 'Type your text here.',
                'default' => 'Welcome to Podcaster. Handcrafted WordPress themes for your podcasting project.',
            ),
            array(
                'id' => 'pod-featured-header-text-url',
                'type' => 'text',
                'required' => array('pod-featured-header-type', '=', 'text'),
                'title' => __('Link (Optional)', 'thstlang'),
                'subtitle' => __('Do you want your text to link somewhere?', 'thstlang'),
                'desc' => __('Enter the URL you would like to link your text to.', 'thstlang'),
                'placeholder' => 'http://www.example.com',
                'default' => '',
                'validate' => 'url',
            ),
            array(
                'id'=>'pod-featured-header-slides-amount',
                'type' => 'spinner',
                'required' => array('pod-featured-header-type', '=', 'slideshow'),
                'title' => __('Amount of Slides', 'thstlang'),
                'subtitle' => __('How many featured posts should your slideshow contain?', 'thstlang'),
                'desc'=> __('Click through to get to the amount of posts you want to display.', 'thstlang'),
                "default"   => "5",
                "min"       => "1",
                "step"      => "1",
                "max"       => "999"
            ),
            array(
                'id' => 'pod-featured-header-content',
                'type' => 'button_set',
                'required' => array( 'pod-featured-header-type', '=', array( 'static', 'static-posts', 'slideshow' )),
                'title' => __('Header Content', 'thstlang'),
                'subtitle' => __('Would you like to display a featured posts or newest posts?', 'thstlang'),
                'desc' => __('Choose between a featured posts or newest posts.', 'thstlang'),
                'options' => array(
                    'newest' => 'Newest',
                    'featured' => 'Featured',
                    ),
                'default' => 'newest'
            ),
            array(
                'id' => 'pod-featured-heading',
                'type' => 'text',
                'required' => array( 'pod-featured-header-type', '=', array( 'static', 'static-posts', 'slideshow' )),
                'title' => __('Header Title', 'thstlang'),
                'subtitle' => __('What is the title of your featured post section?', 'thstlang'),
                'desc' => __('Enter the title of your featured post section into the text field above.', 'thstlang'),
                'placeholder' => 'Featured Episode',
                'default' => 'Featured Episode',
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Background', 'thstlang' ),
        'desc'       => __( 'Set the options for your header background', 'thstlang' ),
        'id'         => 'pod-subsection-fheader-background',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'pod-upload-frontpage-header',
                'type' => 'media',
                'required' => array( 'pod-featured-header-type', '=', array( 'text', 'static' )),
                'title' => __('Header Background', 'thstlang'),
                'subtitle' => __('Would you like to upload a header for the font page?', 'thstlang'),
                'desc' => __('Upload an image which will be displayed as your header.(Size: approximately 500 x 1920px. Increase height if you are using parallax.)', 'thstlang'),
                'default' => ''
            ),
            array(
                'id' => 'pod-page-image',
                'type' => 'checkbox',
                'required' => array( 'pod-featured-header-type', '=', array( 'static' )),
                'title' => __('Featured Image (from page)', 'thstlang'), 
                'subtitle' => __('Do you want to use the featured image from front page instead?', 'thstlang'),
                'desc' => __('Check this box if you would like to use the featured image from your set front page instead of uploading it above.', 'thstlang'),
                'switch' => true,
                'std' => '0'
            ),          
            array(
                'id'=>'pod-fh-bg',
                'type' => 'color',
                'title' => __('Header Background Color', 'thstlang'),
                'subtitle' => __('Set the background for your featured header.', 'thstlang'),
                'desc' => __('This color will be used when no background image has been uploaded. ', 'thstlang'),
                'default' => '#24292c',
                'transparent' => false,
            ),
            array(
                'id' => 'pod-fh-text-color',
                'type' => 'color',
                'title' => __('Header Text Color', 'thstlang'),
                'subtitle' => __('Which text color would you like to use?', 'thstlang'),
                'desc' => __('Use the colorpicker to choose a text color.', 'thstlang'),
                'default' => '#fff',
                'validate' => 'color',
                'transparent' => false,
                'output'    => array( 'color' => '.latest-episode .main-featured-post .featured-excerpt, .front-page-header .featured-excerpt' )
            ),
            array(
                'id'             => 'pod-fh-padding',
                'type'           => 'spacing',
                'required' => array( 'pod-featured-header-type', '=', array( 'text' )),
                'output'         => array('.front-page-header.text .content-text, .front-page-header.text.nav-transparent .content-text'),
                'mode'           => 'padding',
                'units'          => array('px'),
                'units_extended' => 'false',
                'top'           => true,
                'bottom'           => true,
                'left'           => false,
                'right'           => false,
                'title'          => __('Padding', 'thstlang'),
                'subtitle'       => __('Do you want to set your padding?', 'thstlang'),
                'desc'           => __('Add padding to the top or bottom of your header.', 'thstlang'),
                'default'            => array(
                    'padding-top'     => '75px', 
                    'padding-bottom'  => '75px', 
                    'units'          => 'px', 
                ),
            ),    
            array(
                'id' => 'pod-frontpage-bg-style',
                'type' => 'radio',
                'required' => array( 'pod-featured-header-type', '=', array( 'text', 'static' )),
                'title' => __('Header Background Style', 'thstlang'),
                'subtitle' => __('How do you want to display the header image?', 'thstlang'),
                'desc' => __('Set the style for your header image. Choose between stretched and tiled.', 'thstlang'),
                'options' => array(
                    'background-repeat:repeat;' => 'Tiled',
                    'background-repeat:no-repeat; background-size:cover;' => 'Stretched',
                ),
                'default' => 'background-repeat:repeat;'
            ),
            array(
                'id' => 'pod-frontpage-header-par',
                'type' => 'switch',
                'required' => array( 'pod-featured-header-type', '=', array( 'text', 'static' )),
                'title' => __('Parallax', 'thstlang'),
                'subtitle' => __('Would you like to activate parallax scrolling?', 'thstlang'),
                'desc' => __('Turn the switch to "On" to activate Parallax scrolling for your blog header.', 'thstlang'),
                'default' => false,
            ),        
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Embeds', 'thstlang' ),
        'desc'       => __( 'Set the options for your header background', 'thstlang' ),
        'id'         => 'pod-subsection-fheader-embeds',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'=>'pod-embed-style',
                'type' => 'select',
                'title' => __('Embed Position', 'thstlang'), 
                'subtitle' => __('How would you like to display your embeds?', 'thstlang'),
                'desc' => __('Choose between left, right and centered.', 'thstlang'),
                'options' => array(
                    'left' => 'Left',
                    'center' => 'Centered',
                    'right' => 'Right',
                ),
                'default' => 'left'
            ),
            array(
                'id'=>'pod-embed-widths',
                'type' => 'select',
                'title' => __('Embed Widths', 'thstlang'), 
                'subtitle' => __('How wide would you like your embeds to be?', 'thstlang'),
                'desc' => __('Choose between narrow, medium, wide and full.', 'thstlang'),
                'options' => array(
                    'narrow' => 'Narrow', 
                    'equal' =>'Medium',
                    'wide' => 'Wide',
                    'full' => 'Full (Only Centered)',
                ),
                'default' => 'wide'
            ),
            array(
                'id' => 'pod-embed-aligment',
                'type' => 'radio',
                'required' => array( 'pod-featured-header-type', '=', array( 'static' ) ),
                'title' => __('Aligment', 'thstlang'),
                'subtitle' => __('How do you want your header and text elements to be aligned?', 'thstlang'),
                'desc' => __('Set the alignment above, choose between left (default), center and right.', 'thstlang'),
                'options' => array(
                    'left' => 'Left',
                    'center' => 'Center',
                    'right' => 'Right'
                ),
                'default' => 'left'
            ),        
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Excerpt', 'thstlang' ),
        'desc'       => __( 'Set the options for your excerpt', 'thstlang' ),
        'id'         => 'pod-subsection-fheader-excerpt',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'pod-frontpage-fetured-ex',
                'type' => 'switch',
                //'required' => array( 'pod-featured-header-type', '==', array( 'static' )),
                'title' => __('Featured Excerpt', 'thstlang'),
                'subtitle' => __('Would you like to display a featured excerpt?', 'thstlang'),
                'desc' => __('Turn the switch to "On" to display a featured excerpt on the front page.', 'thstlang'),
                'default' => false,
            ),
            array(
                'id' => 'pod-frontpage-featured-ex-style',
                'type' => 'image_select',
                'title' => __('Excerpt Style', 'thstlang'), 
                'required' => array('pod-frontpage-fetured-ex', '=', true),
                'subtitle' => __('What excerpt style would you like to use?', 'thstlang'),
                'desc' => __('Choose between styles.', 'thstlang'),
                'options' => array(
                    'style-1' => array('title' => 'Style 1', 'img' => $theme_options_img. 'excerpt-1.png'),
                    'style-2' => array('title' => 'Style 2', 'img' => $theme_options_img. 'excerpt-2.png'),
                ),
                'default' => 'style-1'
            ),
            array(
                'id' => 'pod-frontpage-featured-ex-posi',
                'type' => 'radio',
                'required' => array( 'pod-frontpage-fetured-ex', '=', true ),
                'title' => __('Excerpt Position', 'thstlang'),
                'subtitle' => __('Where would you like to display your featured post excerpt?', 'thstlang'),
                'desc' => __('Set the position, choose between above and below (default) your media.', 'thstlang'),
                'options' => array(
                    'above' => 'Above Media',
                    'below' => 'Below Media',
                ),
                'default' => 'below'
            ),
             array(
                'id' => 'pod-frontpage-featured-read-more',
                'type' => 'button_set',
                'title' => __('Read More Link', 'thstlang'),
                'required' => array('pod-frontpage-fetured-ex', '=', true),
                'subtitle' => __('Would you like to show or hide the <em>Read More</em> link?', 'thstlang'),
                'desc' => __('Choose to hide or show the <em>Read More</em> link.', 'thstlang'),
                'options' => array(
                    'show' => 'Show',
                    'hide' => 'Hide',
                    ),
                'default' => 'show'
            ),        
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Scheduled Posts', 'thstlang' ),
        'desc'       => __( 'Set the options for your excerpt', 'thstlang' ),
        'id'         => 'pod-subsection-fheader-scheduled',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'pod-frontpage-nextweek',
                'type' => 'button_set',
                'title' => __('Show Next Week', 'thstlang'),
                'subtitle' => __('Would you like to show or hide the <em>Next Week</em> area?', 'thstlang'),
                'desc' => __('Choose to hide or show the <em>Next Week</em> area.', 'thstlang'),
                'options' => array(
                    'show' => 'Show',
                    'hide' => 'Hide',
                    ),
                'default' => 'show'
            ),
            array(
                'id' => 'pod-scheduling',
                'type' => 'switch',
                'title' => __('Podcast Scheduling', 'thstlang'), 
                'subtitle' => __('Would you like to display your scheduled posts on the front page?', 'thstlang'),
                'desc' => __('Turn the switch to display your scedhuled posts on the front page. This will deactivate the <em>Preview Heading</em> below.', 'thstlang'),
                'default' => false
            ),
            array(
                'id' => 'pod-preview-heading',
                'type' => 'text',
                'required' => array('pod-scheduling', '=', false),
                'title' => __('Upcoming Post Title', 'thstlang'),
                'subtitle' => __('What is the title of your next or upcoming episode?', 'thstlang'),
                'desc' => __('Enter the title of your upcoming episode into the text field above.', 'thstlang'),
                'default' => 'Episode 12: Let\'s go hiking!',
            ),
            array(
                'id' => 'pod-preview-title',
                'type' => 'text',
                'title' => __('Preview Title', 'thstlang'),
                'subtitle' => __('What is the title for your preview section?', 'thstlang'),
                'desc' => __('Enter the title for your preview section into the text field above.', 'thstlang'),
                'placeholder' => 'Next Time on Podcaster',
                'default' => 'Next Time on Podcaster',
            ),
            
            array(
                'id'       => 'pod-featured-header-buttons',
                'type'     => 'raw',
                'title'  => __( '<h3>Subscribe Buttons</h3>', 'thstlang' ),
                'content'  => __( 'Use the settings below to customize the featured header section on your static front page.', 'thstlang' ),
            ),
            array(
                'id' => 'pod-subscribe-buttons',
                'type' => 'switch',
                'title' => __('Show Subscribe Buttons', 'thstlang'), 
                'subtitle' => __('Would you like to display your subscribe buttons?', 'thstlang'),
                'desc' => __('Turn the switch to "On" to display your subscribe buttons.', 'thstlang'),
                'default' => true
            ),
            array(
                'id' => 'pod-subscribe1',
                'type' => 'text',
                'title' => __('Subscribe Button 1', 'thstlang'),
                'subtitle' => __('What text should be on your first subscribe button?', 'thstlang'),
                'desc' => __('Enter the text in the field above.', 'thstlang'),
                'validate' => 'no_html',
                'placeholder' => 'Subscribe with iTunes',
                'default' => 'Subscribe with iTunes'
            ),
            array(
                'id' => 'pod-subscribe1-url',
                'type' => 'text',
                'title' => __('Subscribe Button 1 URL', 'thstlang'),
                'subtitle' => __('What is the URL to your first subscribe button?', 'thstlang'),
                'desc' => __('Enter the URL in the field above.', 'thstlang'),
                'validate' => 'url',
            ),
            array(
                'id' => 'pod-subscribe-single',
                'type' => 'checkbox',
                'title' => __('Button on Single Page', 'thstlang'), 
                'subtitle' => __('Do you want to display this button on single pages?', 'thstlang'),
                'desc' => __('Check this box if you would like to display the button above on single pages.', 'thstlang'),
                'switch' => true,
                'std' => '1'
            ),
            array(
                'id' => 'pod-subscribe2',
                'type' => 'text',
                'title' => __('Subscribe Button 2', 'thstlang'),
                'subtitle' => __('What text should be on your second subscribe button?', 'thstlang'),
                'desc' => __('Enter the text in the field above.', 'thstlang'),
                'validate' => 'no_html',
                'placeholder' => 'Subscribe with RSS',
                'default' => 'Subscribe with RSS'
            ),
            array(
                'id' => 'pod-subscribe2-url',
                'type' => 'text',
                'title' => __('Subscribe Button 2 URL', 'thstlang'),
                'subtitle' => __('How many podcast posts would you like to display?', 'thstlang'),
                'desc' => __('Enter the URL in the field above.', 'thstlang'),
                'validate' => 'url',
            ),        
        )
    ) );
	Redux::setSection( $opt_name, array(
        'icon' => 'fa fa-laptop',
        'icon_class' => 'icon-large',
        'title' => __('Front Page', 'thstlang'),
        'desc' => __('<p class="description">Set up your front page.</p>', 'thstlang'),
        'fields' => array(            
            array(
                'id'       => 'pod-list-posts-title',
                'type'     => 'raw',
                'title'  => __( '<br /><h3>List of Posts</h3>', 'thstlang' ),
                'content'  => __( 'Use the settings below to customize the list of posts on your static front page.', 'thstlang' ),
            ),
			array(
				'id'=>'pod-front-posts',
				'type' => 'spinner', 
				'title' => __('Amount of Posts', 'thstlang'),
				'subtitle' => 'How many posts would you like to display on the front page?',
				'desc'=> __('Click through to get to the amount of posts you want to display.', 'thstlang'),
				"default" 	=> "9",
				"min" 		=> "1",
				"step"		=> "1",
				"max"		=> "9999"
			),
            array(
                'id' => 'pod-front-page-titles',
                'type' => 'switch',
                'title' => __('Truncate Titles', 'thstlang'), 
                'subtitle' => __('Would you like to truncate the titles of the posts on the front page? This will add an ellipsis at the end of a title in mobile view.', 'thstlang'),
                'desc' => __('Turn the switch to "on" to trnacate the titles or to "off" to display the entire title.', 'thstlang'),
                'default' => false
            ),
			array(
                'id' => 'pod-archive-link-txt',
                'type' => 'text',
                'title' => __('Podcast Archive Button Text', 'thstlang'),
                'subtitle' => __('What text should appear on your archive button?', 'thstlang'),
                'desc' => __('Enter the text in the field above.', 'thstlang'),
                'validate' => 'no_html',
                'placeholder' => 'Podcast Archive',
                'default' => 'Podcast Archive'
            ),
			array(
                'id' => 'pod-archive-link',
                'type' => 'text',
                'title' => __('Podcast Archive Button URL', 'thstlang'),
                'subtitle' => __('Would you like to display a button linking to your podcast archive?', 'thstlang'),
                'desc' => __('Paste the url of your podcast archive here', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/podcast-archive-page',
            ),
            array(
            	'id' => 'pod-excerpts-type',
            	'type' => 'button_set',
            	'title' => __('Type of Excerpts', 'thstlang'),
            	'subtitle' => __('How would you like to display your excerpts?','thstlang'),
            	'desc' => __('Choose between <strong>Force Excerpt</strong> and <strong>Set in Post</strong>. (<strong>Warning!</strong> If you choose Set in Post, make sure to set your "read more" sections within your post. Otherwise you might get overlapping text.)', 'thstlang'),
            	'options' => array(
            		'force_excerpt' => 'Force Excerpt',
            		'set_in_post' => 'Set in Post',
            		),
            	'default' => 'force_excerpt'
            ),
            array(
                'id' => 'pod-excerpts-style',
                'type' => 'button_set',
                'title' => __('Blog Excerpts Section', 'thstlang'),
                'subtitle' => __('How would you like to display the blog excerpts on the front page?', 'thstlang'),
                'desc' => __('Choose between <strong>List</strong>, <strong>Columns</strong> and <strong>Columns II</strong>. Or hide it entirely.', 'thstlang'),
                'options' => array(
                    'list' => 'List',
                    'columns' => 'Columns I',
                    'columns-2' => 'Columns II',
                    'hide' => 'Hide'
                ),
                'default' => 'list'
            ),
            array(
                'id' => 'pod-excerpts-section-title',
                'type' => 'text',
                'required' => array( 'pod-excerpts-style', '=', array('columns', 'columns-2') ),
                'title' => __('Blog Excerpts Section Title', 'thstlang'),
                'subtitle' => __('Would you like to display a title for your blog excerpt section?', 'thstlang'),
                'desc' => __('Enter the title in the text field above.', 'thstlang'),
                'default' => 'From the Blog',
            ),
            array(
                'id' => 'pod-excerpts-section-desc',
                'type' => 'text',
                'required' => array( 'pod-excerpts-style', '=', array( 'columns-2') ),
                'title' => __('Blog Excerpts Section Description', 'thstlang'),
                'subtitle' => __('Would you like to display a description for your blog excerpt section?', 'thstlang'),
                'desc' => __('Enter the description in the text field above.', 'thstlang'),
                'default' => 'Your description here. Vivamus viverra sem nulla, ac sollicitudin ipsum lacinia et. Aliquam vitae neque nec sapien lobortis dapibus non vel augue.',
            ),
            array(
                'id' => 'pod-excerpts-section-button',
                'type' => 'text',
                'required' => array( 'pod-excerpts-style', '=', array( 'columns-2') ),
                'title' => __('Blog Excerpts Section Button', 'thstlang'),
                'subtitle' => __('Would you like to display a button for your blog excerpt section?', 'thstlang'),
                'desc' => __('Enter the text in the text field above.', 'thstlang'),
                'default' => 'Go to Blog',
            ),
        )
    ) );
	
	Redux::setSection( $opt_name, array(
        'icon' => 'fa fa-navicon',
        'title' => __('Navigation', 'thstlang'),
        'desc' => __('<p class="description">Set up your navigation.</p>', 'thstlang'),
        'fields' => array(
            array(
                'id'       => 'pod-nav-bg-raw-title',
                'type'     => 'raw',
                'title'  => __( '<h3>Background</h3>', 'thstlang' ),
                'content'  => __( 'Use the settings below to customize the buttons for your website.', 'thstlang' ),
            ),
        	array(
                'id'=>'pod-nav-bg',
                'type' => 'color', 
                'title' => __('Navigation Background', 'thstlang'),
                'subtitle' => __('Set the background for your navigation.', 'thstlang'),
                'desc' => __('Use the color picker to select the background color. ', 'thstlang'),
                'default' => '#282d31',
            ),
            array(
                'id'=>'pod-nav-bg-if-transparent',
                'type' => 'color',
                'required' => array('pod-nav-bg', '=', 'transparent'),
                'title' => __('Navigation Background (No Header image) ', 'thstlang'),
                'subtitle' => __('Set the background for your navigation for pages without a featured header.', 'thstlang'),
                'desc' => __('Use the color picker to select the background color. ', 'thstlang'),
                'default' => '#349099',
                'transparent'   => false,
           ),
            /*array(
                'id' => 'pod-nav-border',
                'type' => 'switch',
                'title' => __('Navigation Border', 'thstlang'), 
                'subtitle' => __('Would you like to display a border at the bottom of the navigation bar?', 'thstlang'),
                'desc' => __('Turn the switch to "on" to activate the border.', 'thstlang'),
                'default' => false
            ),
            array(
                'id'       => 'pod-nav-border-color',
                'type'     => 'color',
                'required' => array('pod-nav-border', '=', true),
                'title'    => __('Navigation Border Color', 'thstlang'),
                'subtitle' => __('Set the color for the border.', 'thstlang'),
                'desc'     => __('Use the color picker to select the border color.', 'thstlang'),         
                'default' => '#eee',
                'transparent' => false,
                'output'    => array(
                    'border-color' => '.latest-episode.nav-has-border, .front-page-header.nav-has-border'
                    )
            ),*/
            array(
                'id'       => 'pod-nav-links-raw-title',
                'type'     => 'raw',
                'title'  => __( '<h3>Menu & Links</h3>', 'thstlang' ),
                'content'  => __( 'Use the settings below to customize the settings for your links.', 'thstlang' ),
            ),
            array(
                'id'       => 'pod-nav-color',
                'type'     => 'color',
                'title'    => __('Navigation Link Color', 'thstlang'),
                'subtitle' => __('Set the color for the links in the navigation.', 'thstlang'),
                'desc'     => __('Use the color picker to select the link color.', 'thstlang'),         
                'default' => '#ffffff',
                'transparent' => false,
                'output'    => array(
                    'background-color' => '.nav-search-form .search-form-drop',
                    'color' => '.nav-search-form .open-search-bar .batch'
                    )
            ),
            array(
                'id'       => 'pod-nav-dropdown',
                'type'     => 'color',
                'title'    => __('Navigation Dropdown Menu', 'thstlang'),
                'subtitle' => __('Set the color for the drop down menu in the navigation.', 'thstlang'),
                'desc'     => __('Use the color picker to select the drop down menu color.', 'thstlang'),         
                'default' => '#333',
                'output'   => array('background-color' => '#nav .thst-menu li > .sub-menu li a:link, #nav .thst-menu li > .sub-menu li a:visited'),
                'transparent' => false,
            ),
            array(
                'id'       => 'pod-nav-dropdown-hover',
                'type'     => 'color',
                'title'    => __('Navigation Dropdown Menu Hover', 'thstlang'),
                'subtitle' => __('Set the hover color for the drop down menu in the navigation.', 'thstlang'),
                'desc'     => __('Use the hover color picker to select the drop down menu color.', 'thstlang'),         
                'default' => '#262626',
                'output'   => array('background-color' => '#nav .thst-menu li > .sub-menu li a:hover'),
                'transparent' => false,
            ),array(
                'id'       => 'pod-nav-sticky-raw-title',
                'type'     => 'raw',
                'title'  => __( '<h3>Sticky</h3>', 'thstlang' ),
                'content'  => __( 'Use the setting below to customize your sticky menu.', 'thstlang' ),
            ),
            array(
				'id'=>'pod-sticky-header',
				'type' => 'switch', 
				'title' => __('Sticky Navigation', 'thstlang'),
				'subtitle' => __('Would you like to stick the navigation menu to the top?', 'thstlang'),
				'desc' => __('Select "On" to make your navigation stick to the top when scrolling down.', 'thstlang'),
				'default' => false,
			),
            array(
                'id'       => 'pod-nav-bg-sticky',
                'type'     => 'color',
                'required' => array('pod-sticky-header', '=', true),
                'title'    => __('Navigation Background Sticky', 'thstlang'),
                'subtitle' => __('Set the background color for the navigation when in a sticky state.', 'thstlang'),
                'desc'     => __('Use the color picker to select the background color.', 'thstlang'),         
                'default' => '#81F9AC',
                'transparent' => false,
                'output' => array(
                    'background-color' => '.small_nav .nav-search-form .open-search-bar .batch'
                    )
            ),
            array(
                'id'       => 'pod-nav-color-sticky',
                'type'     => 'color',
                'required' => array('pod-sticky-header', '=', true),
                'title'    => __('Navigation Link Color Sticky', 'thstlang'),
                'subtitle' => __('Set the link color for the navigation when in a sticky state.', 'thstlang'),
                'desc'     => __('Use the color picker to select the link color.', 'thstlang'),         
                'default' => '#222',
                'transparent' => false,
                'output' => array(
                    'color' => '.small_nav .nav-search-form .open-search-bar .batch',
                    'background-color' => '.small_nav .nav-search-form .search-form-drop',
                    )
            ),
            array(
                'id'       => 'pod-nav-search-raw-title',
                'type'     => 'raw',
                'title'  => __( '<h3>Search</h3>', 'thstlang' ),
                'content'  => __( 'Activate and use the setting below to customize your search bar.', 'thstlang' ),
            ),
            array(
                'id'=>'pod-nav-search',
                'type' => 'switch', 
                'title' => __('Search Bar', 'thstlang'),
                'subtitle' => __('Would you like to display a search bar in your navigation?', 'thstlang'),
                'desc' => __('Turn the switch to "On" to enable the search feature.', 'thstlang'),
                'default' => false,
            ),
            array(
                'id'=>'pod-nav-search-color',
                'type' => 'color', 
                'required'  => array( 'pod-nav-search', '=', true ),
                'title' => __('Search Bar Text', 'thstlang'),
                'subtitle' => __('Would you like to set a text color for your navigation bar?', 'thstlang'),
                'desc' => __('Use the color picker to select your color.', 'thstlang'),
                'default' => '#282d31',
                'transparent' => false,
                'output' => array(
                    'color' => '.nav-search-form .search-container #s'
                    )
            ),
            array(
                'id'       => 'pod-nav-responsive-raw-title',
                'type'     => 'raw',
                'title'  => __( '<h3>Responsive</h3>', 'thstlang' ),
                'content'  => __( 'Use the setting below to customize your responsive menu.', 'thstlang' ),
            ),
			array(
				'id'=>'pod-responsive-style',
				'type' => 'button_set', 
				'title' => __('Responsive Navigation Style', 'thstlang'),
				'subtitle' => __('What kind of style of responsive navigation would you like to use?', 'thstlang'),
				'desc' => __('Choose between drop-down (recommended for few menu elements) and toggle (recommended for many menu elements and multi-level navigation).', 'thstlang'),
				'options' => array(
            		'drop' => 'Drop-down',
            		'toggle' => 'Toggle',
            		),
            	'default' => 'toggle'),        
        )
    ) );

    Redux::setSection( $opt_name, array(
        'icon' => 'fa fa-eyedropper',
        'title' => __('Logo', 'thstlang'),
        'desc' => __('<p class="description">Set up your website logo.</p>', 'thstlang'),
        'fields' => array(
        	array(
                'id' => 'pod-upload-logo',
                'type' => 'media',
                'title' => __('Your Logo', 'thstlang'),
                'subtitle' => __('Would you like to upload a logo?', 'thstlang'),
                'desc' => __('Upload an image which will be displayed as a logo in your header.', 'thstlang'),
                'default' => $theme_options_img.'/img/logo.png'
            ),
            array(
                'id' => 'pod-upload-logo-sticky',
                'type' => 'media',
                'title' => __('Your Logo (Sticky)', 'thstlang'),
                'subtitle' => __('Would you like to upload a logo for your sticky menu?', 'thstlang'),
                'desc' => __('Upload an image which will be displayed as a logo in your header when it is in sticky mode.', 'thstlang'),
                'default' => $theme_options_img.'/img/logo-sticky.png'
            ),
            array(
                'id' => 'pod-upload-logo-ret',
                'type' => 'media',
                'title' => __('Your Logo (Retina Size)', 'thstlang'),
                'subtitle' => __('Would you like to upload a retina logo?', 'thstlang'),
                'desc' => __('Upload an image which will be displayed as a logo in your header. Make sure it\'s exactly double the size of the original.', 'thstlang'),
                'default' => $theme_options_img.'/img/logo.png'
            ),
            array(
                'id' => 'pod-upload-logo-ret-sticky',
                'type' => 'media',
                'title' => __('Your Logo (Sticky, Retina Size)', 'thstlang'),
                'subtitle' => __('Would you like to upload a retina logo for your sticky menu?', 'thstlang'),
                'desc' => __('Upload an image which will be displayed as a logo in your header when it is in sticky mode. Make sure it\'s exactly double the size of the original.', 'thstlang'),
                'default' => $theme_options_img.'/img/logo.png'
            ),         
        )
    ) );

	Redux::setSection( $opt_name, array(
        'icon' => 'fa fa-font',
        'title' => __('Type &amp; Direction', 'thstlang'),
        'desc' => __('<p class="description">Set up your website typography.</p>', 'thstlang'),
        'fields' => array(
        	array(
                'id' => 'pod-typography',
                'type' => 'radio',
                'title' => __('Typography', 'thstlang'),
                'subtitle' => __('Would you like to use sans-serif or serif fonts?', 'thstlang'),
                'desc' => __('Choose what kind of fonts you would like to use?', 'thstlang'),
                'options' => array(
                	'sans-serif' => 'Sans-serif', 
                	'serif' => 'Serif',
                    'custom' => 'Google Fonts',
                    'custom-typekit' => 'Typekit'
                ),
                'default' => 'sans-serif'
            ),
            array(
                'id'       => 'pod-type-global-raw-title',
                'type'     => 'raw',
                'title'  => __( '<h3>Global Font Settings</h3>', 'thstlang' ),
                'required' => array('pod-typography', '=', 'custom'),
                'content'  => __( 'Use the settings below to set font settings across your website.', 'thstlang' ),
            ),
            array(
                'id'          => 'pod-typo-headings',
                'type'        => 'typography', 
                'title'       => __('Heading Font', 'thstlang'),
                'required' => array('pod-typography', '=', 'custom'),
                'google'      => true, 
                'font-backup' => false,
                'line-height' => false,
                'output'      => array('h1, h2, h3, h4, h5, h6, .post .entry-header .entry-title'),
                'units'       =>'px',
                'subtitle'    => __('Set the font for your headings.', 'thstlang'),
                'default'     => array(
                    'color'       => '#333', 
                    'font-weight'  => '600', 
                    'font-family' => 'Raleway', 
                    'google'      => true,
                    'font-size'   => '33px', 
                ),
            ),
            array(
                'id'          => 'pod-typo-text',
                'type'        => 'typography', 
                'title'       => __('Text Font', 'thstlang'),
                'required' => array('pod-typography', '=', 'custom'),
                'google'      => true, 
                'font-backup' => false,
                'line-height' => false,
                'output'      => array('body'),
                'units'       =>'px',
                'subtitle'    => __('Set the font for your paragraphs.', 'thstlang'),
                'default'     => array(
                    'color'       => '#555', 
                    'font-weight'  => '400', 
                    'font-family' => 'Raleway', 
                    'google'      => true,
                    'font-size'   => '18px', 
                ),
            ),
            array(
                'id'       => 'pod-type-menu-raw-title',
                'type'     => 'raw',
                'title'  => __( '<h3>Logo &amp; Menu</h3>', 'thstlang' ),
                'required' => array('pod-typography', '=', 'custom'),
                'content'  => __( 'Use the settings below to set font settings across your website.', 'thstlang' ),
            ),
            array(
                'id'          => 'pod-typo-main-heading',
                'type'        => 'typography', 
                'title'       => __('Main Heading Font', 'thstlang'),
                'required' => array('pod-typography', '=', 'custom'),
                'google'      => true, 
                'font-backup' => false,
                'line-height' => false,
                'font-size'   => false,
                'output'      => array('header .main-title a:link, header .main-title a:visited'),
                'units'       =>'px',
                'subtitle'    => __('Set the font for your main heading.', 'thstlang'),
                'default'     => array(
                    'color'       => '#555', 
                    'font-weight'  => '400', 
                    'font-family' => 'Raleway', 
                    'google'      => true,
                ),
            ),
            array(
                'id'          => 'pod-typo-menu-links',
                'type'        => 'typography', 
                'title'       => __('Menu Font', 'thstlang'),
                'required' => array('pod-typography', '=', 'custom'),
                'google'      => true, 
                'font-backup' => false,
                'line-height' => false,
                'font-size'   => false,
                'color'       => false,
                'output'      => array('#nav .thst-menu li a'),
                'units'       =>'px',
                'subtitle'    => __('Set the font for your menu.', 'thstlang'),
                'default'     => array(
                    'font-weight'  => '600', 
                    'font-family' => 'Raleway', 
                    'google'      => true,
                ),
            ),
            array(
                'id'       => 'pod-type-heading-raw-title',
                'type'     => 'raw',
                'title'  => __( '<h3>Featured Header</h3>', 'thstlang' ),
                'required' => array('pod-typography', '=', 'custom'),
                'content'  => __( 'Use the settings below to customize the fonts on your featured header on the front page.', 'thstlang' ),
            ),
            array(
                'id'          => 'pod-typo-featured-heading',
                'type'        => 'typography', 
                'title'       => __('Featured Header Font', 'thstlang'),
                'required' => array('pod-typography', '=', 'custom'),
                'google'      => true, 
                'font-backup' => false,
                'line-height' => false,
                'output'      => array(
                    '.front-page-header .text h2, 
                    .front-page-header.text .content-text h2,
                    .latest-episode .main-featured-post h2 a, 
                    .front-page-header .text .pulls-right h2, 
                    .front-page-header .text .pulls-left h2, 
                    .latest-episode .main-featured-post .pulls-right h2, 
                    .latest-episode .main-featured-post .pulls-left h2, 
                    .front-page-header .text .pulls-right h2 a, 
                    .front-page-header .text .pulls-left h2 a, 
                    .latest-episode .main-featured-post .pulls-right h2 a, 
                    .latest-episode .main-featured-post .pulls-left h2 a'),
                'units'       =>'px',
                'subtitle'    => __('Set the font for your headings.', 'thstlang'),
                'default'     => array(
                    'color'       => '#fff', 
                    'font-weight'  => '400', 
                    'font-family' => 'Playfair Display', 
                    'google'      => true,
                    'font-size'   => '64px', 
                ),
            ),
            array(
                'id'          => 'pod-typo-featured-text',
                'type'        => 'typography', 
                'title'       => __('Featured Header Text', 'thstlang'),
                'required' => array('pod-typography', '=', 'custom'),
                'google'      => true, 
                'font-backup' => false,
                'line-height' => false,
                'color'       => false,
                'output'      => array(
                    '.latest-episode .main-featured-post .featured-excerpt, .front-page-header .featured-excerpt'),
                'units'       =>'px',
                'subtitle'    => __('Set the font for the rest of the text, including excerpts.', 'thstlang'),
                'default'     => array(
                    'font-weight'  => '400', 
                    'font-family' => 'Raleway', 
                    'google'      => true,
                    'font-size'   => '16px',
                ),
            ),
            array(
                'id'       => 'pod-type-front-page-raw-title',
                'type'     => 'raw',
                'title'  => __( '<h3>Front Page Posts</h3>', 'thstlang' ),
                'required' => array('pod-typography', '=', 'custom'),
                'content'  => __( 'Use the settings below to customize the fonts for the posts found on the front page.', 'thstlang' ),
            ),
            array(
                'id'          => 'pod-typo-frontpage-heading',
                'type'        => 'typography', 
                'title'       => __('Headings', 'thstlang'),
                'required' => array('pod-typography', '=', 'custom'),
                'google'      => true, 
                'font-backup' => false,
                'line-height' => true,
                'color'       => false,
                'output'      => array(
                    '.list-of-episodes article.list .post-header h2'),
                'units'       =>'px',
                'subtitle'    => __('Set the font for your headings.', 'thstlang'),
                'default'     => array(
                    'font-weight'  => '400', 
                    'font-family'  => 'Raleway', 
                    'google'       => true,
                    'font-size'    => '26px',
                    'line-height'  => '34px'
                ),
            ),
            array(
                'id'          => 'pod-typo-frontpage-text',
                'type'        => 'typography', 
                'title'       => __('Text', 'thstlang'),
                'required' => array('pod-typography', '=', 'custom'),
                'google'      => true, 
                'font-backup' => false,
                'line-height' => true,
                'color'       => false,
                'output'      => array(
                    '.list-of-episodes article .post-content'),
                'units'       =>'px',
                'subtitle'    => __('Set the font for the rest of the text, including excerpts.', 'thstlang'),
                'default'     => array(
                    'font-weight'  => '400', 
                    'font-family' => 'Raleway', 
                    'google'      => true,
                    'font-size'   => '18px',
                    'line-height' => '32px'
                ),
            ),
            array(
                'id'       => 'pod-type-single-raw-title',
                'type'     => 'raw',
                'title'  => __( '<h3>Single Posts</h3>', 'thstlang' ),
                'required' => array('pod-typography', '=', 'custom'),
                'content'  => __( 'Use the settings below to customize the fonts for the posts found on the front page.', 'thstlang' ),
            ),
            array(
                'id'          => 'pod-typo-single-heading',
                'type'        => 'typography', 
                'title'       => __('Headings', 'thstlang'),
                'required' => array('pod-typography', '=', 'custom'),
                'google'      => true, 
                'font-backup' => false,
                'line-height' => true,
                'color'       => false,
                'output'      => array(
                    '.single .single-featured h2, .single .post .entry-header .entry-title'),
                'units'       =>'px',
                'subtitle'    => __('Set the font for your headings.', 'thstlang'),
                'default'     => array(
                    'font-weight'  => '600', 
                    'font-family'  => 'Raleway', 
                    'google'       => true,
                    'font-size'    => '26px',
                    'line-height'  => '34px'
                ),
            ),
            array(
                'id'          => 'pod-typo-single-text',
                'type'        => 'typography', 
                'title'       => __('Text', 'thstlang'),
                'required' => array('pod-typography', '=', 'custom'),
                'google'      => true, 
                'font-backup' => false,
                'line-height' => true,
                'color'       => false,
                'output'      => array(
                    '.single .post .entry-content'),
                'units'       =>'px',
                'subtitle'    => __('Set the font for the rest of the text, including excerpts.', 'thstlang'),
                'default'     => array(
                    'font-weight'  => '400', 
                    'font-family' => 'Raleway', 
                    'google'      => true,
                    'font-size'   => '18px',
                    'line-height' => '32px'
                ),
            ),
            array(
                'id'       => 'pod-type-page-raw-title',
                'type'     => 'raw',
                'title'  => __( '<h3>Page Posts</h3>', 'thstlang' ),
                'required' => array('pod-typography', '=', 'custom'),
                'content'  => __( 'Use the settings below to customize the fonts for the posts found on the front page.', 'thstlang' ),
            ),
            array(
                'id'          => 'pod-typo-page-heading',
                'type'        => 'typography', 
                'title'       => __('Headings', 'thstlang'),
                'required' => array('pod-typography', '=', 'custom'),
                'google'      => true, 
                'font-backup' => false,
                'line-height' => true,
                'color'       => false,
                'output'      => array('.page .reg .heading h1, .podcast-archive .reg .heading h1, .search .reg .heading h1, .archive .reg .heading h1'),
                'units'       =>'px',
                'subtitle'    => __('Set the font for your headings.', 'thstlang'),
                'default'     => array(
                    'font-weight'  => '600', 
                    'font-family'  => 'Raleway', 
                    'google'       => true,
                    'font-size'    => '26px',
                    'line-height'  => '34px'
                ),
            ),
            array(
                'id'          => 'pod-typo-page-text',
                'type'        => 'typography', 
                'title'       => __('Text', 'thstlang'),
                'required' => array('pod-typography', '=', 'custom'),
                'google'      => true, 
                'font-backup' => false,
                'line-height' => true,
                'color'       => false,
                'output'      => array('.page .post .entry-content, .podcast-archive .post .entry-content, .search .post .entry-content, .archive .post .entry-content, .page .reg .heading .title p, .archive .reg .heading .title p, .search .reg .heading .title p'),
                'units'       =>'px',
                'subtitle'    => __('Set the font for the rest of the text, including excerpts.', 'thstlang'),
                'default'     => array(
                    'font-weight'  => '400', 
                    'font-family' => 'Raleway', 
                    'google'      => true,
                    'font-size'   => '18px',
                    'line-height' => '32px'
                ),
            ),
            array(
                'id'       => 'pod-type-blog-header-raw-title',
                'type'     => 'raw',
                'title'  => __( '<h3>Blog Header</h3>', 'thstlang' ),
                'required' => array('pod-typography', '=', 'custom'),
                'content'  => __( 'Use the settings below to customize the fonts for your blog header.', 'thstlang' ),
            ),
            array(
                'id'          => 'pod-typo-blog-heading',
                'type'        => 'typography', 
                'title'       => __('Headings', 'thstlang'),
                'required' => array('pod-typography', '=', 'custom'),
                'google'      => true, 
                'font-backup' => false,
                'font-size'   => true,
                'line-height' => false,
                'color'       => false,
                'output'      => array('.blog .static .heading .title h1'),
                'units'       =>'px',
                'subtitle'    => __('Set the font for your heading.', 'thstlang'),
                'default'     => array(
                    'font-weight'  => '600', 
                    'font-family'  => 'Raleway', 
                    'google'       => true,
                    'font-size'   => '42px',
                ),
            ),
            array(
                'id'          => 'pod-typo-blog-text',
                'type'        => 'typography', 
                'title'       => __('Blurb', 'thstlang'),
                'required' => array('pod-typography', '=', 'custom'),
                'google'      => true, 
                'font-backup' => false,
                'line-height' => true,
                'color'       => false,
                'output'      => array('.blog .static .heading .title p'),
                'units'       =>'px',
                'subtitle'    => __('Set the font for the rest of the text, including excerpts.', 'thstlang'),
                'default'     => array(
                    'font-weight'  => '400', 
                    'font-family' => 'Raleway', 
                    'google'      => true,
                    'font-size'   => '18px',
                    'line-height' => '32px'
                ),
            ),
            array(
                'id'       => 'pod-type-buttons-raw-title',
                'type'     => 'raw',
                'title'  => __( '<h3>Buttons</h3>', 'thstlang' ),
                'required' => array('pod-typography', '=', 'custom'),
                'content'  => __( 'Use the settings below to customize the fonts for your buttons.', 'thstlang' ),
            ),
            array(
                'id'          => 'pod-typo-buttons',
                'type'        => 'typography', 
                'title'       => __('Buttons', 'thstlang'),
                'required' => array('pod-typography', '=', 'custom'),
                'google'      => true, 
                'font-backup' => false,
                'font-size'   => false,
                'line-height' => false,
                'color'       => false,
                'output'      => array('input[type="submit"], .form-submit #submit, #respond #commentform #submit, a.butn:link, a.butn:visited, .butn'),
                'units'       =>'px',
                'subtitle'    => __('Set the font for your buttons.', 'thstlang'),
                'default'     => array(
                    'font-weight'  => '600', 
                    'font-family'  => 'Raleway', 
                    'google'       => true,
                ),
            ),  


            array(
                'id'=>'pod-typekit-code',
                'type' => 'textarea',
                'required' => array('pod-typography', '=', 'custom-typekit'),
                'title' => __('Typekit', 'thstlang'), 
                'subtitle' => __('Would you like to use Typekit?', 'thstlang'),
                'desc' => __('Paste the code you received from Typekit in the text box above.', 'thstlang'),
                'default' => '',
            ),
            array(
                'id'       => 'pod-typekit-css-code',
                'type'     => 'ace_editor',
                'required' => array('pod-typography', '=', 'custom-typekit'),
                'title'    => __('Typekit CSS Code', 'thstlang'),
                'subtitle' => __('Do you have CSS overrides you\'d like to use?', 'thstlang'),
                'mode'     => 'css',
                'theme'    => 'chrome',
                'desc'     => 'Use the text box above to insert CSS overrides.', 'thstlang',
                'default'  => "#header{\nmargin: 0 auto;\n}"
            ),
            array(
                'id' => 'pod-reading-direction',
                'type' => 'switch', 
                'title' => __('RTL', 'thstlang'),
                'subtitle' => __('Would you like to activate right to left reading?', 'thstlang'),
                'desc' => __('Switch to "On" to activate the rtl layout.', 'thstlang'),
                'default' => false
                
            ),         
        )
    ) );

	Redux::setSection( $opt_name, array(
		'icon' => 'fa fa-microphone',
        'icon_class' => 'icon-large',
        'title' => __('Podcast', 'thstlang'),
		'desc' => __('<p class="description">Set up your podcast archive.</p>', 'thstlang'),
		'fields' => array(
            array(
                'id' => 'pod-recordings-category',
                'type' => 'select',
                'data' => 'categories',
                'title' => __('Podcast Archive', 'thstlang'),
                'subtitle' => __('In what category have you stored your podcast posts?', 'thstlang'),
                'desc' => __('Select which category your podcast entries have been saved to. This will be used to display your podcast archive.', 'thstlang'),
            ),
            /* If SSP is active. */
            ( ( $plugin_inuse == 'ssp' ) 
                ? array(
                    'id' => 'pod-recordings-category-ssp',
                    'type' => 'select',
                    'data' => 'terms',
                    'args' => array('taxonomies'=>'series', 'args'=>array()),
                    'title' => __('Seriously Simple Podcasting Series', 'thstlang'),
                    'subtitle' => __('In what category have you stored your podcast posts?', 'thstlang'),
                    'desc' => __('Select which category your podcast entries have been saved to. This will be used to display your podcast archive.', 'thstlang'),
                )
                : false ),
            array(
                'id'       => 'pod-archive-title',
                'type'     => 'raw',
                'title'  => __( '<br /><h3>Podcast Archive Page</h3>', 'thstlang' ),
                'content'  => __( 'Use the settings below to customize your podcast archive page.', 'thstlang' ),
            ),
            array(
                'id' => 'pod-archive-icons',
                'type' => 'radio',
                'title' => __('Icon Type', 'thstlang'),
                'subtitle' => __('What icon did you want to display in your archive?', 'thstlang'),
                'desc' => __('Set which icon you would like to display in the podcast archive. Audio or video icon.', 'thstlang'),
                'options' => array(
                    'audio_icons' => 'Microphone Icon', 
                    'video_icons' => 'Play Icon'
                ),
                'default' => 'audio_icons'
            ),
            array(
                'id' => 'pod-archive-trunc',
                'type' => 'switch',
                'title' => __('Truncate Titles', 'thstlang'), 
                'subtitle' => __('Would you like to truncate the titles of the posts on the archive page? This will add an ellipsis at the end of a title in mobile view.', 'thstlang'),
                'desc' => __('Turn the switch to "on" to trnacate the titles or to "off" to display the entire title.', 'thstlang'),
                'default' => false
            ),
            array(
                'id' => 'pod-list-style',
                'type' => 'radio',
                'title' => __('Display Style', 'thstlang'),
                'subtitle' => __('How would you like to display the podcast archive?', 'thstlang'),
                'desc' => __('Choose between grid or list.', 'thstlang'),
                'options' => array(
                    'grid' => 'Grid', 
                    'list' => 'List'
                ),
                'default' => 'grid'
            ),
            array(
                'id' => 'pod-recordings-amount',
                'type' => 'spinner',
                'title' => __('Amount of the Posts', 'thstlang'),
                'subtitle' => __('How many podcast posts would you like to display?', 'thstlang'),
                'desc' => __('Enter the amount of posts you would like to display per page within your archive. "0" displays all entries on one page', 'thstlang'),
                "default" 	=> "9",
				"min" 		=> "0",
				"step"		=> "1",
				"max" 		=> "999"
            ),
            array(
                'id' => 'pod-archive-hide-in-blog',
                'type' => 'checkbox',
                'title' => __('Podcast Display in Blog', 'thstlang'), 
                'subtitle' => __('Do you want to display your episodes in the blog?', 'thstlang'),
                'desc' => __('Check this box if you would like to include your podcast posts in the blog.', 'thstlang'),
                'switch' => true,
                'default' => true
            ),
            array(
                'id'       => 'pod-single-archive-title',
                'type'     => 'raw',
                'title'  => __( '<br /><h3>Podcast Single Post</h3>', 'thstlang' ),
                'content'  => __( 'Use the settings below to customize your podcast single posts.', 'thstlang' ),
            ),
            array(
	            'id' => 'pod-single-header-display',
	            'type' => 'radio',
	            'title' => __('Single Header Display', 'thstlang'),
	            'subtitle' => __('How do you like to display your header?', 'thstlang'),
	            'desc' => __('Set the style of your heading. Choose between featured image in background and thumbnail.', 'thstlang'),
	            'options' => array(
	                'has-background' => 'Featured image in background',
	                'has-thumbnail' => 'Featured image as thumbnail',
                    'no-thumbnail' => 'No featured image'
	            ),
	            'default' => 'has-background'
	        ),
            array(
	           'id' => 'pod-single-header-par',
	           'type' => 'switch',
	           'title' => __('Single Page Header Parallax', 'thstlang'),
	           'subtitle' => __('Would you like to activate parallax scrolling?', 'thstlang'),
	           'desc' => __('Turn the switch to "On" to activate Parallax scrolling for your blog header.', 'thstlang'),
	           'default' => false,
	        ),
            array(
	        	'id' => 'pod-single-bg-style',
	            'type' => 'radio',
	            'title' => __('Single Page Header Background Style', 'thstlang'),
	            'subtitle' => __('How do you want to display the header image?', 'thstlang'),
	            'desc' => __('Set the style for your header image. Choose between stretched and tiled.', 'thstlang'),
	            'options' => array(
	                'background-repeat:repeat;' => 'Tiled',
	                'background-repeat:no-repeat; background-size:cover;' => 'Streched',
	            ),
	            'default' => 'background-repeat:repeat;'
	        ),
	        array(
	           'id' => 'pod-single-video-bg',
	           'type' => 'switch',
	           'title' => __('Single Page Video Background', 'thstlang'),
	           'subtitle' => __('Would you like to display your featured image as a background in video posts?', 'thstlang'),
	           'desc' => __('Turn the switch to "On" to activate backgrounds in video posts.', 'thstlang'),
	           'default' => false,
	        ),
		)
    ) );
	
	Redux::setSection( $opt_name, array(
        'icon' => 'fa fa-pencil',
        'icon_class' => 'icon-large',
        'title' => __('Blog', 'thstlang'),
        'desc' => __('<p class="description">Set up your blog.</p>', 'thstlang'),
        'fields' => array(
        	array(
			    'id'       => 'pod-blog-layout',
			    'type'     => 'image_select',
			    'title'    => __('Main Layout', 'thstlang'),
			    'subtitle' => __('Select main content and sidebar alignment.', 'thstlang'),
			    'options'  => array(
			        'sidebar-left'      => array(
			            'alt'   => '1 Column',
			            'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
			        ),
			        'no-sidebar'      => array(
			            'alt'   => '2 Column Left',
			            'img'   => ReduxFramework::$_url.'assets/img/1col.png'
			        ),
			        'sidebar-right'      => array(
			            'alt'   => '2 Column Right',
			            'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
			        ),
			    ),
			    'default' => 'sidebar-right'
			),
        	array(
                'id' => 'pod-blog-header',
                'type' => 'media',
                'title' => __('Blog Header', 'thstlang'),
                'subtitle' => __('Would you like to upload a header for your blog?', 'thstlang'),
                'desc' => __('Click on the button to upload an image which will be displayed as a header on your blog. Size: at least <strong>1920px*450px</strong>.', 'thstlang'),
                'placeholder' => $theme_options_img. '/img/header.jpg'
            ),
            array(
	            'id' => 'pod-blog-bg-style',
	            'type' => 'radio',
	            'title' => __('Blog Header Background Style', 'thstlang'),
	            'subtitle' => __('How do you want to display the header image?', 'thstlang'),
	            'desc' => __('Set the style for your header image. Choose between stretched and tiled.', 'thstlang'),
	            'options' => array(
	                'background-repeat:repeat;' => 'Tiled',
	                'background-repeat:no-repeat; background-size:cover;' => 'Stretched',
	            ),
	            'default' => 'background-repeat:repeat;'
	        ),
            array(
                'id' => 'pod-blog-header-par',
                'type' => 'switch',
                'title' => __('Blog Header Parallax', 'thstlang'),
                'subtitle' => __('Would you like to activate parallax scrolling?', 'thstlang'),
                'desc' => __('Turn the switch to "On" to activate Parallax scrolling for your blog header.', 'thstlang'),
                'default' => false,
            ),
            array(
                'id' => 'pod-blog-header-title',
                'type' => 'text',
                'title' => __('Blog Header Title', 'thstlang'),
                'subtitle' => __('Would you like to display a title for your blog?', 'thstlang'),
                'desc' => __('Type the title you would like to display above your blog.', 'thstlang'),
                'placeholder' => ''
            ),
            array(
                'id' => 'pod-blog-header-blurb',
                'type' => 'text',
                'title' => __('Blog Header Blurb', 'thstlang'),
                'subtitle' => __('Would you like to display a little bit of text below your blog title?', 'thstlang'),
                'desc' => __('Type a few lines into the box, which will be displayed below your blog title.', 'thstlang'),
                'placeholder' => '',
            ),
            array(
                'id' => 'pod-blog-excerpts',
                'type' => 'button_set',
                'title' => __('Blog Excerpts', 'thstlang'),
                'subtitle' => __('Would you like to force excerpts or set in post?', 'thstlang'),
                'desc' => __('Choose between a force excerpts or set in post.', 'thstlang'),
                'options' => array(
                    'force' => 'Force Excerpts',
                    'set_in_post' => 'Set in Post',
                    ),
                'default' => 'set_in_post'
            ),
            array(
                'id' => 'pod-comments-setup',
                'type' => 'radio',
                'title' => __('Comments Format', 'thstlang'),
                'subtitle' => __('How would you like to display your comments?', 'thstlang'),
                'desc' => __('Select whether you would like to display comments and trackbacks or comments only.', 'thstlang'),
                'options' => array(
                    'trackcomm' => 'Trackbacks & Comments', 
                    'comm' => 'Comments Only'
                    ),
                'default' => 'comm'
            ),
            array(
                'id' => 'pod-comments-display',
                'type' => 'switch',
                'title' => __('Comments Section', 'thstlang'),
                'subtitle' => __('Would you like to hide your comments and trackbacks?', 'thstlang'),
                'desc' => __('Use the switch to show or hide comments and trackbacks across the entire website.', 'thstlang'),
                'default' => true
            ),
            array(
                'id' => 'pod-pofo-gallery',
                'type' => 'radio',
                'title' => __('Gallery format', 'thstlang'),
                'subtitle' => __('Would you like to display your galleries as slideshows or in a grid?', 'thstlang'),
                'desc' => __('Click on the setting you would like to use to display your galleries. As slideshows or grid.', 'thstlang'),
                'options' => array(
                'slideshow_on' => 'Slideshow', 
                'grid_on' => 'Grid'
                ), // Must provide key => value pairs for radio options
                'default' => 'slideshow_on'
            ),
            array(
                'id'       => 'pod-gallery-accent',
                'type'     => 'color',
                'title'    => __('Gallery Accent', 'thstlang'),
                'subtitle' => __('Set the accent color for your gallery.', 'thstlang'),
                'desc'     => __('Use the color picker to select the accent color.', 'thstlang'),           
                'default' => '#1ee8a3',
                'transparent' => false,
                'output'    => array(
                    'background-color' => '
                    .post.format-gallery .featured-gallery .gallery.flexslider li.gallery-item .flex-caption, 
                    .single .featured-gallery .gallery.flexslider li.gallery-item .flex-caption, 
                    .post .entry-content .gallery.flexslider li.gallery-item .flex-caption,
                    .post.format-gallery .entry-content .gallery.grid .gallery-item .flex-caption,
                    .gallery.grid .gallery-item .flex-caption
                    ')
            ),
            array(
                'id'       => 'pod-gallery-text',
                'type'     => 'color',
                'title'    => __('Gallery Caption Text', 'thstlang'),
                'subtitle' => __('Set the text color for your gallery captions.', 'thstlang'),
                'desc'     => __('Use the color picker to select the text color.', 'thstlang'),           
                'default' => '#fff',
                'transparent' => false,
                'output'    => array(
                    'color' => '
                    .post.format-gallery .featured-gallery .gallery.flexslider li.gallery-item .flex-caption,
                    .post.format-gallery .featured-gallery .gallery.grid .gallery-item .flex-caption, 
                    .post.format-gallery .entry-content .gallery.grid .gallery-item .flex-caption p,
                    .post .entry-content .gallery.flexslider li.gallery-item .flex-caption, 
                    .post .entry-content .gallery.grid .gallery-item .flex-caption,
                    .single .featured-gallery .gallery.flexslider li.gallery-item .flex-caption, 
                    .single .featured-gallery .gallery.grid .gallery-item .flex-caption,
                    .gallery.grid .gallery-item .flex-caption p,
                    .post .gallery.flexslider .slides li a, 
                    .single .gallery.flexslider .slides li a,
                    .post .gallery.grid .gallery-item a, 
                    .single .gallery.grid .gallery-item a')
            ),
            array(
			    'id'       => 'pod-avatar-heading',
			    'type'     => 'raw',
			    'title'    => __('<h3>Avatars & Names</h3>', 'thstlang'),
			    'content' => __('Manage where to display avatars. Simply turn off or on what you would like to show. Make sure <strong>Show Avatars</strong> (found under Settings > Discussion) is turned on.', 'thstlang'),
			),
			array(
			    'id'       => 'pod-avatar-front',
			    'type'     => 'switch',
			    'title'    => __('Front Page Avatars', 'thstlang'),
			    'subtitle' => __('Display avatars on the "From the blog" section on the front page.', 'thstlang'),
			    'default'  => true,
			),
			array(
			    'id'       => 'pod-avatar-blog',
			    'type'     => 'switch',
			    'title'    => __('Blog Avatars', 'thstlang'),
			    'subtitle' => __('Display avatars on the blog page.', 'thstlang'),
			    'default'  => true,
			),
			array(
			    'id'       => 'pod-authname-blog',
			    'type'     => 'switch',
			    'title'    => __('Blog Author Name', 'thstlang'),
			    'subtitle' => __('Display author name on the blog page.', 'thstlang'),
			    'default'  => true,
			),
			array(
			    'id'       => 'pod-avatar-single',
			    'type'     => 'switch',
			    'title'    => __('Single Page Avatars', 'thstlang'),
			    'subtitle' => __('Display avatars on single pages.', 'thstlang'),
			    'default'  => true,
			),
			array(
			    'id'       => 'pod-authname-single',
			    'type'     => 'switch',
			    'title'    => __('Single Page Author Name', 'thstlang'),
			    'subtitle' => __('Display author name on single pages.', 'thstlang'),
			    'default'  => true,
			),
			array(
			    'id'       => 'pod-avatar-comments',
			    'type'     => 'switch',
			    'title'    => __('Comment Avatars', 'thstlang'),
			    'subtitle' => __('Display avatars in the comment section.', 'thstlang'),
			    'default'  => true,
			),
			array(
			    'id'       => 'pod-avatar-authorpages',
			    'type'     => 'switch',
			    'title'    => __('Author Pages Avatars', 'thstlang'),
			    'subtitle' => __('Display avatars on author pages.', 'thstlang'),
			    'default'  => true,
			),

        )
    ) );

	Redux::setSection( $opt_name, array(
		'icon' => 'fa fa-comments-o',
        'icon_class' => 'icon-large',
        'title' => __('Social Media', 'thstlang'),
		'desc' => __('<p class="description">Set up your social links.</p>', 'thstlang'),
		'fields' => array(
            array(
                'id'       => 'pod-social-nav',
                'type'     => 'switch',
                'title'    => __('Social Media (Navigation)', 'thstlang'),
                'subtitle' => __('Display social media icons in the navigation bar.', 'thstlang'),
                'default'  => true,
            ),
            array(
                'id'       => 'pod-social-footer',
                'type'     => 'switch',
                'title'    => __('Social Media (Footer)', 'thstlang'),
                'subtitle' => __('Display social media icons in the footer.', 'thstlang'),
                'default'  => true,
            ),
            array(
                'id'       => 'pod-social-color',
                'type'     => 'button_set',
                'title'    => __('Color', 'thstlang'),
                'subtitle' => __('Pick a color for your social media icons.', 'thstlang'),
                'options' => array(
                    'light-icons' => 'Light', 
                    'dark-icons' => 'Dark'
                 ), 
                'default' => 'light-icons'
            ),
			array(
                'id' => 'pod-email',
                'type' => 'text',
                'title' => __('Email Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'email',
                'placeholder' => 'hello@example.com',
            ),
            array(
                'id' => 'pod-rss',
                'type' => 'text',
                'title' => __('RSS Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-facebook',
                'type' => 'text',
                'title' => __('Facebook Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-twitter',
                'type' => 'text',
                'title' => __('Twitter Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-google',
                'type' => 'text',
                'title' => __('Google Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-instagram',
                'type' => 'text',
                'title' => __('Instagram Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-snapchat',
                'type' => 'text',
                'title' => __('Snapchat Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-itunes',
                'type' => 'text',
                'title' => __('iTunes Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-soundcloud',
                'type' => 'text',
                'title' => __('Soundcloud Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-mixcloud',
                'type' => 'text',
                'title' => __('Mixcloud Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-spotify',
                'type' => 'text',
                'title' => __('Spotify Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-tumblr',
                'type' => 'text',
                'title' => __('Tumblr Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-pinterest',
                'type' => 'text',
                'title' => __('Pinterest Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-flickr',
                'type' => 'text',
                'title' => __('Flickr Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-youtube',
                'type' => 'text',
                'title' => __('Youtube Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-vimeo',
                'type' => 'text',
                'title' => __('Vimeo Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-vine',
                'type' => 'text',
                'title' => __('Vine Icons', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-skype',
                'type' => 'text',
                'title' => __('Skype Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-dribbble',
                'type' => 'text',
                'title' => __('Dribbble', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-weibo',
                'type' => 'text',
                'title' => __('Weibo Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-foursquare',
                'type' => 'text',
                'title' => __('Foursquare Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-github',
                'type' => 'text',
                'title' => __('Github Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-xing',
                'type' => 'text',
                'title' => __('Xing Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
            array(
                'id' => 'pod-linkedin',
                'type' => 'text',
                'title' => __('Linkedin Icon', 'thstlang'),
                'subtitle' => __('Would you like to display a social icon?', 'thstlang'),
                'desc' => __('Paste the url of your profile here.', 'thstlang'),
                'validate' => 'url',
                'placeholder' => 'http://www.example.com/',
            ),
        )
    ) );

	Redux::setSection( $opt_name, array(
        'icon' => 'fa fa-paperclip',
        'title' => __('Footer', 'thstlang'),
        'desc' => __('<p class="description">Set up your website footer.</p>', 'thstlang'),
        'fields' => array(
        	array(
				'id'=>'pod-footer-text',
				'type' => 'editor',
				'title' => __('Footer Text', 'thstlang'), 
				'subtitle' => __('What text would you like to display in the footer area?', 'thstlang'),
				'desc' => __('Use the text area above to type your text.', 'thstlang'),
				'default' => 'Powered by Podcaster for WordPress.',
			),
			array(
                'id' => 'pod-footer-copyright',
                'type' => 'text',
                'title' => __('Copyright Text', 'thstlang'),
                'subtitle' => __('Would you like to display copyright text at the bottom of your theme?', 'thstlang'),
                'desc' => __('Write your text in the field above.', 'thstlang'),
                'validate' => 'no_html',
                'placeholder' =>  get_bloginfo( 'name' ). ' &copy; ' . date("Y"),
                'default' =>  get_bloginfo( 'name' ). ' &copy; ' .  date("Y"),
            ),    
        )
    ) );
	
	
	Redux::setSection( $opt_name, array(
		'type' => 'divide',
	));
	

    

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * 
    * function pod_compiler_action( $options, $css, $changed_values ) {
    *     echo '<h1>The compiler hook has run!</h1>';
    *     echo "<pre>";
    *     print_r( $changed_values ); // Values that have changed since the last save
    *     echo "</pre>";
    *     //print_r($options); //Option values
    *     //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    *  }
    */

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if( ! function_exists( 'pod_dynamic_section' ) ) {
        function pod_dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'thstlang' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'thstlang' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if( ! function_exists( 'pod_change_arguments' ) ) {
        function pod_change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if( ! function_exists( 'pod_change_defaults' ) ) {
        function pod_change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    // Remove the demo link and the notice of integrated demo from the redux-framework plugin
    if( ! function_exists( 'pod_remove_demo' ) ) {
        function pod_remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }