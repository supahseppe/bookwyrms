<?php

 //Setup location of WordPress
	$absolute_path = __FILE__;
	$path_to_file = explode( 'wp-content', $absolute_path );
	$path_to_wp = $path_to_file[0];

//Access WordPress
	require_once( $path_to_wp.'/wp-load.php' );

	header("Content-type: text/css; charset: UTF-8");
  
	$options = get_option('podcaster-theme');  
	if( isset( $options['pod-color-primary'] ) ) {
		$pod_primary = $options['pod-color-primary'];
	}
	$pod_fh_bg = isset( $options['pod-fh-bg'] ) ? ( $options['pod-fh-bg'] ) : '';
	if( isset( $options['pod-typography'] ) ) {
		$pod_typography = $options['pod-typography'];
	}
	if( isset( $options['pod-upload-logo'] ) ) {
		$themeLogo = $options['pod-upload-logo'];
	}
	$themeLogoSticky = pod_theme_option('pod-upload-logo-sticky');
	$themeLogoRetSticky = pod_theme_option('pod-upload-logo-ret-sticky');
	$themeNavifTransparent = pod_theme_option('pod-nav-bg-if-transparent');
	

	$themeLogoRet = isset( $options['pod-upload-logo-ret'] ) ? $options['pod-upload-logo-ret'] : '';
	$themeNavBg = isset( $options['pod-nav-bg'] ) ? $options['pod-nav-bg'] : '';
	$themeNavColor = isset( $options['pod-nav-color'] ) ? $options['pod-nav-color'] : '';
	$themeNavBgSticky = pod_theme_option('pod-nav-bg-sticky');
	$themeNavColorSticky = pod_theme_option('pod-nav-color-sticky');
	$themePageHeader = isset( $options['pod-page-header-bg'] ) ? $options['pod-page-header-bg'] : '';

	if( isset( $pod_primary ) ) {
		$themePrimary =  $pod_primary;
	}
	
	$themeDarkTranslucent = 'rgba(0,0,0,0.7)';
	$themeLightTranslucent = 'rgba(255,255,255,0.7)';
	?>
	.above,
	.postfooter {
		background-color:<?php echo $themeNavBg; ?>;
	}
	.single-post .above.nav-transparent.format-standard,
	.single-podcast .above.nav-transparent.format-standard.audio-featured-image-thumbnail,
	.above.nav-transparent.format-image,
	.above.nav-transparent.format-gallery,
	.above.nav-transparent.format-chat,
	.above.nav-transparent.format-aside,
	.above.nav-transparent.format-link,
	.above.nav-transparent.format-quote,
	.above.nav-transparent.format-status,
	.above.nav-transparent.format-audio.no-featured-image,
	.above.nav-transparent.format-audio.audio-featured-image-thumbnail,
	.above.nav-transparent.format-video.no-featured-image,
	.page .nav-transparent.above.no-featured-image,
	.blog .nav-transparent.above.no-featured-image,
	.archive .nav-transparent.above.no-featured-image,
	.search .nav-transparent.above.no-featured-image {
		background-color:<?php echo $themeNavifTransparent; ?>;
	}

	.above #nav .thst-menu li a,
	#nav.toggle .thst-menu li > .sub-menu li a:link, 
	#nav.toggle .thst-menu li > .sub-menu li a:visited,
	header .main-title a:link, 
	header .main-title a:visited,
	.page .reg .heading h1, 
	.podcast-archive .reg .heading h1, 
	.search .reg .heading h1, 
	.archive .reg .heading h1,
	.postfooter,
	.blog .static .title h1,
	.postfooter a:link, 
	.postfooter a:visited {
		color:<?php echo $themeNavColor; ?>;
	}
	.above.small_nav,
	.above.small_nav.nav-sticky {
		background-color:<?php echo $themeNavBgSticky; ?> !important;
	}
	.above.small_nav #nav .thst-menu li a,
	.above.small_nav header .main-title a:link, 
	.above.small_nav header .main-title a:visited {
		color:<?php echo $themeNavColorSticky; ?>;
	}
	.header a {
		color:<?php echo $themePrimary; ?>;
	}

	.header .main-title a {
	    color:<?php echo $themePrimary; ?>;
	}
	
	/* Front Page */
	.latest-episode {
		background-color: <?php echo $themePageHeader; ?>
	}
	.latest-episode .main-featured-post .mini-title,
	.front-page-header .text .mini-title {
	    color:<?php echo $themePrimary; ?>;
	}
	.latest-episode .next-week .mini-title,
	.next-week .mini-title {
	    color:<?php echo $themePrimary; ?>;
	}
	.featured-caption {
		background-color:<?php echo $themePrimary; ?>;
	}
	.listen_butn {
		background-color:<?php echo $themePrimary; ?>
	}
	.slideshow_fh .text .play-button:hover {
		border:2px solid <?php echo $themePrimary; ?>;
		background-color: <?php echo $themePrimary; ?>;
	}
	.latest-episode .translucent.solid-bg,
	.slideshow_fh .translucent.solid-bg {
		background-color:<?php echo $pod_fh_bg; ?>;
	}
	.featured-caption .vid,
	.featured-caption .audio,
	.featured-caption .img {
		color:#fff;
	}

	input[type=submit]:link,
	input[type=submit]:visited,
	#respond #commentform #submit:link,
	#respond #commentform #submit:visited,
	a.butn:link,
	a.butn:visited,
	.butn:link,
	.butn:visited {
		background:<?php echo $themePrimary; ?>;
	}

	input.secondary[type=submit],
	#respond #cancel-comment-reply-link:link, 
	#respond #cancel-comment-reply-link:visited,
	#comments .commentlist li .comment-body .reply a:link, 
	#comments .commentlist li .comment-body .reply a:visited {
		background-color: <?php echo $themePrimary; ?>;
		color: #fff;
		border:none
	}

	#respond #commentform #submit,
	.wpcf7-form-control.wpcf7-submit {
		background:<?php echo $themePrimary; ?>;
	}
		
	#respond #commentform #submit:hover,
	.wpcf7-form-control.wpcf7-submit:hover {
		opacity:1;
	}

	.post-password-form input[type="submit"] {
	  background:<?php echo $themePrimary; ?>;
	}

	a:link, 
	a:visited {
    	color:<?php echo $themePrimary; ?>; 
    }

    <?php if ( isset( $themeLogo['url'] ) && $themeLogo['url'] != '' ) { ?>
     header .main-title a {
    	background-image: url(<?php echo $themeLogo['url'] ?>);
	}
	.small_nav .header .main-title a {
		background-image: url(<?php echo $themeLogoSticky['url']; ?>);
	}

	 header .main-title a {
		text-indent:-9999px;
	}
	<?php } ?>

	/* Menu */

	#nav .thst-menu li:hover > .sub-menu {
	    background-color: <?php echo $themePrimary; ?>;
	}
	
	#nav .thst-menu li > .sub-menu li a:link,
	#nav .thst-menu li > .sub-menu li a:visited {
	    background-color: <?php echo $themePrimary; ?>;
	}

	/* Front Page List Settings */
	.list-of-episodes article.list .post-header ul a:link, 
	.list-of-episodes article.list .post-header ul a:visited {
		color:<?php echo $themePrimary; ?>;
	}

	/* Video Settings */
	.podcaster-theme .mejs-overlay-button:hover {
	    background-color: <?php echo $themePrimary; ?>;
	}
	.podcaster-theme .mejs-container.wp-video-shortcode.mejs-video .mejs-controls .mejs-volume-button .mejs-volume-slider .mejs-volume-handle {
	    background-color: <?php echo $themePrimary; ?>;
	}
	.podcaster-theme .mejs-container .mejs-controls .mejs-time-rail .mejs-time-float {
	    background-color: <?php echo $themePrimary; ?>;
	    color:#fff;
	}
	.podcaster-theme .mejs-container .mejs-controls .mejs-time-rail .mejs-time-float-corner {
		border-color: <?php echo $themePrimary; ?> rgba(0, 0, 0, 0) rgba(0, 0, 0, 0);
	}
	.podcaster-theme .audio_player .mejs-container .mejs-controls .mejs-time-rail .mejs-time-float-corner {
		border-color: <?php echo $themePrimary; ?> rgba(0, 0, 0, 0) rgba(0, 0, 0, 0);
	}
	.podcaster-theme .post .entry-content .mejs-container.wp-audio-shortcode.mejs-audio,
	.podcaster-theme .post .entry-content .mejs-container.powerpress-mejs-audio.mejs-audio {
		background-color: <?php echo $themePrimary; ?>;
	}
	.podcaster-theme .post .entry-content .mejs-container.wp-audio-shortcode.mejs-audio .mejs-controls {
	    background-color: <?php echo $themePrimary; ?>;
	}
	.podcaster-theme .latest-episode .main-featured-post .featured-excerpt .more-link {
		color:<?php echo $themePrimary; ?>;
	}
	.podcaster-theme .list-of-episodes article .featured-image .hover .icon {
		color: <?php echo $themePrimary; ?>;
	}
	.podcaster-theme .mejs-container.mejs-video .mejs-controls:hover {
		background-color:<?php echo $themePrimary; ?> !important; 
	}
	.podcaster-theme .mejs-container.mejs-video .mejs-controls:hover .mejs-time-rail .mejs-time-float {
	  color: <?php echo $themePrimary; ?>;
	}



	/* Playlist */
	.podcaster-theme .wp-playlist.wp-audio-playlist,
	.podcaster-theme .wp-playlist.wp-video-playlist {
		background-color: <?php echo $themePrimary; ?>;
	}
	.podcaster-theme .post .wp-playlist.wp-audio-playlist .mejs-container .mejs-controls .mejs-time-rail .mejs-time-float {
		color: <?php echo $themePrimary; ?>;
	}

	
	/* Posts */

	.post .entry-header .permalink-icon,
	.post .post-header .permalink-icon, 
	.post .entry-content .permalink-icon {
		background-color: <?php echo $themePrimary; ?>;
	}
	.post.sticky_post .entry-header .permalink-icon,
	.post.sticky_post .post-header .permalink-icon, 
	.post.sticky_post .entry-content .permalink-icon {
		background-color: transparent;
	}
	.post .post-header .post-cat li a, 
	.podcast .post-header .post-cat li a {
		background-color: <?php echo $themePrimary; ?>;
	}
	.post .entry-header .entry-date .sticky_label {
		background-color:<?php echo $themePrimary; ?>;
	}
	.post.format-gallery .featured-gallery .gallery-caption {
		color: <?php echo $themePrimary; ?>;
	}
	.post.format-gallery .entry-content .gallery.grid .gallery-item .flex-caption,
	.gallery.grid .gallery-item .flex-caption {
		background-color: <?php echo $themePrimary; ?>;
	}
	.post.format-audio .featured-media .audio-caption,
	.post.format-video .video-caption,
	.post.format-image .entry-featured .image-caption {
		color: <?php echo $themePrimary; ?>;
	}
	.page-template-pagepage-podcastarchive-php .entries.grid .podpost .entry-footer .podpost-meta .title a,
	.post-type-archive-podcast .entries.grid .podpost .entry-footer .podpost-meta .title a {
		color: <?php echo $themePrimary; ?>;
	}
	.post.format-gallery .featured-gallery .gallery.flexslider li.gallery-item .flex-caption, 
	.single .featured-gallery .gallery.flexslider li.gallery-item .flex-caption, 
	.post .entry-content .gallery.flexslider li.gallery-item .flex-caption {
		background-color: <?php echo $themePrimary; ?>;
	}

	/* Audio Player */
	.podcaster-theme .mejs-controls .mejs-time-rail .mejs-time-current {
		background:<?php echo $themePrimary; ?>;
	}
	.podcaster-theme .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current {
		background:<?php echo $themePrimary; ?>;
	}
	.post .audio_player,
	.post .powerpress_player,
	.post .featured-media .powerpress_player {
		background:<?php echo $themePrimary; ?>;
	}
	.post .audio_player .mejs-container .mejs-controls,
	.post .powerpress_player .mejs-container .mejs-controls {
		background:<?php echo $themePrimary; ?>;
	}
	.podcaster-theme .post .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current {
		background:<?php echo $themePrimary; ?>;
	}
	.wp-playlist .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
		background:<?php echo $themePrimary; ?>;
	}

	.post.format-gallery .featured-gallery .gallery.flexslider .flex-direction-nav .flex-next:hover,
	.single .featured-gallery .gallery.flexslider .flex-direction-nav .flex-next:hover,
	.post .entry-content .gallery.flexslider .flex-direction-nav .flex-next:hover {
	  background-color: <?php echo $themePrimary; ?>;
	}
	.post.format-gallery .featured-gallery .gallery.flexslider .flex-direction-nav .flex-prev:hover,
	.single .featured-gallery .gallery.flexslider .flex-direction-nav .flex-prev:hover,
	.post .entry-content .gallery.flexslider .flex-direction-nav .flex-prev:hover {
	  background-color: <?php echo $themePrimary; ?>;
	}

	/* Podcaster */

	.excerpts .podpost .entry-header .pp-meta {
	color: <?php echo $themePrimary; ?>;
	}
	.grid .podpost .entry-footer .pp-meta a:link,
	.grid .podpost .entry-footer .pp-meta a:visited {
		color:<?php echo $themePrimary; ?>;
	}

	.grid .podpost .entry-footer .pp-meta a:hover {
		color:<?php echo $themePrimary; ?>;
	}

	.grid .podpost .entry-footer .pp-meta li {
		color:<?php echo $themePrimary; ?>;
	}
  

    /* Single */
    .single .reg {
	    background-color:<?php echo $themePrimary; ?>;
	}
	.single-podcast.podcast-archive .main-content .container .entries .podcast-content .podcast_meta a:link,
	.single-podcast.podcast-archive .main-content .container .entries .podcast-content .podcast_meta a:visited {
		background-color:<?php echo $themePrimary; ?>;
	}
	.single .single-featured span.mini-title {
		color:<?php echo $themePrimary; ?>;
	}
	.single .mejs-controls .mejs-button button:hover,
	.featured-media .mejs-controls button:hover,
	.single-featured .mejs-container .mejs-controls button:hover,
	.single .mejs-container.wp-video-shortcode .mejs-controls .mejs-button button:hover {
		color:<?php echo $themePrimary; ?>;
	}


    /* Flexslider */
    .flex-direction-nav a {
		background-color: <?php echo $themePrimary; ?>;
    }


    /* Pagination */

    .pagination a.page-numbers:link,
	.pagination a.page-numbers:visited {
		color:<?php echo $themePrimary; ?>;
	}

   /* Sidebar */
    #searchform .search-container:hover #searchsubmit {
        color:<?php echo $themePrimary; ?>;    
	}
	.search-container input[type="submit"]#searchsubmit{
	    color:<?php echo $themePrimary; ?> !important;
	}
	.sidebar .widget ul li a:link, 
	.sidebar .widget ul li a:visited {
		color:<?php echo $themePrimary; ?>;
	}


	/* Widgets */

	.widget.thst_recent_blog_widget .ui-tabs-nav li {
		background-color:<?php echo $themePrimary; ?>;
	}

	.thst_highlight_category_widget ul li:first-child .text {
		border-right:1px solid <?php echo $themePrimary; ?>;
		border-left:1px solid <?php echo $themePrimary; ?>;
		background-color:<?php echo $themePrimary ?>;
	}

	.thst_highlight_category_widget ul li:first-child .text {
		border-right:1px solid <?php echo $themePrimary; ?>;
		border-left:1px solid <?php echo $themePrimary; ?>;
		border-bottom:none;
		padding:20px;
		background-image:none;
		position: relative;
		background-color:<?php echo $themePrimary; ?>;
	}

	.thst_highlight_category_widget ul li:first-child .text.arrow:after { 
		border-color: rgba(136, 183, 213, 0); 
		border-bottom-color: <?php echo $themePrimary; ?>; 
		border-width: 11px; 
		left: 75%; 
		margin-left: -11px; 
	}
	.widget.thst_recent_blog_widget .ui-tabs-panel article .text .date {
		color: <?php echo $themePrimary; ?>; 
	}

	/* Pages */
	.page .reg, 
	.podcast-archive .reg, 
	.search .reg, 
	.archive .reg {
		background-color:<?php echo $themePageHeader; ?>;
	}
	.blog .static {
		background-color:<?php echo $themePageHeader; ?>;
	}

	/* Footer */
	.fromtheblog.list article .post-content .cats a:link, 
	.fromtheblog.list article .post-content .cats a:visited {
		background-color:<?php echo $themePrimary; ?>;
	}
	.fromtheblog.list article .post-header .user_img_link {
    	border: 3px solid <?php echo $themePrimary; ?>;
	}



