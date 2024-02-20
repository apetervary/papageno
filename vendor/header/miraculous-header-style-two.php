<?php
$miraculous_theme_data = '';
if (function_exists('fw_get_db_settings_option')):	
	$miraculous_theme_data = fw_get_db_settings_option();     
endif;

//Redux Option
if ( class_exists( 'ReduxFramework' ) ) {
	$miraculous_theme_data = '';
	$miraculous_theme_data = get_option('miraculous_options');
}

$heaer_color = '';
    if (!empty($miraculous_theme_data['header_bg'])):  
        $heaer_color = $miraculous_theme_data['header_bg'];     
    endif;
$header_style = '';
if(!empty($miraculous_theme_data['header_style'])):
   $header_style = $miraculous_theme_data['header_style'];
endif;
$thumb_w = '';
if(!empty($miraculous_theme_data['logo_width'])):
   $thumb_w = $miraculous_theme_data['logo_width'];
endif;
$thumb_h = '';
if(!empty($miraculous_theme_data['logo_height'])):
   $thumb_h = $miraculous_theme_data['logo_height'];
endif;
$logo_title ='';
if(!empty($miraculous_theme_data['logo_title'])):
	$logo_title = $miraculous_theme_data['logo_title'];
endif; 
$logo_svgcode = '';
if(!empty($miraculous_theme_data['logo_svgcode'])):
   $logo_svgcode = $miraculous_theme_data['logo_svgcode'];
else:
	$logo_image = '';
	if(!empty($miraculous_theme_data['logo_image']['url'])):
	   if (function_exists('fw_get_db_settings_option')){
	        $attachment_id = $miraculous_theme_data['logo_image']['attachment_id'];
	   }
	   if ( class_exists( 'ReduxFramework' ) ) {
	       $attachment_id = $miraculous_theme_data['logo_image']['id'];
	   }
	   $logoimage_url = wp_get_attachment_url($attachment_id, 'full');
	   $logo_image = miraculous_aq_resize($logoimage_url, $thumb_w, $thumb_h , true);
	else:
	    $theme_layout = '';
		if(!empty($miraculous_theme_data['miraculous_layout'])):
		   $theme_layout = $miraculous_theme_data['miraculous_layout'];
		endif;
		if($theme_layout == 1):
		    $logo_image = get_template_directory_uri().'/assets/images/logo.png';
		 else:
		   $logo_image = get_template_directory_uri().'/assets/images/logo_red.png';
		endif;  
	endif;
endif;
$menuopen_switch_value = '';
if(!empty($miraculous_theme_data['menuopen_switch_value'])):
  $menuopen_switch_value = $miraculous_theme_data['menuopen_switch_value'];
endif;
$menuopen_class = '';
if($menuopen_switch_value == 'on'  || $menuopen_switch_value == '1'):
  $menuopen_class = esc_html__('open_menu','miraculous');    
endif;

$miraculous_font_size = '';
if(!empty($miraculous_theme_data['fonts_style']['on']['font_style_google']['size'])):
	$miraculous_font_size = $miraculous_theme_data['fonts_style']['on']['font_style_google']['size'];
endif;
?>
<div class="div-wrapper-<?php echo esc_attr($header_style); ?> mira-demothreecss"><!-- #div-wrapper-style -->
<div class="ms_sidemenu_wrapper <?php echo esc_attr($menuopen_class); echo esc_attr($header_style);?>">
    <div class="ms_nav_close">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    </div> 
	<div class="ms_sidemenu_inner">
	  <div class="ms_logo_inner">
        <div class="ms_logo">
        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="<?php esc_attr_e('home','miraculous'); ?>">
			<?php
			if(!empty($logo_svgcode)):
			    printf($logo_svgcode);
			else:
			if(!empty($logo_image)):
			?>
			<img src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_attr_e('Logo Image','miraculous');?>">
			<?php endif; 
			endif;
			?>
			</a>
        </div>
        <div class="ms_logo_open">
        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="<?php esc_attr_e('home','miraculous'); ?>">
			<?php
			if(!empty($logo_svgcode)):
			    printf($logo_svgcode);
			else:
			if(!empty($logo_image)):
			?>
			<img src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_attr_e('Logo Image','miraculous');?>">
			<?php endif;
            endif;
			?>
			</a>
			<?php if(!empty($logo_title)): ?>
			  <h4 class="ms-logo-title">
			    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="<?php esc_attr_e('home','miraculous'); ?>"><?php echo esc_html($logo_title)?></a>
			  </h4>
			<?php endif; ?>
        </div>
      </div>
	<div class="ms_nav_wrapper">
        <?php
        if(has_nav_menu('menu_one')):
              wp_nav_menu( array(
            	'theme_location' => 'menu_one',
            	'menu_id'        => 'primary-menu',
				'fallback_cb'=> 'miraculous_menu_editor'
              ) );
        endif;
        if(has_nav_menu('menu_middle')): 
              wp_nav_menu( array(
            	'theme_location' => 'menu_middle',
            	'menu_id'        => 'second-menu',
            	'menu_class'	 => 'nav_downloads',
				'fallback_cb'=> 'miraculous_menu_editor'
             ) );
        endif;
        if(has_nav_menu('menu_last')):
              wp_nav_menu( array(
            	'theme_location' => 'menu_last',
            	'menu_id'        => 'thired-menu',
            	'menu_class'	 => 'nav_playlist',
				'fallback_cb'=> 'miraculous_menu_editor'
              ) );
        endif;
        ?>
    </div>
	</div>
</div>
<?php 
if (function_exists('fw_get_db_settings_option')){
    $themeinloginbar ='';
    if(!empty($miraculous_theme_data['themeloginbar_switch'])):
    	$themeinloginbar =  $miraculous_theme_data['themeloginbar_switch']['loginbar_switch_value'];
    endif;
}
if ( class_exists( 'ReduxFramework' ) ) {
   $themeinloginbar ='';
    if(!empty($miraculous_theme_data['loginbar_switch_value'])):
    	$themeinloginbar =  $miraculous_theme_data['loginbar_switch_value'];
    endif;
}
if($themeinloginbar == 'on' || $themeinloginbar == 1):
   $miraculous_core = '';
	if(class_exists('Miraculouscore')):
		$miraculous_core = new Miraculouscore();
	    $miraculous_core->miraculous_themeinloginbar();
	endif;
endif;  
?>