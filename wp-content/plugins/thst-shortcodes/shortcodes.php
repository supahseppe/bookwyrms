<?php

/*-----------------------------------------------------------------------------------*/
/*	Column Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('thst_one_third')) {
	function thst_one_third( $atts, $content = null ) {
	   return '<div class="thst-one-third">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('thst_one_third', 'thst_one_third');
}

if (!function_exists('thst_one_third_last')) {
	function thst_one_third_last( $atts, $content = null ) {
	   return '<div class="thst-one-third thst-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('thst_one_third_last', 'thst_one_third_last');
}

if (!function_exists('thst_two_third')) {
	function thst_two_third( $atts, $content = null ) {
	   return '<div class="thst-two-third">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('thst_two_third', 'thst_two_third');
}

if (!function_exists('thst_two_third_last')) {
	function thst_two_third_last( $atts, $content = null ) {
	   return '<div class="thst-two-third thst-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('thst_two_third_last', 'thst_two_third_last');
}

if (!function_exists('thst_one_half')) {
	function thst_one_half( $atts, $content = null ) {
	   return '<div class="thst-one-half">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('thst_one_half', 'thst_one_half');
}

if (!function_exists('thst_one_half_last')) {
	function thst_one_half_last( $atts, $content = null ) {
	   return '<div class="thst-one-half thst-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('thst_one_half_last', 'thst_one_half_last');
}

if (!function_exists('thst_one_fourth')) {
	function thst_one_fourth( $atts, $content = null ) {
	   return '<div class="thst-one-fourth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('thst_one_fourth', 'thst_one_fourth');
}

if (!function_exists('thst_one_fourth_last')) {
	function thst_one_fourth_last( $atts, $content = null ) {
	   return '<div class="thst-one-fourth thst-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('thst_one_fourth_last', 'thst_one_fourth_last');
}

if (!function_exists('thst_three_fourth')) {
	function thst_three_fourth( $atts, $content = null ) {
	   return '<div class="thst-three-fourth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('thst_three_fourth', 'thst_three_fourth');
}

if (!function_exists('thst_three_fourth_last')) {
	function thst_three_fourth_last( $atts, $content = null ) {
	   return '<div class="thst-three-fourth thst-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('thst_three_fourth_last', 'thst_three_fourth_last');
}

if (!function_exists('thst_one_fifth')) {
	function thst_one_fifth( $atts, $content = null ) {
	   return '<div class="thst-one-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('thst_one_fifth', 'thst_one_fifth');
}

if (!function_exists('thst_one_fifth_last')) {
	function thst_one_fifth_last( $atts, $content = null ) {
	   return '<div class="thst-one-fifth thst-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('thst_one_fifth_last', 'thst_one_fifth_last');
}

if (!function_exists('thst_two_fifth')) {
	function thst_two_fifth( $atts, $content = null ) {
	   return '<div class="thst-two-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('thst_two_fifth', 'thst_two_fifth');
}

if (!function_exists('thst_two_fifth_last')) {
	function thst_two_fifth_last( $atts, $content = null ) {
	   return '<div class="thst-two-fifth thst-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('thst_two_fifth_last', 'thst_two_fifth_last');
}

if (!function_exists('thst_three_fifth')) {
	function thst_three_fifth( $atts, $content = null ) {
	   return '<div class="thst-three-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('thst_three_fifth', 'thst_three_fifth');
}

if (!function_exists('thst_three_fifth_last')) {
	function thst_three_fifth_last( $atts, $content = null ) {
	   return '<div class="thst-three-fifth thst-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('thst_three_fifth_last', 'thst_three_fifth_last');
}

if (!function_exists('thst_four_fifth')) {
	function thst_four_fifth( $atts, $content = null ) {
	   return '<div class="thst-four-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('thst_four_fifth', 'thst_four_fifth');
}

if (!function_exists('thst_four_fifth_last')) {
	function thst_four_fifth_last( $atts, $content = null ) {
	   return '<div class="thst-four-fifth thst-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('thst_four_fifth_last', 'thst_four_fifth_last');
}

if (!function_exists('thst_one_sixth')) {
	function thst_one_sixth( $atts, $content = null ) {
	   return '<div class="thst-one-sixth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('thst_one_sixth', 'thst_one_sixth');
}

if (!function_exists('thst_one_sixth_last')) {
	function thst_one_sixth_last( $atts, $content = null ) {
	   return '<div class="thst-one-sixth thst-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('thst_one_sixth_last', 'thst_one_sixth_last');
}

if (!function_exists('thst_five_sixth')) {
	function thst_five_sixth( $atts, $content = null ) {
	   return '<div class="thst-five-sixth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('thst_five_sixth', 'thst_five_sixth');
}

if (!function_exists('thst_five_sixth_last')) {
	function thst_five_sixth_last( $atts, $content = null ) {
	   return '<div class="thst-five-sixth thst-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('thst_five_sixth_last', 'thst_five_sixth_last');
}


/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/

if (!function_exists('thst_button')) {
	function thst_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'url' => '#',
			'target' => '_self',
			'style' => 'grey',
			'size' => 'small',
			'type' => 'round'
	    ), $atts));
		
	   return '<a target="'.$target.'" class="thst-button '.$size.' '.$style.' '. $type .'" href="'.$url.'">' . do_shortcode($content) . '</a>';
	}
	add_shortcode('thst_button', 'thst_button');
}


/*-----------------------------------------------------------------------------------*/
/*	Alerts
/*-----------------------------------------------------------------------------------*/

if (!function_exists('thst_alert')) {
	function thst_alert( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style'   => 'white'
	    ), $atts));
		
	   return '<div class="thst-alert '.$style.'">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('thst_alert', 'thst_alert');
}


/*-----------------------------------------------------------------------------------*/
/*	Toggle Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('thst_toggle')) {
	function thst_toggle( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'title'    	 => 'Title goes here',
			'state'		 => 'open'
	    ), $atts));
	
		return "<div data-id='".$state."' class=\"thst-toggle\"><span class=\"thst-toggle-title\">". $title ."</span><div class=\"thst-toggle-inner\">". do_shortcode($content) ."</div></div>";
	}
	add_shortcode('thst_toggle', 'thst_toggle');
}


/*-----------------------------------------------------------------------------------*/
/*	Tabs Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('thst_tabs')) {
	function thst_tabs( $atts, $content = null ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		
		STATIC $i = 0;
		$i++;

		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		
		$output = '';
		
		if( count($tab_titles) ){
		    $output .= '<div id="thst-tabs-'. $i .'" class="thst-tabs"><div class="thst-tab-inner">';
			$output .= '<ul class="thst-nav thst-clearfix">';
			
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#thst-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div></div>';
		} else {
			$output .= do_shortcode( $content );
		}
		
		return $output;
	}
	add_shortcode( 'thst_tabs', 'thst_tabs' );
}

if (!function_exists('thst_tab')) {
	function thst_tab( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		return '<div id="thst-tab-'. sanitize_title( $title ) .'" class="thst-tab">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'thst_tab', 'thst_tab' );
}

?>