/* Media Queries */

/* Larger than 1024px width */
@media screen and (min-width: 1024px) { 
	nav .thst-menu li:hover > .sub-menu {
		background:<?php echo $themePrimary; ?>;
	}

	nav .thst-menu li > .sub-menu li a:link,
	nav .thst-menu li > .sub-menu li a:visited {
		background-color:<?php echo $themePrimary; ?>;
	}

	
}

/* Smaller than 1024px width */ 
@media screen and (max-width: 1200px) {
	nav .thst-menu li > .sub-menu li a:link, 
	nav .thst-menu li > .sub-menu li a:visited {
		background-color:transparent;
	}

	.responsive-sidebar .sidebar {
        color:<?php echo $themePrimary; ?>;
    }
    <?php if ( isset( $themeLogoRet['url'] ) && $themeLogoRet['url'] != '' ) { ?>
     header .main-title a {
    	background-image: url(<?php echo $themeLogoRet['url'] ?>);
    	background-position:center left;
    	background-repeat:no-repeat;
    	background-size: 100% auto;
	}
	.small_nav header .main-title a {
		background-image: url(<?php echo $themeLogoRetSticky['url']; ?>)
	}
	header .main-title a {
		text-indent:-9999px;
	}
	<?php } ?>
}

@media screen and (max-width: 991px) {
	header .main-title a {
		background-position: center;
	}
	<?php if ( isset( $themeLogoRet['url'] ) && $themeLogoRet['url'] != '' ) { ?>
	header .main-title a {
	   	background-size: 25% auto;
	}
	<?php } ?>

	.above.toggle,
	.above.transparent.large_nav.toggle, 
	.above.large_nav.toggle,
	.above.transparent.small_nav.toggle, 
  	.above.small_nav.toggle  {
  		background-color:<?php echo $themeNavBg; ?>;
	}
	#nav.drop .thst-menu li.menu-item-has-children > .sub-menu li a:link, 
	#nav.drop .thst-menu li.menu-item-has-children > .sub-menu li a:visited {
		background-color:<?php echo $themeNavBg; ?>;
	}
	#nav.toggle,
	#nav.drop {
		background-color:<?php echo $themeNavBg; ?>;
	}
	#nav .thst-menu li.menu-item-has-children a:hover, 
	#nav .thst-menu li.menu-item-has-children > .sub-menu li a:hover {
		background:rgba(0,0,0,0.2);
	}
}

