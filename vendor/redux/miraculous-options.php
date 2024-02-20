<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "miraculous_options";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

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

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

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
        'menu_title'           => __( 'Miraculous Options', 'miraculous' ),
        'page_title'           => __( 'Miraculous Options', 'miraculous' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-screenoptions',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 80,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 90,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        //'menu_icon'            => THEME_ASSETS . 'images/Micon.png',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'miraculous_options',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
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
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
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

    Redux::setArgs( $opt_name, $args );
	
    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
	 
	$images = get_template_directory_uri() . '/assets/images/';
	
	$wbc = ABSPATH . 'wp-content/plugins/redux-framework/redux-core/inc/extensions/wbc_importer';
	if( is_dir( $wbc ) ){
		Redux::setSection( $opt_name, array(
			'id' => 'wbc_importer_section',
			'title'  => esc_html__( 'Demo Importer', 'miraculous' ),
			'icon'   => 'el el-download-alt',
			'fields' => array(
					array(
						'id'   => 'wbc_demo_importer',
						'type' => 'wbc_importer'
						)
				)
			)
		);
	}	
	
	Redux::setSection( $opt_name, array(
		'title' => __( 'General Settings', 'miraculous' ),
		'id'    => 'general_settings',
		'icon'          => 'dashicons dashicons-screenoptions',
		'fields'     => array(
			array(
				'id'       => 'logo_image',
				'type'     => 'media',
				'url'      => true,
				'title'    => __( 'Site Logo', 'miraculous'),
			),
			array(
				'id'       => 'logo_width',
				'type'     => 'text',
				'title'    => __( 'Logo width', 'miraculous' ),
				'default'  => __( '', 'miraculous' ),
				'desc'     => __( 'Enter logo width size in pixels. Ex: 80','miraculous' ),
			),
			array(
				'id'       => 'logo_height',
				'type'     => 'text',
				'title'    => __( 'Logo height', 'miraculous' ),
				'default'  => __( '', 'miraculous' ),
				'desc'     => __( 'Enter logo width size in pixels. Ex: 80','miraculous' ),
			),
			array(
				'id'       => 'logo_title',
				'type'     => 'text',
				'title'    => __( 'Logo title', 'miraculous' ),
				'default'  => __( '', 'miraculous' ),
				'desc'     => __( 'Enter logo title','miraculous' ),
			),
			array(
				'id'       => 'logo_svgcode',
				'type'     => 'textarea',
				'title'    => __( 'Logo Svg Code', 'miraculous' ),
				'default'  => __( '', 'miraculous' ),
				'desc'     => __( 'Enter logo title','miraculous' ),
			),
			array(
				'id'       => 'shadow_switch',
				'type'     => 'switch',
				'title'    => 'Footer Shadow Enable/Disable',
				'default'  => false,
			),
			array(
			   'id' => 'section-loader',
			   'type' => 'section',
			   'title' => __('Loader Settings', 'miraculous'),
			   'indent' => true 
			),
			array(
				'id'       => 'loader_switch',
				'type'     => 'switch',
				'title'    => 'Loader Enable/Disable',
				'default'  => true,
			),
			array(
				'id'       => 'loader_image',
				'type'     => 'media',
				'url'      => true,
				'title'    => __( 'Loader Image', 'miraculous'),
				'required' => array( 'loader_switch', '=', true )
			),
			array(
			   'id' => 'section-player-settings',
			   'type' => 'section',
			   'title' => __('Player Settings', 'miraculous'),
			   'indent' => true 
			),
			array(
				'id'       => 'player_switch_value',
				'type'     => 'switch',
				'title'    => 'Player Enable/Disable',
				'default'  => true,
			),
			array(
				'id'       => 'player_style',
				'type'     => 'select',
				'title'    => __('Player Style', 'miraculous'), 
				'options'  => array(
					'style-one' => 'Player Style One',
					'style-two' => 'Player Style Two',
				),
				'default'  => 'style-one',
				'required' => array( 'player_switch_value', '=', true )
			),
			array(
				'id'       => 'song_duration',
				'type'     => 'switch',
				'title'    => 'Song Duration Enable/Disable',
				'default'  => false,
			),
			array(
				'id'       => 'player_song_duration',
				'type'     => 'text',
				'title'    => __( 'Song Duration', 'miraculous' ),
				'default'  => __( '10', 'miraculous' ),
				'desc'     => __( 'Enter Song Duration Value. Ex: 20','miraculous' ),
				'required' => array( 'song_duration', '=', true )
			),
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title' => __( 'Header Settings', 'miraculous' ),
		'id'    => 'header_settings',
		'icon'          => 'dashicons dashicons-schedule',
		'fields'     => array(
			array(
				'id'       => 'menuopen_switch_value',
				'type'     => 'switch',
				'title'    => __( 'Theme Menu Open Enable/Disable', 'miraculous' ),
				'default'  => false,
			),
			array(
				'id'       => 'loginbar_switch_value',
				'type'     => 'switch',
				'title'    => __( 'Theme Top Header Enable/Disable', 'miraculous' ),
				'default'  => true,
			),
			array(
				'id'       => 'header_trend_title',
				'type'     => 'text',
				'title'    => __( 'Trending Title', 'miraculous' ),
				'default'  => __( 'Trending Songs', 'miraculous' ),
				'required' => array( 'loginbar_switch_value', '=', true )
			),
			array(
				'id'       => 'header_trend_url',
				'type'     => 'text',
				'title'    => __( 'Trending Url', 'miraculous' ),
				'default'  => __( 'https://kamleshyadav.com/wp/miraculous/darkversion/trending/', 'miraculous' ),
				'required' => array( 'loginbar_switch_value', '=', true )
			),
			array(
				'id'       => 'header_trend_desc',
				'type'     => 'textarea',
				'title'    => __( 'Trending Description', 'miraculous' ),
				'default'  => __( 'Dream your moments, Until I Met You, Gimme Some Courage, Dark Alley (+8 More)', 'miraculous' ),
				'required' => array( 'loginbar_switch_value', '=', true )
			),
			array(
				'id'       => 'header_search_option',
				'type'     => 'switch',
				'title'    => __( 'Search Block Enable/Disable', 'miraculous' ),
				'default'  => true,
				'required' => array( 'loginbar_switch_value', '=', true )
			),
			array(
				'id'       => 'header_language_option',
				'type'     => 'switch',
				'title'    => __( 'Language Selection Enable/Disable', 'miraculous' ),
				'default'  => true,
				'required' => array( 'loginbar_switch_value', '=', true )
			),
			array(
				'id'       => 'header_style',
				'type'     => 'select',
				'title'    => __('Select Header', 'miraculous'), 
				'options'  => array(
					'default' => 'Header Default',
					'style-one' => 'Header One',
					'style-two' => 'Header Two',
				),
				'default'  => 'style-one',
			),
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title' => __( 'Breadcrumbs Settings', 'miraculous' ),
		'id'    => 'breadcrumbs_settings',
		'icon'          => 'dashicons dashicons-archive',
		'fields'     => array(
			array(
				'id'       => 'breadcrumbs_switch',
				'type'     => 'switch',
				'title'    => __( 'Breadcrumbs Enable/Disable', 'miraculous' ),
				'default'  => false,
			),
			array(
				'id'       => 'breadcrumbs_image',
				'type'     => 'media',
				'url'      => true,
				'title'    => __( 'Breadcrumbs Background Image', 'miraculous')
			),
			
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title' => __( 'Login / Register Settings', 'miraculous' ),
		'id'    => 'loginregister_settings',
		'icon'          => 'dashicons dashicons-admin-users',
		'fields'     => array(
			array(
				'id'       => 'loginregister_switch',
				'type'     => 'switch',
				'title'    => __( 'Login / Register Enable/Disable', 'miraculous' ),
				'default'  => true,
			),
			array(
				'id'       => 'register_artist_toltip',
				'type'     => 'textarea',
				'title'    => __( 'Register Form Artist Tooltip', 'miraculous' ),
				'default'  => __( 'This feel free to get creative and produce your own!', 'miraculous' ),
			),
			array(
				'id'       => 'register_listener_toltip',
				'type'     => 'textarea',
				'title'    => __( 'Register Form Listener Tooltip', 'miraculous' ),
				'default'  => __( 'This feel free to get creative and produce your own!', 'miraculous' ),
			),
			array(
				'id'       => 'loginregister_image',
				'type'     => 'media',
				'url'      => true,
				'title'    => __( 'Login / Register Image', 'miraculous'),
				'desc'     => __('Upload Login & Register Image Here.','miraculous'),
				//'default'  => array( 'url' => get_template_directory_uri().'/assets/images/Ai-Journey_n2.png' )
			),			
			array(
				'id'       => 'dashboard_redirect',
				'type'     => 'select',
				'data'     => 'pages',
				'title'    => __( 'Redirect Page', 'miraculous' ),
				'desc'     => __( 'Select page you want to redirect users after register/login.', 'miraculous' ),
			),
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title' => __( 'Sidebar', 'miraculous' ),
		'id'    => 'sidebar_settings',
		'icon'          => 'dashicons dashicons-align-left',
		'fields'     => array(
			array(
			   'id' => 'section-sidebar-start',
			   'type' => 'section',
			   'title' => __('General Settings', 'miraculous'),
			   'indent' => true 
		    ),
			array(
				'id'       => 'blog_sidebar',
				'type'     => 'image_select',
				'title'    => __( 'Default Sidebar Position', 'miraculous' ),
				'desc'     => __( 'Sidebar for all the default templates. For Example: Blog, Blog Single, Archive, 404, Search etc.', 'miraculous' ),
				'options'  => array(
					'full' => array(
						'alt' => 'No sidebar',
						'img' => ReduxFramework::$_url . 'assets/img/1col.png'
					),
					'left' => array(
						'alt' => 'Left Sidebar',
						'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
					),
					'right' => array(
						'alt' => 'Right Sidebar',
						'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
					),
				),
				'default'  => 'right'
			),
			array(
				'id'       => 'woocommerce_sidebar',
				'type'     => 'image_select',
				'title'    => __( 'WooCommerce Sidebar Position', 'miraculous' ),
				'options'  => array(
					'full' => array(
						'alt' => 'No sidebar',
						'img' => ReduxFramework::$_url . 'assets/img/1col.png'
					),
					'left' => array(
						'alt' => 'Left Sidebar',
						'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
					),
					'right' => array(
						'alt' => 'Right Sidebar',
						'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
					),
				),
				'default'  => 'full'
			),
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title' => __( 'Theme Style', 'miraculous' ),
		'id'    => 'theme_switcher',
		'icon'  => 'el el-brush',
		'fields'     => array(
			array(
				'id'       => 'miraculous_layout',
				'type'     => 'image_select',
				'title'    => __( 'Theme Layout Color', 'miraculous' ),
				'options'  => array(
					'1' => array(
						'alt' => 'Dark',
						'img' => get_template_directory_uri(). '/vendor/redux/images/color/dark.png'
					),
					'2' => array(
						'alt' => 'Light',
						'img' => get_template_directory_uri(). '/vendor/redux/images/color/light.png'
					),
				),
				'default'  => '1',
				'desc'     => __( 'Select theme Layout color.','miraculouos' )
			),
			array(
				'id'       => 'color_switch_value',
				'type'     => 'switch',
				'title'    => __( 'Theme Color Option', 'miraculous' ),
				'default'  => false,
			),
			array(
				'id'       => 'thememiraculous_color',
				'type'     => 'image_select',
				'title'    => __( 'Theme Color', 'miraculous' ),
				'options'  => array(
					'1' => array(
						'alt' => 'One',
						'img' => get_template_directory_uri(). '/vendor/redux/images/color/Logo-1.png'
					),
					'2' => array(
						'alt' => 'Two',
						'img' => get_template_directory_uri(). '/vendor/redux/images/color/Logo-2.png'
					),
					'3' => array(
						'alt' => 'Three',
						'img' => get_template_directory_uri(). '/vendor/redux/images/color/Logo-3.png'
					),
					'4' => array(
						'alt' => 'Four',
						'img' => get_template_directory_uri(). '/vendor/redux/images/color/Logo-4.png'
					),
					'5' => array(
						'alt' => 'Five',
						'img' => get_template_directory_uri(). '/vendor/redux/images/color/Logo-5.png'
					),
					'6' => array(
						'alt' => 'Six',
						'img' => get_template_directory_uri(). '/vendor/redux/images/color/Logo.png'
					),
				),
				'default'  => '4',
				'desc'     => __( 'Select theme color.','miraculous' ),
				'required' => array( 'color_switch_value', '=', true )
			),
			
			array(
				'id'       => 'theme_multi_color_switch',
				'type'     => 'switch',
				'title'    => __( 'Multi Color Option', 'miraculous' ),
				'default'  => true,
			),
			
			array(
				'id'       => 'theme_multi_color',
				'type'     => 'color',
				'title'    => __('Theme Color', 'miraculous'), 
				'default'  => '#6ec1e4',
				'validate' => 'color',
				'required' => array( 'theme_multi_color_switch', '=', true )
			),
			
			array(
				'id'       => 'color_fonts_value',
				'type'     => 'switch',
				'title'    => __( 'Theme fonts style', 'miraculous' ),
				'default'  => false,
			),
			
			array(
				'id'          => 'font_style_google',
				'type'        => 'typography', 
				'title'       => __('Select Font Family', 'miraculous'),
				'google'      => true, 
				'font-backup' => true,
				'output'      => array('h2.site-description'),
				'units'       =>'px',
				'default'     => array(
					'color'       => '#000', 
					'font-style'  => '400', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '15px', 
					'line-height' => '25'
				),
				'required' => array( 'theme_fonts_setting', '=', true )
			),
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title' => __( '404 Settings', 'miraculous' ),
		'id'    => 'error_404_settings',
		'icon'  => 'dashicons dashicons-info-outline',
		'fields'     => array(
				array(
					'id'               => 'error_404_desc',
					'type'             => 'editor',
					'title'            => __('Description', 'miraculous'), 
					'default'          => __('Sorry, This Page Is Not Available', 'miraculous'),
					'args'   => array(
						'teeny'            => true,
						'textarea_rows'    => 10
					)
				),
				array(
					'id'       => 'err_ring',
					'type'     => 'media',
					'url'      => true,
					'title'    => __( 'Ring Image', 'miraculous'),
					'default'  => array( 'url' => get_template_directory_uri().	  			'/vendor/redux/images/err_ring.png'
					),
				),	
				array(
					'id'       => 'emptypageimage',
					'type'     => 'media',
					'url'      => true,
					'title'    => __( 'Bottom Wave Image', 'miraculous'),
					'default'  => array( 'url' => get_template_directory_uri().			   '/vendor/redux/images/brad_wave.png'
					),
				),	
			),
	) );
	
	Redux::setSection( $opt_name, array(
		'title' => __( 'Page Setting', 'miraculous' ),
		'id'    => 'user_page_settings',
		'icon'  => 'dashicons dashicons-admin-page',
		'fields'     => array(
				array(
					'id'       => 'profile_pages',
					'type'     => 'select',
					'multi'    => true,
					'title'    => __('Add Page Setting', 'miraculous'), 
					'desc'     => __('These pages show on profile menu', 'miraculous'),
					'data'     => 'pages',
				),
				array(
					'id'       => 'upload_switch',
					'type'     => 'switch',
					'title'    => __( 'Upload Button Enable/Disable', 'miraculous' ),
					'default'  => true,
					'desc'     => __( 'This upload button works in Top Header of site.','miraculous' )
				),
				array(
					'id'       => 'registerlogin_switch',
					'type'     => 'switch',
					'title'    => __( 'Register/Login Button Enable/Disable', 'miraculous' ),
					'default'  => true,
				),
				array(
					'id'       => 'user_blog_page',
					'type'     => 'select',
					'title'    => __('Your Tracks', 'miraculous'), 
					'desc'     => __('Select page you want to redirect users after uploading tracks.', 'miraculous'),
					'data'     => 'pages',
				),
				array(
					'id'       => 'user_music_upload_page',
					'type'     => 'select',
					'title'    => __('Music Upload Page', 'miraculous'), 
					'desc'     => __('Select the page to link upload button on the top header.', 'miraculous'),
					'data'     => 'pages',
				),
				array(
					'id'       => 'user_pricing_plan_page',
					'type'     => 'select',
					'title'    => __('Pricing Plan Page', 'miraculous'), 
					'desc'     => __('Select pricing plan page.', 'miraculous'),
					'data'     => 'pages',
				),	
				array(
					'id'       => 'user_followers_page',
					'type'     => 'select',
					'title'    => __('Followers Page', 'miraculous'), 
					'desc'     => __('Select followers page.', 'miraculous'),
					'data'     => 'pages',
				),	
				array(
					'id'       => 'directedowenload_switch',
					'type'     => 'switch',
					'title'    => __( 'Free Download Enable/Disable', 'miraculous' ),
					'desc'     => __( 'Allow users to download premium songs at zero (0) amount','miraculous' ),
					'default'  => false,
				),			
			),
	) );
	
	Redux::setSection( $opt_name, array(
		'title'      => __( 'Footer', 'miraculous' ),
		'id'         => 'footer_settings',
		'icon'  => 'el el-credit-card',
		'fields'     => array(
			array(
				'id'       => 'footer_show',
				'type'     => 'switch',
				'title'    => __('Footer Show / Hide','miraculous'),
				'default'  => true,
			),
			array(
				'id'       => 'footer_logo',
				'type'     => 'switch',
				'title'    => __('Footer Logo Enable/Disable','miraculous'),
				'default'  => true,
			),
			array(
				'id'       => 'flogo_image',
				'type'     => 'media',
				'url'      => true,
				'title'    => __( 'Footer Logo Image', 'miraculous'),
			),	
			array(
				'id'       => 'flogo_width',
				'type'     => 'text',
				'title'    => __( 'Footer Logo Width', 'miraculous' ),
				'default'  => __( '111', 'miraculous' ),
				'desc'     => __( 'Enter footer logo width size in pixels. Ex: 80','miraculous' ),
			),
			array(
				'id'       => 'flogo_height',
				'type'     => 'text',
				'title'    => __( 'Footer Logo Height', 'miraculous' ),
				'default'  => __( '111', 'miraculous' ),
				'desc'     => __( 'Enter footer logo height size in pixels. Ex: 80','miraculous' ),
			),
			array(
				'id'       => 'flogo_svgcode',
				'type'     => 'textarea',
				'title'    => __( 'Footer Logo Svg Code', 'miraculous' ),
				'desc'     => __( 'Enter footer logo svg code','miraculous' )
			),
			array(
				'id'       => 'footer_bg_image',
				'type'     => 'media',
				'url'      => true,
				'title'    => __( 'Footer Background Image', 'miraculous'),
			),	
			array(
				'id'       => 'footer_copyrigth',
				'type'     => 'text',
				'title'    => __( 'Copyright Text', 'miraculous' ),
				'default'    => __( 'Copyright &copy; '.date('Y').' miraculous. All Right Reserved.', 'miraculous' ),
				'required' => array( 'copyright_switch', '=', true )
			),
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title' => __( 'API Settings', 'miraculous' ),
		'id'    => 'mailchimp_tab',
		'icon'  => 'dashicons dashicons-rest-api',
		'fields'     => array(
				array(
					'id'       => 'mailchimp_api_key',
					'type'     => 'text',
					'title'    => __( 'MailChimp Api Key', 'miraculous' ),
				),
				array(
					'id'       => 'mailchimp_list_id',
					'type'     => 'text',
					'title'    => __( 'MailChimp List Id', 'miraculous' ),
				),
				array(
					'id'       => 'google_login_client_id',
					'type'     => 'text',
					'title'    => __( 'Google App Client ID', 'miraculous' ),
				),
				array(
					'id'       => 'google_login_client_secret',
					'type'     => 'text',
					'title'    => __( 'Google App Client Serect', 'miraculous' ),
				),
				array(
					'id'       => 'google_login_redirect_uri',
					'type'     => 'text',
					'title'    => __( 'Google Login Redirect URI', 'miraculous' ),
				),
			)
	) );
	
	Redux::setSection( $opt_name, array(
		'title' => __( 'Payment Settings', 'miraculous' ),
		'id'    => 'payment_setting',
		'icon'  => 'dashicons dashicons-money-alt',
		'fields'     => array(
				array(
					'id'       => 'currency',
					'type'     => 'select',
					'title'    => __('Currency', 'miraculous'), 
					'options'  => array(
						'ANG' => esc_html__('ANG', 'miraculous'),
						'AOA' => esc_html__('AOA', 'miraculous'),
						'AUD' => esc_html__('AUD', 'miraculous'),
						'AWG' => esc_html__('AWG', 'miraculous'),
						'BWP' => esc_html__('BWP', 'miraculous'),
						'BRL' => esc_html__('BRL', 'miraculous'),
						'USD' => esc_html__('USD', 'miraculous'),
						'CAD' => esc_html__('CAD', 'miraculous'),
						'CDF' => esc_html__('CDF', 'miraculous'),
						'GBP' => esc_html__('GBP', 'miraculous'),
						'EUR' => esc_html__('EUR', 'miraculous'),
						'RUB' => esc_html__('RUB', 'miraculous'),
						'INR' => esc_html__('INR', 'miraculous'),
						'JPY' => esc_html__('JPY', 'miraculous'),
						'VND' => esc_html__('VND', 'miraculous'),
						'GHS' => esc_html__('GHS', 'miraculous'),
						'NGN' => esc_html__('NGN', 'miraculous'),
						'ZAR' => esc_html__('ZAR', 'miraculous'),
					),
					'default'  => 'USD',
				),
				array(
				   'id' => 'section-paypal',
				   'type' => 'section',
				   'title' => __('Paypal Settings', 'miraculous'),
				   'indent' => true 
				),
				array(
					'id'       => 'theme_paypal_switch',
					'type'     => 'switch',
					'title'    => __('Paypal Payment Option','miraculous'),
					'default'  => false,
				),
				array(
					'id'       => 'paypal_mode',
					'type'     => 'select',
					'title'    => __('Paypal Payment Mode', 'miraculous'), 
					'options'  => array(
						'testing' => esc_html__('Testing', 'miraculous'),
						'live' => esc_html__('Live', 'miraculous'),
					),
					'default'  => 'testing',
					'required' => array( 'theme_paypal_switch', '=', true )
				),
				array(
					'id'       => 'paypal_business_email',
					'type'     => 'text',
					'title'    => __( 'Paypal Business Email', 'miraculous' ),
					'required' => array( 'theme_paypal_switch', '=', true )
				),
				array(
					'id'       => 'paypal_success_page_url',
					'type'     => 'text',
					'title'    => __( 'Paypal Success Url', 'miraculous' ),
					'required' => array( 'theme_paypal_switch', '=', true )
				),
				array(
					'id'       => 'paypal_cancel_page_url',
					'type'     => 'text',
					'title'    => __( 'Paypal Cancel Url', 'miraculous' ),
					'required' => array( 'theme_paypal_switch', '=', true )
				),
				array(
					'id'   => 'info_normal',
					'type' => 'info',
					'title'=> 'IPN Info',
					'desc' => __('Set this url in paypal IPN setting <code>YOUR SITE URL/wp-content/plugins/miraculouscore/paypal/payments.php</code> for getting payment information.', 'redux-framework-demo'),
					'required' => array( 'theme_paypal_switch', '=', true )
				),
				array(
				   'id' => 'section-stripe',
				   'type' => 'section',
				   'title' => __('Stripe Settings', 'miraculous'),
				   'indent' => true 
				),
				array(
					'id'       => 'theme_stripe_switch',
					'type'     => 'switch',
					'title'    => __('Stripe Payment Option','miraculous'),
					'default'  => false,
				),
				array(
					'id'       => 'stripe_publishkey',
					'type'     => 'text',
					'title'    => __( 'Publishable key', 'miraculous' ),
					'desc'     => __( 'You can get the Publishable key from <a href="https://dashboard.stripe.com/test/dashboard" target="_blank">here</a>.', 'miraculous'),
					'required' => array( 'theme_stripe_switch', '=', true )
				),
				array(
					'id'       => 'stripe_secretkey',
					'type'     => 'text',
					'title'    => __( 'Secret key', 'miraculous' ),
					'desc'     => __( 'You can get the Secret key from <a href="https://dashboard.stripe.com/test/dashboard" target="_blank">here</a>.', 'miraculous'),
					'required' => array( 'theme_stripe_switch', '=', true )
				),
				array(
					'id'       => 'stripe_email',
					'type'     => 'text',
					'title'    => __( 'Stripe Email', 'miraculous' ),
					'required' => array( 'theme_stripe_switch', '=', true )
				),
				array(
					'id'       => 'stripe_successurl',
					'type'     => 'text',
					'title'    => __( 'Stripe Price Plan Success Url', 'miraculous' ),
					'required' => array( 'theme_stripe_switch', '=', true )
				),
				array(
					'id'       => 'stripe_track_successurl',
					'type'     => 'text',
					'title'    => __( 'Stripe Track/Album Success Url', 'miraculous' ),
					'required' => array( 'theme_stripe_switch', '=', true )
				),
				array(
					'id'       => 'stripe_cancelurl',
					'type'     => 'text',
					'title'    => __( 'Stripe Cancel Url', 'miraculous' ),
					'required' => array( 'theme_stripe_switch', '=', true )
				),
				array(
					'id'       => 'stripe_storename',
					'type'     => 'text',
					'title'    => __( 'Stripe Store Name', 'miraculous' ),
					'desc'     => __( 'Enter Stripe Store Name Here.','miraculous' ),
					'required' => array( 'theme_stripe_switch', '=', true )
				),
				array(
					'id'       => 'stripe_logoimg',
					'type'     => 'media',
					'url'      => true,
					'title'    => __( 'Stripe Logo Image', 'miraculous'),
					'desc'     => __( 'Stripe Upload logo image Here.', 'miraculous' ),
					'required' => array( 'theme_stripe_switch', '=', true )
				),
				array(
				   'id' => 'section-paystack',
				   'type' => 'section',
				   'title' => __('Paystack Payment', 'miraculous'),
				   'indent' => true 
				),	
				array(
					'id'       => 'theme_paystack_switch',
					'type'     => 'switch',
					'title'    => __('Paystack Payment Option','miraculous'),
					'default'  => false,
				),
				array(
					'id'       => 'paystack_secretkey',
					'type'     => 'text',
					'title'    => __( 'Secret Key', 'miraculous' ),
					'required' => array( 'theme_paystack_switch', '=', true )
				),
				array(
					'id'       => 'paystack_publickey',
					'type'     => 'text',
					'title'    => __( 'Public Key', 'miraculous' ),
					'required' => array( 'theme_paystack_switch', '=', true )
				),
				array(
					'id'       => 'paystack_successurl',
					'type'     => 'text',
					'title'    => __( 'Paystack Success Url', 'miraculous' ),
					'required' => array( 'theme_paystack_switch', '=', true )
				),
				array(
					'id'       => 'paystack_cancelurl',
					'type'     => 'text',
					'title'    => __( 'Paystack Cancel Url', 'miraculous' ),
					'required' => array( 'theme_paystack_switch', '=', true )
				),
				array(
				   'id' => 'section-razorpay',
				   'type' => 'section',
				   'title' => __('Razorpay Payment', 'miraculous'),
				   'indent' => true 
				),
				array(
					'id'       => 'theme_razorpay_switch',
					'type'     => 'switch',
					'title'    => __('Razorpay Payment Option','miraculous'),
					'default'  => false,
				),
				array(
					'id'       => 'razorpay_key',
					'type'     => 'text',
					'title'    => __( 'Razorpay Key', 'miraculous' ),
					'required' => array( 'theme_razorpay_switch', '=', true )
				),
				array(
					'id'       => 'razorpay_success_url',
					'type'     => 'text',
					'title'    => __( 'Razorpay Success Url', 'miraculous' ),
					'required' => array( 'theme_razorpay_switch', '=', true )
				),
				array(
					'id'       => 'razorpay_cancel_url',
					'type'     => 'text',
					'title'    => __( 'Razorpay Cancel Url', 'miraculous' ),
					'required' => array( 'theme_razorpay_switch', '=', true )
				),
			)
	) );
	
	Redux::setSection( $opt_name, array(
		'title' => __( 'Commission Settings', 'miraculous' ),
		'id'    => 'commission_setting',
		'icon'  => 'dashicons dashicons-money-alt',
		'fields'     => array(
				array(
					'id'       => 'commission_value',
					'type'     => 'text',
					'title'    => __( 'Commision Value', 'miraculous' ),
					'desc'     => __( 'Enter Commission % for vendors', 'miraculous' )
				),
			)
	) );
	 /*
     *
     * ---> End SECTIONS
     *
     */

    

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'miraculous' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

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
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
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
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'miraculous' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'miraculous' ),
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
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
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