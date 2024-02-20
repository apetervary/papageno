<?php
/**
 * Enqueue scripts and styles.
 */
function miraculous_scripts() {
	if( defined('FW') ){
		$miraculous_theme_data = '';
		if (function_exists('fw_get_db_settings_option')):	
			$miraculous_theme_data = fw_get_db_settings_option();     
		endif;
	}
	if ( class_exists( 'ReduxFramework' ) ) {
		$miraculous_theme_data = '';
		$miraculous_theme_data = get_option('miraculous_options');
	}
	
	$theme_layout = '';
	if(!empty($miraculous_theme_data['miraculous_layout'])):
	   $theme_layout = $miraculous_theme_data['miraculous_layout'];
	else:
	   $theme_layout = 2;
	endif;
    $fonts_style = '';
	if(!empty($miraculous_theme_data['fonts_style'])):
	   $fonts_style = $miraculous_theme_data['fonts_style'];
	endif;
	if( defined('FW') ){
		$colorname = '';
		if(!empty($miraculous_theme_data['themeoption_color_switch']['on']['thememiraculous_color'])):
		   $colorname = $miraculous_theme_data['themeoption_color_switch']['on']['thememiraculous_color'];
		endif;
		
		$color_style = '';
		if(!empty($miraculous_theme_data['themeoption_color_switch']['color_switch_value'])):
		   $color_style = $miraculous_theme_data['themeoption_color_switch']['color_switch_value'];
		endif;
	}
	
	if ( class_exists( 'ReduxFramework' ) ) {
		$colorname = '';
		if(!empty($miraculous_theme_data['thememiraculous_color'])):
		   $colorname = $miraculous_theme_data['thememiraculous_color'];
		endif;
		$color_style = '';
		if(!empty($miraculous_theme_data['color_switch_value'])):
		   $color_style = $miraculous_theme_data['color_switch_value'];
		   if($color_style == '1'){
			   $color_style = 'on';
		   }
		endif;
	}
	
	$custom_css = '';
   /**
	*enqueue script files
	*/
	
	wp_enqueue_style('miraculous-style', get_stylesheet_uri());
	
	wp_enqueue_style( 'miraculous-fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), '1', 'all' );
    
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '1', 'all' );
	
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '1', 'all' );
	
	wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/js/plugins/swiper/css/swiper.min.css', array(), '1', 'all' );
	
	wp_enqueue_style( 'miraculous-nice-select', get_template_directory_uri() . '/assets/js/plugins/nice_select/nice-select.css', array(), '1', 'all' );
	
	wp_enqueue_style( 'miraculous-volume', get_template_directory_uri() . '/assets/js/plugins/player/volume.css', array(), '1', 'all' );
	
	wp_enqueue_style( 'mcustomscrollbar', get_template_directory_uri() . '/assets/js/plugins/scroll/jquery.mCustomScrollbar.css', array(), '1', 'all' );
	
	wp_enqueue_style('toastr', get_template_directory_uri() . '/assets/css/toastr.min.css', array(), '1', 'all' );
	
	wp_enqueue_style('miraculous-custom', get_template_directory_uri() . '/assets/css/miraculous-custom-style.css', array(), '1', 'all' );
	
	wp_enqueue_style('jquery.dataTables', get_template_directory_uri() . '/assets/css/jquery.dataTables.css', array(), '1', 'all' );
	
	wp_enqueue_style('miraculous-custom-style-new', get_template_directory_uri() . '/assets/css/miraculous-custom-style-new.css', array(), '1', 'all' );
	
    if($theme_layout == 2):
	   wp_enqueue_style( 'miraculous-custom-light', get_template_directory_uri() . '/assets/css/miraculous-custom-light-style.css', array(), '1', 'all' );
	endif;
	
	
	
	if($fonts_style == 'on'):
	    wp_enqueue_style( 'miraculous-custom-fonts', get_template_directory_uri() . '/assets/css/miraculous-custom-fonts-style.css', array(), '1', 'all' );
	endif; 
	
	if(is_rtl()):
	     wp_enqueue_style('miraculous-rtl', get_template_directory_uri(). '/rtl.css', array(), '1', 'all');
	endif;
	
	/**
	 * enqueue color style files
	 */ 
	$color_style = '';
	if( defined('FW') ){
		$colorname = '';
		if(!empty($miraculous_theme_data['themeoption_color_switch']['on']['thememiraculous_color'])):
		   $colorname = $miraculous_theme_data['themeoption_color_switch']['on']['thememiraculous_color'];
		endif;
		
		$color_style = '';
		if(!empty($miraculous_theme_data['themeoption_color_switch']['color_switch_value'])):
		   $color_style = $miraculous_theme_data['themeoption_color_switch']['color_switch_value'];
		endif;
	}
	
	if ( class_exists( 'ReduxFramework' ) ) {
		$colorname = '';
		if(!empty($miraculous_theme_data['thememiraculous_color'])):
		   $colorname = $miraculous_theme_data['thememiraculous_color'];
		endif;
		$color_style = '';
		if(!empty($miraculous_theme_data['color_switch_value'])):
		   $color_style = $miraculous_theme_data['color_switch_value'];
		   if($color_style == '1'){
			   $color_style = 'on';
		   }
		endif;
	}
	if($color_style == 'on'):
	     wp_enqueue_style( 'miraculous-color-option', get_template_directory_uri() . '/assets/css/color/color'.$colorname.'.css', array(), '1', 'all' );
    endif;
   /**
	*enqueue script files
	*/
	
	wp_enqueue_media();
    
	
	
	
	wp_enqueue_script( 'miraculous-frontend-profile-upload', get_template_directory_uri().'/assets/js/frontend-profile-upload.js',array('jquery'), '20151215', false);
    
    wp_enqueue_script('miraculous-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '20151215', true );
	
    wp_enqueue_script('skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array('jquery'), '20151215', true );
    
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20151215', true );
    
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/plugins/swiper/js/swiper.min.js', array('jquery'), '20151215', true ); 
	
	wp_enqueue_script('nice-select', get_template_directory_uri() . '/assets/js/plugins/nice_select/jquery.nice-select.min.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'miraculous-custom', get_template_directory_uri() . '/assets/js/miraculous-custom.js', array('jquery'), '20151215', true );
	  
	wp_enqueue_script( 'mcustomscrollbar', get_template_directory_uri() . '/assets/js/plugins/scroll/jquery.mCustomScrollbar.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'toastr', get_template_directory_uri() . '/assets/js/toastr.min.js', array('jquery'), '20151215', true );
	 
    wp_enqueue_script( 'miraculous-custom-ajax', get_template_directory_uri() . '/assets/js/custom-ajax.js', array('jquery'), '20151215', true );
    
	wp_localize_script( 'miraculous-custom-ajax', 'frontadminajax', array('ajax_url' => admin_url( 'admin-ajax.php' )) );
	
	wp_enqueue_script( 'multi-vendor-custom-script', get_template_directory_uri() . '/assets/js/multi-vendor-custom-script.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'jquery.dataTables', get_template_directory_uri() . '/assets/js/jquery.dataTables.js', array('jquery'), '20151215', true );
	
	wp_localize_script( 'multi-vendor-custom-script', 'frontadminajax', array('ajax_url' => admin_url( 'admin-ajax.php' )) );
	if (function_exists('WC')){
	if ( !is_checkout() ) {
    	wp_enqueue_script('jplayer-playlist', get_template_directory_uri() . '/assets/js/plugins/player/jplayer.playlist.min.js', array('jquery'), '20151213', true );
	}
	}
	else{
	    wp_enqueue_script('jplayer-playlist', get_template_directory_uri() . '/assets/js/plugins/player/jplayer.playlist.min.js', array('jquery'), '20151213', true );
	}
	wp_enqueue_script('jplayer', get_template_directory_uri() . '/assets/js/plugins/player/jquery.jplayer.min.js',array('jquery'), '20151215', true );
	
	wp_enqueue_script('audio-player', get_template_directory_uri() . '/assets/js/plugins/player/audio-player.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script('volume', get_template_directory_uri() . '/assets/js/plugins/player/volume.js', array('jquery'), '20151215', true );
	
	wp_localize_script('jplayer-playlist', 'templatepath', array('url' => get_template_directory_uri() . '/assets/') );
	
	wp_localize_script('audio-player', 'templatepath', array('url' => get_template_directory_uri() . '/assets/', 'ajax_url' => admin_url( 'admin-ajax.php' )) );
	
	
	                
	wp_add_inline_style('miraculous-custom', $custom_css );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} 
add_action( 'wp_enqueue_scripts', 'miraculous_scripts' );