.lb-data .lb-close:before {
	color:<?php echo $themePrimary; ?>;
}

<?php if ( isset( $pod_typography ) && $pod_typography == "serif" ) { ?>
	body {
		font-family: 'Lora', 'Georgia', serif;
	}
	h1, h2, h3, h4, h5, h6 {
		font-family: 'Lora', 'Georgia', serif;
	}
	input[type="text"],
	input[type="email"] {
		font-family: 'Lora', 'Georgia', serif;
	}
	textarea {
		font-family: 'Lora', 'Georgia', serif;
	}
	input[type="submit"],
	.form-submit #submit,
	#respond #commentform #submit,
	a.butn:link,
	a.butn:visited,
	.butn {
		font-family: 'Lora', 'Georgia', serif;
	}
	#respond #commentform #submit {
		font-family: 'Lora', 'Georgia', serif;
	}
	input.secondary[type="submit"],
	#respond #cancel-comment-reply-link:link, 
	#respond #cancel-comment-reply-link:visited,
	#comments .commentlist li .comment-body .reply a:link, 
	#comments .commentlist li .comment-body .reply a:visited {
		font-family: 'Lora', 'Georgia', serif;
	}
	.header header .main-title a {
		font-family: 'Lora', 'Georgia', serif;
	}
	.singlep_pagi {
		font-family: 'Lora', 'Georgia', serif;
	}
	.page .reg .heading h1,
	.podcast-archive .reg .heading h1 {
		font-family: 'Lora', 'Georgia', serif;
	}
	.arch_searchform #ind_searchform div #ind_s {
		font-family: 'Lora', 'Georgia', serif;
	}
	a.thst-button, 
	a.thst-button:visited { 
		font-family: 'Lora', 'Georgia', serif;
	}
<?php } ?>